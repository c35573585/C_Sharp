<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript">
    	function DeletePhoto(album_id, photo_id)
    	{
    		if (confirm("請確認是否刪除此相片？"))
    		  location.href = "delPhoto.php?album_id=" + album_id + "&photo_id=" + photo_id;
    	}
    </script>
  </head>	
  <body>
    <p align="center"><img src="Title.png"></p>
    <?php 
      require_once("dbtools.inc.php");
      $album_id = $_GET["album_id"]; 
      
	    //取得登入者帳號
	    session_start();
	    $login_user = $_SESSION["login_user"];
      
      //建立資料連接
      $link = create_connection();
      
      //取得相簿名稱及相簿的主人
      $sql = "SELECT name, owner FROM album WHERE id = $album_id";
      $result = execute_sql("u9933031", $sql, $link);
      $album_name = mysql_result($result, 0, "name");
      $album_owner = mysql_result($result, 0, "owner");
      
      echo "<p align='center'>$album_name</p>";
													
      //取得相簿裡所有照片的縮圖
      $sql = "SELECT id, name, filename FROM photo WHERE album_id = $album_id";
      $result = execute_sql("u9933031", $sql, $link);
      
      echo "<table border='0' align='center'>";

      //指定每列顯示幾張照片
      $photo_per_row = 5;
      					
      //顯示相片縮圖
      $i = 1;
      while ($row = mysql_fetch_assoc($result))
      {
      	$photo_id = $row["id"];
      	$photo_name = $row["name"];
      	$file_name = $row["filename"];
      	
        if ($i % $photo_per_row == 1)
          echo "<tr align='center'>";
        
        echo "<td width='160px'><a href='photoDetail.php?album=$album_id&photo=$photo_id'>
              <img src='Thumbnail/$file_name' style='border-color:Black;border-width:1px'>
              <br>$photo_name</a>";
        
        if (isset($login_user) && $album_owner == $login_user)
          echo "<br><a href='editPhoto.php?photo_id=$photo_id'>編輯</a><a href='editPhoto.php?op=1&p_id=$photo_id&al=$album_id'>設頭貼</a> 
               <a href='#' onclick='DeletePhoto($album_id, $photo_id)'>刪除</a>";
          
        echo "<p></td>";
        
        if ($i % $photo_per_row == 0 || $i == $total_photo)
          echo "</tr>";
        
        $i++;
      }
      
      echo "</table>" ;
											  		
      //釋放資源並關閉資料連接
		  mysql_free_result($result);
      mysql_close($link);
      
      echo "<hr><p align='center'>";
      if (isset($login_user) && $album_owner == $login_user)
        echo "<a href='uploadPhoto.php?album_id=$album_id'>上傳相片</a> ";
    ?>
    <a href='index.php'><img src='home.png'></a></p>
  </body>                                                                                 
</html>