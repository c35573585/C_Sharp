<?php
  require_once("dbtools.inc.php");
  
  //取得登入者帳號
  session_start();
  $login_user = $_SESSION["login_user"];
  
  //建立資料連接
  $link = create_connection();
    
  if (!isset($_POST["album_id"]))
  {
    $album_id = $_GET["album_id"];
  														
    //取得相簿名稱及相簿所有者的帳號
    $sql = "SELECT name, owner FROM album where id = $album_id";
    $result = execute_sql("u9933031", $sql, $link);
    $album_name = mysql_result($result, 0, "name");
    $album_owner = mysql_result($result, 0, "owner");
      
    //釋放 $result 佔用的記憶體	
    mysql_free_result($result);
		
    //關閉資料連接	
    mysql_close($link);
  
    if ($album_owner != $login_user)
    {
      echo "<script type='text/javascript'>";
      echo "alert('您不是相簿的主人，無法修改相簿名稱。$album_owner');";
      echo "</script>";
    }
  }
  else
  {

    $album_id = $_POST["album_id"];
    $album_name = $_POST["album_name"];
    $sql = "UPDATE album SET name = '$album_name'
            WHERE id = $album_id AND owner = '$login_user'";
    execute_sql("u9933031", $sql, $link);
  			
    //關閉資料連接	
    mysql_close($link);
    
    header("location:index.php");
  }
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
    <p align="center"><img src="Title.png"></p>
    <form action="editAlbum.php" method="post">
      <table align="center">
        <tr> 
          <td> 
            相簿名稱：
          </td>
          <td>
            <input type="text" name="album_name" size="15"
              value="<?php echo $album_name ?>">
            <input type="hidden" name="album_id" value="<?php echo $album_id ?>">
            <input type="submit" value="更新"
              <?php if ($album_owner != $login_user) echo 'disabled' ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <br><a href="index.php"><img src='home.png'></a>
          </td>	
        </tr>
      </table>
    </form>
  </body>
</html>