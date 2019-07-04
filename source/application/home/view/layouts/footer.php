</div>
<!--===========layout-footer================-->
<div class="layout-footer">
    <div class="footer">

        <div class="footer--inner">
            <div class="container foot-container">
                <div class="footer_main">

                    <div class="am-g" style="width:96%;">
                        <div class="am-g-nav">
                            <!--  -->
                            <?php foreach ($menus as $k => $item) : ?>
                                <div style="width:15%;">
                                    <div class="footer_main--column">
                                        <strong class="footer_main--column_title" <?php if ($item['is_show'] == 1) : ?> onclick="category(<?= $item['category_id'] ?>)" <?php endif; ?>>
                                            <?= $item['name'] ?></strong>
                                        <ul class="footer_navigation">
                                            <?php if (!empty($item['child'])) : foreach ($item['child'] as $child) : if ($child['name'] != '联系我们') : ?>
                                                        <li class="footer_navigation--item"><a href="#" class="footer_navigation--link" onclick="category(<?= $child['category_id'] ?>)">
                                                                <?= $child['name'] ?></a></li>
                                                    <?php endif;
                                            endforeach;
                                        endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div style="width:30%;">
                                <div class="footer_main--column">
                                    <strong class="footer_main--column_title footer_main--column_title_last">
                                        联系我们</strong>
                                    <ul class="footer_navigation">
                                        <?php foreach ($index_data['concat']['data'] as $concat) : ?>
                                            <li class="footer_navigation--item">
                                                <a href="#" class="footer_navigation--link">
                                                    <?= $concat['title'] ?>：<?= $concat['value'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="f-contact">
                        <strong class="f-contact-title">联系我们</strong>

                        <div class="concat-info">
                            <?php foreach ($index_data['concat']['data'] as $concat) : ?>
                                                                        <p><?= $concat['title'] ?>：<?= $concat['value'] ?></p>
                            <?php endforeach; ?>
                        </div>                        
                    </div> -->
                </div>
                <div class="footer-friend">
                    <div class="friend-div">
                        <strong class="friend-title">友情链接</strong>
                        <div class="friend-info">
                            <?php foreach ($index_data['company']['data'] as $f) : ?>
                                <a href="<?= isset($f['jumpUrl']) ? $f['jumpUrl'] : '' ?>"><?= $f['name'] ?></a>
                            <?php endforeach; ?>
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
    <div class="footer-foot">Copyright © 2019-2021 备案号：闽ICP备15012807号-1</div>
</div>
<script src="assets/home/js/jquery-1.8.2.min.js"></script>
<script src="assets/home/js/banner_move.js"></script>
<script src="assets/home/js/jq_scroll.js"></script>
<script src="assets/home/js/amazeui.js"></script>
</body>
<script>
    function quit() {
        layer.confirm('是否确定退出', {
            title: '确认',
            btn: ['确定', '取消'] //按钮
        }, function() {
            $.get('<?= url('/index/quitUser') ?>', function(res) {
                window.location.reload();
            })
        }, function() {
            layer.closeAll();
        });
    }
    //  


    function category(id) {
        console.log(id);
        if (id == 0) return false;
        var url = "<?= url('/index/category') ?>/category_id/" + id;
        window.location.href = url;
    }

    <?php if (isset($model)) : ?>

        function search() {
            var title = $('input[name="title"]').val();
            console.log(title);
            if (!title) return false;
            $form = $('#pro_list').serialize();
            filter_jump($form);
        }

        function list_sort(sort) {
            sort = sort == 'asc' ? 'desc' : 'asc';
            $('input[name="sort"]').val(sort);
            $form = $('#pro_list').serialize();
            filter_jump($form);
        }

        function pro_filter() {
            if ($('.list-filter-order span').hasClass('am-icon-chevron-down')) {
                $('.list-filter-order span').removeClass('am-icon-chevron-down');
                $('.list-filter-order span').addClass('am-icon-chevron-up');
            } else {
                $('.list-filter-order span').removeClass('am-icon-chevron-up');
                $('.list-filter-order span').addClass('am-icon-chevron-down');
            }
            $('.pro-filter-container').toggle(700);
        }

        function mag_detail(url) {
            if ((url.indexOf("http://") == -1) && (url.indexOf("https://") == -1)) {
                url = "http://" + url;
            }
            window.location.href = url;
        }

        // 
        function server_cate(val) {
            $('input[name="server_cate"]').val(val);
            $form = $('#pro_list').serialize();
            // 
            filter_jump($form);
        }

        function eng_cate(val) {
            $('input[name="eng_cate"]').val(val);
            $form = $('#pro_list').serialize();
            // 
            filter_jump($form);
        }


        function assignment_money(val) {
            $('input[name="assignment_money"]').val(val);
            $form = $('#pro_list').serialize();
            filter_jump($form);
        }

        function total_invest(val) {
            $('input[name="total_invest"]').val(val);
            $form = $('#pro_list').serialize();
            filter_jump($form);
        }

        function assignment_date(val) {
            $('input[name="assignment_date"]').val(val);
            $form = $('#pro_list').serialize();
            filter_jump($form);
        }


        // 
        function pro_filter_rm(val) {
            console.log(val);
            $('input[name=' + val + ']').val(0);
            $form = $('#pro_list').serialize();
            //             
            filter_jump($form);
        }



        function filter_jump($form) {
            var html = "<?= url('/index/category', [
                            'category_id' => $model['category_id']
                        ]) ?>";

            html = html + '&' + $form;
            window.location.href = html;
        }

        // act
        function invalidTime() {
            layer.msg('未在有效时间内');
        }

        function supportAct(act_id) {
            <?php if ($login_user) : ?>
                <?php if (isset($is_support)) : if (!$is_support) : ?>
                        layer.open({
                            id: 'support',
                            type: 2,
                            title: '赞助活动',
                            maxmin: false,
                            scrollbar: false,
                            resize: false,
                            shadeClose: true, //点击遮罩关闭层
                            area: '600px',
                            content: '/person/support_act?act_id=' + act_id, //弹框显示的url
                            success: function(layero, index) {
                                layer.iframeAuto(index);
                            },
                            cancel: function(index) {
                                layer.close(index);
                            },
                            end: function() {

                            }
                        });
                    <?php else : ?>
                        layer.msg('你已赞助过该活动');
                    <?php endif;
            endif; ?>
            <?php else :  ?>
                layer.msg('你还没未登录');
            <?php endif; ?>

        }

        function signAct(act_id) {
            <?php if ($login_user) : ?>
                <?php if (isset($is_sign)) : if (!$is_sign) : ?>
                        layer.open({
                            id: 'sign',
                            type: 2,
                            title: '报名活动',
                            maxmin: false,
                            resize: false,
                            scrollbar: false,
                            shadeClose: true, //点击遮罩关闭层
                            area: '600px',
                            content: '/person/sign_act?act_id=' + act_id, //弹框显示的url
                            success: function(layero, index) {
                                layer.iframeAuto(index);
                            },
                            cancel: function(index) {
                                layer.close(index);
                            },
                            end: function() {

                            }
                        });
                    <?php else : ?>
                        layer.msg('你已报名过该活动');
                    <?php endif;
            endif; ?>
            <?php else : ?>
                layer.msg('你还没未登录');
            <?php endif; ?>
        }

    <?php endif; ?>



    function home() {
        var url = "<?= url('/index/index') ?>";
        window.location.href = url;
    }

    // detail
    function activity(id) {
        window.location.href = "<?= url('/index/activity') ?>/id/" + id;
    }

    function userProject(id, category_id) {
        var is_login = "<?= session('forum_user') ? 1 : 0 ?>";
        var role_valid = "<?= session('forum_user')['user'] ? (strpos(session('forum_user')['user']['role'], '0') ? 0 : 1) : 0 ?>"
        if (is_login == 1 && role_valid == 1) {
            window.location.href = "<?= url('/index/projectDetail') ?>&id=" + id + "&category_id=" + category_id;
        } else {
            layer.msg('只有个人会员或以上才可以查看');
        }
    }

    function userDetail(id, category_id, is_sup = 0) {
        window.location.href = "<?= url('/index/userDetail') ?>&user_id=" + id + "&category_id=" + category_id + '&is_sup=' + is_sup;
    }

    function listDetail(id, category_id) {
        <?php if (isset($key_word)  && $key_word == 'user_news') : ?>
            var is_login = "<?= session('forum_user') ? 1 : 0 ?>";
            var role_valid = "<?= session('forum_user')['user'] ? (strpos(session('forum_user')['user']['role'], '0') ? 0 : 1) : 0 ?>"
            if (is_login == 1 && role_valid == 1) {
                window.location.href = "<?= url('/index/listDetail') ?>&id=" + id + "&category_id=" + category_id;
            } else {
                layer.msg('只有个人会员或以上才可以查看');
            }
        <?php else : ?>
            window.location.href = "<?= url('/index/listDetail') ?>&id=" + id + "&category_id=" + category_id;
        <?php endif; ?>
    }


    // more
    function newsMore(list_id) {
        window.location.href = "<?= url('/index/listJumpCate') ?>/list_id/" + list_id;
    }

    function activityMore() {
        window.location.href = "<?= url('/index/activityMore') ?>";
    }

    function userNewsMore() {
        window.location.href = "<?= url('/index/userNewsMore') ?>";
    }


    function news(id) {
        var url = "<?= url('/index/news') ?>/id/" + id;
        window.location.href = url;
    }

    function recruit(id, category_id) {
        var url = "<?= url('/index/recruit') ?>&id=" + id + "&category_id=" + category_id;
        window.location.href = url;
    }

    function project(id) {
        var url = "<?= url('/index/project') ?>/id/" + id;
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


            // 

            setTimeout(function() {
                setBackground();
            }, 1500);

        });
    });


    var t = 0;

    function setBackground() {
        $('.logo-1').toggle('slow', function() {
            $('.logo-2').toggle();
        })
        t = setTimeout(function() {
            setBackground();
        }, 1500);
    }




    // footer
</script>
<!--  -->
<script src="assets/layer/layer.js"></script>
<script>
    $(function() {
        // 
        $('#u_login').on('click', function() {
            layer.open({
                id: 'login',
                type: 2,
                title: '用户登录',
                maxmin: false,
                resize: false,
                scrollbar: false,
                shadeClose: true, //点击遮罩关闭层
                area: ['500px', '400px'],
                content: 'index/login_index', //弹框显示的url
                success: function(layero, index) {

                },
                cancel: function(index) {
                    layer.close(index);
                },
                end: function() {}
            });
        });

        $('#u_register').on('click', function() {
            layer.open({
                id: 'login',
                type: 2,
                title: '用户注册',
                maxmin: false,
                scrollbar: false,
                resize: false,
                shadeClose: true, //点击遮罩关闭层
                area: ['500px', '580px'],
                content: 'index/register_index', //弹框显示的url
                success: function(layero, index) {

                },
                cancel: function(index) {
                    layer.close(index);
                },
                end: function() {}
            });
        });

        function login_success(msg) {
            layer.msg(msg);
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        }

    });
</script>

</html>