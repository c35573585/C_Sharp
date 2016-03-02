<?php
require_once('..\dbtools.inc.php');
session_start();
if($_SESSION['level']==1){
	$username=$_SESSION['username'];
	echo "<h1><p><a href='logout.php'><img src='logout-icon.png'></a><p><a href='manager.php'>會員資料</a></h1>";
}
else{
	echo "連線失敗<p><a href='login.html'>重新登入</a>";
	exit();
}
$link=create_connection();
			
switch($_GET['op']){
	case "1":
			$sql="select * from `member` where `number`='{$_GET['number']}';";
			$result=execute_sql('u9933031',$sql,$link);
			$data=mysql_fetch_array($result);
			
		$main=
<<<MAIN
		<form action="{$_SERVER['PHP_SELF']}" method="get">
			編號<input type='text' name='number' value='$data[number]'><br>
			帳號<input type='text' name='account' value='$data[account]'><br>
			密碼<input type='text' name='password' value='$data[password]'><br>
			姓名<input type='text' name='name' value='$data[name]'><br>
			e-mail<input type='text' name='mail' value='$data[mail]'><br>
			<input type="hidden" name="op" value="2"/>
			<input type="submit" value="修改"/>
		</form>
MAIN;

		break;
				
	case "2":
		$sql="update `member` set `number`='{$_GET['number']}',`password`='{$_GET['password']}', `account`='{$_GET['account']}',`name`='{$_GET['name']}',`mail`='{$_GET['mail']}' where `number`='{$_GET['number']}';";
		execute_sql('u9933031',$sql,$link);
		header("location:{$_SERVER['PHP_SELF']}");
		break;
		
	default:
		$main="<table border='1'><tr><td>編號</td><td>帳號</td><td>密碼</td><td>姓名</td><td>e-mail</td></tr>";
		
		$sql="select * from `member`;";
		$result=execute_sql('u9933031',$sql,$link);
		while($data=mysql_fetch_array($result)){

			$main.=
<<<AA
			<tr>
			<td>$data[number]</td>
			<td>$data[account]</td>
			<td>$data[password]</td>
			<td>$data[name]</td>

			<td>$data[mail]</td>
			<td><a href="{$_SERVER['PHP_SELF']}?op=1&number={$data[number]}">修改</a></td>
			</tr>
AA;

		}
		break;
}
?>

<?php echo $main; ?>