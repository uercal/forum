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

    .reverse {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .reverse {
        font-size: 12px;
    }

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

    .myapp-login-form .myapp-login-input-text,
    .am-selected>button {
        font-size: 14px !important;
        padding-left: 48px !important;
        line-height: 1.8 !important;
        border-radius: 4px !important;
        margin-top: 8px;
    }

    .am-selected>button>span {
        color: #555555;
    }

    .am-btn-default:active,
    .am-btn-default.am-active,
    .am-dropdown.am-active .am-btn-default.am-dropdown-toggle {
        background-color: #fff;
    }

    .am-btn-default:visited {
        border: 1px solid #ccc;
    }


    .myapp-login-form .myapp-login-input-text:focus {
        border-color: #c9c9c9 !important;
        -webkit-box-shadow: inset 0 1px 1px #c9c9c9, 0 0 5px #c9c9c9 !important;
        box-shadow: inset 0 1px 1px #c9c9c9, 0 0 5px #c9c9c9 !important;
    }

    .am-btn-default {
        color: #ccc !important;
        border-color: #c9c9c9 !important;
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

    .am-selected {
        width: 100%;
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

    .am-form-group-select>i {
        position: absolute;
        left: 22px;
        top: 0;
        bottom: 0;
        margin: auto;
        z-index: 9999;
        color: #ccc !important;
        display: flex;
        align-items: center;
        padding-top: 8px;
    }

    .am-form-group-select:hover>i {
        color: #999999 !important;
    }

    .am-form-group {
        position: relative;
    }
</style>

<body>
    <div class="am-g">
        <?php if (!input('username')) : ?>
            <form id="loginForm" class="login-form">
                <fieldset class="myapp-login-form am-form-set">
                    <div class="am-form-group am-form-icon">
                        <i class="am-icon-user"></i>
                        <input type="text" class="myapp-login-input-text am-form-field" name="username" placeholder="请输入用户名">
                    </div>
                    
                </fieldset>

                <button type="button" id="btn-next" class="myapp-login-form-submit am-btn am-btn-block">下一步</button>
            </form>
        <?php elseif(input('username')&& (!input('answer'))):?>
            <form id="loginForm" class="login-form">
                <fieldset class="myapp-login-form am-form-set">                    
                    <div class="am-form-group am-form-group-select">
                        <i class="am-icon-lock"></i>
                        <input type="text" class="myapp-login-input-text am-form-field" readonly  value="<?= $question['question'] ?>">
                    </div>
                    <div class="am-form-group am-form-icon">
                        <i class="am-icon-lock"></i>
                        <input type="text" class="myapp-login-input-text am-form-field" name="answer" placeholder="请输入密保答案" required />
                    </div>
                    <input type="hidden" name="question_id" value="<?= $question['id'] ?>">
                    <input type="hidden" name="username" value="<?= $username ?>">
                </fieldset>

                <button type="button" id="btn-next" class="myapp-login-form-submit am-btn am-btn-block">下一步</button>
            </form>        
        <?php else :  if (!isset($error)) : ?>

                <form id="loginForm" class="login-form">
                    <fieldset class="myapp-login-form am-form-set">
                        <div class="am-form-group am-form-icon">
                            <i class="am-icon-lock"></i>
                            <input type="password" class="myapp-login-input-text am-form-field" id="password" placeholder="请输入新密码">
                        </div>
                    </fieldset>

                    <button type="button" id="btn-submit" class="myapp-login-form-submit am-btn am-btn-block">确定</button>
                </form>

            <?php else : ?>

                <fieldset class="myapp-login-form am-form-set">

                    <button type="button" class="myapp-login-form-submit am-btn am-btn-block" disabled="disabled"><?= $error ?></button>

                </fieldset>


            <?php endif;
    endif; ?>

    </div>
</body>
<script src="/assets/home/js/jquery-1.8.2.min.js"></script>
<script src="/assets/home/js/amazeui.js"></script>
<script src="/assets/layer/layer.js"></script>
<script>
    $(function() {
        $('#btn-submit').on('click', function() {
            var password = $('#password').val();
            if(password==''){
                layer.msg('请填写新密码');
                return false;
            }            
            var param = JSON.parse('<?= isset($param) ? json_encode($param) : '' ?>');
            param.password = $('#password').val();
            console.log(param);            
            $.post('<?= url('forget_pass') ?>', param, function(res) {            
                if (res.code == 1) {
                    // 先获取窗口索引，才能关闭窗口
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.msg('密码修改成功');
                    setTimeout(function() {
                        window.location.href = '<?= url('login_index') ?>';
                    }, 1000);
                } else {
                    parent.layer.msg(res.msg);                   
                }
            });
        });

        // 
        $('#btn-next').on('click', function() {
            var arr = $('#loginForm').serializeArray();
            console.log(arr);
            for (var i in arr) {
                if (arr[i].value == '') {
                    var name = arr[i].name == 'username' ? '用户名' : (arr[i].name == 'answer' ? '密保答案' : '密保问题');
                    layer.msg(name + '不能为空');
                    return false;
                }
            }
            var data = $('#loginForm').serialize();
            window.location.href = "<?= url('forget_pass') ?>&" + data;
        });

        function getBack() {
            console.log('1');
            setTimeout(function() {
                window.history.back();
            }, 1500);
        };

        <?php if (isset($error)) : ?>

            getBack();

        <?php endif; ?>
    })
</script>

</html>