<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">审核列表</div>
                </div>
                <div class="widget-body am-fr" style="display: flex;justify-content: flex-end;flex-direction: row;flex-wrap: wrap;">
                    <!-- 搜索栏 -->
                    <form method="GET" action="" id="form">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                    <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                        <span class="am-icon-pencil"></span> 审核类型
                                    </a>
                                    <select name="type" class="am-field-valid" id="type" style="font-size:12px;" data-am-selected="{btnSize: 'sm',  placeholder:'请选择审核类型'}">
                                        <option value="10" <?php if (isset($map['type']) && $map['type'] == 10) : ?> selected <?php endif; ?>>用户升级</option>
                                        <option value="20" <?php if (isset($map['type']) && $map['type'] == 20) : ?> selected <?php endif; ?>>论文提交</option>
                                        <option value="30" <?php if (isset($map['type']) && $map['type'] == 30) : ?> selected <?php endif; ?>>线下提现</option>
                                    </select>
                                </div>
                                <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                    <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                        <span class="am-icon-pencil"></span> 状态
                                    </a>
                                    <select name="status" id="status" style="font-size:12px;" class="am-field-valid" data-am-selected="{btnSize: 'sm', placeholder:'请选择状态'}">
                                        <!-- <option value=""></option>                                                               -->
                                        <option value="0" <?php if (!isset($map['status'])) : ?> selected <?php endif; ?>>所有</option>
                                        <option value="10" <?php if (isset($map['status']) && $map['status'] == 10) : ?> selected <?php endif; ?>>审核中</option>
                                        <option value="20" <?php if (isset($map['status']) && $map['status'] == 20) : ?> selected <?php endif; ?>>已通过</option>
                                        <option value="30" <?php if (isset($map['status']) && $map['status'] == 30) : ?> selected <?php endif; ?>>已驳回</option>
                                    </select>
                                </div>
                                <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                    <a class="am-btn am-btn-default am-radius" href="javascript:;">
                                        <span class="am-icon-home"></span> 用户id
                                    </a>
                                    <input type="text" class="am-form-field" name="user_id" style="padding: 3px 5px;" placeholder="用户id" value="<?= isset($map['user_id']) ? $map['user_id'] : "" ?>">
                                </div>



                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" id="search" href="javascript:;">
                                        <span class="am-icon-search"></span> 搜索
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <!--  -->
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                                <tr>
                                    <th>审核ID</th>
                                    <th>用户ID</th>
                                    <th>用户名</th>
                                    <th>审核类型</th>
                                    <th><?= $map['type'] == 10 ? '升级类型' : ($map['type'] == 20 ? '提交类型' : '') ?></th>
                                    <th>提交文件</th>
                                    <th>状态</th>
                                    <th>更新时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                        <tr>
                                            <td class="am-text-middle"><?= $item['id'] ?></td>
                                            <td class="am-text-middle"><?= $item['user']['user_id'] ?></td>
                                            <td class="am-text-middle"><?= $item['user']['user_name'] ?></td>
                                            <td class="am-text-middle"><?= $item['type_text'] ?></td>
                                            <td class="am-text-middle"><?= $item['type_bonus_text'] ?></td>
                                            <td class="am-text-middle">
                                                <button class="am-btn am-btn-sm am-btn-secondary" onclick="detail(<?= $item['id'] ?>)">查看并审核</button>
                                            </td>
                                            <td class="am-text-middle
                                            <?php if ($item['status'] == 10) : ?>am-warning 
                                            <?php elseif ($item['status'] == 20) : ?>am-success 
                                            <?php else : ?>am-danger 
                                            <?php endif; ?> 
                                            "><?= $item['status_text'] ?></td>
                                            <td class="am-text-middle"><?= $item['update_time'] ?></td>
                                        </tr>
                                    <?php endforeach;
                            else : ?>
                                    <tr>
                                        <td colspan="6" class="am-text-center">暂无记录</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?= $list->render() ?> </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：<?= $list->total() ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(function() {
        var $modal = $('#your-modal');
        $('#status').on('change', function() {
            var url = "<?php echo url('exam/index') ?>";
            var param = $('#form').serialize();
            var html = url + '&' + param;
            window.location.href = html;
        });
        $('#type').on('change', function() {
            var url = "<?php echo url('exam/index') ?>";
            var param = $('#form').serialize();
            var html = url + '&' + param;
            window.location.href = html;
        });
    });
</script>
<script>
    function detail(id) {
        window.location.href = "<?= url('exam/detail') ?>&id=" + id;
    }
</script>