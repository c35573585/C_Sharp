<?php
  require_once("dbtools.inc.php");
  $album_id = $_GET["album_id"];
  
  //取得登入者帳號
  session_start();
  $login_user = $_SESSION["login_user"];
  
  //建立資料連接
  $link = create_connection();
  
  //刪除儲存在硬碟的相片
  $sql = "SELECT filename FROM photo WHERE album_id = $album_id
          AND EXISTS(SELECT '*' FROM album WHERE id = $album_id AND owner = '$login_user')";
  $result = execute_sql("u9933031", $sql, $link);
  
  while ($row = mysql_fetch_assoc($result))
  {

    $file_name = $row["filename"];

    $photo_path = realpath("./Photo/$file_name");

    $thumbnail_path = realpath("./Thumbnail/$file_name");
  	

    if (file_exists($photo_path))

      unlink($photo_path);
      

    if (file_exists($thumbnail_path))

      unlink($thumbnail_path);
  }
  
  //刪除儲存在資料庫的相片資訊
  $sql = "DELETE FROM photo WHERE album_id = $album_id
          AND EXISTS(SELECT '*' FROM album WHERE id = $album_id AND owner = '$login_user')";
  execute_sql("u9933031", $sql, $link);

  //刪除儲存在資料庫的相簿資訊 	
  $sql = "DELETE FROM album WHERE id = $album_id AND owner = '$login_user'";
  execute_sql("u9933031", $sql, $link);
  	
  //釋放記憶體並關閉資料連接
  mysql_free_result($result);
  mysql_close($link);

  header("location:index.php");
?>