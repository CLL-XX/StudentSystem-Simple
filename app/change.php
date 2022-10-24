<?php
header('content-type:text/html;charset=utf-8');

require "../public/db.php"; 

//删除某一行数据
if ($_POST['style'] == 'delete') {
	$id = $_POST['id'];
	$sql = "DELETE FROM `xp_student` WHERE `id`=?";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(1,$id);
	$stmt->execute();  
	$stmt->rowCount()!= 0 ? print json_encode(["status"=>1,"msg"=>'删除成功']):null;
}

//数据更新
if ($_POST['style'] == 'edit') {
	$id = $_POST['id'];
	$tel = intval($_POST['tel']);
	$sql = "UPDATE `xp_student` SET `tel`= ? WHERE `id`=?";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(1,$tel);
	$stmt->bindParam(2,$id);
	$stmt->execute();  
	$stmt->rowCount()!= 0 ? print json_encode(["status"=>1,"msg"=>'修改成功']):null;
}