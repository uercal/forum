<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf"><?= $name ?>列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">

                        <?php if ($role == 0) : ?>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                                                                     tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>会员ID</th>
                                        <th>用户名</th>
                                        <th>用户头像</th>
                                        <th>角色</th>
                                        <th>注册时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle"><?= $item['user_id'] ?></td>
                                                <td class="am-text-middle"><?= $item['user_name'] ?></td>
                                                <td class="am-text-middle">
                                                    <a href="<?= $item['avatar_path'] ?>" title="点击查看大图" target="_blank">
                                                        <img src="<?= $item['avatar_path'] ?>" width="72" height="72" alt="">
                                                    </a>
                                                </td>
                                                <td class="am-text-middle"><?= $item['role_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'user/show',
                                                                        ['user_id' => $item['user_id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 角色详情
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
                        <?php elseif ($role == 1) : ?>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('user/exportList') ?>&role=1">
                                                <span class="am-icon-plus"></span> 导出列表
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                                                                     tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>会员ID</th>
                                        <th>用户名</th>
                                        <th>角色</th>
                                        <th>个人姓名</th>
                                        <th>性别</th>
                                        <th>手机号码</th>
                                        <th>个人邮箱</th>
                                        <th>申请时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle"><?= $item['user_id'] ?></td>
                                                <td class="am-text-middle"><?= $item['user_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['role_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['name'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['gender_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['phone'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['email'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['create_time'] ?></td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'user/show',
                                                                        ['user_id' => $item['user_id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 角色详情
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
                        <?php elseif ($role == 2) : ?>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('user/exportList') ?>&role=2">
                                                <span class="am-icon-plus"></span> 导出列表
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                                                                     tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>会员ID</th>
                                        <th>用户名</th>
                                        <th>角色</th>
                                        <th>个人姓名</th>
                                        <th>性别</th>
                                        <th>手机号码</th>
                                        <th>个人邮箱</th>
                                        <th>申请时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle"><?= $item['user_id'] ?></td>
                                                <td class="am-text-middle"><?= $item['user_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['role_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['name'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['gender_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['phone'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['email'] ?></td>
                                                <td class="am-text-middle"><?= $item['person']['create_time'] ?></td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'user/show',
                                                                        ['user_id' => $item['user_id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 角色详情
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
                        <?php elseif ($role == 4) : ?>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('user/exportList') ?>&role=4">
                                                <span class="am-icon-plus"></span> 导出列表
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                                                                 tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>会员ID</th>
                                        <th>用户名</th>
                                        <th>角色</th>
                                        <th>供应商单位名称</th>
                                        <th>供应商单位电话</th>
                                        <th>供应商单位邮箱</th>
                                        <th>供应商联系人</th>
                                        <th>供应商联系人电话</th>
                                        <th>申请时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle"><?= $item['user_id'] ?></td>
                                                <td class="am-text-middle"><?= $item['user_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['role_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['supplier']['sup_company_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['supplier']['sup_company_tel'] ?></td>
                                                <td class="am-text-middle"><?= $item['supplier']['sup_company_email'] ?></td>
                                                <td class="am-text-middle"><?= $item['supplier']['sup_manager_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['supplier']['sup_manager_phone'] ?></td>
                                                <td class="am-text-middle"><?= $item['supplier']['create_time'] ?></td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'user/show',
                                                                        ['user_id' => $item['user_id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 角色详情
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

                        <?php elseif ($role == 3) : ?>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('user/exportList') ?>&role=3">
                                                <span class="am-icon-plus"></span> 导出列表
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table width="100%" class="am-table am-table-compact am-table-striped
                                                                                 tpl-table-black am-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>会员ID</th>
                                        <th>用户名</th>
                                        <th>角色</th>
                                        <th>单位名称</th>
                                        <th>单位电话</th>
                                        <th>单位邮箱</th>
                                        <th>管理人姓名</th>
                                        <th>管理人电话</th>
                                        <th>申请时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                            <tr>
                                                <td class="am-text-middle"><?= $item['user_id'] ?></td>
                                                <td class="am-text-middle"><?= $item['user_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['role_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['company']['company_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['company']['company_tel'] ?></td>
                                                <td class="am-text-middle"><?= $item['company']['email'] ?></td>
                                                <td class="am-text-middle"><?= $item['company']['manager_name'] ?></td>
                                                <td class="am-text-middle"><?= $item['company']['manager_phone'] ?></td>
                                                <td class="am-text-middle"><?= $item['company']['create_time'] ?></td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?= url(
                                                                        'user/show',
                                                                        ['user_id' => $item['user_id']]
                                                                    ) ?>">
                                                            <i class="am-icon-pencil"></i> 角色详情
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
                        <?php endif; ?>

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

    });
</script>