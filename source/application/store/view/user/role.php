<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf"><?= $name ?>列表</div>
                </div>               
                <?php if ($role == 0) : ?>
                <div class="widget-body am-fr">
                    <!-- 搜索栏 -->
                    <form method="GET" action="" id="form">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">                                                
                                <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                    <a type="button" class="am-btn am-btn-default am-btn-primary am-margin-right">用户ID</a>
                                    <input type="text" class="am-form-field" style="padding: 3px 5px;" name="user_id" value="<?= input('user_id') ? input('user_id') : "" ?>">                                    
                                    <input type="hidden" name="role" value="<?= $role ?>">
                                </div>
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" id="search" href="javascript:;">
                                        <span class="am-icon-search"></span> 搜索
                                    </a>
                                </div>                                
                            </div>
                        </div>
                    </form>
                    <div class="am-scrollable-horizontal am-u-sm-12">
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
													<a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?=$item['user_id']?>">
													    <i class="am-icon-file"></i> 删除
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
                    <div class="am-scrollable-horizontal am-u-sm-12" style="min-height:400px;">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12" style="display:flex;justify-content:space-between;">
                        <form method="GET" action="" id="form">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">                                                                                    
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                            <span class="am-icon-phone"></span> 会员等级
                                        </a>
                                        <select name="memberLevel" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'200px', btnSize: 'xs'}">
                                            <option value="0">不限</option>                                            
                                            <?php foreach ($levelPersonOptions as $key => $item) : ?>
                                                <option value="<?= $item ?>" <?php if (input('memberLevel') && input('memberLevel') == $item) : ?> selected <?php endif; ?>><?= $item ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                            <span class="am-icon-phone"></span> 专家等级
                                        </a>
                                        <select name="expertLevel" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'200px', btnSize: 'xs'}">
                                            <option value="0">不限</option>                                            
                                            <?php foreach ($expertLevelOptions as $key => $item) : ?>
                                                <option value="<?= $item ?>" <?php if (input('expertLevel') && input('expertLevel') == $item) : ?> selected <?php endif; ?>><?= $item ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                            <span class="am-icon-phone"></span> 资质证书
                                        </a>
                                        <select name="attachment" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'200px', btnSize: 'xs'}">
                                            <option value="0">不限</option>                                            
                                            <option value="1" <?= input('attachment')==1?'selected':'' ?>>有</option>
                                            <option value="2" <?= input('attachment')==2?'selected':'' ?>>无</option>
                                        </select>
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a type="button" class="am-btn am-btn-default am-btn-primary am-margin-right">用户ID</a>
                                        <input type="text" class="am-form-field" style="padding: 3px 5px;" name="user_id" value="<?= input('user_id') ? input('user_id') : "" ?>">                                    
                                        <input type="hidden" name="role" value="<?= $role ?>">
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-success am-radius" id="search" href="javascript:;">
                                            <span class="am-icon-search"></span> 搜索
                                        </a>
                                    </div>                                
                                </div>
                            </div>
                        </form>
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-primary am-radius" href="<?= url('user/exportList') ?>&role=1">
                                        <span class="am-icon-plus"></span> 导出列表
                                    </a>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black am-text-nowrap">
                        <thead>
                            <tr>
                                <th>会员ID</th>
                                <th>用户名</th>
                                <th>会员等级</th>
                                <th>专家等级</th>
                                <th>资质证书</th>
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
                                    <td class="am-text-middle"><?= $item['user']['user_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['memberLevel'] ?></td>
                                    <td class="am-text-middle"><?= $item['expertLevel'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                        <?php if (empty($item['user']['attachment'])): ?>
                                            <a href="javascript:;" data-id="<?=$item['user']['user_id']?>" class="upload-attachment">
                                                <i class="am-icon-file"></i> 上传
                                            </a>
                                        <?php else: ?>
                                            <a href="<?=$item['user']['attachment']['file_path']?>" class="item-green tpl-table-black-operation-green">
                                                <i class="am-icon-file"></i> 查看
                                            </a>
                                            <a href="javascript:;" class="item-delete-attach tpl-table-black-operation-del" data-id="<?=$item['user']['user_id']?>">
                                                <i class="am-icon-file"></i> 删除
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </td>
                                    <td class="am-text-middle"><?= $item['name'] ?></td>
                                    <td class="am-text-middle"><?= $item['gender_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['phone'] ?></td>
                                    <td class="am-text-middle"><?= $item['email'] ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url(
                                                            'user/show',
                                                            ['user_id' => $item['user_id']]
                                                        ) ?>">
                                                <i class="am-icon-pencil"></i> 角色详情
                                            </a>
											<a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?=$item['user_id']?>">
											    <i class="am-icon-file"></i> 删除
											</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else : ?>
                                <tr>
                                    <td colspan="10" class="am-text-center">暂无记录</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php elseif ($role == 2) : ?>
                    <div class="am-scrollable-horizontal am-u-sm-12" style="min-height:400px;">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12" style="display:flex;justify-content:space-between;">
                        <form method="GET" action="" id="form">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">                                                                                                                        
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                            <span class="am-icon-phone"></span> 专家等级
                                        </a>
                                        <select name="expertLevel" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'200px', btnSize: 'xs'}">
                                            <option value="0">不限</option>                                            
                                            <?php foreach ($expertLevelOptions as $key => $item) : ?>
                                                <option value="<?= $item ?>" <?php if (input('expertLevel') && input('expertLevel') == $item) : ?> selected <?php endif; ?>><?= $item ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                            <span class="am-icon-phone"></span> 资质证书
                                        </a>
                                        <select name="attachment" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'200px', btnSize: 'xs'}">
                                            <option value="0">不限</option>                                            
                                            <option value="1" <?= input('attachment')==1?'selected':'' ?>>有</option>
                                            <option value="2" <?= input('attachment')==2?'selected':'' ?>>无</option>
                                        </select>
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a type="button" class="am-btn am-btn-default am-btn-primary am-margin-right">用户ID</a>
                                        <input type="text" class="am-form-field" style="padding: 3px 5px;" name="user_id" value="<?= input('user_id') ? input('user_id') : "" ?>">                                    
                                        <input type="hidden" name="role" value="<?= $role ?>">
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-success am-radius" id="search" href="javascript:;">
                                            <span class="am-icon-search"></span> 搜索
                                        </a>
                                    </div>                                
                                </div>
                            </div>
                        </form>
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-primary am-radius" href="<?= url('user/exportList') ?>&role=2">
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
                                <th>专家等级</th>
                                <th>资质证书</th>
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
                                    <td class="am-text-middle"><?= $item['user']['user_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['expertLevel'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                        <?php if (empty($item['user']['attachment'])): ?>
                                            <a href="javascript:;" data-id="<?=$item['user']['user_id']?>" class="upload-attachment">
                                                <i class="am-icon-file"></i> 上传
                                            </a>
                                        <?php else: ?>
                                            <a href="<?=$item['user']['attachment']['file_path']?>" class="item-green tpl-table-black-operation-green">
                                                <i class="am-icon-file"></i> 查看
                                            </a>
                                            <a href="javascript:;" class="item-delete-attach tpl-table-black-operation-del" data-id="<?=$item['user']['user_id']?>">
                                                <i class="am-icon-file"></i> 删除
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </td>
                                    <td class="am-text-middle"><?= $item['name'] ?></td>
                                    <td class="am-text-middle"><?= $item['gender_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['phone'] ?></td>
                                    <td class="am-text-middle"><?= $item['email'] ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url(
                                                            'user/show',
                                                            ['user_id' => $item['user_id']]
                                                        ) ?>">
                                                <i class="am-icon-pencil"></i> 角色详情
                                            </a>
											<a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?=$item['user_id']?>">
											    <i class="am-icon-file"></i> 删除
											</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;
                        else : ?>
                                <tr>
                                    <td colspan="10" class="am-text-center">暂无记录</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php elseif ($role == 4) : ?>
                <div class="am-scrollable-horizontal am-u-sm-12" style="min-height:400px;">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12" style="display:flex;justify-content:space-between;">
                        <form method="GET" action="" id="form">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">                                                                                                                                                            
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                            <span class="am-icon-phone"></span> 资质证书
                                        </a>
                                        <select name="attachment" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'200px', btnSize: 'xs'}">
                                            <option value="0">不限</option>                                            
                                            <option value="1" <?= input('attachment')==1?'selected':'' ?>>有</option>
                                            <option value="2" <?= input('attachment')==2?'selected':'' ?>>无</option>
                                        </select>
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a type="button" class="am-btn am-btn-default am-btn-primary am-margin-right">用户ID</a>
                                        <input type="text" class="am-form-field" style="padding: 3px 5px;" name="user_id" value="<?= input('user_id') ? input('user_id') : "" ?>">                                    
                                        <input type="hidden" name="role" value="<?= $role ?>">
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-success am-radius" id="search" href="javascript:;">
                                            <span class="am-icon-search"></span> 搜索
                                        </a>
                                    </div>                                
                                </div>
                            </div>
                        </form>
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-primary am-radius" href="<?= url('user/exportList') ?>&role=4">
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
                                <th>资质证书</th>
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
                                        <td class="am-text-middle"><?= $item['user']['user_name'] ?></td>
                                        <td class="am-text-middle"><?= $item['user']['role_name'] ?></td>
                                        <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                            <?php if (empty($item['user']['attachment'])): ?>
                                                <a href="javascript:;" data-id="<?=$item['user']['user_id']?>" class="upload-attachment">
                                                    <i class="am-icon-file"></i> 上传
                                                </a>
                                            <?php else: ?>
                                                <a href="<?=$item['user']['attachment']['file_path']?>" class="item-green tpl-table-black-operation-green">
                                                    <i class="am-icon-file"></i> 查看
                                                </a>
                                                <a href="javascript:;" class="item-delete-attach tpl-table-black-operation-del" data-id="<?=$item['user']['user_id']?>">
                                                    <i class="am-icon-file"></i> 删除
                                                </a>
                                            </div>
                                            <?php endif;?>
                                        </td>
                                        <td class="am-text-middle"><?= $item['sup_company_name'] ?></td>
                                        <td class="am-text-middle"><?= $item['sup_company_tel'] ?></td>
                                        <td class="am-text-middle"><?= $item['sup_company_email'] ?></td>
                                        <td class="am-text-middle"><?= $item['sup_manager_name'] ?></td>
                                        <td class="am-text-middle"><?= $item['sup_manager_phone'] ?></td>
                                        <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="<?= url(
                                                                'user/show',
                                                                ['user_id' => $item['user_id']]
                                                            ) ?>">
                                                    <i class="am-icon-pencil"></i> 角色详情
                                                </a>
												<a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?=$item['user_id']?>">
												    <i class="am-icon-file"></i> 删除
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
                    <div class="am-scrollable-horizontal am-u-sm-12" style="min-height:400px;">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12" style="display:flex;justify-content:space-between;">
                        <form method="GET" action="" id="form">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">                                                                                                                        
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                            <span class="am-icon-phone"></span> 会员等级
                                        </a>
                                        <select name="memberLevel" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'200px', btnSize: 'xs'}">
                                            <option value="0">不限</option>                                            
                                            <?php foreach ($levelOptions as $key => $item) : ?>
                                                <option value="<?= $item ?>" <?php if (input('memberLevel') && input('memberLevel') == $item) : ?> selected <?php endif; ?>><?= $item ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                            <span class="am-icon-phone"></span> 资质证书
                                        </a>
                                        <select name="attachment" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'200px', btnSize: 'xs'}">
                                            <option value="0">不限</option>                                            
                                            <option value="1" <?= input('attachment')==1?'selected':'' ?>>有</option>
                                            <option value="2" <?= input('attachment')==2?'selected':'' ?>>无</option>
                                        </select>
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                        <a type="button" class="am-btn am-btn-default am-btn-primary am-margin-right">用户ID</a>
                                        <input type="text" class="am-form-field" style="padding: 3px 5px;" name="user_id" value="<?= input('user_id') ? input('user_id') : "" ?>">                                    
                                        <input type="hidden" name="role" value="<?= $role ?>">
                                    </div>
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-success am-radius" id="search" href="javascript:;">
                                            <span class="am-icon-search"></span> 搜索
                                        </a>
                                    </div>                                
                                </div>
                            </div>
                        </form>
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-primary am-radius" href="<?= url('user/exportList') ?>&role=3">
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
                                <th>会员等级</th>
                                <th>资质证书</th>
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
                                    <td class="am-text-middle"><?= $item['user']['user_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['memberLevel'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                        <?php if (empty($item['user']['attachment'])): ?>
                                            <a href="javascript:;" data-id="<?=$item['user']['user_id']?>" class="upload-attachment">
                                                <i class="am-icon-file"></i> 上传
                                            </a>
                                        <?php else: ?>
                                            <a href="<?=$item['user']['attachment']['file_path']?>" class="item-green tpl-table-black-operation-green">
                                                <i class="am-icon-file"></i> 查看
                                            </a>
                                            <a href="javascript:;" class="item-delete-attach tpl-table-black-operation-del" data-id="<?=$item['user']['user_id']?>">
                                                <i class="am-icon-file"></i> 删除
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </td>
                                    <td class="am-text-middle"><?= $item['company_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['company_tel'] ?></td>
                                    <td class="am-text-middle"><?= $item['email'] ?></td>
                                    <td class="am-text-middle"><?= $item['manager_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['manager_phone'] ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url(
                                                            'user/show',
                                                            ['user_id' => $item['user_id']]
                                                        ) ?>">
                                                <i class="am-icon-pencil"></i> 角色详情
                                            </a>
											<a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?=$item['user_id']?>">
											    <i class="am-icon-file"></i> 删除
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
    $('#search').on('click', function(e) {
        var url = "<?php echo url('user/role') ?>";
        var param = $('#form').serialize();
        var html = url + '&' + param;
        window.location.href = html;
    });  
});
</script>
<!-- 图片文件列表模板 -->
{{include file="layouts/_template/tpl_file_item" /}}

<!-- 文件库弹窗 -->
{{include file="layouts/_template/file_library" /}}
<script src="assets/store/js/ddsort.js"></script>
<script src="assets/store/js/file.library.js"></script>
<script>
    $(function() {
        // 删除元素     
        $('.item-delete-attach').delete('id',"<?=url('deleteAttach')?>");
		
		// 删除元素
		var url = "<?=url('user/delete')?>";
		$('.item-delete').delete('id', url);
		
		
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