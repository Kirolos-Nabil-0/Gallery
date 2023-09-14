<?php
require_once "../includes/headear.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";

use Kirolos\GalleryApp\Category\Categories;

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
    $categories = new Categories();
    $category = $categories->Get_Category_By_id($categoryId);

    if ($category) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle category deletion
            $categories->Delete_Category_By_id($categoryId);
            $categories->redirect("index");
            exit();
        }
?>
        <div class="container mt-5">
            <h1>Delete Category</h1>
            <p>Are you sure you want to delete the category "<?php echo $category['name']; ?>"?</p>
            <form method="POST">
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
<?php
    } else {
        echo "Category not found.";
    }
} else {
    echo "Category ID not provided.";
}

 require_once "../includes/fotter.php"; ?>
