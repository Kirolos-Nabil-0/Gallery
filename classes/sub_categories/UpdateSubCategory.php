<?php 

namespace Kirolos\GalleryApp\Subcat;
use Kirolos\GalleryApp\Db\db; 

class UpdateSubCategory 
{
    private $db ;

    function __construct(){
        $db= new db();
    }
    public function updateCategoryByName($oldName, $newName)
    {
        $oldName = $this->db->escapeString($oldName);
        $newName = $this->db->escapeString($newName);

        $stmt = "UPDATE sub_cat SET name = '$newName' WHERE name = '$oldName'";

        // Execute the query
        if ($this->db->query($stmt)) {
            echo "Sub Category updated successfully.";
        } else {
            echo "Faailed to update Sub category.";
        }
    }
}
