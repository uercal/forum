<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title></title>
    <link rel="icon" type="image/png" href="assets/admin/i/favicon.ico" />
    <link rel="stylesheet" href="assets/home/css/amazeui.css" />
</head>
<style>
    /* Write your styles */
    .layui-layer-content {
        height: 100% !important;
    }

    /* ç™»é™†logo */
    .myapp-login-logo {
        font-size: 120px;
        color: #c9c9c9;
    }

    .myapp-login-form {}

    .am-form-set {
        margin-bottom: 10px;
    }

    .myapp-login-form .myapp-login-input-text {
        font-size: 14px !important;
        padding-left: 48px !important;
        line-height: 1.8 !important;
        border-radius: 4px !important;
        margin-top: 8px;
    }

    .myapp-login-form .myapp-login-input-text:focus {
        border-color: #c9c9c9 !important;
        -webkit-box-shadow: inset 0 1px 1px #c9c9c9, 0 0 5px #c9c9c9 !important;
        box-shadow: inset 0 1px 1px #c9c9c9, 0 0 5px #c9c9c9 !important;
    }

    .am-form-set>input:first-child {
        border-radius: 4px !important;
    }

    .myapp-login-form .am-form-icon i {
        color: #ccc;
        padding-left: 15px;
    }

    .myapp-login-form .am-form-icon:hover i {
        color: #999999;
    }


    .myapp-login-form-submit {
        background: rgba(91, 168, 100, 0.75);
        border-radius: 4px;
        font-size: 20px;
        color: #fff;
    }

    .myapp-login-form-submit:hover {
        background: rgba(91, 168, 100, 1);
        color: #fff;

    }

    input::-webkit-input-placeholder {
        color: #d8d8d8 !important;
        font-size: 14px !important;
    }



    .myapp-login-form-shortcut {
        position: relative;
        height: 30px;
        line-height: 30px;
        margin-top: 30px;
        padding: 0;
        width: 88%;
        overflow: hidden;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    .myapp-login-form-shortcut .myapp-login-form-hr {
        background: #ccc;
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        display: block;
        width: 100%;
        z-index: 1;
    }

    .myapp-login-form-shortcut .myapp-login-form-hr-font {
        display: inline-block;
        padding: 0 16px;
        background: #fff;
        position: relative;
        font-size: 12px;
        color: #ccc;
        z-index: 2;
    }

    .myapp-login-form-listico {
        padding-top: 30px;
    }

    .myapp-login-form-listico .am-icon-btn {
        width: 60px;
        height: 60px;
        line-height: 60px;
        font-size: 30px;
    }

    .myapp-login-form-listico .am-icon-btn:hover {
        opacity: .9;
    }

    .login-form {
        padding: 48px 72px;
    }
</style>

<body>
    <div class="am-g">
        <form id="loginForm" class="login-form">
            <fieldset class="myapp-login-form am-form-set">
                <div class="am-form-group am-form-icon">
                    <i class="am-icon-user"></i>
                    <input type="text" class="myapp-login-input-text am-form-field" name="user[user_name]" placeholder="请输入用户名" required />
                </div>
                <div class="am-form-group am-form-icon">
                    <i class="am-icon-lock"></i>
                    <input type="password" class="myapp-login-input-text am-form-field" id="pwd" name="user[password]" placeholder="请输入密码" required />
                </div>
                <div class="am-form-group am-form-icon">
                    <i class="am-icon-lock"></i>
                    <input type="password" class="myapp-login-input-text am-form-field" name="user[_password]" data-equal-to="#pwd" data-foolish-msg="密码不一致" placeholder="请再次输入密码" required />
                </div>
                <div class="am-form-group am-form-icon">
                    <i class="am-icon-lock"></i>
                    <input type="text" style="width:55%;" class="myapp-login-input-text am-form-field" max-length="6" name="code" placeholder="请输入验证码" required />
                    <div style="position: absolute;height: 99%;width: 50%;display: flex;right: 0;top: 0;border: 1px solid #d8d8d8;border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;">
                        <img id="cap_img" style="height:100%;width:100%;border-top-right-radius: 4px;border-bottom-right-radius: 4px;" src="<?= captcha_src() ?>" onclick="this.src='/captcha'" alt="验证码" title="点击刷新" />
                    </div>
                </div>
            </fieldset>

            <button type="button" id="btn-submit" class="myapp-login-form-submit am-btn am-btn-block ">注 册</button>
        </form>

    </div>
</body>
<script src="assets/home/js/jquery-1.8.2.min.js"></script>
<script src="assets/home/js/amazeui.js"></script>
<script src="assets/layer/layer.js"></script>
<script>
    $(function() {

        var $form = $('#loginForm');
        $form.validator({
            validate: function(validity) {

            },
        });


        $('#btn-submit').on('click', function() {
            var data = $('#loginForm').serializeArray();
            var url = "<?= url("/register_index") ?>";
            $.post(url, data, function(res) {
                console.log(res);
                layer.msg(res.msg);
                if (res.code == 1) {
                    // 先获取窗口索引，才能关闭窗口
                    var index = parent.layer.getFrameIndex(window.name);                    
                    setTimeout(function() {
                        parent.window.location.reload();
                    }, 1000);
                } else {                    
                    setTimeout(function() {
                        $('#cap_img').click();
                    }, 800);
                }
            });
        });
    })
</script>

</html>