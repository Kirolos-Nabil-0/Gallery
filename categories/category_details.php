<?php
require_once "../includes/headear.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";
use Kirolos\GalleryApp\Categories\Categories; // Adjust the namespace as needed
use Kirolos\GalleryApp\Subcat\SubCategories; // Adjust the namespace as needed

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $categoryId = $_GET['id'];

    $categoryManager = new \Kirolos\GalleryApp\Category\Categories();

    $category = $categoryManager->Get_Category_By_id($categoryId);

    if ($category) {
        // Display category details
        echo "<div class='container mt-5'>";
        echo "<h1 class='display-4'>Category Details</h1>";
        echo "<h2>Name: " . $category['name'] . "</h2>";

        // Fetch and display subcategories if available
        $subcategoryManager = new SubCategories();
        $subcategories = $subcategoryManager->GetSubcategoriesByCategoryId($categoryId);

        if (!empty($subcategories)) {
            echo "<h3>Subcategories:</h3>";
            echo "<ul class='list-group'>";
            foreach ($subcategories as $subcategory) {
                echo "<li class='list-group-item'>" . $subcategory[1] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No subcategories available for this category.</p>";
        }

        echo "</div>";
    } else {
        echo "<p class='alert alert-danger'>Category not found.</p>";
    }
} else {
    echo "<p class='alert alert-danger'>Invalid category ID.</p>";
}

 require_once "../includes/fotter.php"; ?>

