<?php
namespace Kirolos\GalleryApp\Subcat;
use Kirolos\GalleryApp\Db\db; 
class CreateSubCategory
{
    private $db ;

    function __construct(){
        $db= new db();
    }
    
    public function createSubcategory($name, $categoryId) {
        // Validate the input
        if (empty($name)) {
            return "Sub Category name cannot be empty.";
        }
    
        // Check for duplicates
    
        // Escape the input
        $name = $this->db->escapeString($name);
    
        // Prepare and execute the query
        $sql_stmt = " INSERT INTO sub_cat (name, category_id) VALUES ('$name',$categoryId)";
        
        if ($this->db->query($sql_stmt)) {
            return "Sub Category $name created successfully. ";
        } else {
            return "Sub Category creation failed. Please try again later.";
        }
    }

}
