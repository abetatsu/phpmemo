<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>phpmemo</title>
</head>
<body class="bg-info">
<?php
require('dbconnect.php');

if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
{
     $id = $_REQUEST['id'];

     $memos = $db->prepare('SELECT * FROM phpmemos WHERE id=?');
     $memos->execute(array($id));
     $memo = $memos->fetch();
}
?>
     <div class="card bg-info">
          <h1 class="text-white text-center">EDIT</h1>
          <div class="card-body mx-auto">
               <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?php print($id); ?>">
                    <textarea name="memo" id="" cols="70" rows="10" placeholder=""><?php print($memo['memo']) ?></textarea>
                    <input type="submit" value="登録" class="btn btn-secondary">
               </form>
          </div>
     </div>
     <form action="index.php" method="get" class="text-center">
          <button class="btn btn-secondary">メモ一覧へ</button>
     </form>
</body>
</html>