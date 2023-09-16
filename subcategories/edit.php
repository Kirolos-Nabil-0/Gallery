
<?php
require_once "../includes/headear.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";

use Kirolos\GalleryApp\Subcat\SubCategories; 
use Kirolos\GalleryApp\Category\Categories;

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $subcategoryId = $_GET['id'];
    
    // Assuming you have a class to handle subcategories and edit operations
    $subcategories = new SubCategories();
    $categories = new Categories();
    
    // Get the subcategory details by ID
    $subcategory = $subcategories->Get_Sub_Category_ById($subcategoryId);
    
    if (!$subcategory) {
        // Handle the case when the subcategory with the specified ID doesn't exist
        echo "<p>Subcategory not found.</p>";
    }
}

// Handle form submission if you have an update operation
if (isset($_POST['update'])) {
    $newName = $_POST['new_name']; // Assuming you have an input field with the name 'new_name'
    $newCategoryId = $_POST['new_category']; // Added input field for selecting the new CategoryId
    
    // Update the subcategory name and CategoryId
    $result = $subcategories->updateSubCategoryById($subcategoryId, $newName, $newCategoryId);
    
    if ($result) {
        echo "<p>Subcategory updated successfully.</p>";
        $subcategories->redirect($base_url."subcategories/");
    } else {
        echo "<p>Failed to update subcategory.</p>";
    }
}
?>

<!-- Display the form for editing the subcategory -->
<div class="container">
    <h1>Edit Subcategory</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="new_name">New Subcategory Name:</label>
            <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo $subcategory[0][1]; ?>" required>
        </div>
        <div class="form-group">
            <label for="new_category">New Category:</label>
            <select id="new_category" name="new_category" required>
                <?php foreach ($categories->Get_All_Categories() as $category) { ?>
                    <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $subcategory[0][2]) echo 'selected'; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

<?php require_once "../includes/fotter.php"; ?>










