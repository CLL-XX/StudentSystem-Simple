<?php
header('content-type:text/html;charset=utf-8');
//引入数据库文件
require "../public/db.php"; 
extract($_POST);
//将学生出生日期存为时间戳
$birth = strtotime($birth);
$gender = intval($gender);
$tel = intval($tel);
 
 

//防重复提交
$sql="SELECT `sname` FROM `xp_student` WHERE `sname`=?";
$a = $pdo->prepare($sql);
$a->bindParam(1,$sname);
$a->execute();
if ($a->rowCount()==1) {
	echo json_encode(['status' => 1,'msg' => "请勿重复提交数据"]);
}else{
	$insert="INSERT INTO `xp_student`(`sname`,`snum`,`gender`,`birth`,`tel` )values(?,?,?,?,?)";
	$stmt = $pdo->prepare($insert);
	$stmt->bindParam(1,$sname);
	$stmt->bindParam(2,$snum);
	$stmt->bindParam(3,$gender);
	$stmt->bindParam(4,$birth);
	$stmt->bindParam(5,$tel);
	 
	$stmt->execute();
	$stmt->rowCount()==1 ? print json_encode(['status' => 1,'msg' => "保存成功"]) : null;
}
	
	






 
 



  