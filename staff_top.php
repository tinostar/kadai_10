<!-- 追加 -->
<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="staff_login.php">ログイン画面へ</a>';
	exit();
}
else
{
	print $_SESSION['staff_name'];
	print 'さんログイン中<br />';
	print '<br />';
}
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
ユーザー管理トップメニュー<br />
<br />
<a href="staff_list.php">ユーザー管理</a><br />
<br />
<a href="staff_logout.php">ログアウト</a><br />
<!-- 追加 -->

</body>
</html>