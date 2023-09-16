<?php
require_once "../includes/headear.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";

use Kirolos\GalleryApp\Subcat\SubCategories;

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $subcategoryId = $_GET['id'];
    
    // Assuming you have a class to handle subcategories and delete operations
    $subcategories = new SubCategories();
    
    // Delete the subcategory by ID
    $result = $subcategories->deleteSubCategoryById($subcategoryId);
    
    if ($result) {
        $subcategories->redirect($base_url."subcategories/"); // Redirect to the main page or any desired location
    } else {
        echo "<p>Failed to delete subcategory.</p>";
    }
} else {
    echo "<p>Subcategory ID not provided.</p>";
}

?>

<?php require_once "../includes/fotter.php"; ?>
