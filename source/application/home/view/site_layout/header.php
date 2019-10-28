<!DOCTYPE html>
<html lang="cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, initial-scale=0.1 user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title><?=$company['company_name']?></title>
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
            <div class="header-logo" style="width:400px;height:100px;flex-direction:row;justify-content:space-around;align-items:center;">
                <img src="<?=$company['company_logo_path']?>" alt="" style="height:80px;width:80px;object-fit:contain;padding:0;">
                <p style="margin:0;font-size:20px;font-weight:600;margin-left:16px;"><?=$company['company_name']?></p>
            </div>
            <ul class="header-ul" style="margin-right:20px;white-space:nowrap;text-align:center;">
                <li><a href="<?=url('index')?>" class="<?=$action == 'index' ? 'current' : ''?>">首页</a></li>
                <li>
                    <a href="javascript:void(0); " class="<?=$action == 'companyinfo' ? 'current' : ''?>" onclick="window.location.href='<?=url('companyInfo')?>'">关于我们</a>
                </li>
                <li>
                    <a href="javascript:void(0); " class="<?=$action == 'listnews' ? 'current' : ''?>" onclick="window.location.href='<?=url('listNews')?>'">新闻要讯</a>
                </li>
                <li>
                    <a href="javascript:void(0); " class="<?=$action == 'listnormal' ? 'current' : ''?>" onclick="window.location.href='<?=url('listNormal')?>'">学术天地</a>
                </li>
                <li>
                    <a href="javascript:void(0); " class="<?=$action == 'listproject' ? 'current' : ''?>" onclick="window.location.href='<?=url('listProject')?>'">实践范例</a>
                </li>
                <li>
                    <a href="javascript:void(0); " class="<?=$action == 'listrecruit' ? 'current' : ''?>" onclick="window.location.href='<?=url('listRecruit')?>'">诚聘英才</a>
                </li>
            </ul>
            <!-- <div style="width:0px;"></div> -->

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