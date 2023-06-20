<?php

$db = new PDO('mysql:host=localhost;dbname=oop-php', 'root', '', []);

$email = $_GET['email'];

$query = 'SELECT * FROM items WHERE item_name = ?';

echo $query;

$stmt = $db->prepare($query);

$stmt->execute([$email]);

foreach($stmt->fetchAll() as $user) {
     var_dump($user);
}


?>