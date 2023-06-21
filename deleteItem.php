<?php

include("config.php");


if(isset($_GET['id'])) {

$sql = "DELETE FROM `items` WHERE `id`=:id";

$query = $dbh -> prepare($sql);

$query -> bindParam(':id', $id, PDO::PARAM_INT);

$id = $_GET['id'];

$query -> execute();

if($query -> rowCount() > 0)
{
    header('Location:../index.php');
}
else
{
echo "No affected rows.";
}

}