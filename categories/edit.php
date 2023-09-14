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
            // Handle form submission and update category
            $newName = $_POST['name'];
            // Validate and sanitize the input
            $newName = filter_var($newName, FILTER_SANITIZE_STRING);

            if (empty($newName)) {
                $error = "Category name cannot be empty.";
            } else {
                // Update the category in the database
                $categories->Update_category($categoryId, $newName);
                $categories->redirect("index");
                exit();
            }
        }
?>
        <div class="container mt-5">
            <h1>Edit Category</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $category['name']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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

