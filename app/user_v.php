<?php
header('content-type:text/html;charset=utf-8');
//数据库文件
require "../public/db.php";
extract($_POST);

$sql = "SELECT `sname` FROM `xp_student` WHERE `sname`=? OR `snum`=?";//使用命名参数作为占位符的预处理语句
$stmt = $pdo->prepare($sql); 
$stmt->bindParam(1,$sname);
$stmt->bindParam(2,$snum);
$stmt->execute();

 //判断是都重名或者重学号
 $stmt->rowCount()!= 0 ? print json_encode(['status' => 1,'msg' => "该学生已存在"])
:null;