<?php
/**
 * 后台菜单配置
 *    'home' => [
 *       'name' => '首页',                // 菜单名称
 *       'icon' => 'icon-home',          // 图标 (class)
 *       'index' => 'index/index',         // 链接
 *     ],
 */
return [
    'index' => [
        'name' => '首页',
        'icon' => 'icon-home',
        'index' => 'index/index',
    ],
    'article' => [
        'name' => '页面管理',
        'icon' => 'icon-order',
        'index' => 'article/category',
        // 'submenu' => [
        //     [
        //         'name' => '分类管理',
        //         'index' => 'article/category',
        //     ]            
        // ]
    ],
    // 'data' => [
    //     'name' => '数据管理',
    //     'icon' => 'icon-order',
    //     'index' => 'data/index',
    // ],
    'list_data' => [
        'name' => '资讯管理',
        'icon' => 'icon-order',
        'index' => 'list_data/index&mode=news',
        'submenu' => [
            [
                'name' => '新闻列表',
                'icon' => 'icon-order',
                'index' => 'list_data/index&mode=news',
            ],
            [
                'name' => '资讯列表',
                'icon' => 'icon-order',
                'index' => 'list_data/index&mode=mag',
            ],
            [
                'name' => '职务列表',
                'icon' => 'icon-order',
                'index' => 'list_data/index&mode=job',
            ],
            [
                'name' => '会员文章列表',
                'icon' => 'icon-order',
                'index' => 'list_data/index&mode=user_news',
            ],
            [
                'name' => '会员项目列表',
                'icon' => 'icon-order',
                'index' => 'list_data/user_project',
            ],
        ]
    ],
    'activity' => [
        'name' => '活动管理',
        'icon' => 'icon-order',
        'index' => 'activity/index',
    ],
    'recruit' => [
        'name' => '招聘管理',
        'icon' => 'icon-order',
        'index' => 'recruit/index',
    ],
    'user' => [
        'name' => '注册用户',
        'icon' => 'icon-user',
        'index' => 'user/index',
        'submenu' => [
            [
                'name' => '用户列表',
                'icon' => 'icon-user',
                'index' => 'user/index'
            ],
            [
                'name' => '普通用户',
                'icon' => 'icon-user',
                'index' => 'user/role&role=0'
            ],
            [
                'name' => '个人会员',
                'icon' => 'icon-user',
                'index' => 'user/role&role=1'
            ],
            [
                'name' => '入库专家',
                'icon' => 'icon-user',
                'index' => 'user/role&role=2'
            ],
            [
                'name' => '单位会员',
                'icon' => 'icon-user',
                'index' => 'user/role&role=3'
            ],
            [
                'name' => '入库供应商',
                'icon' => 'icon-user',
                'index' => 'user/role&role=4'
            ],

        ]
    ],

    'wxapp' => [
        'name' => '首页',
        'icon' => 'icon-wxapp',
        'color' => '#36b313',
        'index' => 'wxapp.page/home',
        'submenu' => [
            [
                'name' => '页面管理',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '首页设计',
                        'index' => 'wxapp.page/home'
                    ],
                ]
            ],
        ],
    ],
    'exam' => [
        'name' => '入库管理',
        'icon' => 'icon-order',
        'index' => 'exam/index',
        // 'submenu' => [
        //     [
        //         'name' => '审核列表',
        //         'index' => 'exam/index',
        //     ],
        // ]
    ],
    'member' => [
        'name' => '员工管理',
        'icon' => 'icon-user',
        'index' => 'member/index',
        'submenu' => [
            [
                'name' => '员工列表',
                'icon' => 'icon-user',
                'index' => 'member/index'
            ],
            [
                'name' => '角色管理',
                'icon' => 'icon-user',
                'index' => 'member/role'
            ],
            [
                'name' => '权限列表',
                'icon' => 'icon-user',
                'index' => 'member/privilege'
            ]

        ]

    ],
    'setting' => [
        'name' => '设置',
        'icon' => 'icon-setting',
        'index' => 'setting.cache/clear',
        'submenu' => [
            [
                'name' => '其他',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '清理缓存',
                        'index' => 'setting.cache/clear'
                    ],
                    [
                        'name' => '环境检测',
                        'index' => 'setting.science/index'
                    ],
                ]
            ]
        ],
    ],
];
