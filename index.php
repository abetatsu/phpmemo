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

$memos = $db->query('SELECT * FROM phpmemos ORDER BY id DESC');
?>
<article class="bg-info my-5">
     <?php while($memo = $memos->fetch()): ?>
          <div class="card col-sm-4 mx-auto">
               <div class="card-body">
                    <p><a href="show.php?id=<?php print($memo['id']); ?>"><?php print(mb_substr($memo['memo'], 0, 10)); ?></a></p>
               </div>
          </div>
     <?php endwhile ?>
</article>
<form action="index.html" type="get" class="text-center">
     <button class="btn btn-secondary" type="submit">メモ記入</button>
</form>
</body>
</html>