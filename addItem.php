<?php include('config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   


<div class="wrapper">

<div class="top-header">

<h1> ➕ Add Item </h1>

<span class="button"><a href="Index.php">🔙 Homepage</a></span>

</div>

<form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">

        Item name:  <input type="text" name='itemName'><br>

        Item amount:  <input type="number" name='itemAmount'><br>
        <br>
        Item description:  <input type="text" name='itemDescription'>

    <input type='submit'>
    </form>
<?php

    // Inserting Data into database with placeholders
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "INSERT INTO `items`
    (`item_name`, `item_amount`, `item_description`)
    VALUES
    (:name,:amount,:description)";

    $query = $dbh -> prepare($sql);

    $query->bindParam(':name',$name,PDO::PARAM_STR);

    $query->bindParam(':amount',$amount,PDO::PARAM_STR);

    $query->bindParam(':description',$description,PDO::PARAM_STR);

    // Insert the first row
    $name = $_POST['itemName'];
    $amount = $_POST['itemAmount'];
    $description = $_POST['itemDescription'];


    $query -> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId>0) { echo "OK"; } else { echo "not OK"; }

header('Location: index.php');

    }
?>
</div>
</body>
</html>