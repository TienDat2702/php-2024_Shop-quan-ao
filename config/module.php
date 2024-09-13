<?php

    return [
        'module' => [
            [
                'title' => 'Quản Lý Thành Viên',
                'icon' => 'nav-icon fas fa-user',
                'name' => 'user',
                'supModule' => [
                    [
                        'name' => 'catalogue',
                        'title' => 'QL Nhóm Thành Viên',
                        'route' => 'user.catalogue.index'
                    ],
                    [
                        'name' => 'index',                        
                        'title' => 'QL Thành Viên',
                        'route' => 'user.index'
                    ]
                ],
            ],
            [
                'title' => 'Quản Lý Bài Viết',
                'icon' => 'nav-icon fas fa-file',
                'name' => 'post',
                'supModule' => [
                    [
                        'name' => 'catalogue',
                        'title' => 'QL Nhóm Bài Viết',
                        'route' => 'post.catalogue.index'
                    ],
                    [
                        'name' => 'index',                        
                        'title' => 'QL Bài Viết',
                        'route' => 'post.index'
                    ]
                ],
            ]
        ]
    ];