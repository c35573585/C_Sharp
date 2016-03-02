<?php
require_once('..\dbtools.inc.php');
$link = create_connection();

if($_GET['findaccount']){
	$find=$_GET['findaccount'];

	$sql="select * from member where `account`='{$find}';";
	$result=execute_sql('u9933031',$sql,$link);
	$data=mysql_fetch_array($result);
	
	if(!$data)
		echo "無此帳號";
	return;
}
$account = $_POST['account'];
$password = $_POST['password'];
if(empty($account))
	exit();
	//header("location:login.html");
if(empty($password))
	exit();
	//header("location:login.html");


$sql="select * from `member` where `account` = '{$account}' and `password` = '{$password}';";
$result = execute_sql('u9933031',$sql,$link);

$data = mysql_fetch_array($result);
if ($data){
	session_start();
	$_SESSION['login_user']=$data[account];
	$_SESSION['level']=$data[level];
    $_SESSION['login_name']=$data[name];
	$_SESSION['pic']=$data[pic];
	$_SESSION['account']=$data[account];
	if($_SESSION['level']==0)
		header("location:major.html");
	else if($_SESSION['level']==1)
		header("location:manager.php");
}
else
	echo "帳密錯誤";
?>