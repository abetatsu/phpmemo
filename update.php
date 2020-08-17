<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>phpmemo</title>
</head>
<body>
<?php
require('dbconnect.php');

$statement = $db->prepare('UPDATE phpmemos SET memo=? WHERE id=?');
$statement->execute(array($_POST['memo'], $_POST['id']));
echo 'メモ登録完了';
?>
<form action="index.php" method="get">
     <button type="submit" class="btn btn-secondary">メモ一覧へ</button>
</form>
</body>
</html>