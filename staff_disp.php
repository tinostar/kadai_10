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
<style>
        body {
            background-color: #CCFFFF;
        }
    </style>
<title>ユーザー登録</title>
</head>
<body>

<h1>ユーザー情報参照</h1>

<?php

try
{

$staff_code=$_GET['staffcode'];

$dsn='mysql:dbname=shop_db;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name FROM mst_staff_table WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$staff_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['name'];

$dbh=null;


}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

ユーザーコード:<br />
<?php print $staff_code; ?>
<br />
<br />
ユーザー名:<br />
<?php print $staff_name; ?>
<br />
<br />

<!-- ↓　コメントが上手く反映されないので要修正 -->
<?php
if($staff_comment=='')
{
	print 'コメント：<br />特になし<br />';
}
else
{
	print 'コメント：';
	print $staff_comment;
	print '<br />';
}
?>
<!-- ↑　コメントが上手く反映されないので要修正 -->

<br />

<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>