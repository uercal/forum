<section class="index3-section">
    <div class='index3-container'>
        <?php if (isset($index_data['nav'])) : ?>
        <?php foreach ($index_data['nav']['data'] as $nav) : ?>
        <div class="index3-item" style="background: url('<?= $nav['imgUrl'] ?>');" onclick="article(<?= $nav['artId'] ?>)">
            <div class="index3-bg" style="background: rgba(<?= $nav['coverColorRgb'] ?>,<?= $nav['opacity'] ?>);">
                <div class="index3-text">
                    <p class="index3-title"><?= $nav['title'] ?></p>
                    <p class="index3-en"><?= $nav['en'] ?></p>
                </div>
            </div>
        </div>
        <?php endforeach;
endif; ?>
    </div>
</section>



<div class="project-section">
    <div class="pro-title">
        <p class="pro-text">项目介绍</p>
        <p class="pro-en">PROJECT INTRODUCTION</p>
    </div>
    <div class="pro-pic">
        <?php if (isset($index_data['projects'])) : foreach ($index_data['projects']['data'] as $pro) : ?>
        <div class="pro-pic-item" onclick="project(<?= isset($pro['project_id']) ? $pro['project_id'] : 0 ?>)">
            <img src="<?= $pro['imgUrl'] ?>">
            <div class="pro-pic-text">
                <p><?= $pro['content'] ?></p>
            </div>
        </div>
        <?php endforeach;
endif; ?>
    </div>
</div>

<div class="project-section bg-w" style="margin-bottom:60px;">
    <div class="pro-title">
        <p class="pro-text">新闻动态</p>
        <p class="pro-en">NEWS INFORMATION</p>
    </div>
    <div class="news-pic">
        <?php if (isset($index_data['news'])) : foreach ($index_data['news']['data'] as $new) : ?>
        <div class="news-pic-item" onclick="news(<?= $new['newId'] ?>)">
            <img src="<?= $new['imgUrl'] ?>">
            <div class="news-pic-text">
                <p class="news-pic-title"><?= $new['title'] ?></p>
                <p class="new-pic-con"><?= $new['content'] ?></p>
            </div>
        </div>
        <?php endforeach;
endif; ?>
    </div>
</div> 