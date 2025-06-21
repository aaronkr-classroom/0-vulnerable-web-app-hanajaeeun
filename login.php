

<html>
 <head>
Logon Testpage
 </head>
 <body>
 

<?php
include("config.php");
session_start();

header("X-Frame-Options:DENY");

//get user input
//$a=$_POST['username'];
$a = mysqli_real_escape_string($db, $_POST['username']);
//$b=$_POST['passwd'];
$a = mysqli_real_escape_string($db, $_POST['username']);

$query = "select * from register where username='$a' AND password='$b'";

$result=mysqli_query($db, $query) or die('Error querying database.');

//fetch from database

if($row = mysqli_fetch_array($result)) {
  //vaild user authorized

 $_SESSION['login_user']=$row["username"];
 $_SESSION['csrf'] = md5($_SESSION['login_user'].mt_rand()); //csrf 토큰 생성

  header("Location: /settings.php$"); //수정
}
else
{
	//echo 'not auhorized'; 취약한 메시지 표시하면 안됌
	header("Location: /index.php");
}
//close database
mysqli_close($db);
?>

</body>
</html>