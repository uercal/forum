<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title></title>
    <link rel="icon" type="image/png" href="/assets/admin/i/favicon.ico" />
    <link rel="stylesheet" href="/assets/home/css/amazeui.css" />
</head>
<style>
    body {
        overflow: hidden;
    }

    #loginForm {
        padding: 48px 72px 0px 72px;
        ;
    }

    .am-form-group>label {
        font-family: PingFangSC-Regular;
        font-size: 16px;
        color: #151515;
        letter-spacing: 0;
        line-height: 22px;
        white-space: nowrap;
        font-weight: 200;
    }

    .am-form-group input {
        border: 1px solid #EFF2ED !important;
        border-radius: 4px !important;
    }

    .form-require::before {
        content: "*";
        color: #f00;
        line-height: 18px;
        position: absolute;
        left: 0;
        top: 50%;
    }

    .form-require {
        position: relative;
    }

    .am-u-sm-12>button {
        margin: 10px;
        padding: 10px 35px;
        border-radius: 4px;
        font-family: PingFangSC-Regular;
        font-size: 18px;
        letter-spacing: 0;
    }

    .am-u-sm-12>.sub {
        border: 1px solid #44874B;
        border-radius: 4px;
        background: #fff;
        color: #446548;
    }

    .am-u-sm-12>.sub:hover {
        border: 1px solid #fff !important;
        background-color: #44874B !important;
        color: #fff !important;
    }

    .am-u-sm-12>.cel {
        background: #6DB0FE;
        border-radius: 4px;
        color: #fff;
    }

    .am-u-sm-12>.cel:hover {
        background: #fff;
        border: 1px solid #6DB0FE !important;
        color: #6DB0FE;
    }
</style>

