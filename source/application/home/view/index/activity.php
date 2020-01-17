<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?=$model['parent']['name']?></p>
            <p class="current" onclick="category(<?=$model['category_id']?>)"><?=$model['name']?></p>
        </div>
    </div>

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

        <div class="act-list">
            <div class="activity-body">
                <?php foreach ($data['list'] as $item): ?>
                    <div class="act-item">
                        <div class="act-cover">
                            <img class="act-img" src="<?=$item['cover']['file_path']?>" alt="">
                            <div class="act-float-time">
                                <p>活动日期：<?=unixtime_to_date('Y/m/d', $item['active_begin']) . '-' . unixtime_to_date('Y/m/d', $item['active_end'])?></p>
                            </div>
                        </div>
                        <div class="act-info">
                            <strong class="info-title">
                                <strong title="<?=$item['title']?>"><?=$item['title']?></strong>
                            </strong>
                            <div class="act-reg">
                                <div class="reg-detail">
                                    <p class="reg-time am-icon-clock-o">&nbsp;&nbsp;报名截止日期：<?=unixtime_to_date('Y/m/d', $item['sign_end'])?></p>
                                    <p class="reg-address am-icon-location-arrow">&nbsp;&nbsp;<?=$item['address']?></p>
                                </div>
                                <div class="reg-button" onclick="activity(<?=$item['id']?>)">
                                    <p>查看详情</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>



        <div class="list-page">
            <?=$data['list']->render()?>
        </div>

    </div>



</section>