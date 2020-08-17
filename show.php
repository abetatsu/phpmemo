<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>Document</title>
</head>
<body class="bg-info">
<?php
try {
     $db = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8', 'root', 'root');
} catch(PDOException $e) {
     echo '接続エラー：' . $e->getMessage();
}
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0)
{
     print('１以上の数字を入力してください');
     exit();
}

$memos = $db->prepare('SELECT * FROM phpmemos WHERE id=?');
$memos->execute(array($id));
$memo = $memos->fetch();
?>

<article class="bg-info my-5">
     <div class="card col-sm-4 mx-auto">
          <div class="card-body">
               <p><?php print($memo['memo']); ?></p>
               <time><?php print($memo['created_at']); ?></time>
          </div>
     </div>
     <div class="text-center my-3">
          <a href="index.php" class="btn btn-secondary">戻る</a>
          <a href="edit.php?id=<?php print($memo['id']); ?>" class="btn btn-secondary">編集</a>
          <a href="delete.php?id=<?php print($memo['id']); ?>" class="btn btn-danger">削除</a>
     </div>
</article>
</body>
</html>