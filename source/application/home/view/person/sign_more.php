<style>
    .list-page {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pagination>.active>a,
    .pagination>.active>span,
    .pagination>.active>a:hover,
    .pagination>.active>span:hover,
    .pagination>.active>a:focus,
    .pagination>.active>span:focus {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #44874b;
        border-color: #44874b;
    }

    .my-act-item:hover {
        background: #e9efe3;
        cursor: pointer;
    }
</style>
<!-- 我的活动 -->
<div class="person-my-act">
    <div class="person-my-act-head">
        <div>
            <p>我的报名活动</p>
            <small style="margin-left:20px;color:#999999;">(<?=$total?>)</small>
        </div>
    </div>

    <div class="person-my-act-body">
        <?php foreach ($data['my_act'] as $item): ?>
            <div class="my-act-item" onclick="activity(<?=$item['activity']['id']?>)">
                <img src="<?=$item['activity']['cover']['file_path']?>" alt="">
                <div>
                    <strong><?=$item['activity']['title']?></strong>
                    <p style="font-weight:600;">报名时间：<?=unixtime_to_date('Y/m/d H:i', $item['activity']['sign_begin']) . '-' . unixtime_to_date('Y/m/d H:i', $item['activity']['sign_end'])?></p>
                    <p style="color:#f35437;font-weight:600;">活动时间：<?=unixtime_to_date('Y/m/d H:i', $item['activity']['active_begin']) . '-' . unixtime_to_date('Y/m/d H:i', $item['activity']['active_end'])?></p>
                    <p>活动地点：<?=$item['activity']['address']?></p>
                    <p>活动人数：<?=$item['activity']['member_count'] . '人'?></p>
                </div>
            </div>
        <?php endforeach;?>

        <div class="list-page" style="">
            <?=$data['my_act']->render()?>
        </div>

    </div>

</div>