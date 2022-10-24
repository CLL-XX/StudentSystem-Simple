<?php
session_start();
if(isset($_GET['action'])&&$_GET['action']=='logOut'){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台登录</title>
    <script src="../public/jquery-3.6.1.js"></script>
    <script src="../public/layui/layui.js"></script>
    <link rel="stylesheet" href="../public/style.css">

</head>
<body>
<h3>后台登录</h3>
    <form action="handle.php?action=login" method="post">
        <div>
            <label for="username">邮箱:</label>
            <input type="text" name="username"   placeholder="enter username" required autofocus>
        </div>

        <div>
            <label for="password">密码:</label>
            <input type="password" name="password" id="password" placeholder="enter password" required>
        </div>

        <div>
            <button class="btn" type="button">提交</button>
        </div>
    </form>

<script>
    layui.use('layer',function(){
        var layer = layui.layer;
    })
    $(".btn").click(function(){
        var data={};
        data.username = $("[name='username']").val();
        data.password = $("[name='password']").val();

        if(data.username == '' || data.password == ''){
            layer.msg('必选项不能为空');
            return;
        }

        $.post("admin_v.php",data,function(res){
            if(res.status == 1){
                layer.msg(res.msg);
                location.href = "index.php";
            }else if(res.status == 0){
                layer.msg(res.msg);
            }
        },"json")

    })


</script>
</body>
</html>