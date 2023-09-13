<?php
namespace Kirolos\GalleryApp\Categories;

use Kirolos\GalleryApp\Db\db; // Import the db class

class CreateCategories 
{
    private $db;

    public function __construct()
    {
        $this->db = new db; // Create an instance of the db class
    }
    public function createCategory($name) {
        $name = $this->db->escapeString($name);
        
        $sql_stmt = "INSERT INTO categories (name) VALUES ('$name')";
    
        // Execute the query
        if ($this->db->query($sql_stmt)) {
            echo "Categoty ".$name." created";
        } else {
            echo "Re add again";
        }    }
}
$create = new CreateCategories();

