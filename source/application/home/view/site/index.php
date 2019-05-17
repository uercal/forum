<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="index-container">
        <!-- img_list -->
        <div class="index-news">
            <div class="index-head">
                <div class="index-title">
                    <strong><?= $index_data['img_list']['name'] ?></strong>
                </div>
                <p class="item-more" onclick="">查看更多 》</p>
            </div>
            <div class="news-body">
                <?php if (!empty($index_data['img_list']['list_detail']->toArray())) : ?>
                    <div class="news-slider">
                        <div class="am-slider am-slider-default" style="height:300px;width:100%;" data-am-flexslider="{ animation: 'slider',slideshowSpeed: 2000}" id="demo-slider-news">
                            <ul class="am-slides">
                                <?php foreach ($index_data['img_list']['list_detail'] as $item) : ?>
                                    <li>
                                        <img src="<?= $item['cover']['file_path'] ?>" />
                                        <div class="news-slider-text">
                                            <p><?= $item['title'] ?></p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="news-list">
                        <?php foreach ($index_data['img_list']['list_detail'] as $item) : ?>
                            <div class="news-item">
                                <strong>
                                    <strong>
                                        <?= $item['title'] ?>
                                    </strong>
                                </strong>
                                <p><?= strip_tags(htmlspecialchars_decode($item['content'])) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="news-site-empty">
                        <img src="assets/home/images/site_empty.png" alt="">
                        <div class="site-empty-info">
                            <p>您还未发布任何新闻，马上添加让大家看到你的动态吧</p>
                            <div class="addSiteContent">
                                <i class="am-icon-plus"></i>
                                发布文章
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- 实践活动 -->
        <div class="index-news">
            <div class="index-head">
                <div class="index-title">
                    <strong>学术实践</strong>
                </div>
                <!-- <p class="item-more">查看更多 》</p> -->
            </div>
            <div class="exp-body">
                <div class="exp-left">
                    <div class="eleft-title">
                        <p><?= $index_data['normal_list']['name'] ?></p>
                    </div>

                    <?php if (!empty($index_data['normal_list']['list_detail']->toArray())) : foreach ($index_data['normal_list']['list_detail'] as $item) : ?>
                            <div class="eleft-item">
                                <div class="eleft-item-title">
                                    <div class="eleft-item-author">
                                        <img src="<?= $item['user']['avatar_path'] ?>" alt="">
                                        <p>编辑：<?= $item['user']['user_name'] ?></p>
                                    </div>
                                    <p style="font-family: HelveticaNeue;font-size: 14px;color: #666666;letter-spacing: 0.88px;"><?= $item['option'][0] ?></p>
                                </div>

                                <hr style="height:1px;border:none;border-top:1px dashed #DEE0DC;margin:2px 0px;" />

                                <div class="eleft-item-content">
                                    <strong><?= $item['title'] ?></strong>
                                    <p>
                                        <?= strip_tags(htmlspecialchars_decode($item['content'])) ?>
                                    </p>
                                </div>

                                <div class="eleft-item-bottom">
                                    <p style="font-size: 12px;color: #999999;letter-spacing: 0.88px;"><?= $item['create_time_date'] ?></p>
                                    <p style="font-size: 12px;color: #9AD1A1;letter-spacing: 0;">查看详情</p>
                                </div>
                            </div>
                        <?php endforeach;
                else : ?>
                        <div class="eleft-empty">
                            <img src="assets/home/images/site_empty.png" alt="">
                            <div class="site-empty-info">
                                <p>您还未发布任何新闻，马上添加让大家看到你的动态吧</p>
                                <div class="addSiteContent">
                                    <i class="am-icon-plus"></i>
                                    发布文章
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="exp-right" <?= empty($index_data['project_list']) ? 'style="background:#EFF2EC;"' : '' ?>>
                    <div class="eright-title">
                        <p>实践范例</p>
                    </div>

                    <?php if (!empty($index_data['project_list'])) : foreach ($index_data['project_list'] as $item) : ?>
                            <div class="eright-item">
                                <div class="eright-item-title">
                                    <p><?= $item['region_span_name'] ?></p>
                                    <p><?= implode(' | ', $item['server_cate']) ?></p>
                                </div>
                                <hr style="height:1px;border:none;border-top:1px solid #DEE0DC;opacity: 0.3;;margin:2px 0px;" />
                                <div class="eright-item-body">
                                    <div class="eright-item-name">
                                        <p style="font-weight:bold;width:60%;"><?= $item['title'] ?></p>
                                        <p style="font-weight:bold;color: #FF8670;font-size: 28px;"><?= bcdiv($item['total_invest'], 10000, 2) . '万' ?></p>
                                    </div>
                                    <div class="eright-item-b">
                                        <p><?= $item['assignment_date_time'] ?></p>
                                        <p>总投资</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                else : ?>

                        <div class="eleft-empty">
                            <img src="assets/home/images/site_empty.png" alt="">
                            <div class="site-empty-info">
                                <p>您还未发布任何新闻，马上添加让大家看到你的动态吧</p>
                                <div class="addSiteContent">
                                    <i class="am-icon-plus"></i>
                                    发布文章
                                </div>
                            </div>
                        </div>


                    <?php endif; ?>


                </div>
            </div>
        </div>



        <div style="height:100px;">
        </div>




    </div>
</section>