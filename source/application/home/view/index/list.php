<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;" id="app">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?= $model['parent']['name'] ?></p>
            <p class="current" onclick="category(<?= $model['category_id'] ?>)"><?= $model['name'] ?></p>
        </div>
    </div>

    <?php if ($key_word == 'news') : ?>
        <div class="list-body">
            <div class="list-head">
                <div class="list-head-title">
                    <div class="list-head-before"></div>
                    <strong><?= $model['list']['name'] ?></strong>
                    <?php if (input('title')) : ?>
                        <small>（搜索标题：“<?= input('title') ?>” 结果）</small>
                    <?php endif; ?>
                </div>
                <div class="list-filter">

                    <div class="list-filter-order" onclick="list_sort('<?= input('sort') ? input('sort') : 'asc' ?>')">
                        <p>按公布日期</p>
                        <span class="<?= input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc' ?>" style="color:#44874B;"></span>
                    </div>

                    <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                        <div class="am-input-group">
                            <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容">
                            <span class="am-input-group-btn">
                                <button class="am-btn am-btn-default" style="background-color:#44874B;color:#fff;" type="button" id="search">
                                    <span class="am-icon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($data as $item) : ?>
                <div class="list-news-item">
                    <div class="list-news-item">
                        <div class="list-news-img">
                            <img src="<?= $item['cover']['file_path'] ?>" alt="">
                        </div>
                        <div class="list-news-body">
                            <strong><?= $item['title'] ?></strong>
                            <div class="list-news-content">
                                <?= htmlspecialchars_decode($item['content']) ?>
                            </div>
                            <div class="list-news-foot">
                                <p><?= date('Y/m/d', strtotime($item['create_time'])) ?></p>
                                <p>查看更多》</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>



            <div class="list-page">
                <?= $data->render() ?>
            </div>

        </div>


    <?php elseif ($key_word == 'mag') : ?>
        <div class="list-body">
            <div class="list-head">
                <div class="list-head-title">
                    <div class="list-head-before"></div>
                    <strong><?= $model['list']['name'] ?></strong>
                    <?php if (input('title')) : ?>
                        <small>（搜索标题：“<?= input('title') ?>” 结果）</small>
                    <?php endif; ?>
                </div>
                <div class="list-filter">

                    <div class="list-filter-order" onclick="list_sort('<?= input('sort') ? input('sort') : 'asc' ?>')">
                        <p>按公布日期</p>
                        <span class="<?= input('sort') ? (input('sort') == 'asc' ? 'am-icon-sort-amount-asc' : 'am-icon-sort-amount-desc') : 'am-icon-sort-amount-asc' ?>" style="color:#44874B;"></span>
                    </div>

                    <div class="am-u-lg-12" style="display:flex;align-items:center;width:346px;">
                        <div class="am-input-group">
                            <input type="text" class="am-form-field" name="title" placeholder="请输入搜索内容">
                            <span class="am-input-group-btn">
                                <button class="am-btn am-btn-default" style="background-color:#44874B;color:#fff;" type="button" id="search">
                                    <span class="am-icon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($data as $item) : ?>
                <div class="list-mag-item" onclick="mag_detail('<?= $item['data']['jumpUrl'] ?>')">
                    <div class="list-mag-body">
                        <div class="list-mag-head">
                            <div class="list-mag-head-l">
                                <p><?= date('Y/m/d', strtotime($item['create_time'])) ?></p>
                                <div>
                                    <p>第<?= $item['mag_num'] ?>期</p>
                                </div>
                            </div>
                            <div class="list-mag-head-r">
                                <p>查看更多 》</p>
                            </div>
                        </div>
                        <strong><?= $item['title'] ?></strong>
                    </div>
                </div>
            <?php endforeach; ?>



            <div class="list-page">
                <?= $data->render() ?>
            </div>

        </div>








    <?php endif; ?>



</section>