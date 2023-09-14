<?php
namespace Kirolos\GalleryApp\Subcat;


class GetSubCategories 
{
    private $db ;

    function __construct(){
        $this->db= new \Kirolos\GalleryApp\Db\db() ;
    }
    public function getAllSubcategories() {
        $query = $this->db->query("SELECT * FROM sub_cat");
        return $query->fetchAll();
    }

    public function getSubCategoryById($id) {
        $stmt = $this->db->query("SELECT * FROM sub_cat WHERE id = $id");

        return $stmt->fetchAll();
    }

    public function getSubcategoriesByCategoryId($categoryID) {
        $subcategoriesQuery = $this->db->query("SELECT * FROM sub_cat WHERE category_id = $categoryID");

        return $subcategoriesQuery->fetchAll();
    }

    public function getSubcategoriesByCategoryName($categoryName) {
        $categoryName = $this->db->escapeString($categoryName);
        $categoryQuery = $this->db->query("SELECT id FROM categories WHERE name = '$categoryName'");
    
        if ($categoryQuery->numRows() > 0) {
            $categoryID = $categoryQuery->fetchArray()['id'];
            $subcategoriesQuery = $this->db->query("SELECT * FROM sub_cat WHERE category_id = $categoryID");
            return $subcategoriesQuery->fetchAll();
        } else {
            return []; // Category not found
        }
    }
    
}