<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('options')->insert([
            0 => array (
                'id' => 2,
                'option_key' => 'enable_paypal',
                'option_value' => '1',
            ),
            1 => array (
                'id' => 3,
                'option_key' => 'enable_stripe',
                'option_value' => '1',
            ),
            2 => array (
                'id' => 4,
                'option_key' => 'stripe_test_mode',
                'option_value' => '1',
            ),
            3 => array (
                'id' => 5,
                'option_key' => 'stripe_test_secret_key',
                'option_value' => 'sk_test_tJeAdA1KbhiYV8I8bfPmJcOL',
            ),
            4 => array (
                'id' => 6,
                'option_key' => 'stripe_test_publishable_key',
                'option_value' => 'pk_test_P3TFmKrvT7l29Zpyy1f4pwk8',
            ),
            5 => array (
                'id' => 7,
                'option_key' => 'stripe_live_secret_key',
                'option_value' => '',
            ),
            6 => array (
                'id' => 8,
                'option_key' => 'stripe_live_publishable_key',
                'option_value' => '',
            ),
            7 => array (
                'id' => 9,
                'option_key' => 'date_format',
                'option_value' => 'd/m/Y',
            ),
            8 => array (
                'id' => 10,
                'option_key' => 'default_timezone',
                'option_value' => 'Asia/Dhaka',
            ),
            9 => array (
                'id' => 11,
                'option_key' => 'date_format_custom',
                'option_value' => 'd/m/Y',
            ),
            10 => array (
                'id' => 12,
                'option_key' => 'site_title',
                'option_value' => 'ThemeqxEstate',
            ),
            11 => array (
                'id' => 13,
                'option_key' => 'email_address',
                'option_value' => 'admin@demo.com',
            ),
            12 => array (
                'id' => 14,
                'option_key' => 'time_format',
                'option_value' => 'g:i A',
            ),
            13 => array (
                'id' => 15,
                'option_key' => 'time_format_custom',
                'option_value' => 'g:i A',
            ),
            14 => array (
                'id' => 17,
                'option_key' => 'number_of_premium_ads_in_home',
                'option_value' => '8',
            ),
            15 => array (
                'id' => 18,
                'option_key' => 'number_of_free_ads_in_home',
                'option_value' => '8',
            ),
            16 => array (
                'id' => 19,
                'option_key' => 'ads_per_page',
                'option_value' => '12',
            ),
            17 => array (
                'id' => 20,
                'option_key' => 'regular_ads_price',
                'option_value' => '3',
            ),
            18 => array (
                'id' => 21,
                'option_key' => 'premium_ads_price',
                'option_value' => '8',
            ),
            19 => array (
                'id' => 22,
                'option_key' => 'ads_price_plan',
                'option_value' => 'regular_ads_free_premium_paid',
            ),
            20 => array (
                'id' => 23,
                'option_key' => 'ads_moderation',
                'option_value' => 'need_moderation',
            ),
            21 => array (
                'id' => 24,
                'option_key' => 'paypal_receiver_email',
                'option_value' => 'shohelmail71-facilitator@gmail.com',
            ),
            22 => array (
                'id' => 25,
                'option_key' => 'enable_paypal_sandbox',
                'option_value' => '1',
            ),
            23 => array (
                'id' => 26,
                'option_key' => 'site_name',
                'option_value' => 'ThemeqxEstate',
            ),
            24 => array (
                'id' => 27,
                'option_key' => 'default_storage',
                'option_value' => 'public',
            ),
            25 => array (
                'id' => 28,
                'option_key' => 'amazon_key',
                'option_value' => '',
            ),
            26 => array (
                'id' => 29,
                'option_key' => 'amazon_secret',
                'option_value' => '',
            ),
            27 => array (
                'id' => 30,
                'option_key' => 'amazon_region',
                'option_value' => '',
            ),
            28 => array (
                'id' => 31,
                'option_key' => 'bucket',
                'option_value' => '',
            ),
            29 => array (
                'id' => 32,
                'option_key' => 'enable_facebook_login',
                'option_value' => '1',
            ),
            30 => array (
                'id' => 33,
                'option_key' => 'enable_google_login',
                'option_value' => '1',
            ),
            31 => array (
                'id' => 34,
                'option_key' => 'fb_app_id',
                'option_value' => '807346162754117',
            ),
            32 => array (
                'id' => 35,
                'option_key' => 'fb_app_secret',
                'option_value' => '6b93030d5c4f2715aa9d02be93256fbd',
            ),
            33 => array (
                'id' => 36,
                'option_key' => 'google_client_id',
                'option_value' => '',
            ),
            34 => array (
                'id' => 37,
                'option_key' => 'google_client_secret',
                'option_value' => '',
            ),
            35 => array (
                'id' => 38,
                'option_key' => 'enable_social_login',
                'option_value' => '1',
            ),
            36 => array (
                'id' => 39,
                'option_key' => 'enable_social_sharing_in_ad_box',
                'option_value' => '1',
            ),
            37 => array (
                'id' => 40,
                'option_key' => 'order_by_premium_ads_in_listing',
                'option_value' => 'random',
            ),
            38 => array (
                'id' => 41,
                'option_key' => 'number_of_premium_ads_in_listing',
                'option_value' => '3',
            ),
            39 => array (
                'id' => 42,
                'option_key' => 'number_of_last_days_premium_ads',
                'option_value' => '30',
            ),
            40 => array (
                'id' => 43,
                'option_key' => 'enable_slider',
                'option_value' => '1',
            ),
            41 => array (
                'id' => 44,
                'option_key' => 'premium_ads_max_impressions',
                'option_value' => '50',
            ),
            42 => array (
                'id' => 45,
                'option_key' => 'footer_left_text',
                'option_value' => 'Copyright [copyright_sign] [year] your company',
            ),
            43 => array (
                'id' => 46,
                'option_key' => 'footer_right_text',
                'option_value' => 'Your additional text, can be use link too',
            ),
            44 => array (
                'id' => 47,
                'option_key' => 'additional_css',
                'option_value' => '',
            ),
            45 => array (
                'id' => 48,
                'option_key' => 'additional_js',
                'option_value' => '',
            ),
            46 => array (
                'id' => 49,
                'option_key' => 'facebook_url',
                'option_value' => 'https://facebook.com/themeqx',
            ),
            47 => array (
                'id' => 50,
                'option_key' => 'twitter_url',
                'option_value' => '#',
            ),
            48 => array (
                'id' => 51,
                'option_key' => 'linked_in_url',
                'option_value' => '#',
            ),
            49 => array (
                'id' => 52,
                'option_key' => 'dribble_url',
                'option_value' => '#',
            ),
            50 => array (
                'id' => 53,
                'option_key' => 'google_plus_url',
                'option_value' => '#',
            ),
            51 => array (
                'id' => 54,
                'option_key' => 'youtube_url',
                'option_value' => '#',
            ),
            52 => array (
                'id' => 55,
                'option_key' => 'footer_company_name',
                'option_value' => '[site_name]',
            ),
            53 => array (
                'id' => 56,
                'option_key' => 'footer_address',
                'option_value' => '2/21 Barden Loop  <br /> Cupertino, CA 774636',
            ),
            54 => array (
                'id' => 57,
                'option_key' => 'site_phone_number',
                'option_value' => '(123) 456-7890',
            ),
            55 => array (
                'id' => 58,
                'option_key' => 'site_email_address',
                'option_value' => 'info@customer.com ',
            ),
            56 => array (
                'id' => 59,
                'option_key' => 'footer_about_us',
                'option_value' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
            ),
            57 => array (
                'id' => 60,
                'option_key' => 'footer_about_us_read_more_text',
                'option_value' => '<a href="#">View details »</a>',
            ),
            58 => array (
                'id' => 61,
                'option_key' => 'google_map_embedded_code',
                'option_value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.72357067242!2d90.27902569868164!3d23.780942445486914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka+1000-1200!5e0!3m2!1sen!2sbd!4v1472245590888" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
            ),
            59 => array (
                'id' => 62,
                'option_key' => 'monetize_code_below_slider',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            60 => array (
                'id' => 63,
                'option_key' => 'enable_monetize',
                'option_value' => '0',
            ),
            61 => array (
                'id' => 64,
                'option_key' => 'monetize_code_below_search_bar',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            62 => array (
                'id' => 65,
                'option_key' => 'monetize_code_below_categories',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            63 => array (
                'id' => 66,
                'option_key' => 'monetize_code_below_premium_ads',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            64 => array (
                'id' => 67,
                'option_key' => 'monetize_code_below_regular_ads',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            65 => array (
                'id' => 68,
                'option_key' => 'monetize_code_listing_sidebar_top',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            66 => array (
                'id' => 69,
                'option_key' => 'monetize_code_listing_sidebar_bottom',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            67 => array (
                'id' => 70,
                'option_key' => 'monetize_code_listing_above_premium_ads',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            68 => array (
                'id' => 71,
                'option_key' => 'monetize_code_listing_above_regular_ads',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            69 => array (
                'id' => 72,
                'option_key' => 'monetize_code_below_ad_title',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            70 => array (
                'id' => 73,
                'option_key' => 'monetize_code_below_ad_image',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            71 => array (
                'id' => 74,
                'option_key' => 'monetize_code_below_ad_description',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- TestCSP -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8618780985613063"
     data-ad-slot="5484345690"
     data-ad-format="auto"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>',
            ),
            72 => array (
                'id' => 75,
                'option_key' => 'monetize_code_above_general_info',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            73 => array (
                'id' => 76,
                'option_key' => 'monetize_code_below_general_info',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            74 => array (
                'id' => 77,
                'option_key' => 'monetize_code_above_seller_info',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            75 => array (
                'id' => 78,
                'option_key' => 'monetize_code_below_seller_info',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            76 => array (
                'id' => 79,
                'option_key' => 'monetize_code_listing_below_regular_ads',
                'option_value' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- TestCSP -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8618780985613063"
                             data-ad-slot="5484345690"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>',
            ),
            77 => array (
                'id' => 80,
                'option_key' => 'disqus_shortname',
                'option_value' => 'tclassifieds',
            ),
            78 => array (
                'id' => 81,
                'option_key' => 'enable_disqus_comment_in_blog',
                'option_value' => '1',
            ),
            79 => array (
                'id' => 82,
                'option_key' => 'show_blog_in_footer',
                'option_value' => '0',
            ),
            80 => array (
                'id' => 83,
                'option_key' => 'show_blog_in_header',
                'option_value' => '1',
            ),
            81 => array (
                'id' => 84,
                'option_key' => 'blog_post_amount_in_homepage',
                'option_value' => '6',
            ),
            82 => array (
                'id' => 85,
                'option_key' => 'show_latest_blog_in_homepage',
                'option_value' => '1',
            ),
            83 => array (
                'id' => 86,
                'option_key' => 'currency_sign',
                'option_value' => 'EUR',
            ),
            84 => array (
                'id' => 87,
                'option_key' => 'logo',
                'option_value' => '1474653628axpoj-other-settings-themeqx-classified-2016-09-23-23-57-31.png',
            ),
            85 => array (
                'id' => 88,
                'option_key' => 'logo_storage',
                'option_value' => 'public',
            ),
            86 => array (
                'id' => 89,
                'option_key' => 'logo_settings',
                'option_value' => 'show_site_name',
            ),
            87 => array (
                'id' => 90,
                'option_key' => 'enable_language_switcher',
                'option_value' => '0',
            ),
            88 => array (
                'id' => 91,
                'option_key' => 'enable_related_ads',
                'option_value' => '1',
            ),
            89 => array (
                'id' => 92,
                'option_key' => 'default_theme',
                'option_value' => 'modern',
            ),
            90 => array (
                'id' => 93,
                'option_key' => 'meta_description',
                'option_value' => 'meta_description',
            ),
            91 => array (
                'id' => 94,
                'option_key' => 'modern_category_display_style',
                'option_value' => 'show_top_category_with_sub',
            ),
            92 => array (
                'id' => 95,
                'option_key' => 'modern_home_left_title',
                'option_value' => 'Lorem Ipsum is simply',
            ),
            93 => array (
                'id' => 96,
                'option_key' => 'modern_home_left_content',
                'option_value' => 'Lorem Ipsum is simply dummy text of the printing and
Lorem Ipsum is simply dummy text of the printing and
Lorem Ipsum is simply dummy text of the printing and
Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            ),
            94 => array (
                'id' => 97,
                'option_key' => 'modern_home_right_title',
                'option_value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting',
            ),
            95 => array (
                'id' => 98,
                'option_key' => 'modern_home_right_content',
                'option_value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
            ),
            96 => array (
                'id' => 99,
                'option_key' => 'urgent_ads_price',
                'option_value' => '5',
            ),
            97 => array (
                'id' => 100,
                'option_key' => 'number_of_urgent_ads_in_home',
                'option_value' => '8',
            ),
            98 => array (
                'id' => 101,
                'option_key' => 'default_style',
                'option_value' => 'default',
            ),
            99 => array (
                'id' => 102,
                'option_key' => 'google_map_api_key',
                'option_value' => 'AIzaSyCQuDQmtiHkS7CcriyEiYXWja3ODrG4vFI',
            ),
            100 => array (
                'id' => 105,
                'option_key' => 'default_latitude',
                'option_value' => '48.877332604602955',
            ),
            101 => array (
                'id' => 106,
                'option_key' => 'default_longitude',
                'option_value' => '2.3299384117126465',
            ),

        ]);
    }
}
