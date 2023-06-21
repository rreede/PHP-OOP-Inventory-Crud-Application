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

<h1> 📋Inventory </h1>

<a href="addItem.php"><span class="button">➕ Add Item</span></a>


</div>

<?php



// Reading from database

$sql2 = 'SELECT * FROM items';

$query = $dbh->prepare($sql2);

$query->execute();

$results = $query->fetchAll();

if($query->rowCount()>0) {
echo '<table>';
echo '<tr>';
echo '<td><strong>Name</strong></td>';
echo '<td><strong>Amount</strong></td>';
echo '<td><strong>Description</strong></td>';
echo '</td>';
echo '<td colspan=2><strong>Modify</strong></td>';
echo '</td>';

    foreach($results as $result) {
        echo '<tr>';
        echo '<td>' . $result['item_name'] . '</td>';
       
        echo '<td>' . $result['item_amount'] . '</td>';



        echo '<td>' . $result['item_description'] . '</td>';

        echo '<td>';

        
        echo "<a class='button' href='updateItem.php/?id=" . $result['id'] . "'>Update</a>";

        echo '</td>';

        echo '<td>';

        echo "<a class='button' href='deleteItem.php/?id=" . $result['id'] . "'>Delete</a>";


        echo '</td>';
        
        echo '</tr>';
    }

    echo '</table>';
}

?>


</div>
</body>
</html>

