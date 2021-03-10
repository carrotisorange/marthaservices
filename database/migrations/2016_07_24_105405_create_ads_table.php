<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->enum('type', ['personal', 'business'])->nullable();
            $table->decimal('price', 12,2)->nullable();
            $table->enum('is_negotiable', [0,1])->nullable();
            $table->string('purpose')->nullable();
            $table->decimal('price_per_unit', 12,2)->nullable();
            $table->string('unit_type')->nullable();
            $table->string('square_unit_space')->nullable();
            $table->string('floor')->nullable();
            $table->string('beds')->nullable();
            $table->string('attached_bath')->nullable();
            $table->string('common_bath')->nullable();
            $table->string('balcony')->nullable();
            $table->tinyInteger('dining_space')->nullable();
            $table->tinyInteger('living_room')->nullable();
            $table->text('amenities')->nullable();
            $table->text('distances')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('seller_email')->nullable();
            $table->string('seller_phone')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('video_url')->nullable();
            //0 =pending for review, 1= published, 2=blocked, 3=archived
            $table->tinyInteger('status')->default(0)->nullable();
            $table->enum('price_plan', ['regular','premium']);
            $table->tinyInteger('mark_ad_urgent')->default(0)->nullable();
            $table->integer('view');
            $table->integer('max_impression');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ads');
    }
}
