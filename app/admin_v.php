<?php
session_start();
header('content-type:text/html;charset=utf-8');

extract($_POST);
$username=trim($username);
$password=md5($password);

//引入数据库文件
require "../public/db.php"; 

$sql="SELECT `username`  FROM `xp_user` WHERE `username`=? AND `password`=?";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(1,$username);
$stmt->bindParam(2,$password);
$stmt->execute();
$res = $stmt->fetch(PDO::FETCH_ASSOC);

if ($res) {
	echo json_encode(['status' => 1,'msg' => "登录成功"]);
	$_SESSION['username'] = $res['username'];
	 
}else{
	echo json_encode(['status' => 0,'msg' => "用户名或密码错误"]);
}

