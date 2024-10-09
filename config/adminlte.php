<?php

return [

    'admin_url' => env('ADMIN_URL'),
    'website_url' => env('WEBSITE_URL'),
    'email_verify_url' => env('EMAIL_VERIFY_URL'),
    'email_verify_url_mobile' => env('EMAIL_VERIFY_URL_MOBILE'),
    'default_avatar' => env('DEFAULT_AVATAR'),
    'from_email' => env('FROM_EMAIL', 'superadmin@lossdamage.com'),
    'logo_path' => env('LOGO_PATH'),
    'ticket_images_path' => env('TICKET_IMAGES_PATH'),

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'image_tooltip' => 'Upload max 2 MB file. Only .jpg .svg and .png files are allowed to upload.',
    'docs_tooltip' => 'Upload max 2 MB file. Only .jpg .gif .png .svg .doc .docx .xls .xlsx .ods .pdf files are allowed to upload.',
    'whichvocation' => 'Loss & Damage',
    'set_password' => 'Loss & Damage Recruiter Approved | Set Password',

    'title' => 'Loss & Damage',
    'title_prefix' => '',
    'title_postfix' => '',

    'ticket_acknowledgement_subject' => 'Loss & Damage Ticket Updates',
    'ticket_acknowledgement_message_sender' => 'You have replied to a ticket',
    'ticket_acknowledgement_message_receiver' => 'You have received a new message on a ticket',
    'thanks_footer' => 'Thank you for using our application!',
    'not_clickable_message' => 'If you’re having trouble clicking the button, copy and paste the URL below into your web browser:',
    'copyright' => 'Copyright © 2023 Loss & Damage',
    'hello' => 'Hello!',
    'view_ticket' => 'View Ticket',
    'regards' => 'Regards',
    'team' => 'Loss & Damage',
    'title' => 'Loss & Damage',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '<b></b>',
    'logo_img' => 'assets/images/admin-logo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Loss & Damage',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => 'sidebar-mini',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin_panel/dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [

        [
            'text' => 'dashboard',
            'url'  => 'admin_panel/dashboard',
            'icon' => 'fas fa-fw fa-tachometer-alt',
        ],

        ['header' => 'management'],

        [
            'key' => 'admin_users_management',
            'text' => 'users_management',
            'icon' => 'fas fa-fw fa-users',
            'active' => ['admin_panel/users*'],
            'can' => ['manage_coordinator_action', 'manage_admin_action'],
            'submenu' => [
                [
                    'text' => 'admins',
                    'icon' => 'fa fa-cogs',
                    'url'  => 'admin_panel/admins/list',
                    'active' => ['admin_panel/admins*'],
                    'can' => ['manage_admin_action'],
                ],
                [
                    'text' => 'Coordinators',
                    'icon' => 'fa fa-user',
                    'url'  => 'admin_panel/coordinator/list',
                    'active' => ['admin_panel/coordinator*'],
                    'can' => ['manage_coordinator_action'],
                ],
            ],
        ],

        [
            'key' => 'question_management',
            'text' => 'Question Management',
            'icon' => 'fas fa-fw fa-question-circle',
            'active' => ['admin_panel/question*'],
            'can' => ['manage_questionnaire_action', 'manage_question_action'],
            'submenu' => [
                [
                    'text' => 'Questionnaire',
                    'icon' => 'fas fa-fw fa-question-circle',
                    'url'  => 'admin_panel/questionnaire/list',
                    'active' => ['admin_panel/questionnaire/*'],
                    'can' => ['manage_questionnaire_action'],
                ],                
                [
                    'text' => 'Questions',
                    'icon' => 'fas fa-fw fa-question-circle',
                    'url'  => 'admin_panel/question/list',
                    'active' => ['admin_panel/question/*'],
                    'can' => ['manage_question_action'],
                ],
                [
                    'text' => 'Expert Questions/Answer',
                    'icon' => 'fas fa-fw fa-question-circle',
                    'url'  => 'admin_panel/questionnaires/list',
                    'active' => ['admin_panel/questionnaires/*'],
                    'can' => ['manage_question_action'],
                ],
            ],
        ],

        [
            'key' => 'help_and_support',
            'text' => 'Users Feedback',
            'icon' => 'fas fa-fw fa-comments',
            'active' => ['admin_panel/feedback*'],
            'can' => ['manage_feedback_action'],
            'submenu' => [
                 [
                    'text' => 'Contact Us',
                    'icon' => 'fas fa-envelope',
                    'url'  => 'admin_panel/contact_us/list',
                    'active' => ['admin_panel/contact_us*'],
                   // 'can' => ['manage_feedback_action'],
                ],
                [
                    'text' => 'Help and Support',
                    'icon' => 'fas fa-fw fa-solid fa-headset',
                    'url'  => 'admin_panel/feedback/help-and-support/list',
                    'active' => ['admin_panel/feedback/help-and-support*'],
                    'can' => ['manage_feedback_action'],
                ],

            ],
        ],

        
        [   
            'text' => 'Report Management',
            'icon' => 'fas fa-fw fa-info-circle',
            'url'  => '#',
            'active' => ['admin_panel/report-management*'],
           // 'can' => ['manage_report_analysis_action'],
            'submenu' => [  

                [
                    'text' => 'User Analysis',
                    'icon' => 'fas fa-fw far fa-building',
                    'url'  => 'admin_panel/report-management/user-list',
                    'active' => ['admin_panel/report-management/user-list*'],
                   // 'can' => 'manage_brand_action'
                    
                ], 
                [
                    'text' => 'Country List',
                    'icon' => 'fas fa-fw far fa-building',
                    'url'  => 'admin_panel/report-management/country-list',
                    'active' => ['admin_panel/report-management/country-list*'],
                   // 'can' => 'manage_brand_action'
                    
                ],           
               /*[ 
                    'text' => 'Report Analysis',
                    'icon' => 'fas fa-fw far fa-building',
                    'url'  => 'admin_panel/report-analysis/list',
                    'active' => ['admin_panel/report_analysis/report-analysis*'],
                   // 'can' => 'manage_brand_action'
                    
                ],*/
                [
                    'text' => 'Report Score',
                    'icon' => 'fas fa-fw far fa-building',
                    'url'  => 'admin_panel/report-management/report-score',
                    'active' => ['admin_panel/report-management/report-score*'],
                   // 'can' => 'manage_brand_action'
                    
                ],
                 [
                    'text' => 'Report Download',
                    'icon' => 'fas fa-fw far fa-building',
                    'url'  => 'admin_panel/report-management/report-download',
                    'active' => ['admin_panel/report-management/report-download*'],
                   // 'can' => 'manage_brand_action'
                    
                ],
            ],
        ],
        

        [
            'key' => 'manage_cms',
            'text' => 'Content Management',
            'icon' => 'fas fa-fw fa-edit',
            'active' => ['admin_panel/content*'],
            'can' => ['manage_content_action'],
            'submenu' => [
                [
                    'text' => 'website',
                    'icon' => 'fas fa-fw fa-laptop',
                    'url'  => 'admin_panel/content/website/list',
                    'active' => ['admin_panel/content/website*'],
                    'can' => ['manage_website_content_action'],
                ],
                [
                    'text' => 'mobile',
                    'icon' => 'fas fa-fw fa-mobile',
                    'url'  => 'admin_panel/content/mobile/list',
                    'active' => ['admin_panel/content/mobile/*'],
                    'can' => ['manage_mobile_content_action'],
                ],

                [
                    'text' => 'Media',
                    'icon' => 'fas fa-fw fa-camera',
                    'url'  => 'admin_panel/content/media/list',
                    'active' => ['admin_panel/content/media/*'],
                    'can' => ['manage_media_content_action'],
                ],

                [
                    'text' => 'Expertise',
                    'icon' => 'fa fa-cogs',
                    'url'  => 'admin_panel/content/expertise/list',
                    'active' => ['admin_panel/content/expertise/*'],
                    //'can' => ['manage_expertise_content_action'],
                ],

                [
                    'text' => 'Blogs',
                    'icon' => 'fas fa-fw fa-camera',
                    'url'  => 'admin_panel/content/blogs/list',
                    'active' => ['admin_panel/content/blogs/*'],
                    // 'can' => ['manage_media_content_action'],
                ],

                
                // [
                //     'text' => 'Mobile Home',
                //     'icon' => 'fas fa-fw fa-laptop',
                //     'url'  => 'admin_panel/content/mobilehome/list',
                //     'active' => ['admin_panel/content/mobilehome*'],
                //    //'can' => ['manage_mobile_content_action'],
                // ]
            ],
        ],


        [
            'text' => 'access_control',
            'icon'    => 'fas fa-fw fa-cogs',
            'url'  => '#',
            'active' => ['admin_panel/roles*'],
            'can' => 'manage_roles_action',
            'submenu' => [
                [
                    'text' => 'roles',
                    'icon'    => 'fas fa-fw fa-users',
                    'url'  => 'admin_panel/roles/list',
                    'active' => ['admin_panel/roles/list*', 'admin_panel/roles/add*', 'admin_panel/roles/edit*', 'admin_panel/roles/view*'],
                    'can' => 'manage_roles_action',
                ],
                [
                    'text' => 'permissions',
                    'icon'    => 'fas fa-key',
                    'url'  => 'admin_panel/roles/role_permissions',
                    'active' => ['admin_panel/roles/role_permissions*'],
                    'can' => 'edit_permission',
                ]
            ],
        ],
        [
            'key' => 'admin_recycle_bin',
            'text' => 'recycle_bin',
            'icon' => 'fas fa-trash',
            'url'  => '#',
            'active' => ['admin_panel/recycle_bin*'],
            'can' => ['manage_recyclebin_action'],
            'submenu' => [
                [
                    'text' => 'Admins',
                    'icon' => 'fa fa-cogs',
                    'url'  => 'admin_panel/recycle_bin/admins/deleted',
                    'can' => 'manage_recycle_bin_admin',
                ],
                [
                    'text' => 'Coordinators',
                    'icon' => 'fa fa-user',
                    'url'  => 'admin_panel/recycle_bin/coordinator/deleted',
                    'can' => 'manage_recycle_bin_coordinator',
                ],
                [
                    'text' => 'Experts',
                    'icon' => 'fa fa-user',
                    'url'  => 'admin_panel/recycle_bin/expert/deleted',
                    'can' => 'manage_recycle_bin_coordinator',
                ],
                [
                    'text' => 'Expert Panels',
                    'icon' => 'fa fa-user',
                    'url'  => 'admin_panel/recycle_bin/expert_panel/deleted',
                    'can' => 'manage_recycle_bin_coordinator',
                ],
                [
                    'text' => 'Questionnaire',
                    'icon' => 'fas fa-fw fa-question-circle',
                    'url'  => 'admin_panel/recycle_bin/questionnaire/deleted',
                    'can' => 'manage_recycle_bin_questionnaire',
                ],
                [
                    'text' => 'Questions',
                    'icon' => 'fas fa-fw fa-question-circle',
                    'url'  => 'admin_panel/recycle_bin/question/deleted',
                    'can' => 'manage_recycle_bin_question',
                ],
                [
                    'text' => 'Blogs',
                    'icon' => 'fa fa-camera',
                    'url'  => 'admin_panel/recycle_bin/blogs/deleted',
                    // 'can' => 'manage_recycle_bin_expertise',
                ],

                [
                    'text' => 'Expertise',
                    'icon' => 'fa fa-cogs',
                    'url'  => 'admin_panel/recycle_bin/expertise/deleted',
                    'can' => 'manage_recycle_bin_expertise',
                ],

                /*
                [
                    'text' => 'Misc Data Management',
                    'icon' => 'fas fa-fw fa-info-circle',
                    'url'  => '#',
                    'active' => ['admin_panel/recycle_bin/misc*'],
                    'can' => ['manage_recycle_bin_misc_data'],
                    'submenu' => [

                        [
                            'text' => 'Brands',
                            'icon' => 'fas fa-fw far fa-building',
                             'url'  => 'admin_panel/recycle_bin/misc/brands/deleted',
                            'active' => ['admin_panel/recycle_bin/misc/brands*'],
                            'can' => ['manage_recycle_bin_brands'],
                        ],
                    ],
                 ],
               
                [
                    'text' => 'roles',
                    'icon' => 'fas fa-users',
                    'url'  => 'admin_panel/recycle_bin/roles/deleted',
                    'can' => 'manage_recycle_bin_roles',
                ],
                */

            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'DateRangePicker' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/daterangepicker.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/daterangepicker.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
