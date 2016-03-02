<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript">
      function DeleteAlbum(album_id)
      {
        if (confirm("請確認是否刪除此相簿？"))
          location.href = "delAlbum.php?album_id=" + album_id;
      }
    </script>
  </head>	
  <body>
    <p align="center"><img src="Title.png"></p>
    <?php
      require_once("dbtools.inc.php");
      
      //取得登入者帳號及名稱
      session_start();
      $login_user = $_SESSION["login_user"];
      $login_name = $_SESSION["login_name"];
					
      //建立資料連接
      $link = create_connection();
														
      //取得所有相簿的資料
      $sql = "SELECT id, name, owner FROM album order by name";
      $album_result = execute_sql("u9933031", $sql, $link);
      
      //取得相簿的數目
      $total_album = mysql_num_rows($album_result);
      
      echo "<p align='center'>$total_album Albums</p>";
      echo "<table border='0' align='center'>";

      //指定每列顯示幾個相簿
      $album_per_row = 5;
      					
      //顯示相簿清單
      $i = 1;
      while ($row = mysql_fetch_assoc($album_result))
      {
      	//取得相簿編號、名稱及相簿的主人
      	$album_id = $row["id"];
      	$album_name = $row["name"];
      	$album_owner = $row["owner"];
      	
      	$sql = "SELECT filename FROM photo WHERE album_id = $album_id";
      	$photo_result = execute_sql("u9933031", $sql, $link);
      	
      	//取得相簿的相片數目
      	$total_photo = mysql_num_rows($photo_result);
      	
      	//相片數目大於 0 就以第一張相片當作相簿封面，否則以 None.png 當封面
      	if ($total_photo > 0)
      	  $cover_photo = mysql_result($photo_result, 0, "filename");
      	else
      	  $cover_photo = "None.png";
      	
      	//釋放記憶體  
      	mysql_free_result($photo_result);
      	
        if ($i % $album_per_row == 1)
          echo "<tr align='center' valign='top'>";
          
        echo "<td width='160px'>
              <a href='showAlbum.php?album_id=$album_id'>
              <img src='Thumbnail/$cover_photo' style='border-color:Black;border-width:1px'>
              <br>$album_name</a><br>$total_photo Pictures";
        
        if (isset($login_user) && $album_owner == $login_user)
        {
          echo "<br><a href='editAlbum.php?album_id=$album_id'>編輯</a> 
                <a href='#' onclick='DeleteAlbum($album_id)'>刪除</a>";
        }
        
        echo "<p></td>";
        
        if ($i % $album_per_row == 0 || $i == $total_album)
          echo "</tr>";
               
        $i++;
      }
      
      echo "</table>" ;
											  		
      //釋放記憶體並關閉資料連接
      mysql_free_result($album_result);
      mysql_close($link);
      
      echo "<hr><p align='center'>";
      
      //若 isset($login_name) 傳回 false，表示使用者尚未登入系統
      if (!isset($login_name))
        echo "<a href='logon.php'>登入</a>";
      else
      {
        echo "<a href='addAlbum.php'><img src='Add Icon.jpg'></a> 
              <a href='logout.php'><img src='logout-icon.png'>【 $login_name 】</a>
			  <a href='major.html'><img src='wall_icon.jpg'></a>";
      }
    ?>
    </p>
  </body>
</html>