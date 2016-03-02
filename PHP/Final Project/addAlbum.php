<?php
  if (isset($_POST["album_name"]))
  {
    require_once("dbtools.inc.php");
    $album_name = $_POST["album_name"];
  	
    //取得登入者帳號
    session_start();
    $login_user = $_SESSION["login_user"];

    //建立資料連接
    $link = create_connection();

    //新增相簿

    $sql = "SELECT ifnull(max(id), 0) + 1 AS album_id FROM album";

    $result = execute_sql("u9933031", $sql, $link);

    $album_id = mysql_result($result, 0, "album_id");
  	

    $sql = "INSERT INTO album(id, name, owner)
 
    
      VALUES($album_id, '$album_name', '$login_user')";

    execute_sql("u9933031", $sql, $link);
  	

    //釋放記憶體並關閉資料連接

    mysql_free_result($result);
    mysql_close($link);
    
    header("location:showAlbum.php?album_id=$album_id");
  }
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
    <p align="center"><img src="Title.png"></p>
    <form action="addAlbum.php" method="post">
      <table align="center">
        <tr> 
          <td> 
            相簿名稱：
          </td>
          <td>

    
      <input type="text" name="album_name" size="15">

    
      <input type="submit" value="新增">
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <br><a href="index.php"><img src='home.png'></a>
          </td>	
        </tr>
      </table>
    </form>
  </body>
</html>