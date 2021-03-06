<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>
            <p class="arrow"><?=$model['parent']['name']?></p>
            <p class="arrow" style="cursor:pointer;" onclick="category(<?=$model['category_id']?>)"><?=$model['name']?></p>
            <p class="current">详情</p>
        </div>
    </div>

    <div class="list-body">
        <?php if ($is_sup == 1): ?>
            <?php if (isset($detail['company'])): ?>
            <div class="detail-container">
                <div class="users-detail-head">
                    <div class="users-detail-avatar">
                        <img src="<?=$detail['company']['company_logo_path']?>" style="object-fit:contain;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?=$detail['company']['company_name']?></strong>

                        <div class="projects-item-option">
                            <p>社会统一信用代码：</p>
                            <span style="color: #333333;"><?=$detail['company']['company_code']?></span>
                        </div>
						<div class="projects-item-option">
							<p>法定代表人：</p>
							<span style="color: #333333;"><?=$detail['company']['legal_person']?></span>
						</div>
						<div class="projects-item-option">
							<p>注册资金：</p>
							<span style="color: #333333;"><?=$detail['company']['regist_money'] . '万元'?></span>
                        </div>
						<!--  -->
						<?php if (!empty($detail['company']['eng_cate_name'])): ?>
						<div class="projects-item-option">
						    <p>工程类资质及等级：</p>
						    <span style="color: #333333;"><?=$detail['company']['eng_cate_name'][0]?></span>
						</div>
						<?php endif;?>
						<?php if (!empty($detail['company']['goods_cate_name'])): ?>
						<div class="projects-item-option">
						    <p>货物类产销许可及内容：</p>
						    <span style="color: #333333;"><?=$detail['company']['goods_cate_name'][0]?></span>
						</div>
						<?php endif;?>
						<?php if (!empty($detail['company']['server_cate_name'])): ?>
						<div class="projects-item-option">
						    <p>服务类资格及等级：</p>
						    <span style="color: #333333;"><?=$detail['company']['server_cate_name'][0]?></span>
						</div>
						<?php endif;?>


						<!--  -->
                        <div class="projects-item-option">
                            <p>地址：</p>
                            <span style="color: #333333;"><?=$detail['company']['address']?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>电话：</p>
                            <span style="color: #333333;"><?=$detail['company']['company_tel']?></span>
                        </div>
                        <?php if (!empty($detail['company']['company_fax'])): ?>
                        <div class="projects-item-option">
                            <p>传真：</p>
                            <span style="color: #333333;"><?=$detail['company']['company_fax']?></span>
                        </div>
                        <?php endif;?>
                        <div class="projects-item-option">
                            <p>邮箱：</p>
                            <span style="color: #333333;"><?=$detail['company']['email']?></span>
                        </div>
                        <?php if (!empty($detail['company']['company_site'])): ?>
                        <div class="projects-item-option" style="margin-bottom:40px;">
                            <p>网址：</p>
                            <a href="<?=$detail['company']['company_site']?>" target="_blank" style="font-size: 18px;line-height:21px;"><?=$detail['company']['company_site']?></a>
                        </div>
                        <?php endif;?>


                    </div>
                </div>

                <strong style="margin-left:30px;margin-top:35px;">供应商简介</strong>

                <div class="detail-body">
                    <?=htmlspecialchars_decode($detail['company']['company_intro'])?>
                </div>

            </div>
            <?php else: ?>
                <div class="detail-container">
                <div class="users-detail-head">
                    <div class="users-detail-avatar">
                        <img src="<?=$detail['supplier']['id_photo_path']?>" style="object-fit:contain;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?=$detail['supplier']['sup_company_name']?></strong>

                        <div class="projects-item-option">
                            <p>社会统一信用代码：</p>
                            <span style="color: #333333;"><?=$detail['supplier']['sup_company_code']?></span>
                        </div>
						<div class="projects-item-option">
							<p>法定代表人：</p>
							<span style="color: #333333;"><?=$detail['supplier']['sup_legal_person']?></span>
						</div>
						<div class="projects-item-option">
							<p>注册资金：</p>
							<span style="color: #333333;"><?=$detail['supplier']['sup_regist_money'] . '万元'?></span>
                        </div>
						<!--  -->
						<?php if (!empty($detail['supplier']['sup_eng_cate_name'])): ?>
						<div class="projects-item-option">
						    <p>工程类资质及等级：</p>
						    <span style="color: #333333;"><?=$detail['supplier']['sup_eng_cate_name'][0]?></span>
						</div>
						<?php endif;?>
						<?php if (!empty($detail['supplier']['sup_goods_cate_name'])): ?>
						<div class="projects-item-option">
						    <p>货物类产销许可及内容：</p>
						    <span style="color: #333333;"><?=$detail['supplier']['sup_goods_cate_name'][0]?></span>
						</div>
						<?php endif;?>
						<?php if (!empty($detail['supplier']['sup_server_cate_name'])): ?>
						<div class="projects-item-option">
						    <p>服务类资格及等级：</p>
						    <span style="color: #333333;"><?=$detail['supplier']['sup_server_cate_name'][0]?></span>
						</div>
						<?php endif;?>


						<!--  -->
                        <div class="projects-item-option">
                            <p>地址：</p>
                            <span style="color: #333333;"><?=$detail['supplier']['sup_company_address']?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>电话：</p>
                            <span style="color: #333333;"><?=$detail['supplier']['sup_company_tel']?></span>
                        </div>
                        <?php if (!empty($detail['supplier']['sup_company_fax'])): ?>
                        <div class="projects-item-option">
                            <p>传真：</p>
                            <span style="color: #333333;"><?=$detail['supplier']['sup_company_fax']?></span>
                        </div>
                        <?php endif;?>
                        <div class="projects-item-option">
                            <p>邮箱：</p>
                            <span style="color: #333333;"><?=$detail['supplier']['sup_company_email']?></span>
                        </div>
                        <?php if (!empty($detail['supplier']['sup_company_site'])): ?>
                        <div class="projects-item-option" style="margin-bottom:40px;">
                            <p>网址：</p>
                            <a href="<?=$detail['supplier']['sup_company_site']?>" target="_blank" style="font-size: 18px;line-height:21px;"><?=$detail['supplier']['sup_company_site']?></a>
                        </div>
                        <?php endif;?>


                    </div>
                </div>

                <strong style="margin-left:30px;margin-top:35px;">供应商简介</strong>

                <div class="detail-body">
                    <?=htmlspecialchars_decode($detail['supplier']['sup_intro'])?>
                </div>

            </div>
            <?php endif;?>



        <?php elseif (!empty($detail['company'])): ?>
            <div class="detail-container">
                <div class="users-detail-head">
                    <div class="users-detail-avatar">
                        <img src="<?=$detail['company']['company_logo_path']?>" style="object-fit:contain;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?=$detail['company']['company_name']?></strong>
                        <p class="info-role-name"><?=$detail['company']['memberLevel']?></p>
                        <div class="projects-item-option">
                            <p>社会统一信用代码：</p>
                            <span style="color: #333333;"><?=$detail['company']['company_code']?></span>
                        </div>
                        <div class="projects-item-option">
						    <p>法定代表人：</p>
						    <span style="color: #333333;"><?=$detail['company']['legal_person']?></span>
                        </div>
                        <div class="projects-item-option">
						    <p>注册资金：</p>
						    <span style="color: #333333;"><?=$detail['company']['regist_money'] . '万元'?></span>
                        </div>
						<!--  -->
						<?php if (!empty($detail['company']['server_cate_name'])): ?>
						<div class="projects-item-option">
						    <p>资质资格资信专业及等级：</p>
						    <span style="color: #333333;"><?=$detail['company']['server_cate_name'][0]?></span>
						</div>
						<div class="projects-item-option">
						    <p>服务领域：</p>
						    <span style="color: #333333;"><?=$detail['company']['server_cate_name'][2]?></span>
						</div>
						<?php endif;?>


                        <div class="projects-item-option">
                            <p>地址：</p>
                            <span style="color: #333333;"><?=$detail['company']['address']?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>电话：</p>
                            <span style="color: #333333;"><?=$detail['company']['company_tel']?></span>
                        </div>
						<?php if (!empty($detail['company']['company_fax'])): ?>
                        <div class="projects-item-option">
                            <p>传真：</p>
                            <span style="color: #333333;"><?=$detail['company']['company_fax']?></span>
                        </div>
						<?php endif;?>
                        <div class="projects-item-option">
                            <p>邮箱：</p>
                            <span style="color: #333333;"><?=$detail['company']['email']?></span>
                        </div>
						<?php if (!empty($detail['company']['company_site'])): ?>
                        <div class="projects-item-option" style="margin-bottom:40px;">
                            <p>网址：</p>
                            <a href="<?=$detail['company']['company_site']?>" target="_blank" style="font-size: 18px;line-height:21px;"><?=$detail['company']['company_site']?></a>
                        </div>
						<?php endif;?>

                    </div>
                </div>


                <strong style="margin-left:30px;margin-top:35px;">单位简介</strong>

                <div class="detail-body">
                    <?=htmlspecialchars_decode($detail['company']['company_intro'])?>
                </div>

            </div>

        <?php elseif (!empty($detail['person'])): ?>
            <div class="detail-container">

                <div class="users-detail-head">
                    <div class="users-detail-avatar">
                        <img src="<?=$detail['person']['id_photo_path']?>" style="object-fit:contain;" alt="">
                    </div>
                    <div class="users-detail-info">
                        <div class="info-bonus"></div>
                        <strong><?=$detail['person']['name']?></strong>

						<p class="info-role-name"><?=!empty($detail['person']['memberLevel']) ? $detail['person']['memberLevel'] . '    ' . $detail['person']['expertLevel'] : $detail['person']['expertLevel']?></p>

                        <div class="projects-item-option">
                            <p>毕业院校：</p>
                            <span style="color: #333333;"><?=$detail['person']['education_school']?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>学历/学位：</p>
                            <span style="color: #333333;"><?=$detail['person']['education_degree'] . '/' . $detail['person']['education_degree_xw']?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>专业：</p>
                            <span style="color: #333333;"><?=$detail['person']['education_major']?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>所在单位：</p>
                            <span style="color: #333333;"><?=$detail['person']['belong_company']?></span>
                        </div>
                        <div class="projects-item-option">
                            <p>职务/职称：</p>
                            <span style="color: #333333;"><?=$detail['person']['job'] . ' | ' . $detail['person']['positio']?></span>
                        </div>
						<div class="projects-item-option" style="margin-bottom:40px;">
                            <p>职业资格：</p>
                            <span style="color: #333333;"><?=$detail['person']['pro_qualify']?></span>
                        </div>

                    </div>
                </div>


                <strong style="margin-left:30px;margin-top:35px;">个人简介</strong>

                <div class="detail-body">
                    <?=htmlspecialchars_decode($detail['person']['introduce'])?>
                </div>

            </div>
        <?php endif;?>
    </div>
</section>
