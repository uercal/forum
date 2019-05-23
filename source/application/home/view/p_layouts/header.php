<!DOCTYPE html>
<html lang="cn">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>个人中心</title>
    <link rel="stylesheet" href="assets/home/css/index.css" />
    <link rel="stylesheet" href="assets/home/css/common.min.css" />
    <link rel="stylesheet" href="assets/home/css/forum.css" />
    <link rel="stylesheet" href="assets/home/css/forum-list.css" />
    <link rel="stylesheet" href="assets/home/css/forum-detail.css" />
    <link rel="stylesheet" href="assets/home/css/forum-person.css" />
    <link rel="stylesheet" href="assets/home/css/amazeui.css" />
    <!-- 引入样式 -->
    <link rel="stylesheet" href="assets/home/css/bootstrap.css">
    <link rel="stylesheet" href="assets/head/cropper.min.css">
    <link rel="stylesheet" href="assets/head/main.css">
    <!--  -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui@2.8.2/lib/theme-chalk/index.css">
    <script>
        BASE_URL = '<?= isset($base_url) ? $base_url : '
        ' ?>';
        STORE_URL = '<?= isset($store_url) ? $store_url : '' ?>';
    </script>
    <!--  -->
    <script src="assets/store/js/jquery.min.js"></script>
</head>

