<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="list-body">
        <div class="common-nav">
            <div class="nav-info">
                <a href="/"><span class="am-icon-home"></span></a>
                <p class="arrow"></p>
                <p class="current">详情</p>
            </div>
        </div>
        <div class="detail-container">
            <div class="detail-head">
                <strong><?= $detail['title'] ?></strong>
                <div>
                    <p>
                        发布时间：<?= date('Y-m-d', strtotime($detail['create_time'])) ?>
                        <?= $detail['list']['cate_exist'] == 1 ? '&nbsp;&nbsp;&nbsp;类别：' . implode(', ', $detail['option']) : '' ?>
                    </p>
                </div>
            </div>
            <div class="detail-body forbid">
                <?= htmlspecialchars_decode($detail['content']) ?>
            </div>
        </div>
    </div>
</section>

<style>
    .forbid {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>