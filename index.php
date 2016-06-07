<?php
date_default_timezone_set("Asia/Shanghai");
if(is_file($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php')){
    require_once($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php');
}
$conn = new mysqli('127.0.0.1:3306','root','test','jump_link') or die("哎呀出错了啦"); 
$link=$_GET['wd'];
$stmt=$conn->prepare("SELECT * from jump_link where wd=? limit 1");
$stmt->bind_param('s', $link);
$stmt->execute();
$res=$stmt->get_result();
$row=$res->fetch_assoc();
mysqli_close;
echo '<meta http-equiv="refresh" content="1;url=',$row['link'],'"> ';
?>