<body>
    <div class="am-g">
        <?php if ($role == 0) : ?>
            <form class="am-form am-form-horizontal" id="loginForm">
                <input type="hidden" name="sign[act_id]" value="<?= $act_id ?>">
                <div class="am-form-group">
                    <label class="form-require am-u-sm-2 am-form-label">联系人</label>
                    <div class="am-u-sm-10">
                        <input type="text" name="sign[concat_person]" placeholder="输入联系人姓名" value="">
                    </div>
                </div>
                <div class="am-form-group">
                    <label class="form-require am-u-sm-2 am-form-label">手机号码</label>
                    <div class="am-u-sm-10">
                        <input type="tel" name="sign[phone]" placeholder="输入联系人手机号码" value="">
                    </div>
                </div>

                <div class="am-form-group">
                    <label class="form-require am-u-sm-2 am-form-label">邮箱</label>
                    <div class="am-u-sm-10">
                        <input type="email" name="sign[concat_email]" placeholder="输入联系人邮箱" value="">
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12" style="display:flex;align-items:center;justify-content:center;">
                        <button type="button" id="btn-submit" class="sub am-btn am-btn-default">提交</button>
                        <button type="button" class="cel am-btn am-btn-default">取消</button>
                    </div>
                </div>
            </form>
        <?php elseif ($role == 1) : ?>
            <form class="am-form am-form-horizontal" id="loginForm">
                <input type="hidden" name="sign[act_id]" value="<?= $act_id ?>">
                <div class="am-form-group">
                    <label class="form-require am-u-sm-2 am-form-label">联系人</label>
                    <div class="am-u-sm-10">
                        <input type="text" name="sign[concat_person]" placeholder="输入联系人姓名" value="<?= $info['name'] ?>">
                    </div>
                </div>
                <div class="am-form-group">
                    <label class="form-require am-u-sm-2 am-form-label">手机号码</label>
                    <div class="am-u-sm-10">
                        <input type="tel" name="sign[phone]" placeholder="输入联系人手机号码" value="<?= $info['phone'] ?>">
                    </div>
                </div>
                <div class="am-form-group">
                    <label class="form-require am-u-sm-2 am-form-label">邮箱</label>
                    <div class="am-u-sm-10">
                        <input type="email" name="sign[concat_email]" placeholder="输入联系人邮箱" value="">
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">学历学位</label>
                    <div class="am-u-sm-10">
                        <input type="text" value="<?= $info['education_degree'] ?>" disabled="disabled">
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">职位</label>
                    <div class="am-u-sm-10">
                        <input type="text" value="<?= $info['job'] ?>" disabled="disabled">
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">职称</label>
                    <div class="am-u-sm-10">
                        <input type="text" value="<?= $info['positio'] ?>" disabled="disabled">
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12" style="display:flex;align-items:center;justify-content:center;">
                        <button type="button" id="btn-submit" class="sub am-btn am-btn-default">提交</button>
                        <button type="button" class="cel am-btn am-btn-default">取消</button>
                    </div>
                </div>
            </form>
		<?php elseif ($role == 2) : ?>
		    <form class="am-form am-form-horizontal" id="loginForm">
		        <input type="hidden" name="sign[act_id]" value="<?= $act_id ?>">
		        <div class="am-form-group">
		            <label class="form-require am-u-sm-2 am-form-label">联系人</label>
		            <div class="am-u-sm-10">
		                <input type="text" name="sign[concat_person]" placeholder="输入联系人姓名" value="<?= $info['name'] ?>">
		            </div>
		        </div>
		        <div class="am-form-group">
		            <label class="form-require am-u-sm-2 am-form-label">手机号码</label>
		            <div class="am-u-sm-10">
		                <input type="tel" name="sign[phone]" placeholder="输入联系人手机号码" value="<?= $info['phone'] ?>">
		            </div>
		        </div>
		        <div class="am-form-group">
		            <label class="form-require am-u-sm-2 am-form-label">邮箱</label>
		            <div class="am-u-sm-10">
		                <input type="email" name="sign[concat_email]" placeholder="输入联系人邮箱" value="">
		            </div>
		        </div>
		
		        <div class="am-form-group">
		            <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">学历学位</label>
		            <div class="am-u-sm-10">
		                <input type="text" value="<?= $info['education_degree'].' '.$info['education_degree_xw'] ?>" disabled="disabled">
		            </div>
		        </div>
		
		        <div class="am-form-group">
		            <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">职位</label>
		            <div class="am-u-sm-10">
		                <input type="text" value="<?= $info['job'] ?>" disabled="disabled">
		            </div>
		        </div>
		
		        <div class="am-form-group">
		            <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">职称</label>
		            <div class="am-u-sm-10">
		                <input type="text" value="<?= $info['positio'] ?>" disabled="disabled">
		            </div>
		        </div>
		
		        <div class="am-form-group">
		            <div class="am-u-sm-12" style="display:flex;align-items:center;justify-content:center;">
		                <button type="button" id="btn-submit" class="sub am-btn am-btn-default">提交</button>
		                <button type="button" class="cel am-btn am-btn-default">取消</button>
		            </div>
		        </div>
		    </form>
        <?php elseif ($role == 3) : ?>
            <form class="am-form am-form-horizontal" id="loginForm">
                <input type="hidden" name="sign[act_id]" value="<?= $act_id ?>">
                <div class="am-form-group">
                    <label class="form-require am-u-sm-2 am-form-label">联系人</label>
                    <div class="am-u-sm-10">
                        <input type="text" name="sign[concat_person]" placeholder="输入联系人姓名" value="<?= $info['manager_name'] ?>">
                    </div>
                </div>
                <div class="am-form-group">
                    <label class="form-require am-u-sm-2 am-form-label">手机号码</label>
                    <div class="am-u-sm-10">
                        <input type="tel" name="sign[phone]" placeholder="输入联系人手机号码" value="<?= $info['manager_phone'] ?>">
                    </div>
                </div>

                <?php if (in_array(3, explode(',', $login_user['role']))) : ?>
                    <div class="am-form-group">
                        <label class="form-require am-u-sm-2 am-form-label">报名人数</label>
                        <div class="am-u-sm-10">
                            <input type="tel" name="sign[member_count]" placeholder="输入报名人数" value="1">
                        </div>
                    </div>
                <?php endif; ?>

                <div class="am-form-group">
                    <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">单位名称</label>
                    <div class="am-u-sm-10">
                        <input type="text" value="<?= $info['company_name'] ?>" disabled="disabled">
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">单位电话</label>
                    <div class="am-u-sm-10">
                        <input type="text" value="<?= $info['company_tel'] ?>" disabled="disabled">
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-pwd-2" class="form-require am-u-sm-2 am-form-label">邮箱</label>
                    <div class="am-u-sm-10">
                        <input type="email" value="<?= $info['email'] ?>" disabled="disabled" name="sign[concat_email]">
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12" style="display:flex;align-items:center;justify-content:center;">
                        <button type="button" id="btn-submit" class="sub am-btn am-btn-default">提交</button>
                        <button type="button" id="cancel" class="cel am-btn am-btn-default">取消</button>
                    </div>
                </div>
            </form>
		<?php elseif ($role == 4) : ?>
		    <form class="am-form am-form-horizontal" id="loginForm">
		        <input type="hidden" name="sign[act_id]" value="<?= $act_id ?>">
		        <div class="am-form-group">
		            <label class="form-require am-u-sm-2 am-form-label">联系人</label>
		            <div class="am-u-sm-10">
		                <input type="text" name="sign[concat_person]" placeholder="输入联系人姓名" value="<?= $info['sup_manager_name'] ?>">
		            </div>
		        </div>
		        <div class="am-form-group">
		            <label class="form-require am-u-sm-2 am-form-label">手机号码</label>
		            <div class="am-u-sm-10">
		                <input type="tel" name="sign[phone]" placeholder="输入联系人手机号码" value="<?= $info['sup_manager_phone'] ?>">
		            </div>
		        </div>
		
		        <?php if (in_array(4, explode(',', $login_user['role']))) : ?>
		            <div class="am-form-group">
		                <label class="form-require am-u-sm-2 am-form-label">报名人数</label>
		                <div class="am-u-sm-10">
		                    <input type="tel" name="sign[member_count]" placeholder="输入报名人数" value="1">
		                </div>
		            </div>
		        <?php endif; ?>
		
		        <div class="am-form-group">
		            <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">单位名称</label>
		            <div class="am-u-sm-10">
		                <input type="text" value="<?= $info['sup_company_name'] ?>" disabled="disabled">
		            </div>
		        </div>
		
		        <div class="am-form-group">
		            <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">单位电话</label>
		            <div class="am-u-sm-10">
		                <input type="text" value="<?= $info['sup_company_tel'] ?>" disabled="disabled">
		            </div>
		        </div>
		
		        <div class="am-form-group">
		            <label for="doc-ipt-pwd-2" class="form-require am-u-sm-2 am-form-label">邮箱</label>
		            <div class="am-u-sm-10">
		                <input type="email" value="<?= $info['sup_company_email'] ?>" name="sign[concat_email]">
		            </div>
		        </div>
		
		        <div class="am-form-group">
		            <div class="am-u-sm-12" style="display:flex;align-items:center;justify-content:center;">
		                <button type="button" id="btn-submit" class="sub am-btn am-btn-default">提交</button>
		                <button type="button" id="cancel" class="cel am-btn am-btn-default">取消</button>
		            </div>
		        </div>
		    </form>
        <?php endif; ?>
    </div>
