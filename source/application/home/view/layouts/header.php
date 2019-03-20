<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>企业网站模板</title>
    <link rel="stylesheet" href="assets/home/css/amazeui.css" />
    <link rel="stylesheet" href="assets/home/css/common.min.css" />
    <link rel="stylesheet" href="assets/home/css/index.min.css" />
    <link rel="stylesheet" href="assets/home/css/zqh.css" />
    <link rel="stylesheet" href="assets/home/css/zqh-m.css?v=<?= time() ?>" />
    <link rel="icon" href="assets/home/images/icon.ico" type="image/x-icon" />
</head>

<body>
    <div class="layout">
        <!--===========layout-header================-->
        <div class="layout-header am-hide-sm-only">
            <div class="header-box" data-am-sticky>
                <!--nav start-->
                <div class="nav-contain" style="display: flex;">
                    <div class="nav-logo">
                        <img src="assets/home/images/logo.png" alt="">
                    </div>
                    <div class="nav-inner">
                        <ul class="am-nav am-nav-pills am-nav-justify">
                            <li class="menu-item-p"><a href="<?= url('/index') ?>">首页</a></li>
                            <?php foreach ($menus as $item) : ?>
                            <li class="menu-item-p">
                                <a class="<?= $item['is_child'] == 1 ? 'pchild' : '' ?>" href="<?= $item['is_child'] == 1 ? '#' : url('/article', ['id' => $item['id']]) ?>">
                                    <?= $item['name'] ?></a>
                                <!-- sub-menu start-->
                                <?php if (!empty($item['child'])) : ?>
                                <ul class="sub-menu">
                                    <?php foreach ($item['child'] as $child) : ?>
                                    <li class="menu-item"><a href="<?= url('/article', ['id' => $child['id']]) ?>">
                                            <?= $child['name'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                                <!-- sub-menu end-->
                            </li>
                            <?php endforeach; ?>
                            <!-- <li class="menu-item-p"><a href="en.php">EN</a></li> -->
                        </ul>

                        <!--  -->

                    </div>
                </div>
                <!--nav end-->
            </div>
        </div>

        <!--mobile header start-->
        <div class="m-header">
            <div class="am-g am-show-sm-only">
                <div class="am-u-sm-2" style="float:right;">
                    <div class="menu-bars">
                        <a href="#doc-oc-demo1" data-am-offcanvas="{effect: 'push'}"><i class="am-menu-toggle-icon am-icon-bars"></i></a>
                        <!-- 侧边栏内容 -->
                        <nav data-am-widget="menu" class="am-menu am-menu-offcanvas1" data-am-menu-offcanvas>
                            <a href="javascript: void(0)" class="am-menu-toggle" id="test"></a>
                            <div class="am-offcanvas" id="menu-offcanvas">
                                <div class="am-offcanvas-bar">
                                    <ul class="am-menu-nav am-avg-sm-1">
                                        <li>
                                            <div class="m-header-nav">导航</div>
                                            <div class="m-header-quit-div" onclick="headerQuit();">
                                                <div class="m-header-quit"></div>
                                            </div>
                                        </li>
                                        <li><a href="<?= url('/index') ?>" class="">首页</a></li>

                                        <?php foreach ($menus as $item) : ?>
                                        <li class="<?= !empty($item['child']) ? 'am-parent' : '' ?>">
                                            <a href="<?= $item['is_child'] == 1 ? '#' : url('/article', ['id' => $item['id']]) ?>">
                                                <?= $item['name'] ?></a>
                                            <?php if (!empty($item['child'])) : ?>
                                            <ul class="am-menu-sub am-collapse ">
                                                <?php foreach ($item['child'] as $child) : ?>
                                                <li class=""><a href="<?= url('/article', ['id' => $child['id']]) ?>">
                                                        <?= $child['name'] ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                            <!-- sub-menu end-->
                                        </li>
                                        <?php endforeach; ?>

                                        <!-- <li class=""><a href="html/about.html" class="">关于我们</a></li>
                                        <li class=""><a href="html/join.html" class="">加入我们</a></li> -->
                                        <!-- <li class=""><a href="#" class="">联系我们</a></li>
                                        <li class="am-parent">
                                            <a href="" class="nav-icon nav-icon-globe">Language</a>
                                            <ul class="am-menu-sub am-collapse  ">
                                                <li>
                                                    <a href="#">English</a>
                                                </li>
                                                <li class="">
                                                    <a href="#">Chinese</a>
                                                </li>
                                            </ul>
                                        </li> -->
                                    </ul>

                                </div>
                            </div>
                        </nav>

                    </div>
                </div>
                <div class="am-u-sm-8 am-u-end" style="float:right;">
                    <div class="m-logo">
                        <a href=""><img src="assets/home/images/logo_m.png" alt=""></a>
                    </div>
                </div>
            </div>
            <!--mobile header end-->
        </div>

        <!--===========layout-container================-->
        <div class="layout-container">
            <div class="index-page">
                <div data-am-widget="tabs" class="am-tabs am-tabs-default banner">
                    <div class="am-tabs-bd">
                        <div data-tab-panel-0 class="am-tab-panel am-active">
                            <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{directionNav:false,slideshowSpeed: 2000}'>
                                <ul class="am-slides">
                                    <?php if (isset($detail) && !empty($detail['banner'])) : ?>
                                    <li>
                                        <img src="<?= $detail['banner']['src'] ?>">
                                    </li>
                                    <?php else : ?>
                                    <?php foreach ($background as $item) : ?>
                                    <li>
                                        <img src="<?= $item['imgUrl'] ?>">
                                    </li>
                                    <?php endforeach;
                            endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> 