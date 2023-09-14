<?php
namespace Kirolos\GalleryApp\Category;

use Kirolos\GalleryApp\Db\db; // Import the db class
class Create_categories 
{
    private $db;
private $GetCategories;
    public function __construct()
    {
        $this->db = new db; // Create an instance of the db class
        $this->GetCategories = new \Kirolos\GalleryApp\Category\Get_categories();
    }


    public function Create_category($name) {
        // Validate the input
        if (empty($name)) {
            return "Category name cannot be empty.";
        }
    
        // Check for duplicates
        $existingCategory = $this->GetCategories->Get_categoryByName($name);
        if (!empty($existingCategory)) {
            return "Category with the same name already exists.";
        }
    
        // Escape the input
        $name = $this->db->escapeString($name);
    
        // Prepare and execute the query
        $sql_stmt = "INSERT INTO categories (name) VALUES ('$name')";
        
        if ($this->db->query($sql_stmt)) {
            return "Category $name created successfully.";
        } else {
            return "Category creation failed. Please try again later.";
        }
    }
    
}

