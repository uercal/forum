<link rel="stylesheet" href="assets/home/css/amazeui.css" />
<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="index-container">

        <div class="index-news">
            <div class="index-head">
                <div class="index-title">
                    <strong>本会要闻</strong>
                </div>
                <p class="item-more">查看更多 >></p>
            </div>
            <div class="news-body">
                <div class="news-slider">
                    <div class="am-slider am-slider-default" style="height:300px;width:100%;" data-am-flexslider="{ animation: 'slider',slideshowSpeed: 2000}" id="demo-slider-news">
                        <ul class="am-slides">
                            <?php foreach ($index_data['news']['data'] as $item) : ?>
                            <li>
                                <img src="<?= $item['imgUrl'] ?>" />
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
                    <div class="news-item">
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
















    </div>















</section> 