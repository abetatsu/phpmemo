<?php
try {
     $db = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8', 'root', 'root');
} catch(PDOException $e) {
     echo '接続エラー：' . $e->getMessage();
}