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
        <?php if (!empty($detail['company'])) : ?>
            <div class="detail-container">

                <div class="users-detail-head">
                    <div class="users-detail-avatar">
                        <img src="<?= $detail['company']['company_logo_path'] ?>" style="object-fit:cover;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?= $detail['company']['company_name'] ?></strong>
                        <p class="info-role-name"><?= $detail['role_name'] ?></p>

                        <div class="projects-item-option">
                            <p>资质资格：</p>
                            <span style="color: #333333;"><?= $detail['company']['server_level'] ?></span>
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

                <div class="detail-body">
                    <?= htmlspecialchars_decode($detail['company']['company_intro']) ?>
                </div>

            </div>

        <?php elseif (!empty($detail['person'])) : ?>
            <div class="detail-container">

                <div class="users-detail-head">
                    <div class="users-detail-avatar">
                        <img src="<?= $detail['person']['id_photo_path'] ?>" style="object-fit:cover;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?= $detail['person']['name'] ?></strong>
                        <p class="info-role-name"><?= $detail['role_name'] ?></p>

                        <div class="projects-item-option">
                            <p>毕业院校：</p>
                            <span style="color: #333333;"><?= $detail['person']['education_school'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>学历学位：</p>
                            <span style="color: #333333;"><?= $detail['person']['education_degree'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>专业：</p>
                            <span style="color: #333333;"><?= $detail['person']['education_major'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>所在单位：</p>
                            <span style="color: #333333;"><?= $detail['person']['belong_company'] ?></span>
                        </div>
                        <div class="projects-item-option" style="margin-bottom:40px;">
                            <p>职务&职称：</p>
                            <span style="color: #333333;"><?= $detail['person']['job'] . ' | ' . $detail['person']['positio'] ?></span>
                        </div>

                    </div>
                </div>


                <strong style="margin-left:30px;margin-top:35px;">个人简介</strong>

                <div class="detail-body">
                    <?= htmlspecialchars_decode($detail['person']['introduce']) ?>
                </div>

            </div>
        <?php endif; ?>


    </div>


















</section>