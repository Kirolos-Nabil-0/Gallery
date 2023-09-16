<?php 

namespace Kirolos\GalleryApp\Subcat;
use Kirolos\GalleryApp\Db\db; 

class UpdateSubCategory 
{
    private $db ;

    function __construct(){
        $this->db= new db();
    }
    public function updateSubCategoryByName($oldName, $newName) {
        // Assuming you have a database update operation here
        $result = $this->db->query("UPDATE sub_cat SET name = '$newName' WHERE name = '$oldName'");
        
        // Check if the update was successful and return a result accordingly
        if ($result) {
            return true; // Update was successful
        } else {
            return false; // Update failed
        }
    }
    public function updateSubCategoryById($subcategoryId, $newName, $newCategoryId) {
        // Escape the inputs
        $newName = $this->db->escapeString($newName);
        $newCategoryId = $this->db->escapeString($newCategoryId);
    
        // Assuming you have a database update operation here
        $result = $this->db->query("UPDATE sub_cat SET name = '$newName', category_id = '$newCategoryId' WHERE id = $subcategoryId");
    
        // Check if the update was successful and return a result accordingly
        if ($result) {
            return true; // Update was successful
        } else {
            return false; // Update failed
        }
    }
    
}
