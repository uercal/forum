<style>
    .layui-layer-title {
        background-color: rgba(215, 225, 205, 0.2) !important;
        color: #3C5E40 !important;
        font-family: PingFangSC-Medium;
        font-size: 20px;
        letter-spacing: 0;
    }
</style>




<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?= $model['parent']['name'] ?></p>
            <p class="arrow" style="cursor:pointer;" onclick="category(<?= $model['category_id'] ?>)"><?= $model['name'] ?></p>
            <p class="current">活动详情</p>
        </div>
    </div>

    <div class="list-body">
        <div class="detail-container">
            <div class="detail-head">
                <strong><?= $detail['title'] ?></strong>
                <div>
                    <p>发布时间：<?= date('Y-m-d', strtotime($detail['create_time'])) ?></p>
                </div>
            </div>

            <div class="act-detail-cover">
                <img src="<?= $detail['cover']['file_path'] ?>" alt="">
            </div>



            <div class="act-detail-option">
                <div class="act-detail-item">
                    <div class="act-detail-option-img" style="background:#4A90E2;">
                        <img src="assets/home/images/time.png" alt="">
                    </div>
                    <p>报名时间</p>
                    <p style="color:#4A90E2;"><?= date('Y-m-d', $detail['sign_begin']) . '至' . date('Y-m-d', $detail['sign_end']) ?></p>
                    <p title="<?= $detail['sign_text'] ?>"><?= $detail['sign_text'] ?></p>
                </div>
                <div class="act-detail-item">
                    <div class="act-detail-option-img" style="background:#F5A623;">
                        <img src="assets/home/images/date.png" alt="">
                    </div>
                    <p>活动时间</p>
                    <p style="color:#F5A623;"><?= date('Y-m-d', $detail['active_begin']) . '至' . date('Y-m-d', $detail['active_end']) ?></p>
                    <p title="<?= $detail['active_text'] ?>"><?= $detail['active_text'] ?></p>
                </div>
                <div class="act-detail-item">
                    <div class="act-detail-option-img" style="background:#45BAB9;">
                        <img src="assets/home/images/member.png" alt="">
                    </div>
                    <p>活动人数</p>
                    <p style="color:#45BAB9;"><?= $detail['member_count'] ?>人</p>
                    <p title="<?= $detail['member_text'] ?>"><?= $detail['member_text'] ?></p>
                </div>
                <div class="act-detail-item">
                    <div class="act-detail-option-img" style="background:#8B572A;">
                        <img src="assets/home/images/address.png" alt="">
                    </div>
                    <p>活动地址</p>
                    <p style="color:#8B572A;"><?= $detail['address'] ?></p>
                    <p title="<?= $detail['address_text'] ?>"><?= $detail['address_text'] ?></p>
                </div>
            </div>



            <div class="act-detail-head">
                <strong>社团活动简介</strong>
            </div>

            <div class="detail-body">
                <?= htmlspecialchars_decode($detail['content']) ?>
            </div>





            <!--  -->
            <div class="act-users-button">
				
                <div style="background: #BFA46F;" onclick="<?php if (time() > $detail['active_end']) : ?>supportAct(<?= $detail['id'] ?>)<?php else : ?>invalidTime()<?php endif; ?>">
                    <p>赞助</p>
                </div>
                <div style="background: #44874B;" onclick="<?php if (time() > $detail['sign_begin'] && time() < $detail['sign_end']) : ?>signAct(<?= $detail['id'] ?>)<?php else : ?>invalidTime()<?php endif; ?>">
                    <p>报名</p>
                </div>
            </div>




        </div>
    </div>


</section>


<!--  -->