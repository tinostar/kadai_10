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

<?php

try
{

$staff_code=$_POST['code'];

$dsn='mysql:dbname=shop_db;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='DELETE FROM mst_staff_table WHERE code=?'; // DELETEに修正
$stmt=$dbh->prepare($sql);
// $data[]=$staff_name;
// $data[]=$staff_pass;
// $data[]=$staff_comment;
$data[]=$staff_code;
$stmt->execute($data);

$dbh=null;

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

削除しました。<br />
<br />
<a href="staff_list.php"> 戻る</a>

</body>
</html>