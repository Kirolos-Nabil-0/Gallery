<?php
namespace Kirolos\GalleryApp\Subcat;
use Kirolos\GalleryApp\Db\db; 
 class DeleteSubCategory 


{
    private $db ;

    function __construct(){
        $this->db= new db();
    }                                                                                                                            
    
    public function deleteSubCategoryById($id) {
        $stmt = $this->db->query("DELETE FROM sub_cat WHERE id = ".$id);
                if ($stmt) {
                    return true; 
                } else {
                    return false; 
                }
    }
    public function deleteSubCategoryByName($name) {
        $stmt = $this->db->query("DELETE FROM sub_cat WHERE name = '$name'");
        if ($stmt) {
            return true; // Deletion successful
        } else {
            return false; // Deletion failed
        }
    }
    
}
