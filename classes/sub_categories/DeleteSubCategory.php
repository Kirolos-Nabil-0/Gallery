<?php
namespace Kirolos\GalleryApp\Subcat;
use Kirolos\GalleryApp\Db\db; 
 class DeleteSubCategory 


{
    private $db ;

    function __construct(){
        $db= new db();
    }
    
    public function deleteCategoryById($id) {
        $stmt = $this->db->query("DELETE FROM categories WHERE id = ".$id);
    }
    public function deleteCategoryByName($name) {
        $stmt = $this->db->query("DELETE FROM categories WHERE name = '$name' ");
    }
}
