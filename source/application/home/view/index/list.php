<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;" id="app">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?=$model['parent']['name']?></p>
            <p class="current" onclick="category(<?=$model['category_id']?>)"><?=$model['name']?></p>
        </div>
    </div>

    <?php if ($key_word == '_news'): ?>
        <div class="list-body">
            <form action="" id="pro_list" class="list-body" style="margin-bottom:30px;">
                <input type="hidden" name="sort" value="<?=input('sort')?>">
                <div class="list-head">
                    <div class="list-head-title">
                        <div class="list-head-before"></div>
                        <strong><?=$model['list']['name']?></strong>
                        <?php if (input('title')): ?>
                            <small>（搜索标题：“<?=input('title')?>” 结果）</small>
                        <?php endif;?>
                    </div>
                    <div class="list-filter">

                        <div class="list-filter-order" onclick="list_sort('<?=input('sort') ? input('sort') : 'asc'?>')">
                            <p>按公布日期</p>
                            <span class="<?=input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc'?>" style="color:#44874B;"></span>
                        </div>

                        <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                            <div class="am-input-group">
                                <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容" value="<?=input('title')?>">
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
            <?php foreach ($data as $item): ?>
                <div class="list-news-item">
                    <div class="list-news-item">
                        <div class="list-news-img">
                            <img src="<?=$item['cover']['file_path']?>" alt="">
                        </div>
                        <div class="list-news-body">
                            <strong><?=$item['title']?></strong>
                            <div class="list-news-content">
                                <p>
                                    <?=strip_tags(htmlspecialchars_decode($item['content']))?>
                                </p>
                            </div>
                            <div class="list-news-foot">
                                <p><?=date('Y/m/d', strtotime($item['create_time']))?></p>
                                <p>查看更多<i class="am-icon-angle-double-right"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>



            <div class="list-page">
                <?=$data->render()?>
            </div>

        </div>




    <?php elseif ($key_word == 'job'): ?>
        <div class="list-body">
            <div class="list-head">
                <div class="list-head-title">
                    <div class="list-head-before"></div>
                    <strong><?=$model['list']['name']?></strong>
                </div>
            </div>

            <?php foreach ($data as $cate): ?>
                <div class="job-list-item">
                    <div class="job-list-head">
                        <?php if (empty($cate['content'])): ?>
                            <p><?=$cate['name']?></p>
                        <?php else: ?>
                            <p style="cursor:pointer;" onclick="job_sort('<?=$cate['content']?>')"><?=$cate['name']?></p>
                        <?php endif;?>
                    </div>
                    <div class="job-list-info">
                        <?php foreach ($cate['data'] as $member): ?>
                            <div class="job-list-info-item" onclick="job_sort('<?=$member['content']?>')">
                                <img src="<?=!empty($member['cover']) ? $member['cover']['file_path'] : '/assets/home/images/o_avatar.png'?>" alt="">
                                <a><?=$member['title']?></a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endforeach;?>

            <hr>
            <div class="job-list-item">
                <div class="pre-divider"></div>
                <strong style="margin-left:28px;margin-top:20px;"><?=$pre_name?></strong>
                <div class="job-list-info" style="flex-direction:column;">
                    <?php foreach ($pre_lists as $pre): ?>
                        <div class="pre-item">
                            <p><?=$pre['name']?></p>
                            <a href="javascript:jobList(<?= $pre['id'] ?>)">查看详情<i class="am-icon-angle-double-right"></i></a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>


        </div>
        <style>
            .yourclass>.layui-layer-content {
                padding: 30px;
            }
        </style>
        <script>
            function job_sort(content) {
                //页面层-自定义
                layer.open({
                    type: 1,
                    title: '详情',
                    area: ['55%', '70%'],
                    closeBtn: 0,
                    shadeClose: true,
                    skin: 'yourclass',
                    content: content
                });

            }
        </script>
    <?php elseif ($key_word == '_mag'): ?>

        <div class="list-body">
            <form action="" id="pro_list" class="list-body" style="margin-bottom:30px;">
                <input type="hidden" name="sort" value="<?=input('sort')?>">
                <div class="list-head">
                    <div class="list-head-title">
                        <div class="list-head-before"></div>
                        <strong><?=$model['list']['name']?></strong>
                        <?php if (input('title')): ?>
                            <small>（搜索标题：“<?=input('title')?>” 结果）</small>
                        <?php endif;?>
                    </div>
                    <div class="list-filter">

                        <div class="list-filter-order" onclick="list_sort('<?=input('sort') ? input('sort') : 'asc'?>')">
                            <p>按公布日期</p>
                            <span class="<?=input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc'?>" style="color:#44874B;"></span>
                        </div>

                        <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                            <div class="am-input-group">
                                <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容" value="<?=input('title')?>">
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

            <?php foreach ($data as $item): ?>
                <div class="list-mag-item" onclick="mag_detail('<?=$item['data']['jumpUrl']?>')">
                    <div class="list-mag-body">
                        <div class="list-mag-head">
                            <div class="list-mag-head-l">
                                <p><?=date('Y/m/d', strtotime($item['create_time']))?></p>
                                <!-- <div>
                                                                                            <p>第<?=$item['mag_num']?>期</p>
                                                                                        </div> -->
                            </div>
                            <div class="list-mag-head-r">
                                <p>查看更多 <i class="am-icon-angle-double-right"></i></p>
                            </div>
                        </div>
                        <strong><?=$item['title']?></strong>
                    </div>
                </div>
            <?php endforeach;?>



            <div class="list-page">
                <?=$data->render()?>
            </div>

        </div>


    <?php elseif ($key_word == 'list_news'): ?>
        <div class="list-body">
            <form action="" id="pro_list" class="list-body" style="margin-bottom:30px;">
                <input type="hidden" name="sort" value="<?=input('sort')?>">
                <div class="list-head">
                    <div class="list-head-title">
                        <div class="list-head-before"></div>
                        <strong><?=$model['list']['name']?></strong>
                        <?php if (input('title')): ?>
                            <small>（搜索标题：“<?=input('title')?>” 结果）</small>
                        <?php endif;?>
                    </div>
                    <div class="list-filter">
                        <div class="list-filter-order" onclick="list_sort('<?=input('sort') ? input('sort') : 'asc'?>')">
                            <p>按公布日期</p>
                            <span class="<?=input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc'?>" style="color:#44874B;"></span>
                        </div>
                        <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                            <div class="am-input-group">
                                <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容" value="<?=input('title')?>">
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

            <?php foreach ($data as $item): ?>
                <div class="list-mag-item" onclick="mag_detail('<?=$item['data']['jumpUrl']?>')">
                    <div class="list-mag-body">
                        <div class="list-mag-head">
                            <div class="list-mag-head-l">
                                <p><?=date('Y/m/d', strtotime($item['create_time']))?></p>
                                <div>
                                    <p>第<?=$item['mag_num']?>期</p>
                                </div>
                            </div>
                            <div class="list-mag-head-r">
                                <p>查看更多 <i class="am-icon-angle-double-right"></i></p>
                            </div>
                        </div>
                        <strong><?=$item['title']?></strong>
                    </div>
                </div>
            <?php endforeach;?>



            <div class="list-page">
                <?=$data->render()?>
            </div>

        </div>

    <?php elseif ($key_word == 'news' && $model['list']['cover_exist'] == 0): ?>

        <div class="list-body">
            <form action="" id="pro_list" class="list-body" style="margin-bottom:30px;">
                <input type="hidden" name="sort" value="<?=input('sort')?>">
                <div class="list-head">
                    <div class="list-head-title">
                        <div class="list-head-before"></div>
                        <strong><?=$model['list']['name']?></strong>
                        <?php if (input('title')): ?>
                            <small>（搜索标题：“<?=input('title')?>” 结果）</small>
                        <?php endif;?>
                    </div>
                    <div class="list-filter">

                        <div class="list-filter-order" onclick="list_sort('<?=input('sort') ? input('sort') : 'asc'?>')">
                            <p>按公布日期</p>
                            <span class="<?=input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc'?>" style="color:#44874B;"></span>
                        </div>

                        <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                            <div class="am-input-group">
                                <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容" value="<?=input('title')?>">
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

            <?php foreach ($data['list'] as $item): ?>
                <div class="list-mag-item" onclick="listDetail(<?=$item['id']?>,<?=$model['category_id']?>)">
                    <div class="list-mag-body">
                        <div class="list-mag-head">
                            <div class="list-mag-head-l">
                                <p><?=date('Y/m/d', strtotime($item['create_time']))?></p>
                            </div>
                            <div class="list-mag-head-r">
                                <p>查看更多 <i class="am-icon-angle-double-right"></i></p>
                            </div>
                        </div>
                        <strong><?=$item['title']?></strong>
                    </div>
                </div>
            <?php endforeach;?>



            <div class="list-page">
                <?=$data['list']->render()?>
            </div>

        </div>

    <?php elseif ($key_word == 'user_project'): ?>

        <div class="list-body">
            <form action="" id="pro_list" class="list-body" style="margin-bottom:30px;">
                <input type="hidden" name="sort" value="<?=input('sort')?>">
                <div class="list-head">
                    <div class="list-head-title">
                        <div class="list-head-before"></div>
                        <strong><?=$model['name']?></strong>
                        <?php if (input('title')): ?>
                            <small>（搜索标题：“<?=input('title')?>” 结果）</small>
                        <?php endif;?>
                    </div>
                    <div class="list-filter">
                        <div class="list-filter-order" onclick="pro_filter()" style="background: #44874B;">
                            <p style="color:#fff;">更多筛选</p>
                            <span class="am-icon-chevron-<?= empty($data['filter'])?'down':'up' ?>" style="color:#fff;"></span>
                        </div>
                        <div class="list-filter-order" onclick="list_sort('<?=input('sort') ? input('sort') : 'asc'?>')">
                            <p>按合同日期</p>
                            <span class="<?=input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc'?>" style="color:#44874B;"></span>
                        </div>
                        <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                            <div class="am-input-group">
                                <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容" value="<?=input('title')?>">
                                <span class="am-input-group-btn">
                                    <div class="am-btn am-btn-default" style="background-color:#44874B;color:#fff;" onclick="search()">
                                        <span class="am-icon-search"></span>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
                <!--  -->
                <div class="pro-filter-container" <?= empty($data['filter'])?'style="display:none;"':'' ?>>
                    <?php if (!empty($data['filter'])): ?>
                        <div class="pro-filter">
                            <p style="color: #333333;">已选条件：</p>
                            <div class="pro-filter-body">
                                <?php foreach ($data['filter'] as $k => $f): ?>
                                    <div class="pro-filter-item">
                                        <p><?=$f?></p>
                                        <span style="cursor:pointer;" onclick="pro_filter_rm('<?=$k?>')" class="am-icon-close"></span>
                                    </div>
                                <?php endforeach;?>
                            </div>
                            <p style="color: #44874B;cursor:pointer;" onclick="window.location.href='<?=url('category', ['category_id' => $model['category_id']])?>'">清空条件</p>
                        </div>
                    <?php endif;?>


                    <input type="hidden" name="server_cate" value="<?=input('server_cate')?>">
                    <input type="hidden" name="eng_cate" value="<?=input('eng_cate')?>">
                    <input type="hidden" name="region_option" value="<?=input('region_option')?>">
                    <input type="hidden" name="assignment_money" value="<?=input('assignment_money')?>">
                    <input type="hidden" name="total_invest" value="<?=input('total_invest')?>">
                    <input type="hidden" name="assignment_date" value="<?=input('assignment_date')?>">
                    <!--  -->
                    <div class="pro-filter-list">
                        <div class="pro-filter-list-item">
                            <div class="pro-filter-list-item-head" style="   ">
                                <p>服务类别：</p>
                            </div>
                            <div class="pro-filter-item-body">
                                <div class="<?=empty(input('server_cate')) ? 'active' : ''?>" onclick="server_cate(0)">
                                    <p>全部</p>
                                </div>
                                <?php foreach ($data['cates']['server_cate'] as $k => $v): ?>
                                    <div class="<?=input('server_cate') == $k ? 'active' : ''?>" onclick="server_cate(<?=$k?>)">
                                        <p><?=$v?></p>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>

                        <div class="pro-filter-list-item">
                            <div class="pro-filter-list-item-head">
                                <p>工程类别：</p>
                            </div>
                            <div class="pro-filter-item-body">
                                <div class="<?=empty(input('eng_cate')) ? 'active' : ''?>" onclick="eng_cate(0)">
                                    <p>全部</p>
                                </div>
                                <?php foreach ($data['cates']['eng_cate'] as $k => $v): ?>
                                    <div class="<?=input('eng_cate') == $k ? 'active' : ''?>" onclick="eng_cate('<?=$k?>')">
                                        <p><?=$v?></p>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <!--  -->

                        <div class="pro-filter-list-item">
                            <div class="pro-filter-list-item-head">
                                <p>项目所在地：</p>
                            </div>
                            <div class="pro-filter-item-body" style="padding-left:10px;">
                                <el-cascader placeholder='请选择或搜索' expand-trigger="hover"  :options="region_data" v-model="region_option" @change="handleChange">
                                </el-cascader>
                            </div>
                        </div>

                        <div class="pro-filter-list-item">
                            <div class="pro-filter-list-item-head">
                                <p>服务合同金额（万元）：</p>
                            </div>
                            <div class="pro-filter-item-body">
                                <div class="<?=empty(input('assignment_money')) ? 'active' : ''?>" onclick="assignment_money(0)">
                                    <p>全部</p>
                                </div>                                
                                <div style="display:flex;align-items:center;">
                                    <p style="white-space:nowrap;">自定义：</p>
                                    <el-input v-model="assignment_money_s" placeholder="" type="tel" size="mini" @blur='a_money'></el-input>
                                    &nbsp;至&nbsp;
                                    <el-input v-model="assignment_money_e" placeholder="" type="tel" size="mini" @blur='a_money'></el-input>
                                </div>

                            </div>
                        </div>

                        <div class="pro-filter-list-item">
                            <div class="pro-filter-list-item-head">
                                <p>合同签订日期：</p>
                            </div>
                            <div class="pro-filter-item-body">
                                <div class="<?=empty(input('assignment_date')) ? 'active' : ''?>" onclick="assignment_date(0)">
                                    <p>全部</p>
                                </div>

                                <div style="display:flex;align-items:center;">
                                    <p style="white-space:nowrap;">自定义：</p>
                                    <el-date-picker v-model="assignment_date" size="small" value-format="yyyy/MM/dd" type="daterange" @change="assignment_date_c" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期">
                                    </el-date-picker>
                                </div>

                            </div>
                        </div>


                        <div class="pro-filter-list-item">
                            <div class="pro-filter-list-item-head">
                                <p>总投资金额（万元）：</p>
                            </div>
                            <div class="pro-filter-item-body">
                                <div class="<?=empty(input('total_invest')) ? 'active' : ''?>" onclick="total_invest(0)">
                                    <p>全部</p>
                                </div>                            
                                <div style="display:flex;align-items:center;">
                                    <p style="white-space:nowrap;">自定义：</p>
                                    <el-input v-model="total_invest_s" placeholder="" type="tel" size="mini" @blur='total_invest'></el-input>
                                    &nbsp;至&nbsp;
                                    <el-input v-model="total_invest_e" placeholder="" type="tel" size="mini" @blur='total_invest'></el-input>
                                </div>

                            </div>
                        </div>




                    </div>

                </div>
            </form>

            <!--  -->
            <script src="https://unpkg.com/vue/dist/vue.js"></script>
            <script src="https://unpkg.com/element-ui/lib/index.js"></script>
            <script>
                var is_login = "<?=session('forum_user') ? 1 : 0?>";
                var region_data = JSON.parse('<?=json_encode($data['regionData'])?>');
                var region_option = JSON.parse("[<?=input('region_option')?>]");
                var assignment_money = "<?=input('assignment_money')?>";
                var total_invest = "<?=input('total_invest')?>";
                var assignment_date = "<?=input('assignment_date')?>";
                var vue = new Vue({
                    el: '#pro_list',
                    data: {
                        region_option: region_option,
                        region_data: region_data,
                        assignment_money_s: assignment_money == 0 ? 0 : assignment_money.split('-')[0],
                        assignment_money_e: assignment_money == 0 ? 200 : assignment_money.split('-')[1],
                        total_invest_s: total_invest == 0 ? 0 : total_invest.split('-')[0],
                        total_invest_e: total_invest == 0 ? 5000 : total_invest.split('-')[1],
                        assignment_date: assignment_date == 0 ? [] : assignment_date.split(',')
                    },
                    methods: {
                        handleChange: function(e) {                                                        
                            var value = this.region_option;
                            console.log(value);
                            $('input[name="region_option"]').val(value);
                            $form = $('#pro_list').serialize();                                
                            window.filter_jump($form);                            
                        },
                        a_money: function() {
                            var r = this.assignment_money_s + '-' + this.assignment_money_e;
                            $('input[name="assignment_money"]').val(r);
                            $form = $('#pro_list').serialize();
                            window.filter_jump($form);
                        },
                        total_invest: function() {
                            var r = this.total_invest_s + '-' + this.total_invest_e;
                            $('input[name="total_invest"]').val(r);
                            $form = $('#pro_list').serialize();
                            window.filter_jump($form);
                        },
                        assignment_date_c: function() {
                            var r = this.assignment_date.join(',');
                            $('input[name="assignment_date"]').val(r);
                            $form = $('#pro_list').serialize();
                            window.filter_jump($form);
                        }
                    },
                    mounted: function() {

                    },
                    updated: function() {
                        //

                    }
                })
            </script>

            <!-- project_item -->
            <div class="pro-item-body">
                <?php foreach ($data['list'] as $item): ?>                    
                    <div class="pro-item">
                        <div class="eright-item-title" style="padding:10px 20px;">
                            <p><?=$item['region_span']['city']?></p>       
                            <?php 
                                $eng_arr = explode(',', $item['eng_cate_span']);
                                $ser_arr = explode(',', $item['server_cate_span']);
                            ?>
                            <p><?=$eng_arr[0].' | '.$ser_arr[0].(isset($ser_arr[1])?','.$ser_arr[1]:'') ?></p>                         
                        </div>
                        <hr style="height:1px;border:none;border-top:1px solid #DEE0DC;opacity: 0.3;;margin:2px 0px;" />
                        <div class="eright-item-body">
                            <div class="eright-item-name">
                                <div style="width:40%;height:120px;">
                                    <img style="width:100%;height:120px;object-fit:cover;" src="<?=$item['cover']['file_path']?>" alt="">
                                </div>
                                <div style="width:56%;height:120px;">
                                    <p class="eright-pro-title" style="font-weight:bold;width:100%;" onclick="userProject(<?=$item['id']?>,0)"><?=$item['title']?></p>
                                    <p style="font-weight:bold;color: #FF8670;font-size: 22px;text-align:right;"><?=$item['total_invest']. '万/' . $item['assignment_money']. '万'?></p>
                                </div>
                            </div>
                            <div class="eright-item-b">
                                <p><?=date('Y/m/d', strtotime($item['assignment_date_time']))?></p>
                                <p>总投资/合同金额</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>


            <div class="list-page">
                <?=$data['list']->render()?>
            </div>

        </div>

    <?php elseif ($key_word == 'user_news' || $key_word == 'news' || $key_word == 'mag'): ?>
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
                <input type="hidden" name="sort" value="<?=input('sort')?>">
                <input type="hidden" name="option_id" value="<?=input('option_id')?>">
                <div class="list-head">
                    <div class="list-head-title">
                        <div class="list-head-before"></div>
                        <strong><?=$model['list']['name']?></strong>
                        <?php if (input('title')): ?>
                            <small>（搜索标题：“<?=input('title')?>” 结果）</small>
                        <?php endif;?>
                    </div>
                    <div class="list-filter" id="filter">
                        <?php if ($model['list']['cate_exist'] == 1): ?>
                            <el-select v-model="category" @change="changeOption" placeholder="文章类别">
                                <el-option v-for="item in options" :key="item.id" :label="item.name" :value="item.id">
                                </el-option>
                            </el-select>
                        <?php endif;?>
                        <div class="list-filter-order" onclick="list_sort('<?=input('sort') ? input('sort') : 'asc'?>')">
                            <p>按公布日期</p>
                            <span class="<?=input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc'?>" style="color:#44874B;"></span>
                        </div>
                        <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                            <div class="am-input-group">
                                <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容" value="<?=input('title')?>">
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
                <?php if ($key_word == 'user_news' && $model['list']['cover_exist'] == 0): foreach ($data['list'] as $item): ?>
					                        <div class="user-news-item">
					                            <div class="user-news-head">
					                                <div class="user-news-head-info" style="cursor:pointer;" onclick="userDetail(<?=$item['user']['user_id']?>,0)">
					                                    <img src="<?=!empty($item['user']['person']) ? $item['user']['person']['id_photo_path'] : $item['user']['company']['company_logo_path']?>" alt="" style="object-fit:contain;">
					                                    <p>作者：<?=!empty($item['user']['person']) ? $item['user']['person']['name'] : $item['user']['company']['company_name']?></p>
					                                </div>
					                                <p><?=implode('/', $item['option'])?></p>
					                            </div>
					                            <hr style="width:96%;height:1px;border:none;border-top:2px dashed rgba(151, 151, 151, 0.4);margin:0 auto;opacity: 0.2;" />
					                            <div class="user-news-body">
					                                <strong><?=$item['title']?></strong>
					                                <div style="margin:20px 0px;color: #999999;font-size:16px;">
					                                    <p>
					                                        <?=strip_tags(htmlspecialchars_decode($item['content']))?>
					                                    </p>
					                                </div>
					                                <div style="color: #B4BEAB;font-size:14px;">
					                                    <p><?=date('Y/m/d', strtotime($item['create_time']))?></p>
					                                    <p onclick="listDetail(<?=$item['id']?>,<?=$model['category_id']?>)" style="cursor:pointer;">查看更多 》</p>
					                                </div>
					                            </div>
					                        </div>
					                        <!--  -->
					                    <?php endforeach;
