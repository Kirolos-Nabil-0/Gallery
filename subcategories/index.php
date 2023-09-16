<?php
require_once "../includes/headear.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";

use Kirolos\GalleryApp\Subcat\SubCategories; 
use Kirolos\GalleryApp\Category\Categories;

$categoryObject = new Categories();
$categoryOptions = $categoryObject->Get_All_Categories();
$subcategoryManager = new SubCategories();
$allSubcategories = $subcategoryManager->Get_all_sub_categories();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_subcategory'])) {
    // Process the form submission here
    $name = $_POST['name'];
    $category = $_POST['category'];

    // Perform validation here if needed

    // Insert the new subcategory into the database
    $result = $subcategoryManager->createSubcategory($name, $category);

    // Check if the insertion was successful and display a message
    if ($result === "Sub Category $name created successfully.") {
        echo "<div class='alert alert-success'>$result</div>";
        $subcategoryManager->redirect("index");
    } else {
        echo "<div class='alert alert-danger'>$result</div>";
    }
}
?>

<div class="container mt-5">
    <h1>Add Subcategory</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Subcategory Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" class="form-control" required>
                <?php foreach ($categoryOptions as $category) { ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="add_subcategory" class="btn btn-primary">Add Subcategory</button>
    </form>

    <h1>All Subcategories</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Belongs To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allSubcategories as $subcategory) { ?>
                <tr>
                    <td><?php echo $subcategory[0]; ?></td>
                    <td><?php echo $subcategory[1]; ?></td>
                    <td><?php echo $categoryObject->Get_Category_By_id( $subcategory[2])['name']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="edit.php?id=<?php echo $subcategory[0]; ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $subcategory[0]; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once "../includes/fotter.php"; ?>
