<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="index-container">
        <!-- 本会要闻 -->
        <div class="index-news">
            <div class="index-head">
                <div class="index-title">
                    <strong>本会要闻</strong>
                </div>
                <p class="item-more" onclick="newsMore(<?= $index_data['news']['list']['list_id'] ?>)">查看更多 》</p>
            </div>
            <div class="news-body">
                <div class="news-slider">
                    <div class="am-slider am-slider-default" style="height:300px;width:100%;" data-am-flexslider="{ animation: 'slider',slideshowSpeed: 2000}" id="demo-slider-news">
                        <ul class="am-slides">
                            <?php foreach ($index_data['news']['data'] as $item) : ?>
                                <li>
                                    <img src="<?= $item['imgUrl'] ?>" style="cursor:pointer;" onclick="listDetail(<?= $item['newId'] ?>,0)" />
                                    <div class="news-slider-text">
                                        <p><?= $item['content'] ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="news-list">
                    <?php foreach ($index_data['news']['data'] as $item) : ?>
                        <div class="news-item" onclick="listDetail(<?= $item['newId'] ?>,0)">
                            <strong>
                                <strong>
                                    <?= $item['title'] ?>
                                </strong>
                            </strong>
                            <p><?= $item['content'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

        <!-- 社团活动 -->
        <div class="index-news">
            <div class="index-head">
                <div class="index-title">
                    <strong>社团活动</strong>
                </div>
                <p class="item-more" onclick="activityMore()">查看更多 》</p>
            </div>
            <div class="activity-body">
                <?php foreach ($index_data['activity']['data'] as $item) : ?>
                    <div class="act-item">
                        <div class="act-cover">
                            <img class="act-img" src="<?= $item['cover']['file_path'] ?>" alt="">
                            <div class="act-float-time">
                                <p>活动日期：<?= date('Y/m/d', $item['active_begin']) . '-' . date('Y/m/d', $item['active_end']) ?></p>
                            </div>
                        </div>
                        <div class="act-info">
                            <strong class="info-title">
                                <strong title="<?= $item['title'] ?>"><?= $item['title'] ?></strong>
                            </strong>
                            <div class="act-reg">
                                <div class="reg-detail">
                                    <p class="reg-time am-icon-clock-o">&nbsp;&nbsp;报名截止日期：<?= date('Y/m/d', $item['sign_end']) ?></p>
                                    <p class="reg-address am-icon-location-arrow">&nbsp;&nbsp;<?= $item['address'] ?></p>
                                </div>
                                <div class="reg-button" onclick="activity(<?= $item['id'] ?>)">
                                    <p>查看详情</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>





        <!-- 实践活动 -->
        <div class="index-news">
            <div class="index-head">
                <div class="index-title">
                    <strong>理论实践</strong>
                </div>
                <p class="item-more" onclick="userNewsMore()">查看更多 》</p>
            </div>
            <div class="exp-body">
                <div class="exp-left">
                    <div class="eleft-title">
                        <p>学术天地</p>
                    </div>
                    <?php foreach ($index_data['user_news']['data'] as $item) : ?>
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
                    <?php endforeach; ?>

                </div>
                <div class="exp-right">
                    <div class="eright-title">
                        <p>实践范例</p>
                    </div>

                    <?php foreach ($index_data['projects']['data'] as $item) : ?>
                        <div class="eright-item">
                            <div class="eright-item-title">
                                <p><?= $item['region_span']['city'] ?></p>
                                <p><?= explode(',', $item['server_cate_span'])[0] . ' | ' . explode(',', $item['eng_cate_span'])[0] ?></p>
                            </div>
                            <hr style="height:1px;border:none;border-top:1px solid #DEE0DC;opacity: 0.3;;margin:2px 0px;" />
                            <div class="eright-item-body">
                                <div class="eright-item-name">
                                    <div style="width:40%;height:120px;">
                                        <img style="width:100%;height:120px;object-fit:cover;" src="<?= $item['cover']['file_path'] ?>" alt="">
                                    </div>
                                    <div style="width:56%;height:120px;">
                                        <p class="eright-pro-title" style="font-weight:bold;width:100%;" onclick="userProject(<?= $item['id'] ?>,0)"><?= $item['title'] ?><?= $item['title'] ?><?= $item['title'] ?><?= $item['title'] ?></p>
                                        <p style="font-weight:bold;color: #FF8670;font-size: 26px;text-align:right;"><?= bcdiv($item['total_invest'], 10000, 0) . '万/' . bcdiv($item['assignment_money'], 10000, 0) . '万' ?></p>
                                    </div>
                                </div>
                                <div class="eright-item-b">
                                    <p><?= date('Y/m/d', strtotime($item['assignment_date_time'])) ?></p>
                                    <p>总投资/合同金额</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>



        <div style="height:100px;">
        </div>




    </div>
</section>