<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;" id="app">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?= $model['parent']['name'] ?></p>
            <p class="current" onclick="category(<?= $model['category_id'] ?>)"><?= $model['name'] ?></p>
        </div>
    </div>

    <div class="list-body">
        <form action="" id="pro_list" class="list-body" style="margin-bottom:30px;">
            <input type="hidden" name="sort" value="<?= input('sort') ?>">
            <div class="list-head">
                <div class="list-head-title">
                    <div class="list-head-before"></div>
                    <strong><?= $model['name'] ?></strong>
                    <?php if (input('title')) : ?>
                        <small>（搜索标题：“<?= input('title') ?>” 结果）</small>
                    <?php endif; ?>
                </div>
                <div class="list-filter">

                    <div class="list-filter-order" onclick="list_sort('<?= input('sort') ? input('sort') : 'asc' ?>')">
                        <p>按发布日期</p>
                        <span class="<?= input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc' ?>" style="color:#44874B;"></span>
                    </div>

                    <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                        <div class="am-input-group">
                            <input type="text" class="am-form-field" name="title" placeholder="请输入搜索职位" value="<?= input('title') ?>">
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

        <?php foreach ($data['list'] as $item) : ?>

            <div class="recruit-item">
                <div class="recruit-l flex-c flex-col">
                    <strong><?= $item['job_name'] ?></strong>
                    <p><?= explode(',', $item['job_price'])[0] . '-' . explode(',', $item['job_price'])[1] . '元/月' ?></p>
                </div>
                <div class="recruit-m flex-c flex-col">
                    <p><?= $item['user'] ? $item['user']['company']['company_name'] : '海南省全过程工程咨询研究会' ?></p>
                    <p>
                        <?= $item['job_name'] . ' /&nbsp;&nbsp; ' . $item['job_experience_name'] . '工作经验 /&nbsp;&nbsp;' . $item['job_education_name'] ?>
                    </p>
                    <p style="font-size:12px;">
                        发布时间：<?= date('Y-m-d', strtotime($item['create_time'])) ?>
                    </p>
                </div>
                <div class="recruit-r flex-c" onclick="recruit('<?= $item['id'] ?>','<?= $model['category_id'] ?>')">
                    查看
                </div>
            </div>

        <?php endforeach; ?>



        <div class="list-page">
            <?= $data['list']->render() ?>
        </div>

    </div>
</section>