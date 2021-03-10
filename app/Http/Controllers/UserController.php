<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Country;
use App\Favorite;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans('app.users');
        $users = User::select('id','name', 'user_name', 'email', 'feature', 'created_at')->whereUserType('user')->orderBy('id', 'desc')->paginate(20);

        return view('admin.users', compact('title', 'users'));
    }

    public function userInfo($id){
        $title = trans('app.user_info');
        $user = User::find($id);
        $ads = $user->ads()->paginate(20);

        if (!$user){
            return view('admin.error.error_404');
        }

        return view('admin.user_info', compact('title', 'user', 'ads'));

    }

    public function changeStatus(Request $request){
        $user_id = $request->user_id;
        $status = $request->status;
        User::whereId($user_id)->update(['active_status' => $status]);
        if ($status == 1){
            return '<p class="alert alert-success">'.trans('app.user_has_been_activated').' </p>';
        }elseif ($status == 2){
            return '<p class="alert alert-warning">'.trans('app.user_has_been_blocked').' </p>';
        }
    }

    public function changeFeature(Request $request){
        $user_id = $request->user_id;

        $user = User::find($user_id);
        $current_feature = $user->feature;
        $user->feature = ($current_feature == 0) ? 1 : 0;
        $user->save();

        if ($current_feature == 1){
            return '<i class="fa fa-star-o"></i>';
        }elseif ($current_feature == 0){
            return '<i class="fa fa-star"></i>';
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('theme.user_create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'first_name'    => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'gender'    => 'required',
            'country'    => 'required',
            'password'    => 'required|confirmed',
            'password_confirmation'    => 'required',
            'agree'    => 'required',
        ];
        $this->validate($request, $rules);

        $userExists = User::whereEmail($request->email)->first();
        if ($userExists){
            return back()->withInput($request->input())->with('error', trans('app.email_exists'));
        }

        $data = [
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'name'              => $request->first_name.' '.$request->last_name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'country_id'        => $request->country,
            'phone'             => $request->phone,
            'user_type'         => 'user',
            'active_status'         => '1',
            'activation_code'   => str_random(30)
        ];

        $user_create = User::create($data);

        if ($user_create){
            return redirect(route('login'))->with('registration_success', trans('app.registration_success'));
        } else {
            return back()->withInput()->with('error', trans('app.error_msg'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
    
    public function profile(){
        $title = trans('app.profile');
        $user = Auth::user();
        return view('admin.profile', compact('title', 'user'));
    }

    public function profileEdit(){
        $title = trans('app.profile_edit');
        $user = Auth::user();
        $countries = Country::all();

        return view('admin.profile_edit', compact('title', 'user', 'countries'));
    }

    public function profileEditPost(Request $request){
        $user = Auth::user();

        //Validating
        $rules = [
            'email'    => 'required|email|unique:users,email,'.$user->id,
        ];
        $this->validate($request, $rules);

        $inputs = array_except($request->input(), ['_token', 'photo']);
        $user->update($inputs);

        if ($request->hasFile('photo')){
            $rules = ['photo'=>'mimes:jpeg,jpg,png'];
            $this->validate($request, $rules);
            
            $image = $request->file('photo');
            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
            $resized_thumb = Image::make($image)->resize(300, 300)->stream();

            $image_name = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            $imageFileName = 'uploads/avatar/'.$image_name;

            //Upload original image
            $is_uploaded = current_disk()->put($imageFileName, $resized_thumb->__toString(), 'public');

            if ($is_uploaded){
                $previous_photo= $user->photo;
                $previous_photo_storage= $user->photo_storage;

                $user->photo = $image_name;
                $user->photo_storage = get_option('default_storage');
                $user->save();

                if ($previous_photo){
                    $previous_photo_path = 'uploads/avatar/'.$previous_photo;
                    $storage = Storage::disk($previous_photo_storage);
                    if ($storage->has($previous_photo_path)){
                        $storage->delete($previous_photo_path);
                    }
                }
            }
        }

        return redirect(route('profile'))->with('success', trans('app.profile_edit_success_msg'));
    }

    public function administrators(){
        $title = trans('app.administrators');
        $users = User::whereUserType('admin')->get();

        return view('admin.administrators', compact('title', 'users'));
    }

    public function addAdministrator(){
        $title = trans('app.add_administrator');
        $countries = Country::all();

        return view('admin.add_administrator', compact('title', 'countries'));
    }


    public function storeAdministrator(Request $request)
    {

        $rules = [
            'first_name'    => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'gender'    => 'required',
            'country'    => 'required',
            'password'    => 'required|confirmed',
            'password_confirmation'    => 'required',
        ];
        $this->validate($request, $rules);

        $data = [
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'name'              => $request->first_name.' '.$request->last_name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'phone'             => $request->phone,
            'user_type'         => 'admin',
            'active_status'         => 1,
            'activation_code'   => str_random(30)
        ];

        $user_create = User::create($data);
        return redirect(route('administrators'))->with('success', trans('app.registration_success'));
    }

    public function administratorBlockUnblock(Request $request){
        $status = $request->status == 'unblock'? 1 : 2;
        $user_id = $request->user_id;
        User::whereId($user_id)->update(['active_status' => $status]);
        
        if ($status ==1){
            return ['success' => 1, 'msg' => trans('app.administrator_unblocked')];
        }
        return ['success' => 1, 'msg' => trans('app.administrator_blocked')];

    }
    
    //Login view
    public function login(){
        return view('theme.login');
    }
    //Login action
    public function loginPost(Request $request){
        $rules = [
            'email'    => 'required|email',
            'password'    => 'required',
        ];
        //$this->validate($request, $rules);

        //Manually creating validation
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect(route('login'))->withErrors($validator)->withInput();
        }

        //Get input value
        $email      = $request->email;
        $password   = $request->password;

        //Authenticating
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active_status' => '1'])) {
            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();
            // Authentication passed...
            return redirect()->intended(route('dashboard'));
        }else{
            return redirect(route('login'))->with('error', trans('app.email_password_error'));
        }

    }



    public function changePassword()
    {
        $title = trans('app.change_password');
        return view('admin.change_password', compact('title'));
    }

    public function changePasswordPost(Request $request)
    {
        $rules = [
            'old_password'  => 'required',
            'new_password'  => 'required|confirmed',
            'new_password_confirmation'  => 'required',
        ];
        $this->validate($request, $rules);

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        //$new_password_confirmation = $request->new_password_confirmation;

        if(Auth::check())
        {
            $logged_user = Auth::user();

            if(Hash::check($old_password, $logged_user->password))
            {
                $logged_user->password = Hash::make($new_password);
                $logged_user->save();
                return redirect()->back()->with('success', trans('app.password_changed_msg'));
            }
            return redirect()->back()->with('error', trans('app.wrong_old_password'));
        }

    }


    /**
     * @param Request $request
     * @return array
     */

    public function saveAdAsFavorite(Request $request){
        if ( ! Auth::check())
            return ['status'=>0, 'msg'=> trans('app.error_msg'), 'redirect_url' => route('login')];

        $user = Auth::user();

        $slug = $request->slug;
        $ad = Ad::whereSlug($slug)->first();

        if ($ad){
            $get_previous_favorite = Favorite::whereUserId($user->id)->whereAdId($ad->id)->first();
            if ( ! $get_previous_favorite){
                Favorite::create(['user_id'=>$user->id, 'ad_id'=>$ad->id]);
                return ['status'=>1, 'action'=>'added', 'msg'=>'<i class="fa fa-star"></i> '.trans('app.remove_from_favorite')];
            }else{
                $get_previous_favorite->delete();
                return ['status'=>1, 'action'=>'removed', 'msg'=>'<i class="fa fa-star-o"></i> '.trans('app.save_ad_as_favorite')];
            }
        }
        return ['status'=>0, 'msg'=> trans('app.error_msg')];
    }

    public function replyByEmailPost(Request $request){
        $data = $request->all();
        $data['email'];
        $ad_id = $request->ad_id;
        $ad = Ad::find($ad_id);
        if ($ad){
            $to_email = $ad->user->email;
            if ($to_email){
                try{
                    Mail::send('emails.reply_by_email', ['data' => $data], function ($m) use ($data, $ad) {
                        $m->from(get_option('email_address'), get_option('site_name'));
                        $m->to($ad->user->email, $ad->user->name)->subject('query from '.$ad->title);
                        $m->replyTo($data['email'], $data['name']);
                    });
                }catch (\Exception $e){
                    //
                }
                return ['status'=>1, 'msg'=> trans('app.email_has_been_sent')];
            }
        }
        return ['status'=>0, 'msg'=> trans('app.error_msg')];

    }


    public function postEmailResetPassword(Request $request){
        $this->validate($request, ['email' => 'required|email']);

        $user = User::whereEmail($request->email)->first();
        if (!$user){
            return back();
        }
        $passwordResetToken = str_random(32);
        $passwordResetURL = route('password_reset_url', $passwordResetToken);

        $user->activation_code = $passwordResetToken;
        $user->save();

        $msg = '';
        try{
            Mail::send('emails.send_password_reset', ['user' => $user, 'resetURL' => $passwordResetURL], function ($m) use ($user) {
                $m->from(get_option('email_address'), get_option('site_name'));
                $m->to($user->email, $user->name)->subject('Password reset request');
            });

            $msg = trans('app.reset_password_sent');
        }catch (\Exception $exception){
            $msg = $exception->getMessage();
        }

        return back()->with('error', $msg);

    }

    /**
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function passwordResetForm($token){
        $user = User::whereActivationCode($token)->first();
        if ( ! $user){
            return redirect(route('login'))->with('error', trans('app.invalid_password_token'));
        }

        $title = trans('app.reset');
        return view('auth.reset_password', compact('token', 'title'));
    }

    /**
     * @param Request $request
     * @param $token
     * @return mixed
     *
     */
    public function passwordResetPost(Request $request, $token){
        $user = User::whereActivationCode($token)->first();
        if ( ! $user){
            return redirect(route('login'))->with('error', trans('app.invalid_password_token'));
        }

        $rules = [
            'password'  => 'required|confirmed',
        ];
        $this->validate($request, $rules);

        $user->password = Hash::make($request->password);
        $user->activation_code = '';
        $user->save();

        return redirect(route('login'))->with('success', trans('app.password_has_been_reset'));
    }

}
