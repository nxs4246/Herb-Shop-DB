<?php

require './Database.php';
require './Item.php';

class Service {

    private $db; // Add a private property to hold the database connection

    public function __construct() {
        // Initialize the database connection in the constructor
        $dbObject = new Database();
        $this->db = $dbObject->getDatabaseConnection();
    }

    function fetchAllItems() {
        $sql = "SELECT * FROM item";

        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');

        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return 'Failed to retrive data';
        }
    }

    function addItem() {
        if (isset($_POST['exit'])) {
            header("Location: http://localhost/item/menu.php");
            exit();  // Add exit to stop further execution
        }
    
        // Validate and sanitize input
        $itemName = isset($_POST['name']) ? trim($_POST['name']) : '';
        $itemPrice = isset($_POST['math']) ? trim($_POST['math']) : '';
    
        // Validate input
        if (empty($itemName) || !is_numeric($itemPrice)) {
            return 'Invalid input. Please provide a valid name and price.';
        }
    
        $sql = "INSERT INTO item (`Iname`, `Sprice`) VALUES (?, ?)";
    
        $stmt = $this->db->prepare($sql);
        
        // Debugging: Output input values
        echo "name=", $itemName, " math=", $itemPrice;
    
        if ($stmt->execute([$itemName, $itemPrice])) {
            // The primary key value will be auto-incremented by the database
            return "Item added successfully";
        } else {
            // Output detailed error information
            return 'Failed inserting item. Error: ' . $stmt->errorInfo()[2];
        }
    }
    

    function deleteItem($iId) {
        try {
            $sql = "DELETE FROM item WHERE iId = :iId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':iId', $iId, PDO::PARAM_INT);
            $stmt->execute();
            return "Item deleted successfully";
        } catch (PDOException $e) {
            return "Error deleting item: " . $e->getMessage();
        }
    }

    function updateItem() {
        if (isset($_POST['exit'])) {
            header("Location: http://localhost/item/menu.php");
        }
        $id = $_POST['id'];
        $itemName = $_POST['name'];
        $itemPrice = $_POST['math'];

        $sql = "UPDATE item SET Iname='" . $itemName . "', Sprice=" . $itemPrice . " WHERE iId=" . $id;
        echo $sql;
        $stmt = $this->db->query($sql);
    }

    function searchItem($iId) {
        try {
            $sql = "SELECT Iname, Sprice FROM item WHERE iId = :iId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':iId', $iId, PDO::PARAM_INT);
            $stmt->execute();
            
            // Fetch the data and return it
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error searching item: " . $e->getMessage();
        }
    }    
    
}
