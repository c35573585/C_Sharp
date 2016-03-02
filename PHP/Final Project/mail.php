<?php
function mailto($to_name,$to_email,$activate,$account){	
  	$format = 'html'; // html 或是 plain
  	$subjectx =  "啟用帳號";
  	$message = "親愛的會員您好，<br>
				如果你要成為正式會員的話，<br>
				以下為啟用網址<br>
	http://class.im.nuu.edu.tw/u99/u9933031/hw6/startup.php?account={$account}&activate={$activate}";	
  	//echo $_POST["message"];
require_once("class.phpmailer.php");
$mail = new PHPMailer();
$mail->SetLanguage('zh'); // 設定語言 需有對應的語言檔 ../language/lang-zh.php
$mail->IsSMTP(); // set mailer to use SMTP
$mail->CharSet = 'utf-8';  // 或是 BIG5, 但若 BIG5, 字串均需 iconv()
//$mail->Encoding = 'base64';          // 這一行有時不可以加

$mail->SMTPAuth   = false;                 // enable SMTP authentication
//$mail->Host       = "mail.nuu.edu.tw"; // sets the SMTP server
$mail->Host       = "class.im.nuu.edu.tw"; // sets the SMTP server
//$mail->SMTPSecure = "tls"; 
//$mail->SMTPSecure = "ssl"; 
//$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Port       = 25;                   // set the SMTP port for the GMAIL server
//$mail->Username   = "hw.pcchen@gmail.com";           // SMTP account username
//$mail->Password   = "xxxxxxxx";        // SMTP account password

$mail->From = "u9933031@smail.nuu.edu.tw"; //設定寄件者信箱        
$mail->FromName = "王逸婷"; //設定寄件者姓名;

$mail->AddReplyTo($to_email,$to_name); // 回複至

$mail->AddAddress($to_email, $to_name);  

$mail->WordWrap = 50;

$subject = $subjectx;
$body = $message;

$mail->Subject = $subject;
if( $format !='html' )
{
  $mail->IsHTML(false);
  $mail->Body = $body;
  }
else
  $mail->MsgHTML($body);

echo "before send!";
if(!$mail->Send())
{
echo "通知信件寄出失敗";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}
echo "通知信件已寄出";
}
function searchmail($to_name,$to_email,$newpass){	
  	$format = 'html'; 
  	$subjectx =  "會員新密碼";
  	$message = "親愛的會員您好，<br>
				你的新密碼在此，<br>
				密碼<br>
				{$newpass}";	
require_once("class.phpmailer.php");
$mail = new PHPMailer();
$mail->SetLanguage('zh');
$mail->IsSMTP();
$mail->CharSet = 'utf-8';
$mail->SMTPAuth   = false;               
$mail->Host       = "class.im.nuu.edu.tw";
$mail->Port       = 25;                  
$mail->From = "u9933031@smail.nuu.edu.tw";        
$mail->FromName = "王逸婷";

$mail->AddReplyTo($to_email,$to_name);

$mail->AddAddress($to_email, $to_name);  

$mail->WordWrap = 50;

$subject = $subjectx;
$body = $message;

$mail->Subject = $subject;
if( $format !='html' )
{
  $mail->IsHTML(false);
  $mail->Body = $body;
  }
else
  $mail->MsgHTML($body);

echo "before send!";
if(!$mail->Send())
{
echo "通知信件寄出失敗";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}
echo "通知信件已寄出";
}
?>

