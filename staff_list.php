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

<h1>ユーザー情報一覧</h1>

<?php

try
{

$dsn='mysql:dbname=shop_db;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name FROM mst_staff_table WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '<form method="post" action="staff_branch.php">';

while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
    print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
	print $rec['name'];
	print '<br />';
}

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';
?>


<br />
<a href="staff_top.php">トップメニューへ</a><br />


</body>
</html>