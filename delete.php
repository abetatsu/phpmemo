<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>Document</title>
</head>
<body>
<?php
try {
     $db = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8', 'root', 'root');
     echo 'メモ登録完了';
} catch(PDOException $e) {
     echo '接続エラー：' . $e->getMessage();
}

if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
{
     $id = $_REQUEST['id'];
     
     $statement = $db->prepare('DELETE FROM phpmemos WHERE id=?');
     $statement->execute(array($id));
}
?>
メモを削除しました
<form action="index.php" method="get">
     <button type="submit" class="btn btn-secondary">メモ一覧へ</button>
</form>
</body>
</html>