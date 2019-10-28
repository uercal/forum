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
				<!--  -->			
				<?php if (!empty($detail['company']['eng_cate_name'])):?>
				<div class="projects-item-option">
				    <p>工程类资质及等级：</p>
				    <span style="color: #333333;"><?= $detail['company']['eng_cate_name'][0] ?></span>
				</div>
				<?php endif;?>
				<?php if (!empty($detail['company']['goods_cate_name'])):?>
				<div class="projects-item-option">
				    <p>货物类产销许可及内容：</p>
				    <span style="color: #333333;"><?= $detail['company']['goods_cate_name'][0] ?></span>
				</div>
				<?php endif;?>
				<?php if (!empty($detail['company']['server_cate_name'])):?>
				<div class="projects-item-option">
				    <p>服务类资格及等级：</p>
				    <span style="color: #333333;"><?= $detail['company']['server_cate_name'][0] ?></span>
				</div>
				<div class="projects-item-option">
				   <p>服务领域：</p>
				   <span style="color: #333333;"><?= $detail['company']['server_cate_name'][2] ?></span>
				</div>
				<?php endif;?>


				<div class="projects-item-option">
				   <p>地址：</p>
				   <span style="color: #333333;"><?= $detail['company']['address'] ?></span>
				</div>
				<div class="projects-item-option">
				   <p>电话：</p>
				   <span style="color: #333333;"><?= $detail['company']['company_tel'] ?></span>
				</div>
				<?php if (!empty($detail['company']['company_fax'])):?>
				<div class="projects-item-option">
				   <p>传真：</p>
				   <span style="color: #333333;"><?= $detail['company']['company_fax'] ?></span>
				</div>
				<?php endif;?>
				<div class="projects-item-option">
				   <p>邮箱：</p>
				   <span style="color: #333333;"><?= $detail['company']['email'] ?></span>
				</div>
				<?php if (!empty($detail['company']['company_site'])):?>
				<div class="projects-item-option" style="margin-bottom:40px;">
				   <p>网址：</p>
				   <a href="<?= $detail['company']['company_site'] ?>" target="_blank" style="font-size: 18px;;"><?= $detail['company']['company_site'] ?></a>
				</div>		
				<?php endif;?>
                </div>
            </div>


            <strong style="margin-left:30px;margin-top:35px;">单位简介</strong>

            <div class="detail-body" style="font-size:20px;line-height: 26px;">
                <?= htmlspecialchars_decode($detail['company']['company_intro']) ?>
            </div>

        </div>
    </div>

</section>
