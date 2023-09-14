<?php
namespace Kirolos\GalleryApp\Category;
require_once __DIR__ . '/../../vendor/autoload.php';

use Kirolos\GalleryApp\Db\db; // Import the db class

class Delete_Categories 
{
     private $db;

    public function __construct()
    {
        $this->db = new db; // Create an instance of the db class
    }
    public function deleteCategoryById($id) {
        $stmt = $this->db->query("DELETE FROM categories WHERE id = ".$id);
    }
    public function deleteCategoryByName($name) {
        $stmt = $this->db->query("DELETE FROM categories WHERE name = '$name' ");
    }
}


