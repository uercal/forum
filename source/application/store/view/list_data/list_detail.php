<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf"><?= $model['name'] ?></div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-danger am-radius" href="<?= url('list_data/index&mode=') . $model['mode']['key_word'] ?>">
                                        <span class="am-icon-backward"></span> 返回
                                    </a>
                                </div>
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('list_data/detail_add&list_id=') . $model['id'] ?>">
                                        <span class="am-icon-plus"></span> 新增详情
                                    </a>
                                </div>
                                <?php if ($model['mode']['key_word'] == 'job') : ?>
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('list_data/job_sort&list_id=') . $model['id'] ?>">
                                            <span class="am-icon-folder"></span> 职位排序设置
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">

                        <?php if ($model['mode']['key_word'] == 'news') : ?>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                        tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>详情ID</th>
                                        <th>标题</th>
                                        <th>封面</th>
                                        <th>排序</th>
                                        <th>访问数</th>
                                        <th>添加时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle">
                                                    <?= $item['id'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <p class="item-title">
                                                        <?= $item['title'] ?>
                                                    </p>
                                                </td>
                                                <td class="am-text-middle">
                                                    <a href="<?= $item['cover']['file_path'] ?>" title="点击查看大图" target="_blank">
                                                        <img src="<?= $item['cover']['file_path'] ?>" width="72" height="72" alt="">
                                                    </a>
                                                </td>
                                                <td class="am-text-middle">
                                                    <?= $item['sort'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <?= $item['read_count'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <?= $item['create_time'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'list_data/detail_edit',
                                                                        ['id' => $item['id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?= $item['id'] ?>">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                else : ?>
                                        <tr>
                                            <td colspan="7" class="am-text-center">暂无记录</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>


                        <?php elseif ($model['mode']['key_word'] == 'job') : ?>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                        tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>详情ID</th>
                                        <th>姓名</th>
                                        <th>职位</th>
                                        <th>头像</th>
                                        <th>排序</th>
                                        <th>添加时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle">
                                                    <?= $item['id'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <p class="item-title">
                                                        <?= $item['title'] ?>
                                                    </p>
                                                </td>
                                                <td class="am-text-middle">
                                                    <p class="item-title">
                                                        <?= $item['job'] ?>
                                                    </p>
                                                </td>
                                                <td class="am-text-middle">
                                                    <a href="<?= $item['cover']['file_path'] ?>" title="点击查看大图" target="_blank">
                                                        <img src="<?= $item['cover']['file_path'] ?>" width="72" height="72" alt="">
                                                    </a>
                                                </td>
                                                <td class="am-text-middle">
                                                    <?= $item['sort'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <?= $item['create_time'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'list_data/detail_edit',
                                                                        ['id' => $item['id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?= $item['id'] ?>">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                else : ?>
                                        <tr>
                                            <td colspan="7" class="am-text-center">暂无记录</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>


                        <?php elseif ($model['mode']['key_word'] == 'mag') : ?>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                        tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>详情ID</th>
                                        <th>名称</th>
                                        <th>期数</th>
                                        <th>排序</th>
                                        <th>添加时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle">
                                                    <?= $item['id'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <p class="item-title">
                                                        <?= $item['title'] ?>
                                                    </p>
                                                </td>
                                                <td class="am-text-middle">
                                                    <p class="item-title">
                                                        <?= $item['mag_num'] ?>
                                                    </p>
                                                </td>
                                                <td class="am-text-middle">
                                                    <?= $item['sort'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <?= $item['create_time'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'list_data/detail_edit',
                                                                        ['id' => $item['id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?= $item['id'] ?>">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                else : ?>
                                        <tr>
                                            <td colspan="6" class="am-text-center">暂无记录</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        <?php elseif ($model['mode']['key_word'] == 'user_news') : ?>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                        tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>详情ID</th>
                                        <th>标题</th>                                        
                                        <th>排序</th>
                                        <th>添加时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle">
                                                    <?= $item['id'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <p class="item-title">
                                                        <?= $item['title'] ?>
                                                    </p>
                                                </td>                                                
                                                <td class="am-text-middle">
                                                    <?= $item['sort'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <?= $item['create_time'] ?>
                                                </td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'list_data/detail_edit',
                                                                        ['id' => $item['id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?= $item['id'] ?>">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                else : ?>
                                        <tr>
                                            <td colspan="5" class="am-text-center">暂无记录</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>


                        <?php endif; ?>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr">
                            <?= $list->render() ?>
                        </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：
                                <?= $list->total() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {

        // 删除元素
        var url = "<?= url('list_data/news_delete') ?>";
        $('.item-delete').delete('id', url);

    });
</script>