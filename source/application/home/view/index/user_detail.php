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
            
            <div class="users-detail-head">
                <div class="users-detail-avatar">
                    <img src="<?= $detail['avatar']['file_path'] ?>" alt="">
                </div>
                <div class="users-detail-info">
                    <div class="info-bonus"></div>
                    <strong></strong>
                    <p></p>

                    <div class="users-detail-option">
                        <p></p>
                        <span></span>
                    </div>










                </div>
            </div>





            <div class="detail-body">
               
            </div>









        </div>
    </div>


</section>