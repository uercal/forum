<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">用户列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                                <tr>
                                    <th>会员ID</th>
                                    <th>用户名</th>
                                    <th>用户头像</th>
                                    <th>角色</th>
                                    <th>资质证书</th>
                                    <th>注册时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
																													                                        <tr>
																													                                            <td class="am-text-middle"><?=$item['user_id']?></td>
																													                                            <td class="am-text-middle"><?=$item['user_name']?></td>
																													                                            <td class="am-text-middle">
																													                                                <a href="<?=$item['avatar_path']?>" title="点击查看大图" target="_blank">
																													                                                    <img src="<?=$item['avatar_path']?>" width="72" height="72" alt="">
																													                                                </a>
																													                                            </td>
																													                                            <td class="am-text-middle"><?=$item['role_name']?></td>
																													                                            <td class="am-text-middle">
																													                                                <div class="tpl-table-black-operation">
																													                                                    <?php if (empty($item['attachment'])): ?>
																													                                                        <a href="javascript:;" data-id="<?=$item['user_id']?>" class="upload-attachment">
																													                                                            <i class="am-icon-file"></i> 上传
																													                                                        </a>
																													                                                    <?php else: ?>
                                                        <a href="<?=$item['attachment']['file_path']?>" class="item-green tpl-table-black-operation-green">
                                                            <i class="am-icon-file"></i> 查看
                                                        </a>
                                                        <a href="javascript:;" class="item-delete-attach tpl-table-black-operation-del" data-id="<?=$item['user_id']?>">
                                                            <i class="am-icon-file"></i> 删除
                                                        </a>
                                                    </div>
                                                <?php endif;?>
                                            </td>
                                            <td class="am-text-middle"><?=$item['create_time']?></td>
                                            <td class="am-text-middle">
                                                <div class="tpl-table-black-operation">
                                                    <a href="<?=url(
    'user/show',
    ['user_id' => $item['user_id']]
)?>">
                                                        <i class="am-icon-pencil"></i> 角色详情
                                                    </a>
                                                    <a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?=$item['user_id']?>">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                    <a href="javascript:;" class="item-repass tpl-table-black-operation-primary" data-id="<?=$item['user_id']?>">
                                                        <i class="am-icon-book"></i> 重置密码
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;
else: ?>
                                    <tr>
                                        <td colspan="5" class="am-text-center">暂无记录</td>
                                    </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?=$list->render()?> </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：<?=$list->total()?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">确认</div>
    <div class="am-modal-bd">
      将重置密码为123456
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>

<!-- 图片文件列表模板 -->
{{include file="layouts/_template/tpl_file_item" /}}

<!-- 文件库弹窗 -->
{{include file="layouts/_template/file_library" /}}
<script src="assets/store/js/ddsort.js"></script>
<script src="assets/store/js/file.library.js"></script>
<script>
    $(function() {
        // 删除元素
        var url = "<?=url('user/delete')?>";
        $('.item-delete').delete('id', url);


        $('.item-delete-attach').delete('id',"<?=url('deleteAttach')?>");


        //
        $('.upload-attachment').each(function(e, v) {
            $(this).selectAttachment({
                multiple: false
            }, $(this).attr('data-id'), function(user_id, file_id) {
                uploadAttachementUser(user_id, file_id);
            });
        });


        function uploadAttachementUser(user_id, file_id) {
            $.post('<?=url('uploadAttachment')?>', {
                user_id: user_id,
                file_id: file_id
            }, function(res) {
                layer.msg(res.msg);
                if (res.code == 1) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                } else {

                }
            })
        }



        $('.item-repass').on('click', function() {
            var user_id = $(this).data('id');
            $('#my-confirm').modal({
            relatedElement: this,
            onConfirm: function() {
                $.post('<?=url('resetPass')?>', {
                user_id: user_id
                }, function(res) {
                    layer.msg(res.msg);
                    if (res.code == 1) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    } else {

                    }
                })
            },
            onCancel: function() {

            }
            });
        });
    });
</script>