<?php

use Illuminate\Support\Facades\Auth;

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Mishow',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => 'the<b>SPACE</b>mark',

    'logo_mini' => '<b>A</b>LT',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | light variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we have the option to enable a right sidebar.
    | When active, you can use @section('right-sidebar')
    | The icon you configured will be displayed at the end of the top menu,
    | and will show/hide de sidebar.
    | The slide option will slide the sidebar over the content, while false
    | will push the content, and have no animation.
    | You can also choose the sidebar theme (dark or light).
    | The right Sidebar can only be used if layout is not top-nav.
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and a URL. You can also specify an icon from Font
    | Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    */
    'menu' => [
        [
            'text' => 'search',
            'search' => true,
        ],
        ['header' => 'Admin portal',
         'can' => 'admin',
        ],
        [
            'text' => 'Dashboard',
            'url'  => 'home',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',
        ],

        [
            'text' => 'customers',
            'url'  => 'admin/buyerlist',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',
        ],
        [
            'text' => 'sellers',
            'url'  => 'admin/sellerlist',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',
        ],
        [
            'text'    => 'Products',
            'url'     => '#',
            'icon' => 'fas fa-fw fa-list',
            'can' => 'admin',

            'submenu' => [
                [
                    'text' => 'Add product',
                    'url'  => 'items/create',
                ],
                [
                    'text'    => 'Products',
                    'url'     => 'items',

                ],
            ],
        ],
        [
            'text'    => 'Delivery Management',
            'url'     => '#',
            'icon' => 'fas fa-fw fa-list',
            'can' => 'admin',

            'submenu' => [
                [
                    'text' => 'Add Delivery Peer',
                    'url'  => 'admin/adddeliverypeer',
                ],
                [
                    'text'    => 'Delivery Person List',
                    'url'     => 'admin/deliverylist',

                ],
            ],
        ],
        [
            'text' => 'Transactin details',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',

            'submenu' => [
                [
                'text' => 'successfull transactions',
                'url' => 'admin/transactions/seccessfull',
                ],
                [
                'text' => 'Failed transactions',
                'url' => 'admin/transactions/failed',
                ],
                [
                    'text' => 'Transactions Reports',
                    'url' => 'admin/transactions/reports',
                    ]
            ],
        ],
        [
            'text' => 'Subscription plans',
            'url'  => 'subscriptions',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',
        ],

        [
            'text' => 'Permissions',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',

            'submenu' => [
                [
                'text' => 'Customer Permissions',
                'url' => 'admin/permissions/customer',
                ],
                [
                'text' => 'Seller permissions',
                'url' => 'admin/permissions/seller',
                ],
            ],
        ],



        /***
        [
            'text'    => 'Item Images',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-camera',
            'submenu' => [
                [
                    'text' => 'create Item Images',
                    'url'  => 'itemimages/create',
                ],
                [
                    'text'    => 'show Item Images',
                    'url'     => 'itemimages',

                ],
            ],
        ], */
        [
            'text'    => 'categories',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-list-alt',
            'can' => 'admin',

            'submenu' => [
                [
                    'text' => 'Add category',
                    'url'  => 'categories/create',
                ],
                [
                    'text'    => 'All categories',
                    'url'     => 'categories',

                ],
            ],
        ],



        [
            'text'    => 'slides',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-slideshare',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Add new slide image',
                    'url'  => 'slides/create',
                ],
                [
                    'text'    => 'show slide images',
                    'url'     => 'slides',

                ],
            ],

        ],





        ['header' => 'SELLER PANEL',
         'can' => 'seller',
        ],

        [
            'text' => 'Dashboard',
            'url'  => 'seller',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'seller',
        ],
        [
            'text' =>   'Products',
            'url' => '#',
            'icon'    => 'fas fa-fw fa-map-marker',
            'can' => 'seller',
            'submenu' => [
                [
                    'text'    => 'Add product',
                    'url'     => 'seller/products/create',

                ],
                [
                    'text' => 'product list',
                    'url'  => 'seller/products',
                ],

            ],
        ],
        [
            'text'    => 'Orders',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-map-marker',
            'can' => 'seller',
            'submenu' => [
                [
                    'text' => 'Recieved orders',
                    'url'  => 'seller/orders/recieved',
                ],
                [
                    'text'    => 'dispatched orders',
                    'url'     => 'seller/orders/dispatched',

                ],
                [
                    'text'    => 'order history',
                    'url'     => 'seller/orders/history',

                ],
            ],
        ],
        [
            'text'    => 'Pin codes',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-map-marker',
            'can' => 'seller',
            'submenu' => [
                [
                    'text' => 'Add new pin code',
                    'url'  => 'pincodes/create',
                ],
                [
                    'text'    => 'show available pincodes',
                    'url'     => 'pincodes',

                ],
            ],
        ],
        [
            'text'    => 'seller profile',
            'url'     => 'seller/profile',
            'icon'    => 'fas fa-fw fa-map-marker',
            'can' => 'seller',

        ],
        [
            'text'    => 'Buy subscription plan',
            'url'     => 'seller/subscribe',
            'icon'    => 'fas fa-fw fa-map-marker',
            'can' => 'seller',

        ],


        ],



    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Configure which JavaScript plugins should be included. At this moment,
    | DataTables, Select2, Chartjs and SweetAlert are added out-of-the-box,
    | including the Javascript and CSS files from a CDN via script and link tag.
    | Plugin Name, active status and files array (even empty) are required.
    | Files, when added, need to have type (js or css), asset (true or false) and location (string).
    | When asset is set to true, the location will be output using asset() function.
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => true,
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
        [
            'name' => 'Chartjs',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => true,
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
    ],
];
