<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?= $model['parent']['name'] ?></p>
            <p class="current" onclick="category(<?= $model['category_id'] ?>)"><?= $model['name'] ?></p>
        </div>
    </div>

    <div class="list-body">
        <div class="detail-container">
            <div class="detail-head">
                <strong><?= $detail['title'] ?></strong>
                <div>
                    <p>
                        <?= $detail['user_id'] != 0 ? ($detail['user']['person'] ? '作者：' . $detail['user']['person']['name'] . '&nbsp;&nbsp;&nbsp;' : '作者:' . $detail['user']['company']['company_name']) . '&nbsp;&nbsp;&nbsp;' : '' ?>
                        发布时间：<?= date('Y-m-d', strtotime($detail['create_time'])) ?>
                        <?= $model['list']['cate_exist'] == 1 ? '&nbsp;&nbsp;&nbsp;类别：' . implode(', ', $detail['option']) : '' ?>
                    </p>
                </div>
            </div>
            <div class="detail-body <?= $model['listMode']['key_word'] == 'user_news' ? 'forbid' : '' ?>">
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