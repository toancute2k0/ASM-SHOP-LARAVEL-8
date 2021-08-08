<?php
return [
    [
        'label' => 'Dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'fa-home'
    ],
    [
        'label' => 'QL Sản Phẩm',
        'route' => 'product.index',
        'icon' => 'fa-shopping-cart',
        'items' => [
            [
                'label' => 'Xem Sản Phẩm',
                'route' => 'product.index',
            ],
            [
                'label' => 'Tạo Sản Phẩm',
                'route' => 'product.create',
            ]
        ]
    ],
    [
        'label' => 'QL Danh Mục SP',
        'route' => 'category.index',
        'icon' => 'fa-list-alt',
        'items' => [
            [
                'label' => 'Xem Danh Mục',
                'route' => 'category.index'
            ],
            [
                'label' => 'Thêm Danh Mục',
                'route' => 'category.create'
            ]
        ]
    ],
    [
        'label' => 'QL Slide',
        'route' => 'banner.index',
        'icon' => 'fa-tv',
        'items' => [
            [
                'label' => 'Xem Slide',
                'route' => 'banner.index'
            ],
            [
                'label' => 'Thêm Slide',
                'route' => 'banner.create'
            ]
        ]
    ],
    [
        'label' => 'QL Bài Viết',
        'route' => 'blog.index',
        'icon' => 'fa-edit',
        'items' => [
            [
                'label' => 'Xem Bài Viết',
                'route' => 'blog.index'
            ],
            [
                'label' => 'Thêm Bài Viết',
                'route' => 'blog.create'
            ]
        ]
    ],
    [
        'label' => 'QL Đơn Hàng',
        'route' => 'order.index',
        'icon' => 'fa-shopping-basket',
        'items' => [
            [
                'label' => 'Xem Đơn Hàng',
                'route' => 'order.index'
            ],
            [
                'label' => 'Thêm Đơn Hàng',
                'route' => 'order.create'
            ]
        ]
    ],
    [
        'label' => 'QL Tài Khoản',
        'route' => 'user.index',
        'icon' => 'fa-user',
        'items' => [
            [
                'label' => 'Xem Tài Khoản',
                'route' => 'user.index'
            ],
            [
                'label' => 'Thêm Tài Khoản',
                'route' => 'user.create'
            ]
        ]
    ],
    [
        'label' => 'QL Thống Kê',
        'route' => 'admin.dashboard',
        'icon' => 'fa-chart-pie'
    ],

]





?>