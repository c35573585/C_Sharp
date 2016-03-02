<?php
  require_once("dbtools.inc.php");
  $album_id = $_GET["album_id"];
  $photo_id = $_GET["photo_id"];
  
  //取得登入者帳號
  session_start();
  $login_user = $_SESSION["login_user"];
  
  //建立資料連接
  $link = create_connection();
  
  //刪除儲存在硬碟的相片
  $sql = "SELECT filename FROM photo WHERE id = $photo_id
          AND EXISTS(SELECT '*' FROM album WHERE id = $album_id AND owner = '$login_user')";
  $result = execute_sql("u9933031", $sql, $link);
  
  $file_name = mysql_result($result, 0, "filename"); 
  $photo_path = realpath("./Photo/$file_name");
  $thumbnail_path = realpath("./Thumbnail/$file_name");
  
  if (file_exists($photo_path))
    unlink($photo_path);
      
  if (file_exists($thumbnail_path))
    unlink($thumbnail_path);
  
  //刪除儲存在資料庫的相片資訊
  $sql = "DELETE FROM photo WHERE id = $photo_id
          AND EXISTS(SELECT '*' FROM album WHERE id = $album_id AND owner = '$login_user')";
  execute_sql("u9933031", $sql, $link);
 	
  //釋放記憶體並關閉資料連接
  mysql_free_result($result);
  mysql_close($link);
  
  header("location:showAlbum.php?album_id=$album_id");
?>