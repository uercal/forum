<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>            
            <p class="current">招聘详情</p>
        </div>
    </div>

    <div class="list-body">
        <div class="detail-container">
            <div class="detail-head">
                <strong><?= $detail['job_name'] ?></strong>
                <div>
                    <p>发布时间：<?= $detail['create_time'] ?> &nbsp;&nbsp; 工作地点：<?= $detail['job_address_name'] ?></p>
                </div>
            </div>
            <div class="detail-body">
                <?= htmlspecialchars_decode($detail['content']) ?>
            </div>
        </div>
    </div>


</section>