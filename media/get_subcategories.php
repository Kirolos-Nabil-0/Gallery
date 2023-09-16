<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";

use Kirolos\GalleryApp\Subcat\SubCategories;

if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];

    // Initialize SubCategories class
    $subcategories = new SubCategories();

    // Get subcategories for the selected category
    $subcategoriesList = $subcategories->GetSubcategoriesByCategoryId($categoryId);

    // Prepare subcategories as JSON
    $response = [];
    foreach ($subcategoriesList as $subcategory) {
        $response[] = [
            'id' => $subcategory[0],
            'name' => $subcategory[1],
        ];
    }

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle the case when category_id is not provided
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Category ID is required.']);
}
?>
