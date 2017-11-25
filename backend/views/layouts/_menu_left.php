<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<?php
/** @noinspection HtmlUnknownTarget */
use yii\helpers\Url;
use yii\widgets\Menu;

echo Menu::widget([
    'options'         => [
        'class'              => 'page-sidebar-menu page-sidebar-menu-closed page-header-fixed',
        'data-keep-expanded' => 'false',
        'data-slide-speed'   => 200,
        'data-auto-scroll'   => 'true'
    ],
    'items'           => [
        [
            'label'    => Yii::t('yii', 'Home'),
            'url'      => [Url::home()],
            'template' => '<a href="{url}" class="nav-link"><i class="icon-home"></i><span class="title">{label}</span></a>',
            'active'   => $this->context->route == 'site/index'
        ],
        [

            'visible'  => Yii::$app->permission->isAdmin(),
            'url'      => ['/hotel-map/'],
            'template' => '<a href="{url}" class="nav-link nav-toggle"><i class="fa fa-first-order"></i><span class="title">' . Yii::t('yii', 'Sơ đồ khách sạn') . '</span></a>',

           
        ],
        [

            'visible'  => Yii::$app->permission->isAdmin(),
            'template' => '<a href="javascript:void(0)" class="nav-link nav-toggle"><i class="fa fa-first-order"></i><span class="title">' . Yii::t('yii', 'Khách sạn') . '</span><span class="arrow"></span></a>',
            'items'    => [
                [
                    'label'    => Yii::t('yii', 'Quản lý lầu/tầng'),
                    'url'      => ['/floor/'],
                    'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
                    'active'   => is_int(strpos($this->context->route, 'floor')),
                ],
            ],
        ],
        [

            'visible'  => Yii::$app->permission->isAdmin(),
            'template' => '<a href="javascript:void(0)" class="nav-link nav-toggle"><i class="fa fa-first-order"></i><span class="title">' . Yii::t('yii', 'Loại phòng và giá') . '</span><span class="arrow"></span></a>',
            'items'    => [
                [
                    'label'    => Yii::t('yii', 'Danh sách loại phòng'),
                    'url'      => ['/kind-of-room/'],
                    'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
                    'active'   => is_int(strpos($this->context->route, 'kind-of-room')),
                ],
                [
                    'label'    => Yii::t('yii', 'Danh sách giá theo mẫu'),
                    'url'      => ['/sample-price-list/'],
                    'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
                    'active'   => is_int(strpos($this->context->route, 'sample-price-list')),
                ],
                [
                    'label'    => Yii::t('yii', 'Danh sách giá theo thời điểm'),
                    'url'      => ['/price-by-time/'],
                    'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
                    'active'   => is_int(strpos($this->context->route, 'price-by-time')),
                ],
            ],
        ],
        [

            'visible'  => Yii::$app->permission->isAdmin(),
            'template' => '<a href="javascript:void(0)" class="nav-link nav-toggle"><i class="fa fa-first-order"></i><span class="title">' . Yii::t('yii', 'Khách hàng') . '</span><span class="arrow"></span></a>',
            'items'    => [
                [
                    'label'    => Yii::t('yii', 'Khách hàng đang ở'),
                    'url'      => ['/customers-are-at/'],
                    'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
                    'active'   => is_int(strpos($this->context->route, 'customers-are-at')),
                ],
                [
                    'label'    => Yii::t('yii', 'Khách hàng đã đặc phòng'),
                    'url'      => ['/customer-order-room/'],
                    'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
                    'active'   => is_int(strpos($this->context->route, 'customer-order-room')),
                ],
                [
                    'label'    => Yii::t('yii', 'Khách hàng đề quên'),
                    'url'      => ['/customer-forget/'],
                    'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
                    'active'   => is_int(strpos($this->context->route, 'customer-forget')),
                ],
                [
                    'label'    => Yii::t('yii', 'Danh sách khách hàng'),
                    'url'      => ['/customer-all/'],
                    'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
                    'active'   => is_int(strpos($this->context->route, 'customer-all')),
                ],
            ],
        ],
        // [ / price-by-time

        //     'visible'  => Yii::$app->permission->isAdmin(),
        //     'template' => '<a href="javascript:void(0)" class="nav-link nav-toggle"><i class="fa fa-first-order"></i><span class="title">' . Yii::t('yii', 'Phòng tiếp tân') . '</span><span class="arrow"></span></a>',
        //     'items'    => [
        //          [
        //             'label'    => Yii::t('yii', 'Quản lý đặt phòng'),
        //             'url'      => ['/order-room/'],
        //             'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
        //             'active'   => is_int(strpos($this->context->route, 'order-room')),
        //         ],
        //     ],
        // ],
        // [

        //     'visible'  => Yii::$app->permission->isAdmin(),
        //     'template' => '<a href="javascript:void(0)" class="nav-link nav-toggle"><i class="fa fa-first-order"></i><span class="title">' . Yii::t('yii', 'Phòng quản lý') . '</span><span class="arrow"></span></a>',
        //     'items'    => [
               
                
        //         [
        //             'label'    => Yii::t('yii', 'Quản lý phòng'),
        //             'url'      => ['/room/'],
        //             'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
        //             'active'   => is_int(strpos($this->context->route, 'room')),
        //         ],
        //         [
        //             'label'    => Yii::t('yii', 'Quản lý món ăn'),
        //             'url'      => ['/menu/'],
        //             'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
        //             'active'   => is_int(strpos($this->context->route, 'menu')),
        //         ],
        //         [
        //             'label'    => Yii::t('yii', 'Quản lý giường'),
        //             'url'      => ['/number-of-beds/'],
        //             'template' => '<a href="{url}" class="nav-link"><i class="fa fa-gear"></i><span class="title"> {label}</span></a>',
        //             'active'   => is_int(strpos($this->context->route, 'number-of-beds')),
        //         ],

               
               
              
                
        //     ],
        // ],
        // [
        //     'visible'  => Yii::$app->permission->isAdmin(),
        //     'template' => '<a href="javascript:void(0)" class="nav-link nav-toggle"><i class="fa fa-gears"></i><span class="title">' . Yii::t('yii', 'System') . '</span><span class="arrow"></span></a>',
        //     'items'    => [
        //         [
        //             'label'    => Yii::t('yii', 'User'),
        //             'url'      => ['/system/user/'],
        //             'template' => '<a href="{url}" class="nav-link"><i class="icon-user"></i><span class="title"> {label}</span></a>',
        //             'active'   => is_int(strpos($this->context->route, 'system/user')),
        //         ],
        //         [
        //             'label'    => Yii::t('yii', 'Role'),
        //             'url'      => ['/system/role/'],
        //             'template' => '<a href="{url}" class="nav-link"><i class="icon-lock"></i><span class="title"> {label}</span></a>',
        //             'active'   => is_int(strpos($this->context->route, 'system/role')),
        //         ],
        //         [
        //             'label'    => Yii::t('yii', 'System log'),
        //             'url'      => ['/system/syslog/'],
        //             'template' => '<a href="{url}" class="nav-link"><i class="icon-doc"></i><span class="title"> {label}</span></a>',
        //             'active'   => is_int(strpos($this->context->route, 'system/syslog')),
        //         ],
        //     ]
        // ],
    ],
    'submenuTemplate' => "\n<ul class='sub-menu' style='display: none'>\n{items}\n</ul>\n",
    'itemOptions'     => [
        'class' => 'nav-item'
    ],
    'activateParents' => true
]);
