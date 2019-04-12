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
                                            <strong class="footer_main--column_title" <?php if ($item['is_show'] == 1) : ?> onclick="category(<?= $item['category_id'] ?>)" <?php endif; ?>>
                                                <?= $item['name'] ?></strong>
                                            <ul class="footer_navigation">
                                                <?php if (!empty($item['child'])) : foreach ($item['child'] as $child) : ?>
                                                        <li class="footer_navigation--item"><a href="#" class="footer_navigation--link" onclick="category(<?= $child['category_id'] ?>)">
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
                                            <a href="##" class="" onclick="category(<?= $item['is_show'] == 0 ? '0' : $item['category_id'] ?>)"><?= $item['name'] ?></a>
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
    function category(id) {
        console.log(id);
        if (id == 0) return false;
        var url = "<?= url('/category') ?>/category_id/" + id;
        window.location.href = url;
    }

    <?php if (isset($model)) : ?>

        $('#search').on('click', function() {
            var html = "<?= url('/category', [
                            'category_id' => $model['category_id']
                        ]) . (input('sort') ? '&sort=' . input('sort') : '') ?>";
            var title = $('input[name="title"]').val();
            if (!title) return false;
            html += '&title=' + title;
            window.location.href = html;
        })

        function list_sort(sort) {
            sort = sort == 'asc' ? 'desc' : 'asc';
            var html = "<?= url('/category', [
                            'category_id' => $model['category_id']
                        ]) . (input('title') ? '&title=' . input('title') : '') ?>";

            html += '&sort=' + sort;
            window.location.href = html;
        }

        function mag_detail(url) {
            if ((url.indexOf("http://") == -1) && (url.indexOf("https://") == -1)) {
                url = "http://" + url;
            }
            window.location.href = url;
        }

    <?php endif; ?>



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



    $(document).ready(function() {
        //首先将#back-to-top隐藏
        $(".goTop").hide();
        //当滚动条的位置处于距顶部600像素以下时，跳转链接出现，否则消失
        $(function() {
            $(window).scroll(function() {
                if ($(window).scrollTop() > 600) {
                    $(".goTop").fadeIn(500);
                } else {
                    $(".goTop").fadeOut(500);
                }
            });            
        });
    });


    // 




    // footer
</script>

</html>