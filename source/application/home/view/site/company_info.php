<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="common-nav">
        <div class="nav-info">
            <a href="<?= url('index') ?>"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>           
            <p class="current">关于我们</p>
        </div>
    </div>

    <div class="list-body">
        <div class="detail-container">

            <div class="users-detail-head">
                <!-- <div class="users-detail-avatar">
                    <img src="<?= $detail['company']['company_logo_path'] ?>" style="object-fit:cover;" alt="">
                </div> -->
                <div class="users-detail-info" style="width:100%;">
                    <div class="info-bonus"></div>
                    <strong><?= $detail['company']['company_name'] ?></strong>                    
                    <div class="projects-item-option">
                        <p>会员等级：</p>
                        <span style="color: #333333;"><?= $detail['role_name'] ?></span>
                    </div>                    
                    <div class="projects-item-option">
                        <p>服务类别：</p>
                        <span style="color: #333333;"><?= $detail['company']['company_type'] ?></span>
                    </div>
                    <div class="projects-item-option">
                        <p>联系方式：</p>
                        <span style="color: #333333;"><?= $detail['company']['company_tel'] . ' | ' . $detail['company']['manager_phone'] ?></span>
                    </div>
                    <div class="projects-item-option">
                        <p>公司邮箱：</p>
                        <span style="color: #333333;"><?= $detail['company']['email'] ?></span>
                    </div>
                    <div class="projects-item-option" style="margin-bottom:40px;">
                        <p>公司地址：</p>
                        <span style="color: #333333;"><?= $detail['company']['address'] ?></span>
                    </div>
                </div>
            </div>


            <strong style="margin-left:30px;margin-top:35px;">单位简介</strong>

            <div class="detail-body" style="font-size:20px;">
                <?= htmlspecialchars_decode($detail['company']['company_intro']) ?>
            </div>

        </div>
    </div>

</section>