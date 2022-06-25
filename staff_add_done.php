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


// DB接続
try {

  // POSTデータ取得
  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];
  $staff_comment = $_POST['comment'];


  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=shop_db;charset=utf8;host=localhost','root','root');
  print $staff_name;
  print 'さんを追加しました。<br />';


// データ登録SQL作成

// SQL文を用意
$stmt = $pdo->prepare("INSERT INTO 
                        mst_staff_table (
                          code, name, password, comment,indate) 
                        VALUES (NULL, :name, :pass, :comment, sysdate()
                        );");

// バインド変数を用意（セキュリティの観点から）
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':name', $staff_name, PDO::PARAM_STR);
$stmt->bindValue(':pass', $staff_pass, PDO::PARAM_STR);
$stmt->bindValue(':comment', $staff_comment, PDO::PARAM_STR);

//  実行
$status = $stmt->execute();


} catch (PDOException $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit('DBConnectError:'.$e->getMessage());
  }

?>

<a href="staff_add.php"> 戻る</a>

</body>
</html>