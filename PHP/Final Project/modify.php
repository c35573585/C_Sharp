<?php
require_once('..\dbtools.inc.php');
session_start();

$link=create_connection();
			
switch($_GET['op']){
	case "1":
			$sql="select * from `member` where `account`='{$_SESSION['account']}';";
			$result=execute_sql('u9933031',$sql,$link);
			$data=mysql_fetch_array($result);
			
		$main=
<<<MAIN
		<form action="{$_SERVER['PHP_SELF']}" method="get">
			
			
			密碼<input type='text' name='password' value='$data[password]'><br>
			姓名<input type='text' name='name' value='$data[name]'><br>
			e-mail<input type='text' name='mail' value='$data[mail]'><br>
			<input type="hidden" name="op" value="2"/>
			<input type="image" src="modify.png" onClick="document.submit();">
		</form>
MAIN;

		break;
				
	case "2":
		$sql="update `member` set `password`='{$_GET['password']}',`name`='{$_GET['name']}',`mail`='{$_GET['mail']}' where `account`='{$_SESSION['account']}';";
		execute_sql('u9933031',$sql,$link);
		header("location:major.html");
		break;
		
	default:
		$main="<table border='1'><tr><td>編號</td><td>帳號</td><td>密碼</td><td>姓名</td><td>e-mail</td></tr>";
		
		$sql="select * from `member` where `account`='{$_SESSION['account']}';";
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