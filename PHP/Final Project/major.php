

<?php
session_start();
if($_SESSION['login_user']){
	$username=$_SESSION['login_name'];
}
else{
	echo "連線失敗";
	exit();
}
//print_r($_SESSION);
require_once("..\dbtools.inc.php");

$link = create_connection();

$sql="SELECT count(*) FROM `wall`;";
$result = execute_sql("u9933031", $sql, $link);
$d=mysql_fetch_array($result);
if($d[0]!=$_SESSION[count])
{
	echo "<script>location.herf='major.html'</script>";
}
$_SESSION[count]=$d[0];
if($_SESSION['pic']){
	$sql="SELECT * FROM `photo` where `id`='{$_SESSION['pic']}';";
	$result = execute_sql("u9933031", $sql, $link);
	$ph=mysql_fetch_array($result);

	echo "<table><tr><td><a href='photoDetail.php?album={$ph[album_id]}&photo={$ph[id]}'>";
	echo "<img src='Thumbnail/{$ph[filename]}' style='border-color:Black;border-width:1px'></a></td><td>{$_SESSION['login_name']}</td></tr></table>"; 
}
switch($_GET['mode']){

	case "0":
		$wall=$_GET['wall'];
		$sql = "INSERT INTO `wall`(`account`,`wall`) VALUES('{$_SESSION['account']}','{$wall}');";
		$result = execute_sql("u9933031", $sql, $link);
		header("location:major.html");	
		break;
		
	case "1":
		$sql = "DELETE FROM `wall` WHERE `id` = '{$id}';";
		$result = execute_sql("u9933031", $sql, $link);
		header("location:major.php");	
		break;
		/*
	case "2":
		$wall=$_GET['wall'];
		$sql ="UPDATE `wall` SET `wall`='{$wall}' WHERE `id` = '{$id}';";
		$result = execute_sql("u9933031", $sql, $link);
		header("location:major.php");	
		break;
		
	case "3":
		if($_GET['id']){
			$sql = "SELECT * FROM `wall` WHERE `id`='{$_GET['id']}';";
			$result = execute_sql("u9933031", $sql, $link);
			$data = mysql_fetch_array($result);
			$m=
<<<AA
	<p>
	<form method='get' name='form' action=''>
	<textarea name='wall'>$data[wall]</textarea><br>
	<input type='hidden' name='id' value='$data[id]'>
	<input type='hidden' name='mode' value='$mode'>
	<input type='submit' value='修改'>
AA;
		echo $m;
		}
		break;*/
	default:
		echo "<br>";
		
		$sql = "SELECT * FROM `wall` order by `id` asc;";
		$result = execute_sql("u9933031", $sql, $link);
		while($data = mysql_fetch_array($result)){
			echo $data[account]." : ".$data[wall];
			if($_SESSION['login_user']==$data[account])
				echo "<a href='major.php?mode=1&id=$data[id]'>刪除</a><br>";
			else
				echo "<br>";
		}
		break;
}

mysql_close($link);
?>
<html>
<head><meta http-equiv="refresh" content="5"></head>
<body>
<!---<iframe src="" width="0" height="0" border="0"/>--->
</body>

</html>