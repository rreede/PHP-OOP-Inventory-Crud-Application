<?php

include("config.php");

$sql = "DELETE FROM `items` WHERE `id`=:id";

$query = $dbh -> prepare($sql);

$query -> bindParam(':id', $id, PDO::PARAM_INT);

$id = $_GET['id'];

$query -> execute();

if($query -> rowCount() > 0)
{
$count = $query -> rowCount();
echo $count . " rows were affected.";
}
else
{
echo "No affected rows.";
}