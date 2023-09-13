<?php
namespace Kirolos\GalleryApp\Categories;

use Kirolos\GalleryApp\Db\db; // Import the db class
require_once __DIR__ . '/../../vendor/autoload.php';

class GetCategories 
{
    private $db;

    public function __construct()
    {
        $this->db = new db; // Create an instance of the db class
    }
public function Get_categoryById($id){
    $category_id = $this->db->escapeString($id);
    $stmt = "  SELECT * FROM  categories where id = '$id'         ";

    return $this->db->query($stmt)->fetchArray();
}
public function Get_categoryByName($name){
    $category_name = $this->db->escapeString($name);
    $stmt = "SELECT * FROM categories WHERE name = '$category_name'";

    return $this->db->query($stmt)->fetchArray();
}

}


$Getcategories = new GetCategories();

print_r( $Getcategories->Get_categoryByName("قداسات"));
print_r( $Getcategories->Get_categoryById(1));