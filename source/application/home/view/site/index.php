<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="index-container">
        <!-- img_list -->
        <div class="index-news">
            <div class="index-head">
                <div class="index-title">
                    <strong><?= $index_data['img_list']['name'] ?></strong>
                </div>
                <p class="item-more" onclick="">查看更多 <i class="am-icon-angle-double-right"></i></p>
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
                            <div class="eleft-item" onclick="listDetail(<?= $item['id'] ?>,0)">
                                <div class="eleft-item-title">
                                    <div class="eleft-item-author">
                                        <p>作者：<?= !empty($item['user']['person']) ? $item['user']['person']['name'] : $item['user']['company']['company_name'] ?></p>
                                    </div>
                                    <p style="font-family: HelveticaNeue;font-size: 14px;color: #666666;letter-spacing: 0.88px;"><?= $item['option'][0] ?></p>
                                </div>

                                <hr style="height:1px;border:none;border-top:1px dashed #DEE0DC;margin:2px 0px;" />

                                <div class="eleft-item-content">
                                    <div style="width:20%;height:120px;border-radius:4px;">
                                        <img style="object-fit:cover;width:100%;height:100%;border-radius: 4px;" src="<?= !empty($item['user']['person']) ? $item['user']['person']['id_photo_path'] : $item['user']['company']['company_logo_path'] ?>" alt="">
                                    </div>
                                    <div style="width:75%;height:120px;">
                                        <strong><?= $item['title'] ?></strong>
                                        <p>
                                            <?= strip_tags(htmlspecialchars_decode($item['content'])) ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="eleft-item-bottom">
                                    <p style="font-size: 12px;color: #999999;letter-spacing: 0.88px;"><?= date('Y/m/d', strtotime($item['create_time_date'])) ?></p>
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
                                    <p><?= $item['region_span']['city'] ?></p>
                                    <p><?= explode(',', $item['server_cate_span'])[0] . ' | ' . explode(',', $item['eng_cate_span'])[0] ?></p>
                                </div>
                                <hr style="height:1px;border:none;border-top:1px solid #DEE0DC;opacity: 0.3;;margin:2px 0px;" />
                                <div class="eright-item-body" style="height:100%;">
                                    <div class="eright-item-name" style="height:120px;">
                                        <div style="width:40%;height:120px;">
                                            <img style="width:100%;height:120px;object-fit:cover;" src="<?= $item['cover']['file_path'] ?>" alt="">
                                        </div>
                                        <div style="width:56%;height:120px;">
                                            <p class="eright-pro-title" style="font-weight:bold;width:100%;" onclick="userProject(<?= $item['id'] ?>)"><?= $item['title'] ?><?= $item['title'] ?><?= $item['title'] ?><?= $item['title'] ?></p>
                                            <p style="font-weight:bold;color: #FF8670;font-size: 26px;text-align:right;"><?= bcdiv($item['total_invest'], 10000, 0) . '万/' . bcdiv($item['assignment_money'], 10000, 0) . '万' ?></p>
                                        </div>
                                    </div>
                                    <div class="eright-item-b">
                                        <p><?= date('Y/m/d', strtotime($item['assignment_date_time'])) ?></p>
                                        <p>总投资/合同金额</p>
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