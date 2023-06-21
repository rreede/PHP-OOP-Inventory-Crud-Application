<?php include('config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php $id = $_GET['id'];?>
   
<div class="wrapper">
<div class="top-header">

<h1> ➕ Update Item </h1>

<span class="button"><a href="../index.php">🔙 Homepage</a></span>

</div>

<form method='post' action="">
<label for="">Item name:</label>
          <input type="text" name='itemName'><br><br>
          <label for="">Item amount:</label>
<input type="number" name='itemAmount'><br><br>
<label for="">Item description:</label><input type="text" name='itemDescription'>
<br><br>
    <input type='submit' class='update' name='updateItem' value='Update'>
    </form>
<?php



if(isset($_POST['updateItem'])) {




$sql = "UPDATE items
SET `item_name`= :item, `item_amount` = :amount, `item_description` = :description
WHERE `id` = :id";

$query = $dbh->prepare($sql);

$query -> bindParam(':item', $item, PDO::PARAM_STR);

$query -> bindParam(':amount' , $amount , PDO::PARAM_INT);

$query -> bindParam(':description' , $description , PDO::PARAM_STR);

$query -> bindParam(':id' , $id , PDO::PARAM_INT);


$item = $_POST['itemName'];

$amount = $_POST['itemAmount'];

$description = $_POST['itemDescription'];



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

?>

</div>
</body>
</html>