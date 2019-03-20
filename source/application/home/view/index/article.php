<div class="layout-container">
    <div class="breadcrumb-box">
        <div class="nav-parent">
            <div class="nav-parent-item">
                <?php if ($detail['pid'] == 0) : ?>
                <div class="nav-item-active nav-child-item" onclick="article(<?= $detail['id'] ?>)">
                    <?= $detail['name'] ?>
                </div>
                <?php else : ?>
                <?php foreach ($detail['parent']['child'] as $item) : ?>
                <div class="<?= $detail['id'] == $item['id'] ? 'nav-item-active' : 'nav-item' ?> nav-child-item" onclick="article(<?= $item['id'] ?>)">
                    <?= $item['name'] ?>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div style="cursor: pointer;" onclick="home()">
                <span class="am-icon-home am-icon-md"></span>
                首页
            </div>
        </div>
    </div>

    <!-- media -->
    <div class="breadcrumb-box-media">
        <div class="am-container">
            <ol class="am-breadcrumb">
                <li><a href="<?= url('/index') ?>" style="color:#000;">首页</a></li>
                <!-- <li class="am-active">客户案例</li> -->
                <?php if ($detail['pid'] == 0) : ?>
                <li class="am-active" onclick="article(<?= $detail['id'] ?>)">
                    <?= $detail['name'] ?>
                </li>
                <?php else : ?>
                <li class="am-active">
                    <?= $detail['parent']['name'] ?>
                </li>
                <?php foreach ($detail['parent']['child'] as $item) : if ($item['id'] == $detail['id']) : ?>
                <li class="am-active" onclick="article(<?= $item['id'] ?>)">
                    <?= $item['name'] ?>
                </li>
                <?php endif;
        endforeach; ?>
                <?php endif; ?>
            </ol>
        </div>
    </div>
</div>

<div class="section">
    <?php if ($detail['type'] == 1) : ?>
    <div class="container">
        <div class="art1-container">
            {{:htmlspecialchars_decode($detail['content'])}}
        </div>
    </div>
    <?php endif; ?>


    <!-- 图册 -->
    <?php if ($detail['type'] == 2) : ?>
    <div class="container">
        <?php if (!empty($list)) : ?>
        <div class="art2-container">
            <?php foreach ($list as $item) : ?>
            <div class="img9-item" onclick="project(<?= isset($item['project_id']) ? $item['project_id'] : 0 ?>)">
                <div class="img9-div">
                    <img class="in" src="<?= $item['file_path'] ?>">
                    <div class="img9-attr">
                        <p>
                            <?= $item['title'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="art2-foot">
            <?= $list->render() ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>


    <!-- 新闻列表 -->
    <?php if ($detail['type'] == 3) : ?>
    <div class="container">
        <div class="art3-container">
            <?php foreach ($list as $k => $new) : ?>
            <div class="new3-item <?= ($k % 2) == 1 ? 'rever' : '' ?>" onclick="news(<?= $new['id'] ?>)">
                <div class="new3-div">
                    <img src="<?= $new['cover']['file_path'] ?>">
                    <div class="news3-cover">
                        <p class="news3-coverp">查看详情</p>
                    </div>
                </div>
                <div class="new3-txt">
                    <div class="new3-title">
                        <p>
                            <?= $new['title'] ?>
                        </p>
                    </div>
                    <div class="new3-content">
                        <p>
                            <?= checkCN($new['content']) ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="art2-foot">
            <?= $list->render() ?>
        </div>
    </div>
    <?php endif; ?>




    <!-- 左图右文 -->
    <?php if ($detail['type'] == 4) : ?>
    <div class="container">
        <div class="art4-container">
            <div class="left-pic">
                <img src="<?= $detail['image'][0]['src'] ?>">
            </div>
            <div class="right-text">
                <img class="r-logo" src="assets/home/images/logo.png">
                <div class="r-content">
                    {{:htmlspecialchars_decode($detail['content'])}}
                </div>

            </div>
        </div>


    </div>
    <?php endif; ?>
</div> 