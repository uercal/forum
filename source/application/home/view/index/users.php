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
<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?= $model['parent']['name'] ?></p>
            <p class="current" onclick="category(<?= $model['category_id'] ?>)"><?= $model['name'] ?></p>
        </div>
    </div>

    <!--  -->
    <div class="list-body">
        <form action="" id="pro_list" class="list-body" style="margin-bottom:30px;">
            <input type="hidden" name="sort" value="<?= input('sort') ?>">
            <input type="hidden" name="type" value="<?= input('type') ?>">
            <div class="list-head">
                <div class="list-head-title">
                    <div class="list-head-before"></div>
                    <strong><?= $model['name'] ?></strong>
                    <?php if (input('title')) : ?>
                        <small>（搜索标题：“<?= input('title') ?>” 结果）</small>
                    <?php endif; ?>
                </div>
                <div class="list-filter" id="filter">
                    <el-select v-model="type" @change="changeType" placeholder="会员类型">
                        <el-option v-for="item in options" :key="item.value" :label="item.name" :value="item.value">
                        </el-option>
                    </el-select>
                    <div class="list-filter-order" onclick="list_sort('<?= input('sort') ? input('sort') : 'asc' ?>')">
                        <p>按公布日期</p>
                        <span class="<?= input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc' ?>" style="color:#44874B;"></span>
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


        <div class="users-list">
            <?php foreach ($data['list'] as $item) : ?>
                <div class="users-list-item" onclick="userDetail(<?= $item['user_id'] ?>,<?= $model['category_id'] ?>)">
                    <img style="background-image:url(assets/home/images/about/004.jpg);" alt="">
                    <div>
                        <div class="users-level">
                            <p>普通会员</p>
                        </div>
                        <div class="users-item-info">
                            <strong>北京揽月机械有限公司</strong>
                            <div>
                                <div>
                                    <span class="am-icon-building-o"></span>
                                    <p>北京揽月机械有限公司</p>
                                </div>
                                <div>
                                    <span class="am-icon-file-text-o"></span>
                                    <p>投资咨询</p>
                                </div>
                                <div>
                                    <span class="am-icon-phone"></span>
                                    <p>020-1234455</p>
                                </div>
                                <div>
                                    <span class="am-icon-at"></span>
                                    <p>mayun@126.com</p>
                                </div>
                                <div>
                                    <span class="am-icon-send-o"></span>
                                    <p>北京市海淀区华海北路289号</p>
                                </div>
                            </div>
                            <div class="users-item-arrow">

                            </div>
                        </div>
                    </div>
                </div>















                <!--  -->
            <?php endforeach; ?>
        </div>



        <div class="list-page">
            <?= $data['list']->render() ?>
        </div>

        <script src="https://unpkg.com/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/element-ui/lib/index.js"></script>
        <script>
            var type = "<?= input('type') ?>";
            var vue = new Vue({
                el: '#filter',
                data: {
                    options: [{
                            name: '普通会员',
                            value: 'normal'
                        },
                        {
                            name: '个人会员',
                            value: 'person'
                        },
                        {
                            name: '单位会员',
                            value: 'company'
                        }
                    ],
                    type: type ? type : ''
                },
                methods: {
                    changeType: function(e) {
                        $('input[name="type"]').val(this.type);
                        $form = $('#pro_list').serialize();
                        window.filter_jump($form);
                    }
                },
                mounted: function() {}
            })
        </script>
    </div>


</section>