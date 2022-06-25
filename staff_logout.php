<!-- 追加 -->
<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
	setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>
<!-- 追加 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ユーザー登録</title>
</head>
<body>

<!-- 追加 -->
ログアウトしました。<br />
<br />
<a href="staff_login.php">ログイン画面へ</a>
<!-- 追加 -->

</body>
</html>