</div>
<!--===========layout-footer================-->
<div class="layout-footer">
    <div class="footer">
        <div style="background-color:#AB1312;" class="footer--bg"></div>
        <?php if (!$is_moblie) : ?>
        <div class="footer--inner">
            <div class="container foot-container">
                <div class="footer_main">
                    <div class="am-g">
                        <!--  -->
                        <?php foreach ($menus as $k => $item) : ?>
                        <div class="am-u-md-3">
                            <div class="footer_main--column">
                                <strong class="footer_main--column_title" <?php if ($item['is_child'] == 0) : ?> onclick="article(<?= $item['id'] ?>)" <?php endif; ?>>
                                    <?= $item['name'] ?></strong>
                                <ul class="footer_navigation">
                                    <?php if (!empty($item['child'])) : foreach ($item['child'] as $child) : ?>
                                    <li class="footer_navigation--item"><a href="#" class="footer_navigation--link" onclick="article(<?= $child['id'] ?>)">
                                            <?= $child['name'] ?></a></li>
                                    <?php endforeach;
                            endif; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!--  -->
                        <div class="am-u-md-6 foot-company">
                            <div class="footer_main--column">
                                <strong class="footer_main--column_title">子公司链接</strong>
                                <ul class="footer_contact_info">
                                    <?php foreach ($foot_company as $company) : ?>
                                    <li class="footer_contact_info--item">
                                        <a href="<?= $company['jumpUrl'] ?>" style="color:#fff;">
                                            <?= $company['name'] ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <a href="##" class="" onclick="article(<?= $item['is_child'] == 1 ? '0' : $item['id'] ?>)"><?= $item['name'] ?></a>
                                    <?php if ($item['is_child'] == 1) : ?>
                                    <ul class="am-menu-sub am-collapse  am-avg-sm-1 ">
                                        <?php if (!empty($item['child'])) : foreach ($item['child'] as $child) : ?>
                                        <li class="">
                                            <a href="##" class="" style="color:#fff;" onclick="article(<?= $child['id'] ?>)"><?= $child['name'] ?></a>
                                        </li>
                                        <?php endforeach;
                                endif; ?>
                                        <!-- <li class=" am-menu-nav-channel"><a href="##" class="" title="公司">进入栏目 &raquo;</a></li> -->
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                                <li class="am-parent">
                                    <a href="##" class="">子公司链接</a>
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
<script src="assets/home/js/jquery-2.1.0.js" charset="utf-8"></script>
<script src="assets/home/js/amazeui.js" charset="utf-8"></script>
<script src="assets/home/js/common.js" charset="utf-8"></script>
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




    <?php if ((isset($detail) && $detail['type'] == 1) || isset($news)) : ?>
    $('.art1-container img').click(function() {
        var src = $(this).attr('src');
        window.location.href = src;
    })


    $('.news-container p img').click(function() {
        var src = $(this).attr('src');
        window.location.href = src;
    })

    $('.news-container img').parent('p').css('text-align','center');
    $('.news-container img').parent('div').css('text-align','center');



    <?php endif; ?>




    // 




    <?php if (isset($detail) && $detail['type'] == 3) : ?>
    $('.new3-item').mouseover(function() {
        $(this).find(".news3-cover").css('height', '100%');
        $(this).find(".news3-coverp").css('display', 'flex');
    })

    $('.new3-item').mouseout(function() {
        $(this).find(".news3-cover").css('height', '0');
        $(this).find(".news3-coverp").css('display', 'none');
    })

    <?php endif; ?>






    //Index
    <?php if (isset($index_data)) : ?>
    $('.news-pic-item').mouseover(function() {
        $(this).find('.news-pic-title').css('color', '#AB1312');
        $(this).find('.news-pic-title').css('text-decoration', 'underline');
        // 
        $(this).find('.new-pic-con').css('color', '#AB1312');
        $(this).find('.new-pic-con').css('text-decoration', 'underline');

    })
    $('.news-pic-item').mouseout(function() {
        $(this).find('.news-pic-title').css('color', '#000');
        $(this).find('.news-pic-title').css('text-decoration', 'none');
        // 
        $(this).find('.new-pic-con').css('color', '#000');
        $(this).find('.new-pic-con').css('text-decoration', 'none');
    })

    <?php endif; ?>



    // footer




    // 
    $(function() {
        $('.img9-div img').hover(function() {
            $(this).next().hide();
        })
        $('.img9-div img').mouseleave(function() {
            $(this).next().show();
        })
    })



    // 
    <?php if (isset($news) || isset($project)) : ?>
    var shareXLWeiBo = function() {
        var _shareUrl = 'http://v.t.sina.com.cn/share/share.php?&appkey=895033136'; //真实的appkey ，必选参数
        _shareUrl += '&url=' + encodeURIComponent(document.location); //参数url设置分享的内容链接|默认当前页location，可选参数
        _shareUrl += '&title=' + encodeURIComponent('<?= isset($news) ? $news['title'] : (isset($project) ? $project['title'] : '') ?>'); //参数title设置分享的标题|默认当前页标题，可选参数
        _shareUrl += '&source=' + encodeURIComponent('官网');
        _shareUrl += '&sourceUrl=' + encodeURIComponent(document.location);
        _shareUrl += '&content=' + 'utf-8'; //参数content设置页面编码gb2312|utf-8，可选参数
        _shareUrl += '&pic=' + encodeURIComponent(''); //参数pic设置图片链接|默认为空，可选参数

        var _width = $(window).width() / 2;
        var _height = $(window).height() / 1.5;

        window.open(_shareUrl, '_blank', 'toolbar=no,menubar=no,scrollbars=no,resizable=1,location=no,status=0,' + 'width=' + _width + ',height=' + _height + ',top=' + (screen.height - _height) / 2 + ',left=' + (screen.width - _width) / 2);
    };
    <?php endif; ?>
</script>

</html> 