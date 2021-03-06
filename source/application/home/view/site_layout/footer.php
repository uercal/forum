</div>
<!--===========layout-footer================-->
<div class="layout-footer">
    <!-- 回到top -->
    <div class="goTop" onclick="goTop()" style="display:none;">
        <p>回到顶部</p>
    </div>

    <div class="footer-foot" style="font-size:16px;margin:0 auto;height:auto;width:70%;background-color:#fff;">
        <p style="margin:20px;">
            电话：<?= $company['company_tel'] ?> &nbsp;&nbsp;&nbsp;
        </p>
        <p style="margin:20px;">
            邮箱：<?= $company['email'] ?> &nbsp;&nbsp;&nbsp;
        </p>
        <p style="margin:20px;">
            地址：<?= $company['address'] ?>
        </p>
    </div>    
    <div class="footer-foot" style="cursor:pointer;" onclick="window.location.href='http://www.beian.miit.gov.cn';">Copyright © 2019-2021 备案号：琼ICP备19002691号-1</div>
</div>
<script src="assets/home/js/jquery-1.8.2.min.js"></script>
<script src="assets/home/js/banner_move.js"></script>
<script src="assets/home/js/jq_scroll.js"></script>
<script src="assets/home/js/amazeui.js"></script>
</body>
<script>
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

    function goTop() {
        $('html,body').animate({
            scrollTop: 0
        }, 500);
    }
    // 

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

    function listDetail($id) {
        window.location.href = "<?= url('listDetail') ?>&id=" + $id;
    }


    $('.addSiteContent').on('click', function() {
        window.location.href = '<?= url('person/personCenter') ?>';
    })

    function userProject(id){
        window.location.href = "<?= url('projectDetail') ?>&id=" + id;
    }

    // footer
</script>
<!--  -->
<script src="assets/layer/layer.js"></script>

</html>