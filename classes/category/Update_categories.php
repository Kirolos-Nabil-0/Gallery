<?php
namespace Kirolos\GalleryApp\Category;

use Kirolos\GalleryApp\Db\db; // Import the db class

class Update_categories
{
    private $db;

    public function __construct()
    {
        $this->db = new db; // Create an instance of the db class
    }

    public function updateCategoryById($id, $newName)
    {
        $id = $this->db->escapeString($id);
        $newName = $this->db->escapeString($newName);

        $stmt = "UPDATE categories SET name = '$newName' WHERE id = '$id'";

        // Execute the query
        if ($this->db->query($stmt)) {
            echo "Category updated successfully.";
        } else {
            echo "Failed to update category.";
        }
    }

    public function updateCategoryByName($oldName, $newName)
    {
        $oldName = $this->db->escapeString($oldName);
        $newName = $this->db->escapeString($newName);

        $stmt = "UPDATE categories SET name = '$newName' WHERE name = '$oldName'";

        // Execute the query
        if ($this->db->query($stmt)) {
            echo "Category updated successfully.";
        } else {
            echo "Failed to update category.";
        }
    }
}