<body>
    <header>
        <nav class="header-nav">
            <div class="header-logo">
                <img src="assets/home/images/logo.png" alt="">
            </div>
            <ul class="header-ul" style="margin-right:20px;white-space:nowrap;text-align:center;">
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
                <?php if (!$login_user) : ?>
                    <div class="info-item info-reg" id="u_register">
                        <img src="assets/home/images/info-reg.png" alt="">
                        <p>注册</p>
                    </div>
                    <div class="info-item info-login" id="u_login">
                        <img src="assets/home/images/info-login.png" alt="">
                        <p>登陆</p>
                    </div>
                <?php else : ?>
                    <div class="user-header">
                        <div class="u-header">
                            <img src="<?= $login_user['avatar'] ? $login_user['avatar'] : 'assets/home/images/about/003.jpg' ?>" alt="">
                            <div>
                                <p>用户名：<?= $login_user['user_name'] ?></p>

                                <p>角色：<?= $login_user['role_name'] ?></p>
                            </div>
                        </div>
                        <div class="u-action">
                            <p onclick="quit()">退出登录</p>
                            <div onclick="window.location.href='<?= url('/person/personCenter') ?>';">
                                <p>进入个人中心</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
        <div class="common-nav">
            <div class="nav-info">
                <a href="/"><span class="am-icon-home"></span></a>
                <p class="arrow"></p>
                <p class="arrow">个人中心</p>
                <p class="current"><?= $login_user['role_name'] ?></p>
            </div>
        </div>


        <!--  -->
        <?php if (isset($msg)) : ?>
            <?php if ($msg['type'] == 'reject') : ?>
                <div class="el-alert el-alert--warning is-center is-light exam-message">
                    <!---->
                    <div class="el-alert__content" style="text-align: center;"><span class="el-alert__title is-bold">你的升级审批请求被驳回</span>
                        <!---->
                        <p class="el-alert__description"><?= $msg['data']['bonus'] ?></p><i class="el-alert__closebtn el-icon-close"></i>
                    </div>
                </div>
            <?php elseif ($msg['type'] == 'success') : ?>
                <div class="el-alert el-alert--success is-center is-light exam-message"><i class="el-alert__icon el-icon-info"></i>
                    <div class="el-alert__content"><span class="el-alert__title">你的升级审批已通过！</span><i class="el-alert__closebtn el-icon-close"></i></div>
                </div>
            <?php endif;
    endif; ?>






        <div class="person-body">
            <div class="person-left">
                <div class="person-user-info">
                    <div class="userinfo">
                        <div class="userinfo-img" style="cursor:pointer;">
                            <img id="person" src="<?= $login_user['avatar'] ? $login_user['avatar'] : 'assets/home/images/about/003.jpg' ?>" alt="">
                        </div>
                    </div>

                    <p style="font-size:20px;font-weight:600;margin-top:8px;"><?= $login_user['show_name'] ?></p>
                    <p style="color:#666666;font-size:12px;padding-bottom:16px;"><?= $login_user['role_name'] ?></p>
                    <p style="padding-bottom:12px;color:#7FBAFF;">成为单位/专家等，专享更多特权</p>

                    <div class="update-user" onclick="window.location.href='<?= url('updateGrade') ?>';">
                        <p>升级会员</p>
                    </div>
                    <div class="last-login">
                        <p style="font-size:12px;color:#8c8c8c;">最近一次登陆时间：<?= $login_user['last_login'] ?></p>
                        <p style="font-size:14px;color:#9b9b9b;cursor:pointer;" onclick="quit()">退出</p>
                    </div>
                </div>


                <div class="person-user-actions">
                    <div class="<?= request()->action() == 'personcenter' ? 'active' : '' ?>" onclick="window.location.href='<?= url('personCenter') ?>';">
                        <p>
                            活动报名<?= request()->action() == 'personcenter' ?
                                    '<i style="position:absolute;right:-30px;" class="am-icon-angle-right"></i>' : '' ?>
                        </p>
                    </div>
                    <?php if (in_array(1, explode(',', $login_user['role']))) : ?>
                        <!-- 个人会员 -->
                        <div class="<?= request()->action() == 'personpaper' ? 'active' : '' ?>" onclick="window.location.href='<?= url('personPaper') ?>';">
                            <p>
                                论文管理<?= request()->action() == 'personpaper' ?
                                        '<i style="position:absolute;right:-30px;" class="am-icon-angle-right"></i>' : '' ?>
                            </p>
                        </div>
                    <?php elseif (in_array(3, explode(',', $login_user['role']))) : ?>
                        <!-- 单位会员 -->
                        <div class="<?= request()->action() == 'personsupport' ? 'active' : '' ?>" onclick="window.location.href='<?= url('personSupport') ?>';">
                            <p>
                                活动赞助<?= request()->action() == 'personsupport' ?
                                        '<i style="position:absolute;right:-30px;" class="am-icon-angle-right"></i>' : '' ?>
                            </p>
                        </div>
                        <div class="<?= request()->action() == 'personpaper' ? 'active' : '' ?>" onclick="window.location.href='<?= url('personPaper') ?>';">
                            <p>
                                论文管理<?= request()->action() == 'personpaper' ?
                                        '<i style="position:absolute;right:-30px;" class="am-icon-angle-right"></i>' : '' ?>
                            </p>
                        </div>
                        <div class="<?= request()->action() == 'personproject' ? 'active' : '' ?>" onclick="window.location.href='<?= url('personProject') ?>';">
                            <p>
                                项目管理<?= request()->action() == 'personproject' ?
                                        '<i style="position:absolute;right:-30px;" class="am-icon-angle-right"></i>' : '' ?>
                            </p>
                        </div>
                        <div class="<?= request()->action() == 'personrecruit' ? 'active' : '' ?>" onclick="window.location.href='<?= url('personRecruit') ?>';">
                            <p>
                                招聘发布<?= request()->action() == 'personrecruit' ?
                                        '<i style="position:absolute;right:-30px;" class="am-icon-angle-right"></i>' : '' ?>
                            </p>
                        </div>
                        <div class="<?= request()->action() == 'personsite' ? 'active' : '' ?>" onclick="window.location.href='<?= url('personSite') ?>';">
                            <p>
                                子站管理<?= request()->action() == 'personsite' ?
                                        '<i style="position:absolute;right:-30px;" class="am-icon-angle-right"></i>' : '' ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <div class="<?= request()->action() == 'personconfig' ? 'active' : '' ?>" onclick="window.location.href='<?= url('personConfig') ?>';">
                        <p>
                            账户设置<?= request()->action() == 'personconfig' ?
                                    '<i style="position:absolute;right:-30px;" class="am-icon-angle-right"></i>' : '' ?>
                        </p>
                    </div>
                </div>

                <!-- <div class="person-helpCenter">
                    <div class="p-help-head">
                        <div>
                            <p>帮助中心</p>
                        </div>
                        <p>查看更多 <i class="am-icon-angle-double-right"></i> </p>
                    </div>
                    <div class="p-help-body">
                        <li>
                            <a href="">什么是单位会员什么是单位会员什么是单位什么是单位会员什么是单位会员什么是单位</a>
                        </li>
                        <li>
                            <a href="">什么是单位会员什么是单位会员什么是单位什么是单位会员什么是单位会员什么是单位</a>
                        </li>
                        <li>
                            <a href="">什么是单位会员什么是单位会员什么是单位什么是单位会员什么是单位会员什么是单位</a>
                        </li>
                        <li>
                            <a href="">什么是单位会员什么是单位会员什么是单位什么是单位会员什么是单位会员什么是单位</a>
                        </li>

                    </div>
                </div> -->
            </div>

            <!--  -->
            <div class="person-right">