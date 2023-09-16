<?php
require_once "../includes/headear.php";
require_once __DIR__ . '../../vendor/autoload.php';
require_once "../traits/General.php";?>
<?php $categories =  new \Kirolos\GalleryApp\Category\Categories();
    $subcategories = new \Kirolos\GalleryApp\Subcat\SubCategories();

?>


<div class="container tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Create Media
        </h2>
    </div>
    <div class="row mb-4">
        <form method="POST" action="process_create.php" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <input type="text" name="title" class="form-control" placeholder="Title" />
            </div>

            <div class="form-outline mb-4">
                <textarea name="description" class="form-control" placeholder="Description" rows="8"></textarea>
            </div>
            <div class="form-outline mb-4">
                <label for="media_type">Media Type:</label>
                <select name="media_type" id="media_type" class="form-control">
                    <option value="photo">Photo</option>
                    <option value="video">Video</option>
                </select>
            </div>

            <div class="form-outline mb-4">
                <input type="file" name="file" class="form-control" placeholder="File" />
            </div>

            <div class="form-outline mb-4">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control">
                    <!-- Fetch and populate categories from the database -->
                    <?php
                    $categoriesFetched = $categories->Get_All_Categories();
                    foreach ($categoriesFetched as $category) {
                        echo "<option value='{$category['id']}'>{$category['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4">
                <label for="subcategory">Subcategory:</label>
                <select name="subcategory" id="subcategory" class="form-control">
                    <!-- Subcategories will be populated dynamically using JavaScript -->
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const categorySelect = document.getElementById("category");
        const subcategorySelect = document.getElementById("subcategory");

        categorySelect.addEventListener("change", function () {
            const selectedCategoryId = categorySelect.value;
            const xhr = new XMLHttpRequest();
            xhr.open("GET", `get_subcategories.php?category_id=${selectedCategoryId}`, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const subcategories = JSON.parse(xhr.responseText);

                    // Clear existing options
                    subcategorySelect.innerHTML = "";

                    // Populate subcategory options
                    subcategories.forEach(subcategory => {
                        const option = document.createElement("option");
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;
                        subcategorySelect.appendChild(option);
                    });
                }
            };
            xhr.send();
        });
    });
</script>
<?php require_once "../includes/fotter.php"; ?>
