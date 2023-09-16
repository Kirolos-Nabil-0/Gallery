<?php
namespace Kirolos\GalleryApp\Subcat;

use Kirolos\GalleryApp\Db\db;

class SubCategories
{
    use \General;
    private $db;
    private $get_Sub_Categories;
    private $update_Sub_Categories;
    private $create_Sub_Categories;
    private $delete_Sub_Categories;

    public function __construct()
    {
        $this->db = new db();
        $this->get_Sub_Categories = new GetSubCategories();
        $this->update_Sub_Categories = new UpdateSubCategory();
        $this->create_Sub_Categories = new CreateSubCategory();
        $this->delete_Sub_Categories = new DeleteSubCategory();
    }

    public function Get_all_sub_categories()
    {
        return $this->get_Sub_Categories->getAllSubcategories();
    }

    public function Get_Sub_Category_ById($id)
    {
        return $this->get_Sub_Categories->getSubCategoryById($id);
    }

    public function Get_Sub_Category_By_Category_Name($categoryname)
    {
        return $this->get_Sub_Categories->getSubcategoriesByCategoryName($categoryname);
    }

    public function GetSubcategoriesByCategoryId($categoryID)
    {
        return $this->get_Sub_Categories->getSubcategoriesByCategoryId($categoryID);
    }

    public function updateSubCategoryByName($oldName, $newName)
    {
        return $this->update_Sub_Categories->updateSubCategoryByName($oldName, $newName);
    }

    public function updateSubCategoryById($subcategoryId, $newName, $newCategoryId)
    {
        return $this->update_Sub_Categories->updateSubCategoryById($subcategoryId, $newName, $newCategoryId);
    }

    public function deleteSubCategoryByName($name)
    {
        return $this->delete_Sub_Categories->deleteSubCategoryByName($name);
    }

    public function deleteSubCategoryById($id)
    {
        return $this->delete_Sub_Categories->deleteSubCategoryById($id);
    }
    
    public function createSubcategory($name, $categoryId)
    {
        return $this->create_Sub_Categories->createSubcategory($name, $categoryId);
    }
}

?>
