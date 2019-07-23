<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;" id="app">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="current">新闻要讯</p>
        </div>
    </div>

    <!--  -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <style>
        .el-select>.el-input {
            color: #999999 !important;
            background-color: #fff !important;
            height: 44px;
            width: 120px;
            border: 1px solid #999999 !important;
            font-size: 16px;
            margin-right: 15px;
            border-radius: 6px;
            position: relative;
        }

        .el-input__inner {
            border: none;
            padding: 0px 22px;
            color: #999999;
            height: 100%;
            text-align: center;
            border-radius: 6px;
        }

        .el-input__inner::-webkit-input-placeholder {
            color: #999999;
        }

        .el-select-dropdown__item.selected {
            color: rgb(68, 135, 75);
        }
    </style>
    <div class="list-body">
        <form action="" id="pro_list" class="list-body" style="margin-bottom:30px;">
            <input type="hidden" name="sort" value="<?= input('sort') ?>">
            <input type="hidden" name="option_id" value="<?= input('option_id') ?>">
            <div class="list-head">
                <div class="list-head-title">
                    <div class="list-head-before"></div>
                    <strong>新闻要讯</strong>
                    <?php if (input('title')) : ?>
                        <small>（搜索标题：“<?= input('title') ?>” 结果）</small>
                    <?php endif; ?>
                </div>
                <div class="list-filter" id="filter">
                    <el-select v-model="category" @change="changeOption" placeholder="文章类别">
                        <el-option v-for="item in options" :key="item.id" :label="item.name" :value="item.id">
                        </el-option>
                    </el-select>
                    <div class="list-filter-order" onclick="list_sort('<?= input('sort') ? input('sort') : 'asc' ?>')">
                        <p>按公布日期</p>
                        <i class="<?= input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc' ?>" style="color:#44874B;"></i>
                    </div>
                    <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                        <div class="am-input-group">
                            <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容" value="<?= input('title') ?>">
                            <span class="am-input-group-btn">
                                <button class="am-btn am-btn-default" style="background-color:#44874B;color:#fff;" type="button" onclick="search()">
                                    <span class="am-icon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <div class="user-news-list">
            <?php if ($list_obj['cover_exist'] == 0) : foreach ($detail_list as $item) : ?>
                    <div class="user-news-item" onclick="listDetail(<?= $item['id'] ?>)">
                        <div class="user-news-head">
                            <div class="user-news-head-info">
                                <img src="<?= $item['user']['avatar_path'] ?>" alt="">
                                <p>编辑：<?= $item['user']['user_name'] ?></p>
                            </div>
                            <p><?= implode('/', $item['option']) ?></p>
                        </div>
                        <hr style="height:1px;border:none;border-top:2px dashed #979797;margin:0;margin-top:10px;opacity: 0.2;" />
                        <div class="user-news-body">
                            <strong><?= $item['title'] ?></strong>
                            <div style="margin:20px 0px;color: #999999;font-size:16px;">
                                <p>
                                    <?= strip_tags(htmlspecialchars_decode($item['content'])) ?>
                                </p>
                            </div>
                            <div style="color: #B4BEAB;font-size:14px;">
                                <p><?= date('Y/m/d', strtotime($item['create_time'])) ?></p>
                                <p>查看更多 <i class="am-icon-angle-double-right"></i></p>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                <?php endforeach;
        endif; ?>
        </div>

        <?php if ($list_obj['cover_exist'] == 1) : foreach ($detail_list as $item) : ?>
                <div class="list-news-item" onclick="listDetail(<?= $item['id'] ?>)">
                    <div class="list-news-item">
                        <div class="list-news-img">
                            <img src="<?= $item['cover']['file_path'] ?>" alt="">
                        </div>
                        <div class="list-news-body">
                            <strong><?= $item['title'] ?></strong>
                            <div class="list-news-content">
                                <p>
                                    <?= strip_tags(htmlspecialchars_decode($item['content'])) ?>
                                </p>
                            </div>
                            <div class="list-news-foot">
                                <p><?= date('Y/m/d', strtotime($item['create_time'])) ?></p>
                                <p>查看更多<i class="am-icon-angle-double-right"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
    endif; ?>




        <div class="list-page">
            <?= $detail_list->render() ?>
        </div>

        <script src="https://unpkg.com/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/element-ui/lib/index.js"></script>
        <script>
            var options = JSON.parse('<?= json_encode($list_obj['user_news_option']) ?>');
            var option_id = "<?= input('option_id') ?>";
            var vue = new Vue({
                el: '#filter',
                data: {
                    options: options,
                    category: option_id ? Number(option_id) : ''
                },
                methods: {
                    changeOption: function(e) {
                        $('input[name="option_id"]').val(this.category);
                        $form = $('#pro_list').serialize();
                        window.filter_jump($form);
                    }
                },
                mounted: function() {}
            })
        </script>
    </div>

</section>

<script>
    function filter_jump($form) {
        var html = "<?= url('listNews') ?>" + "&" + $form;
        window.location.href = html;
    }
</script>