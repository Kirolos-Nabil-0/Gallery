<?php 
namespace Kirolos\GalleryApp\Subcat;

require_once __DIR__ . '/../../vendor/autoload.php';

use Kirolos\GalleryApp\Db\db; 

class SubCategories 
{
    private $db;
    private $get_Sub_Categories;
    private $update_Sub_Categories;
    private $create_Sub_Categories;
    private $delete_Sub_Categories;

    function __construct(){
        $db = new db();
        $this->get_Sub_Categories = new \Kirolos\GalleryApp\Subcat\GetSubCategories();
        $this->update_Sub_Categories = new \Kirolos\GalleryApp\Subcat\UpdateSubCategory();
        $this->create_Sub_Categories = new \Kirolos\GalleryApp\Subcat\CreateSubCategory();
        $this->delete_Sub_Categories = new \Kirolos\GalleryApp\Subcat\DeleteSubCategory();

    }

    public function Get_all_sub_categories(){
        return $this->get_Sub_Categories->getAllSubcategories();
    }
    
    public function Get_Sub_Category_ById($id){
        return $this->get_Sub_Categories->getSubCategoryById($id);
    }

    public function Get_Sub_Category_By_Category_Name($categoryname){
        return $this->get_Sub_Categories->getSubcategoriesByCategoryName($categoryname);
    }

    public function GetSubcategoriesByCategoryId($categoryID){
        return $this->get_Sub_Categories->getSubcategoriesByCategoryId($categoryID);
    }

    public function updateCategoryByName($oldName, $newName){
        return $this->update_Sub_Categories->updateCategoryByName($oldName, $newName);
    }

    public function deleteCategoryByName($name){
        return $this->delete_Sub_Categories->deleteCategoryByName($name);
    }

    public function createSubcategory($name, $categoryId) {
        return $this->create_Sub_Categories->createSubcategory($name, $categoryId);
    }
    
}




$ss = new SubCategories();