</body>
<script src="/assets/home/js/jquery-1.8.2.min.js"></script>
<script>
    $(function() {

        var doing = false;

        $('#btn-submit').on('click', function() {
            var data = $('#loginForm').serializeArray();
            var url = "<?= url("sign_act") ?>&act_id=<?= $act_id ?>";            
            var empty = data.find(function(e) {
                return e.value == '';
            });            
            if(empty){
                parent.layer.msg('必填项不能为空');
                return false;
            }else{
				var phone = data.find(function(e,i){
					return e.name == 'sign[phone]';
				});
				var email = data.find(function(e,i){
					return e.name == 'sign[concat_email]';
				});
				if(phone&&!isPoneAvailable(phone.value)){
					parent.layer.msg('手机号码格式错误');
					return false;
				}
				if(email&&!isEmailAvailable(email.value)){
					parent.layer.msg('邮箱格式错误');
					return false;
				}		
			}
			
			
            if (!doing) {
                doing = true;
                $.post(url, data, function(res) {
                    console.log(res);
                    if (res.code == 1) {
                        // 先获取窗口索引，才能关闭窗口
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.msg(res.msg);
                        setTimeout(function() {
                            parent.window.location.reload();
                        }, 1000);
                    } else {
                        parent.layer.msg(res.msg);
                        doing = false;
                    }
                });
            } else {
				parent.layer.msg('请勿重复提交，请刷新页面后提交');
            }

        });

        $('#cancel').on('click', function() {
            parent.layer.closeAll();
        })

        $('.cel').on('click', function() {
            parent.layer.closeAll();
        })
		
		
		function isEmailAvailable(emailInput) {
		   var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		   if (!myreg.test(emailInput)) {
		       return false;
		   }
		   else {
		       return true;
		   }
		}
		
		
		// 判断是否为手机号
		function isPoneAvailable(phone) {
			var myreg = /^[1][3,4,5,6,7,8,9][0-9]{9}$/;
			if (!myreg.test(phone)) {
				return false;
			} else {
				return true;
			}
		}
		
		
		
		
		
		
    })
</script>

</html>