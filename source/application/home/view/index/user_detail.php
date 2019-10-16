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
        <?php if (!empty($is_sup)) : ?>
            <div class="detail-container">
                <div class="users-detail-head">
                    <div class="users-detail-avatar">
                        <img src="<?= $detail['supplier']['id_photo_path'] ?>" style="object-fit:contain;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?= $detail['supplier']['sup_company_name'] ?></strong>                        

                        <div class="projects-item-option">
                            <p>社会统一信用代码：</p>
                            <span style="color: #333333;"><?= $detail['supplier']['sup_company_code'] ?></span>
                        </div>                   
						<div class="projects-item-option">
							<p>法定代表人：</p>
							<span style="color: #333333;"><?= $detail['supplier']['sup_legal_person'] ?></span>
						</div>
						<div class="projects-item-option">
							<p>注册资金：</p>
							<span style="color: #333333;"><?= $detail['supplier']['sup_regist_money'].'万元' ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>地址：</p>
                            <span style="color: #333333;"><?= $detail['supplier']['sup_company_address'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>电话：</p>
                            <span style="color: #333333;"><?= $detail['supplier']['sup_company_tel'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>传真：</p>
                            <span style="color: #333333;"><?= $detail['supplier']['sup_company_fax'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>邮箱：</p>
                            <span style="color: #333333;"><?= $detail['supplier']['sup_company_email'] ?></span>
                        </div>
                        <div class="projects-item-option" style="margin-bottom:40px;">
                            <p>网址：</p>
                            <span style="color: #333333;"><?= $detail['supplier']['sup_company_site'] ?></span>
                        </div>
                        
						
                    </div>
                </div>

                <strong style="margin-left:30px;margin-top:35px;">供应商简介</strong>

                <div class="detail-body">
                    <?= htmlspecialchars_decode($detail['supplier']['sup_intro']) ?>
                </div>

            </div>




        <?php elseif (!empty($detail['company'])) : ?>
            <div class="detail-container">
                <div class="users-detail-head">
                    <div class="users-detail-avatar">
                        <img src="<?= $detail['company']['company_logo_path'] ?>" style="object-fit:contain;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?= $detail['company']['company_name'] ?></strong>
                        <p class="info-role-name"><?= $detail['company']['memberLevel'] ?></p>
                        <div class="projects-item-option">
                            <p>社会统一信用代码：</p>
                            <span style="color: #333333;"><?= $detail['company']['company_code'] ?></span>
                        </div>
                        <div class="projects-item-option">
						    <p>法定代表人：</p>
						    <span style="color: #333333;"><?= $detail['company']['legal_person'] ?></span>
                        </div>
                        <div class="projects-item-option">
						    <p>注册资金：</p>
						    <span style="color: #333333;"><?= $detail['company']['regist_money'].'万元' ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>地址：</p>
                            <span style="color: #333333;"><?= $detail['company']['address'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>电话：</p>
                            <span style="color: #333333;"><?= $detail['company']['company_tel'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>传真：</p>
                            <span style="color: #333333;"><?= $detail['company']['company_fax'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>邮箱：</p>
                            <span style="color: #333333;"><?= $detail['company']['email'] ?></span>
                        </div>
                        <div class="projects-item-option" style="margin-bottom:40px;">
                            <p>网址：</p>
                            <span style="color: #333333;"><?= $detail['company']['company_site'] ?></span>
                        </div>
												                                                                        																											
						<!-- <div class="projects-item-option" style="margin-bottom:40px;">
						    <p>会员级别：</p>
						    <span style="color: #333333;"><?= $detail['company']['memberLevel'] ?></span>
						</div> -->

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
                        <img src="<?= $detail['person']['id_photo_path'] ?>" style="object-fit:contain;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?= $detail['person']['name'] ?></strong>
											
						<p class="info-role-name"><?= !empty($detail['person']['memberLevel'])?$detail['person']['memberLevel'].'    '.$detail['person']['expertLevel']:$detail['person']['expertLevel'] ?></p>												
						
                        <div class="projects-item-option">
                            <p>毕业院校：</p>
                            <span style="color: #333333;"><?= $detail['person']['education_school'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>学历/学位：</p>
                            <span style="color: #333333;"><?= $detail['person']['education_degree'].'/'.$detail['person']['education_degree_xw'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>专业：</p>
                            <span style="color: #333333;"><?= $detail['person']['education_major'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>所在单位：</p>
                            <span style="color: #333333;"><?= $detail['person']['belong_company'] ?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>职务/职称：</p>
                            <span style="color: #333333;"><?= $detail['person']['job'] . ' | ' . $detail['person']['positio'] ?></span>
                        </div>
						<div class="projects-item-option" style="margin-bottom:40px;">
                            <p>职业资格：</p>
                            <span style="color: #333333;"><?= $detail['person']['pro_qualify'] ?></span>
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