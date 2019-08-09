<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?= $model['parent']['name'] ?></p>
            <p class="arrow" style="cursor:pointer;" onclick="category(<?= $model['category_id'] ?>)"><?= $model['name'] ?></p>
            <p class="current">详情</p>
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



            <div class="projects-head">
                <div class="pro-head-img">
                    <img src="<?= $detail['cover']['file_path'] ?>" alt="">
                </div>
                <div>
                    <div class="projects-item">
                        <div class="projects-item-float" style="background:#BFA46F;">
                            <img src="assets/home/images/date.png" alt="">
                        </div>
                        <div class="projects-item-option">
                            <p>总投资：</p>
                            <span style="color: #F35437;"><?= $detail['total_invest'] . '万人民币' ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>服务合同金额：</p>
                            <span style="color: #F35437;"><?= $detail['assignment_money'] . '万人民币' ?></span>
                        </div>
                    </div>

                    <div class="projects-item">
                        <div class="projects-item-float" style="background: #45BAB9;">
                            <img src="assets/home/images/date.png" alt="">
                        </div>
                        <div class="projects-item-option">
                            <p>项目所在地：</p>
                            <span><?= implode(',', $detail['region_span']) ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>服务单位：</p>
                            <span><?= $detail['server_company'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>项目提交单位：</p>
                            <span><?= $detail['user']['company']['company_name'] ?></span>
                        </div>
                        <!-- <div class="projects-item-option">
                            <p>建设单位：</p>
                            <span>单位名称单位名称单位名称单位名称单位名称单位名称名称</span>
                        </div> -->
                    </div>

                    <div class="projects-item">
                        <div class="projects-item-float" style="background: #F9BA53;">
                            <img src="assets/home/images/date.png" alt="">
                        </div>
                        <div class="projects-item-option">
                            <p>工程类别：</p>
                            <span><?= implode(' | ',$detail['eng_cate']) ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>服务类别：</p>
                            <span><?= implode(' | ',$detail['server_cate']) ?></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="detail-body">
                <?= htmlspecialchars_decode($detail['content']) ?>
            </div>









        </div>
    </div>


</section>