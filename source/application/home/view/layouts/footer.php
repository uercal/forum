</div>
<!--===========layout-footer================-->
<div class="layout-footer">
    <div class="footer">
        <?php if (!$is_moblie) : ?>
        <div class="footer--inner">
            <div class="container foot-container">
                <div class="footer_main">

                    <div class="am-g">
                        <div class="am-g-nav">
                            <!--  -->
                            <?php foreach ($menus as $k => $item) : ?>
                            <div style="width:15%;">
                                <div class="footer_main--column">
                                    <strong class="footer_main--column_title" <?php if ($item['is_show'] == 0) : ?> onclick="article(<?= $item['category_id'] ?>)" <?php endif; ?>>
                                        <?= $item['name'] ?></strong>
                                    <ul class="footer_navigation">
                                        <?php if (!empty($item['child'])) : foreach ($item['child'] as $child) : ?>
                                        <li class="footer_navigation--item"><a href="#" class="footer_navigation--link" onclick="article(<?= $child['category_id'] ?>)">
                                                <?= $child['name'] ?></a></li>
                                        <?php endforeach;
                                endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="footer-friend">
                            <div class="friend-div">
                                <strong class="friend-title">友情链接</strong>
                                <div class="friend-info">
                                    <?php foreach ($index_data['company']['data'] as $f) : ?>
                                    <a href="<?= $f['jumpUrl'] ?>"><?= $f['name'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="f-contact">
                        <strong class="f-contact-title">联系我们</strong>

                        <div class="concat-info">
                            <?php foreach ($index_data['concat']['data'] as $concat) : ?>
                            <p><?= $concat['title'] ?>：<?= $concat['value'] ?></p>
                            <?php endforeach; ?>
                        </div>

                        <div class="f-logo">
                            <img src="assets/home/images/logo.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- 回到top -->
        <div class="goTop" onclick="goTop()">
            <p>回到顶部</p>
        </div>



        <?php else : ?>
        <div class="footer--inner">
            <div class="container foot-container">
                <div class="footer_main">
                    <div class="am-g">
                        <!--  -->
                        <nav data-am-widget="menu" class="am-menu  am-menu-stack am-avg-sm-1">
                            <a href="javascript: void(0)" class="am-menu-toggle">
                                <i class="am-menu-toggle-icon am-icon-bars"></i>
                            </a>
                            <ul class="am-menu-nav am-avg-sm-1">
                                <?php foreach ($menus as $k => $item) : ?>
                                <li class="am-parent">
                                    <a href="##" class="" onclick="article(<?= $item['is_show'] == 1 ? '0' : $item['category_id'] ?>)"><?= $item['name'] ?></a>
                                    <?php if ($item['is_show'] == 1) : ?>
                                    <ul class="am-menu-sub am-collapse  am-avg-sm-1 ">
                                        <?php if (!empty($item['child'])) : foreach ($item['child'] as $child) : ?>
                                        <li class="">
                                            <a href="##" class="" style="color:#fff;" onclick="article(<?= $child['category_id'] ?>)"><?= $child['name'] ?></a>
                                        </li>
                                        <?php endforeach;
                                endif; ?>
                                        <!-- <li class=" am-menu-nav-channel"><a href="##" class="" title="公司">进入栏目 &raquo;</a></li> -->
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                                <li class="am-parent">
                                    <a href="##" class="">联盟公司链接</a>
                                    <ul class="am-menu-sub am-collapse  am-avg-sm-1 ">
                                        <?php foreach ($foot_company as $company) : ?>
                                        <li class="">
                                            <a href="<?= empty($company['jumpUrl']) ? '##' : $company['jumpUrl'] ?>" style="color:#fff;">
                                                <?= $company['name'] ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                        <!-- <li class="am-menu-nav-channel"><a href="##" class="" title="公司">进入栏目 &raquo;</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="footer-foot">Copyright © 2013-2019 备案号：闽ICP备15012807号-1</div>
</div>
<script src="assets/home/js/jquery-1.8.2.min.js"></script>
<script src="assets/home/js/banner_move.js"></script>
<script src="assets/home/js/jq_scroll.js"></script>
<script src="assets/home/js/amazeui.js"></script>

</body>
<script>
    function article(id) {
        if (id == 0) return false;
        var url = "<?= url('/article') ?>/id/" + id;
        window.location.href = url;
    }

    function home() {
        var url = "<?= url('/index') ?>";
        window.location.href = url;
    }

    function news(id) {
        var url = "<?= url('/news') ?>/id/" + id;
        window.location.href = url;
    }

    function project(id) {
        var url = "<?= url('/project') ?>/id/" + id;
        window.location.href = url;
    }

    function headerQuit() {
        var $nav = $('#menu-offcanvas');
        $nav.offCanvas('close');
    }


    function goTop() {
        $('html,body').animate({
            scrollTop: 0
        }, 500);
    }






    // 




    // footer
</script>

</html> 