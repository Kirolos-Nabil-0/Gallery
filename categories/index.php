<?php 
require_once "../includes/headear.php";
require_once __DIR__ . '/../vendor/autoload.php';
require_once "../traits/General.php";

// Create an instance of the Categories class
$categories = new \Kirolos\GalleryApp\Category\Categories();

// Create Category
if(isset($_POST['create'])) {
    $name = $_POST['name'];
    $message = $categories->Create_Category($name);
}

// Read Categories
$allCategories = $categories->Get_All_Categories();

?>

<!-- Create Category Form -->
<div class="container">
    <h1>Create Category</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Create</button>
    </form>
    <?php if(isset($message)) { echo "<p>$message</p>"; } ?>
</div>

<!-- Display Categories -->
<div class="container mt-5">
    <h1>All Categories</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allCategories as $category) {
                ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="edit.php?id=<?php echo $category['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $category['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once "../includes/fotter.php"; ?>
