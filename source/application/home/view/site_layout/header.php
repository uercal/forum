<!DOCTYPE html>
<html lang="cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>工程协会子站-<?= $company['company_name'] ?></title>
    <link rel="shortcut icon" href="assets/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" href="assets/home/css/index.css" />
    <link rel="stylesheet" href="assets/home/css/common.min.css" />
    <link rel="stylesheet" href="assets/home/css/forum.css" />
    <link rel="stylesheet" href="assets/home/css/forum-list.css" />
    <link rel="stylesheet" href="assets/home/css/forum-detail.css" />
    <link rel="stylesheet" href="assets/home/css/zqh.css" />
    <link rel="stylesheet" href="assets/home/css/zqh-m.css" />
    <link rel="stylesheet" href="assets/home/css/amazeui.css" />
</head>

<body>
    <header>
        <nav class="header-nav">
            <div class="header-logo" style="width:300px;">
                <img src="<?= $company['company_logo_path'] ?>" alt="" style="height:90%;object-fit:contain;padding:0;">
            </div>
            <ul class="header-ul" style="margin-right:20px;white-space:nowrap;text-align:center;">
                <li><a href="<?= url('index') ?>" class="<?= $action == 'index' ? 'current' : '' ?>">首页</a></li>
                <li>
                    <a href="javascript:void(0); " class="<?= $action == 'companyinfo' ? 'current' : '' ?>" onclick="window.location.href='<?= url('companyInfo') ?>'">关于我们</a>
                </li>
                <li>
                    <a href="javascript:void(0); " class="<?= $action == 'listnews' ? 'current' : '' ?>" onclick="window.location.href='<?= url('listNews') ?>'">新闻要讯</a>
                </li>
                <li>
                    <a href="javascript:void(0); " class="<?= $action == 'listproject' ? 'current' : '' ?>" onclick="window.location.href='<?= url('listProject') ?>'">主要业绩</a>
                </li>
                <li>
                    <a href="javascript:void(0); " class="<?= $action == 'listnormal' ? 'current' : '' ?>" onclick="window.location.href='<?= url('listNormal') ?>'">学术实践</a>
                </li>
                <li>
                    <a href="javascript:void(0); " class="<?= $action == 'listrecruit' ? 'current' : '' ?>" onclick="window.location.href='<?= url('listRecruit') ?>'">招聘英才</a>
                </li>
            </ul>
            <div style="width:300px;"></div>

        </nav>
    </header>
    <!--  -->
    <section class="slider">
        <div class="am-slider am-slider-default" data-am-flexslider="{animation: 'slider',slideshowSpeed: 2000,controlNav: false,directionNav: false}" id="demo-slider-0">
            <ul class="am-slides">
                <li><img src="assets/home/images/banner.jpg" /></li>
                <li><img src="assets/home/images/banner.jpg" /></li>
                <li><img src="assets/home/images/banner.jpg" /></li>
            </ul>
        </div>
        <div class="slider-cover"></div>
    </section>