<?php
namespace Kirolos\GalleryApp\Category;

require_once __DIR__ . '/../../vendor/autoload.php';

class Categories 
{
    private $Create_category;
    private $Delete_category;
    private $Get_category;
    private $Update_category;

    public function __construct() {
        $this->Get_category = new  \Kirolos\GalleryApp\Category\Get_categories();
        $this->Delete_category = new \Kirolos\GalleryApp\Category\Delete_Categories();
        $this->Create_category = new \Kirolos\GalleryApp\Category\Create_categories();
        $this->Update_category = new \Kirolos\GalleryApp\Category\Update_categories();
    }

    public function Get_Category_By_id($id){
        return $this->Get_category->Get_categoryById($id);
    }

    public function Get_CategoryByname($name){
        return $this->Get_category->Get_categoryByName($name);
    }

    public function Get_All_Categories(){
        return $this->Get_category->Get_All_Categories();
    }

    public function Delete_Category_By_id($id){
        $this->Delete_category->deleteCategoryById($id);
    }

    public function Delete_CategoryByname($name){
        $this->Delete_category->deleteCategoryByName($name);
    }

    public function Create_Category($name){
        $this->Create_category->Create_category($name);
    }

    public function Update_Category($id, $newName){
        $this->Update_category->updateCategoryById($id, $newName);
    }
}

?>
