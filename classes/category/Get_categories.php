<?php
namespace Kirolos\GalleryApp\Category;

use Kirolos\GalleryApp\Db\db; // Import the db class

class Get_categories 
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
public function Get_All_Categories(){
    $stmt = "SELECT * FROM categories";

    return $this->db->query($stmt)->fetchArray();
}

public function SearchCategories($keyword) {
    $keyword = $this->db->escapeString($keyword);
    $stmt = "SELECT * FROM categories WHERE name LIKE '%$keyword%'";

    return $this->db->query($stmt)->fetchArray();
}



}

