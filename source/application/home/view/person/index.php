<!-- 我的活动 -->
<div class="person-my-act">
    <div class="person-my-act-head">
        <div>
            <p>我的报名活动</p>
        </div>
        <?php if (!empty($data['my_act'])) : ?>
            <p style="cursor:pointer;" onclick='window.location.href = "<?= url("personCenter&sign_more=1") ?>";'>查看更多 <i class="am-icon-angle-double-right"></i> </p>
        <?php endif; ?>
    </div>

    <div class="person-my-act-body">
        <?php if (!empty($data['my_act'])) : foreach ($data['my_act'] as $item) : ?>
                <div class="my-act-item">
                    <img src="<?= $item['activity']['cover']['file_path'] ?>" alt="">
                    <div>
                        <strong><?= $item['activity']['title'] ?></strong>
                        <p style="font-weight:600;">报名时间：<?= date('Y/m/d H:i', $item['activity']['sign_begin']) . '-' . date('Y/m/d H:i', $item['activity']['sign_end']) ?></p>
                        <p style="color:#f35437;font-weight:600;">活动时间：<?= date('Y/m/d H:i', $item['activity']['active_begin']) . '-' . date('Y/m/d H:i', $item['activity']['active_end']) ?></p>
                        <p>活动地点：<?= $item['activity']['address'] ?></p>
                        <p>活动人数：<?= $item['activity']['member_count'] . '人' ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="my-act-item" style="background-color:#fff;">
                <div style="width:100%;display:flex;align-items:center;jusity-content:center;">
                    <strong style="font-size:48px;color:#e8e8e8;">暂无报名活动</strong>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>

<!-- 活动推荐 -->
<div class="person-my-act">
    <div class="person-my-act-head">
        <div>
            <p>活动推荐</p>
        </div>
        <p style="cursor:pointer;" onclick='window.location.href = "<?= url("/index/activityMore") ?>";'>查看更多 <i class="am-icon-angle-double-right"></i> </p>
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
                        <p>
                            <?= strip_tags(htmlspecialchars_decode($item['content'])) ?>
                        </p>
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