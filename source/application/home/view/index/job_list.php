<section style="display:flex;align-items:center;justify-content:center;flex-direction:column;background:#FAFAFA;" id="app">
    <div class="common-nav">
        <div class="nav-info">
            <a href="/"><span class="am-icon-home"></span></a>
            <p class="arrow"></p>            
            <p class="current"><?=$list['name']?></p>
        </div>
    </div>

        <div class="list-body">
            <div class="list-head">
                <div class="list-head-title">
                    <div class="list-head-before"></div>
                    <strong><?=$list['name']?></strong>
                </div>
            </div>

            <?php foreach ($data as $cate): ?>
                <div class="job-list-item">
                    <div class="job-list-head">
                        <?php if (empty($cate['content'])): ?>
                            <p><?=$cate['name']?></p>
                        <?php else: ?>
                            <p style="cursor:pointer;" onclick="job_sort('<?=$cate['content']?>')"><?=$cate['name']?></p>
                        <?php endif;?>
                    </div>
                    <div class="job-list-info">
                        <?php foreach ($cate['data'] as $member): ?>
                            <div class="job-list-info-item" onclick="job_sort('<?=$member['content']?>')">
                                <img src="<?=!empty($member['cover']) ? $member['cover']['file_path'] : '/assets/home/images/o_avatar.png'?>" alt="">
                                <a><?=$member['title']?></a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endforeach;?>

            <hr>
            <div class="job-list-item">
                <div class="pre-divider"></div>
                <strong style="margin-left:28px;margin-top:20px;"><?=$pre_name?></strong>
                <div class="job-list-info" style="flex-direction:column;">
                    <?php foreach ($pre_lists as $pre): ?>
                        <div class="pre-item" onclick="jobList(<?=$pre['id']?>)">
                            <p><?=$pre['name']?></p>
                            <a>查看详情<i class="am-icon-angle-double-right"></i></a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>


        </div>
        <style>
            .yourclass>.layui-layer-content {
                padding: 30px;
            }
        </style>
        <script>
            function job_sort(content) {
                //页面层-自定义
                layer.open({
                    type: 1,
                    title: '详情',
                    area: ['55%', '70%'],
                    closeBtn: 0,
                    shadeClose: true,
                    skin: 'yourclass',
                    content: content
                });

            }
        </script>
</section>