endif;?>
            </div>

            <?php if ($model['list']['cover_exist'] == 1 && ($key_word == 'news' || $key_word == 'user_news')): foreach ($data['list'] as $item): ?>
					                    <div class="list-news-item" onclick="listDetail(<?=$item['id']?>,<?=$model['category_id']?>)">
					                        <div class="list-news-item">
					                            <div class="list-news-img">
					                                <img src="<?=$item['cover']['file_path']?>" alt="">
					                            </div>
					                            <div class="list-news-body">
					                                <strong><?=$item['title']?></strong>
					                                <div class="list-news-content">
					                                    <p>
					                                        <?=strip_tags(htmlspecialchars_decode($item['content']))?>
					                                    </p>
					                                </div>
					                                <div class="list-news-foot">
					                                    <p><?=date('Y/m/d', strtotime($item['create_time']))?></p>
					                                    <p>查看更多<i class="am-icon-angle-double-right"></i></p>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                <?php endforeach;
endif;?>

            <?php if ($key_word == 'mag'): foreach ($data['list'] as $item): ?>
					                    <div class="list-mag-item" onclick="mag_detail('<?=$item['data']['jumpUrl']?>')">
					                        <div class="list-mag-body">
					                            <div class="list-mag-head">
					                                <div class="list-mag-head-l">
					                                    <p><?=date('Y/m/d', strtotime($item['create_time']))?></p>

					                                        <?php foreach ($item['option'] as $option): ?>
					                                            <div>
					                                                <p><?=$option?></p>
					                                            </div>
					                                        <?php endforeach;?>
                                </div>
                                <div class="list-mag-head-r">
                                    <p>查看更多 <i class="am-icon-angle-double-right"></i></p>
                                </div>
                            </div>
                            <strong><?=$item['title']?></strong>
                        </div>
                    </div>
                <?php endforeach;
endif;?>

            <div class="list-page">
                <?=$data['list']->render()?>
            </div>

            <script src="https://unpkg.com/vue/dist/vue.js"></script>
            <script src="https://unpkg.com/element-ui/lib/index.js"></script>
            <script>
                var options = JSON.parse('<?=json_encode($data['options'])?>');
                var option_id = "<?=input('option_id')?>";
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

    <?php endif;?>



</section>