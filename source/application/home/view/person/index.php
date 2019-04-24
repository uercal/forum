<!-- 我的活动 -->
<div class="person-my-act">
    <div class="person-my-act-head">
        <div>
            <p>我的活动</p>
        </div>
        <p>查看更多 <i class="am-icon-angle-double-right"></i> </p>
    </div>

    <div class="person-my-act-body">
        <div class="my-act-item">
            <img src="assets/home/images/about/001.jpg" alt="">
            <div>
                <strong>工程建设行业协会工程第五次研讨会第五次研讨会第五次研会工程建设行业协会工程第五次研讨会第五次研讨会第五次研会</strong>
                <p>活动时间：</p>
                <p>活动地点：</p>
                <p>活动人数：</p>
                <p>活动地址：</p>
            </div>
        </div>
        <div class="my-act-item">
            <img src="assets/home/images/about/001.jpg" alt="">
            <div>
                <strong>工程建设行业协会工程第五次研讨会第五次研讨会第五次研会工程建设行业协会工程第五次研讨会第五次研讨会第五次研会</strong>
                <p>活动时间：</p>
                <p>活动地点：</p>
                <p>活动人数：</p>
                <p>活动地址：</p>
            </div>
        </div>
    </div>

</div>

<!-- 活动推荐 -->
<div class="person-my-act">
    <div class="person-my-act-head">
        <div>
            <p>活动推荐</p>
        </div>
        <p>查看更多 <i class="am-icon-angle-double-right"></i> </p>
    </div>

    <div class="person-re-act">
        <?php foreach ($act_list as $item) : ?>
            <div class="act-item">
                <div class="act-cover">
                    <img class="act-img" src="<?= $item['cover']['file_path'] ?>" alt="">
                    <div class="act-float-time">
                        <p>活动日期：<?= date('Y/m/d', $item['active_begin']) . '-' . date('Y/m/d', $item['active_end']) ?></p>
                    </div>
                </div>
                <div class="act-info">
                    <strong class="info-title">
                        <strong><?= $item['title'] ?></strong>
                    </strong>
                    <div class="info-name">
                        <?= html_entity_decode($item['content']) ?>
                    </div>
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