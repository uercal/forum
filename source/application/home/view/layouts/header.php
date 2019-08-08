<!DOCTYPE html>
<html lang="cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, initial-scale=0.1 user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>海南省全过程工程咨询研究会</title>
    <link rel="shortcut icon" href="assets/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" href="assets/home/css/index.css" />
    <link rel="stylesheet" href="assets/home/css/amazeui.css" />
    <link rel="stylesheet" href="assets/home/css/common.min.css" />
    <link rel="stylesheet" href="assets/home/css/forum.css" />
    <link rel="stylesheet" href="assets/home/css/forum-list.css" />
    <link rel="stylesheet" href="assets/home/css/forum-detail.css" />
    <link rel="stylesheet" href="assets/home/css/zqh.css" />
    <link rel="stylesheet" href="assets/home/css/zqh-m.css" />
    <link rel="stylesheet" href="assets/home/css/amazeui.css" />
    <!-- 引入样式 -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css"> -->
</head>
<style>
.layui-layer-iframe{
    top: 150px !important;
}

</style>

<body>
    <header>
        <nav class="header-nav">
            <div class="header-logo">                
                <ul class="logo-ul">
                    <li id="logo1" style="left:320px;opacity:0;"><img src="assets/home/images/logo1.jpg" alt=""></li>
                    <li id="logo2" style="top:38px;opacity:0;"><img src="assets/home/images/logo.jpg" alt=""></li>
                </ul>
            </div>

            <ul class="header-ul" style="white-space:nowrap;text-align:center;">
                <li><a href="/" class="<?=!isset($model) ? 'current' : ''?>">首页</a></li>
                <?php foreach ($menus as $item): ?>
                    <li>
                        <a href="javascript:void(0); " class="<?=(isset($model) && $model['parent']['category_id'] == $item['category_id']) ? 'current' : ''?>" onclick="category(<?=$item['is_show'] == 0 ? '0' : $item['category_id']?>)"><?=$item['name']?></a>
                        <?php if (!empty($item['child'])): ?>
                            <ol>
                                <?php foreach ($item['child'] as $child): ?>
                                    <li>
                                        <a href="javascript:void(0); " onclick="category(<?=$child['is_show'] == 0 ? '0' : $child['category_id']?>)"><?=$child['name']?></a>
                                        <?php if (!empty($child['child'])): ?>
                                            <ol>
                                                <?php foreach ($child['child'] as $two): ?>
                                                    <li><a href="javascript:void(0);" onclick="category(<?=$two['is_show'] == 0 ? '0' : $two['category_id']?>)"><?=$two['name']?></a></li>
                                                <?php endforeach;?>
                                            </ol>
                                        <?php endif;?>
                                    </li>
                                <?php endforeach;?>
                            </ol>
                        <?php endif;?>
                    </li>
                <?php endforeach;?>
            </ul>
            <div class="member-info">
                <?php if (!$login_user): ?>
                    <div class="info-item info-reg" id="u_register">
                        <img src="assets/home/images/info-reg.png" alt="">
                        <p>注册</p>
                    </div>
                    <div class="info-item info-login" id="u_login">
                        <img src="assets/home/images/info-login.png" alt="">
                        <p>登陆</p>
                    </div>
                <?php else: ?>
                    <div class="user-header">
                        <div class="u-header">
                            <img src="<?=$login_user['avatar'] ? $login_user['avatar'] : 'assets/home/images/about/003.jpg'?>" alt="">
                            <div>
                                <p>用户名：<?=$login_user['user_name']?></p>

                                <p>角色：<?=$login_user['role_name']?></p>
                            </div>
                        </div>
                        <div class="u-action">
                            <p onclick="quit()">退出登录</p>
                            <div onclick="window.location.href='<?=url('/person/personCenter')?>';">
                                <p>进入个人中心</p>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </nav>
    </header>
    <!--  -->
    <section class="slider" style="display:<?=isset($model) ? 'none;' : 'block;'?>">
        <div class="am-slider am-slider-default" data-am-flexslider="{animation: 'slider',slideshowSpeed: 2000,controlNav: true,directionNav: false}" id="demo-slider-0">
            <ul class="am-slides">
                <?php foreach ($index_data['banner']['data'] as $banner): ?>
                    <li><img src="<?=$banner['imgUrl']?>" /></li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="slider-cover"></div>
    </section>