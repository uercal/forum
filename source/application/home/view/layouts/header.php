<!DOCTYPE html>
<html lang="cn">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>企业网站模板</title>
    <link rel="stylesheet" href="assets/home/css/index.css" />
    <!-- <link rel="stylesheet" href="assets/home/css/amazeui.css" /> -->
    <link rel="stylesheet" href="assets/home/css/common.min.css" />
    <link rel="stylesheet" href="assets/home/css/forum.css" />
    <link rel="stylesheet" href="assets/home/css/forum-list.css" />
    <link rel="stylesheet" href="assets/home/css/zqh.css" />
    <link rel="stylesheet" href="assets/home/css/zqh-m.css" />
    <link rel="stylesheet" href="assets/home/css/amazeui.css" />
    <!-- 引入样式 -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css"> -->
</head>

<body>
    <header>
        <!-- <div class="Top_nav_bk">
            <div class="w_1200 header_top" style="display:flex;justify-content:space-between;">
                <a href="/" class="logo" style="height:100%;"><img style="height:100%;" src="assets/home/images/logo.png" alt=""></a>
                <div class="header_right">
                    <form action="/index.php?c=content&a=search" name="formsearch" method="get">
                        <input name="c" type="hidden" value="content" />
                        <input name="a" type="hidden" value="search" />
                        <input name="kw" placeholder="请输入查找内容" type="text" />
                        <input name="submit" type="submit" value="" />
                    </form>
                </div>
            </div>
            <div class="member">
                <a href="">个人中心</a>
                <a href="">注册</a>
                <a href="">登陆</a>
            </div>
        </div> -->
        <nav class="header-nav">
            <div class="header-logo">
                <img src="assets/home/images/logo.png" alt="">
            </div>
            <ul class="header-ul" style="text-align:center;">
                <li><a href="/" class="<?= !isset($model) ? 'current' : '' ?>">首页</a></li>
                <?php foreach ($menus as $item) : ?>
                    <li>
                        <a href="javascript:void(0); " class="<?= (isset($model) && $model['parent']['category_id'] == $item['category_id']) ? 'current' : '' ?>" onclick="category(<?= $item['is_show'] == 0 ? '0' : $item['category_id'] ?>)"><?= $item['name'] ?></a>
                        <?php if (!empty($item['child'])) : ?>
                            <ol>
                                <?php foreach ($item['child'] as $child) : ?>
                                    <li>
                                        <a href="javascript:void(0); " onclick="category(<?= $child['is_show'] == 0 ? '0' : $child['category_id'] ?>)"><?= $child['name'] ?></a>
                                        <?php if (!empty($child['child'])) : ?>
                                            <ol>
                                                <?php foreach ($child['child'] as $two) : ?>
                                                    <li><a href="javascript:void(0);" onclick="category(<?= $two['is_show'] == 0 ? '0' : $two['category_id'] ?>)"><?= $two['name'] ?></a></li>
                                                <?php endforeach; ?>
                                            </ol>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="member-info">
                <div class="info-item info-reg">
                    <img src="assets/home/images/info-reg.png" alt="">
                    <p>注册</p>
                </div>
                <div class="info-item info-login">
                    <img src="assets/home/images/info-login.png" alt="">
                    <p>登陆</p>
                </div>
            </div>
        </nav>
    </header>
    <!--  -->
    <section class="slider" style="display:<?= isset($model) ? 'none;' : 'block;' ?>">
        <div class="am-slider am-slider-default" data-am-flexslider="{animation: 'slider',slideshowSpeed: 2000,controlNav: false,directionNav: false}" id="demo-slider-0">
            <ul class="am-slides">
                <?php foreach ($index_data['banner']['data'] as $banner) : ?>
                    <li><img src="<?= $banner['imgUrl'] ?>" /></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="slider-cover"></div>
    </section>