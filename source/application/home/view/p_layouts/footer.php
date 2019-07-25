</div>
</div>
</section>
<!--===========layout-footer================-->
<div class="layout-footer">
    <div class="footer">
            <div class="footer--inner">
                <div class="container foot-container">
                    <div class="footer_main">

                        <div class="am-g">
                            <div class="am-g-nav">
                                <!--  -->
                                <?php foreach ($menus as $k => $item): ?>
                                    <div style="width:15%;">
                                        <div class="footer_main--column">
                                            <strong class="footer_main--column_title" <?php if ($item['is_show'] == 1): ?> onclick="category(<?=$item['category_id']?>)" <?php endif;?>>
                                                <?=$item['name']?></strong>
                                            <ul class="footer_navigation">
                                                <?php if (!empty($item['child'])): foreach ($item['child'] as $child): if ($child['name'] != '联系我们'): ?>
		                                                            <li class="footer_navigation--item"><a href="#" class="footer_navigation--link" onclick="category(<?=$child['category_id']?>)">
		                                                                    <?=$child['name']?></a></li>
		                                                        <?php endif;
endforeach;
endif;?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="f-contact">
                            <strong class="f-contact-title">联系我们</strong>

                            <div class="concat-info">
                                <?php foreach ($index_data['concat']['data'] as $concat): ?>
                                    <p><?=$concat['title']?>：<?=$concat['value']?></p>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>

                    <div class="footer-friend">
                        <div class="friend-div">
                            <strong class="friend-title">友情链接</strong>
                            <div class="friend-info">
                                <?php foreach ($index_data['company']['data'] as $f): ?>
                                    <a href="<?=isset($f['jumpUrl']) ? $f['jumpUrl'] : ''?>"><?=$f['name']?></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 回到top -->
            <div class="goTop" onclick="goTop()" style="display:none;">
                <p>回到顶部</p>
            </div>

    </div>
    <div class="footer-foot">Copyright © 2013-2019 备案号：闽ICP备15012807号-1</div>
</div>

<!--  -->
<div class="container" id="crop-avatar">
    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" action="<?=url('changeHead')?>" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                    </div>
                    <div class="modal-body">
                        <div class="avatar-body">

                            <!-- Upload image and data -->
                            <div class="avatar-upload">
                                <input type="hidden" class="avatar-src" name="avatar_src">
                                <input type="hidden" class="avatar-data" name="avatar_data">
                                <label for="avatarInput">Local upload</label>
                                <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                            </div>

                            <!-- Crop and preview -->
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="avatar-wrapper"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="avatar-preview preview-lg"></div>
                                    <div class="avatar-preview preview-md"></div>
                                    <div class="avatar-preview preview-sm"></div>
                                </div>
                            </div>

                            <div class="row avatar-btns">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div> -->
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
</div>

<!--  -->
<script src="assets/home/js/amazeui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/head/cropper.min.js"></script>
<script src="assets/head/main.js"></script>
</body>
<script>
    $(function() {
        //
        $('.el-icon-close').on('click', function() {
            $(this).parent().parent().toggle('slow');
        })
    })



    function quit() {
        layer.confirm('是否确定退出', {
            title: '确认',
            btn: ['确定', '取消'] //按钮
        }, function() {
            $.get('<?=url('quitUser')?>', function(res) {
                window.location.href = '/';
            })
        }, function() {
            layer.closeAll();
        });
    }
    //



    function category(id) {
        console.log(id);
        if (id == 0) return false;
        var url = "<?=url('/index/category')?>/category_id/" + id;
        window.location.href = url;
    }

    // detail
    function activity(id) {
        window.location.href = "<?=url('/index/activity')?>/id/" + id;
    }


    function home() {
        var url = "<?=url('/index')?>";
        window.location.href = url;
    }

    function listDetail(id) {
        window.location.href = "<?=url('/index/listDetail')?>&id=" + id;
    }

    function headerQuit() {
        var $nav = $('#menu-offcanvas');
        $nav.offCanvas('close');
    }

    function recruit(id) {
        var url = "<?=url('/index/recruit')?>&id=" + id;
        window.location.href = url;
    }

    function goTop() {
        $('html,body').animate({
            scrollTop: 0
        }, 500);
    }

    function project(id) {
        var url = "<?=url('/index/projectDetail')?>&id=" + id;
        window.location.href = url;
    }


    $(document).ready(function() {
        //首先将#back-to-top隐藏
        // $(".goTop").hide();
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
<!--  -->
<script src="assets/layer/layer.js"></script>
<script>
    $(function() {
        //
        function activity(id) {
            window.location.href = "<?=url('/index/activity')?>/id/" + id;
        }
    });
</script>

</html>