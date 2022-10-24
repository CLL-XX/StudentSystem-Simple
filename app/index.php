<?php
session_start();
if (empty($_SESSION['username'])) {
    exit("
    <script>
        alert('请您先登录');
        location.href='login.php';
    </script>
    ");
}

header('content-type:text/html;charset=utf-8');
//引入数据库文件
require "../public/db.php";

$sql = "SELECT * FROM `xp_student` ORDER BY `id` DESC LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!empty($res)) {
    foreach ($res as $k => $v) {
        $res[$k]['age'] = intval(date("Y")) - intval(date("Y", $v['birth']));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生信息表管理</title>
    <script src="../public/jquery-3.6.1.js"></script>
    <script src="../public/layui/layui.js"></script>
    <link rel="stylesheet" href="../public/layui/css/layui.css">
    <style type="text/css">
        .layui-btn {
            background-color: orange;
        }

        .header {
            width: 100%;
            background-color: orange;
        }

        .outer {
            width: 1400px;
            margin: 0 auto;
        }

        .container {
            width: 1000px;
            margin: 0 auto;
        }

        h1 {
            margin-top: 30px;
            color: orange;
        }
    </style>
</head>
<div id="pop" style="display:none;">
    <div class="layui-form-item">
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">新手机号</label>
        <div class="layui-input-block">
            <input type="number" name="tel" id="tel" placeholder="请输入你的手机号" autocomplete="off" class="layui-input">
        </div>
    </div>
</div>

<body>
    <div class="header">
        <div class="container">

            <a href="">
                欢迎您，<?php echo $_SESSION['username'] ?>
            </a>
            <a href="login.php?action=logOut">
                退出登录
            </a>
        </div>
    </div>
    <h1 align="center">三年二班学生信息表管理
        <i class="layui-icon layui-icon-face-surprised" style="font-size: 30px; color: orange;"></i>
        <a type="button" onclick="add()" class="add layui-btn layui-btn-radius">添加</a>
    </h1>
    <div class="outer">

        <table class="layui-table">

            <thead>
                <tr>
                    <th>序号</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>生日</th>
                    <th>入学时间</th>
                    <th>学号</th>
                    <th>电话</th>
                    <th>操作</th>

                </tr>
            </thead>
            <tbody>
                <?php if (isset($res)) {
                    foreach ($res as $k => $v) {
                ?>
                        <tr>
                            <td><?php echo $v['id'] ?></td>
                            <td><?php echo $v['sname'] ?></td>
                            <?php if ($v['gender'] == 0) : ?>
                                <td>女</td>
                            <?php else : ?>
                                <td>男</td>
                            <?php endif ?>
                            <td><?php echo intval(date("Y")) - intval(date("Y", $v['birth'])); ?></td>
                            <td><?php echo date("Y-m-d", $v['birth']) ?></td>
                            <td><?php echo date("Y-m-d", strtotime("1 September 2013")) ?></td>
                            <td><?php echo $v['snum'] ?></td>
                            <td><?php echo $v['tel'] ?></td>

                            <td>
                                <button type="button" id="<?php echo $v['id'] ?>" class="edit layui-btn layui-btn-radius">编辑</button>
                                <button type="button" id="<?php echo $v['id'] ?>" class="delete  layui-btn layui-btn-radius">删除</button>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        layui.use('layer', function() {

            var layer = layui.layer;
        });

        function add() {
            layer.open({
                type: 2,
                content: "add.php",
                title: '学生信息添加',
                btn: '退出',
                area: ['80%', '80%'],
                end: function() {
                    location.reload();
                }
            })
        }

        $(".delete").click(function() {
            var that = this;
            layer.open({
                btn: ['确认', '取消'],
                title: '学生信息删除',
                content: '确定要删除这一行学生信息吗？',
                yes: function(index, layero) {
                    var data = {};
                    data.style = 'delete';
                    data.id = $(that).attr('id');
                    $.post("change.php", data, function() {

                    }, "json")
                    layer.close(index);
                },
                end: function() {
                    location.reload();
                }
            })
        })

        $(".edit").click(function() {
            var that = this;
            layer.open({
                    type: 1,
                    btn: ['确认', '取消'],
                    title: '学生信息更新',
                    area: ['50%', '30%'],
                    content: $("#pop"),
                    yes: function(index, layero) {
                        var data = {};
                        data.style = 'edit';
                        data.tel = top.$('#tel').val();
                        data.id = $(that).attr('id');
                        if (!(/^1[3456789]\d{9}$/.test(data.tel))) {
                            layer.msg("手机号码有误，请重填");
                            return false;
                        }
                        $.post("change.php", data, function() {

                        }, "json")
                        layer.close(index);


                    },
                    end: function() {
                        location.reload();
                    }
                })
            })
    </script>
</body>

</html>