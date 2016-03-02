<?php
  function create_connection()
  {
    $link = mysql_connect("localhost", "U9933031", "u9933031")
      or die("無法建立資料連接<br><br>" . mysql_error());
			
    mysql_query("SET NAMES utf8");
    	
    return $link;
  }
	
  function execute_sql($database, $sql, $link)
  {
    $db_selected = mysql_select_db($database, $link)
      or die("開啟資料庫失敗<br><br>" . mysql_error($link));
						 
    $result = mysql_query($sql, $link) or die("{$sql} <p>" . mysql_error());
		
    return $result;
  }
?>