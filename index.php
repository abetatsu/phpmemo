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

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page']))
{
     $page = $_REQUEST['page'];
} else {
     $page =1;
}
     $start = 5 * ($page - 1);
     
     $memos = $db->prepare('SELECT * FROM phpmemos ORDER BY id DESC LIMIT ?, 5');
     $memos->bindParam(1, $start, PDO::PARAM_INT);
     $memos->execute();

?>
<article class="bg-info my-5">
     <?php while($memo = $memos->fetch()): ?>
          <div class="card col-sm-4 mx-auto">
               <div class="card-body">
                    <p><a href="show.php?id=<?php print($memo['id']); ?>"><?php print(mb_substr($memo['memo'], 0, 10)); ?></a></p>
               </div>
          </div>
     <?php endwhile; ?>
     <div class="text-center">
          <?php if($page >= 2): ?>
          <a href="index.php?page=<?php print($page-1); ?>" class="text-white"><?php print($page-1) ?>ページへ /</a>
          <?php endif; ?>
          <?php
          $counts = $db->query('SELECT COUNT(*) as cnt FROM memos');
          $count = $counts->fetch();
          $max_page = ceil($count['cnt'] / 5);
          if($page < $max_page):
          ?>
          <a href="index.php?page=<?php print($page+1); ?>" class="text-white"><?php print($page+1) ?>ページへ</a>
          <?php endif; ?>
     </div>
</article>
<form action="index.html" type="get" class="text-center">
     <button class="btn btn-secondary" type="submit">メモ記入</button>
</form>
</body>
</html>