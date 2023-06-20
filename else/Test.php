<?php

include("Database.php");

class Test extends Database {

    public function getUsers() {
        $sql = "SELECT * FROM items";
        $stmt = $this->connect()->query($sql);

        while ($row = $stmt->fetch()) {
            echo $row['item_name'] . "<br>"; 
            echo $row['item_amount'] . "<br>"; 
            echo $row['item_description'] . "<br>"; 
        }
    }

    public function getUsersStatement($itemname, $itemamount, $itemdescription) {
        $sql1 = "SELECT * FROM items WHERE item_name = ? AND item_amount = ? AND item_description = ?";

        $stmt = $this->connect()->prepare($sql1);

        $stmt->execute([$itemname, $itemamount, $itemdescription]);

        $names = $stmt->fetchAll(); 

        foreach ($names as $name) {
            echo $name['item_name'] . "<br>"; 
            echo $name['item_amount'] . "<br>"; 
            echo $name['item_description'] . "<br>"; 
        }

    }

}