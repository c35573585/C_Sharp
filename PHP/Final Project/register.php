<?php
require_once('..\dbtools.inc.php');
require_once('mail.php');
$link=create_connection();

if($_GET['findaccount']){
	$find=$_GET['findaccount'];
	$sql="select * from member where `account`='{$find}';";
	$result=execute_sql('u9933031',$sql,$link);
	$data=mysql_fetch_array($result);
		
	if($data1)
		echo "帳號已有使用";
	return;
}
$account=$_POST['account'];
$password=$_POST['password'];
$username=$_POST['name'];
$mail=$_POST['mail'];
//$usernickname=$_POST['usernickname'];
//$age=$_POST['age'];
//$sex=$_POST['sex'];
$activate=md5(time());
$sql="select * from `member` where `account`='{$account}';";
$result=execute_sql('u9933031',$sql,$link);
$data=mysql_fetch_array($result);
if($data1)
	echo "此帳號已有人使用";
else{
	$sql="insert into `member` (`account`,`password`,`name`,`mail`) values ('{$account}','{$password}','{$name}','{$mail}');";
	$result=execute_sql('u9933031',$sql,$link);
	mailto($username,$mail,$activate,$account);
	echo "<br>請到你的信箱收認證信，若無看到，可能是被誤認為垃圾郵件喔";
}
?>