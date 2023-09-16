<?php
require_once __DIR__ . '../../vendor/autoload.php';
require_once "../includes/headear.php";

use Kirolos\GalleryApp\Media\FileUpload;
use Kirolos\GalleryApp\Media\MediaRepository;

// Initialize MediaRepository
$mediaRepository = new MediaRepository();

// Initialize FileUpload
$file_upload = new FileUpload();
$file_upload->extensions = array(".png", ".zip", ".pdf", ".jpg"); // specify the allowed extensions here
$file_upload->upload_dir = "upload/";
// Check if the form was submitted
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $mediaType = $_POST['media_type'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];

    // Check if user_id is set in the session
    if (isset($_SESSION['user_idd'])) {
        $user_id = $_SESSION['user_idd'];

        // Handle file upload
        $file_upload->the_temp_file = $_FILES['file']['tmp_name'];
        $file_upload->the_file = $_FILES['file']['name'];
        $file_upload->http_error = $_FILES['file']['error'];

        if ($file_upload->upload()) {
            $file_path = $file_upload->file_copy; // Get the uploaded file name

            // Insert media into the database with user_id
            $result = $mediaRepository->addMedia($title, $description, $file_path, $category, $subcategory, $mediaType, $user_id);

            if ($result) {
                echo "<p>Media successfully created and uploaded.</p>";
            } else {
                echo "<p>Failed to create and upload media.</p>";
            }
        } else {
            $upload_errors = $file_upload->show_error_string();
            echo "<p>File upload failed with errors: $upload_errors</p>";
        }
    } else {
        echo "<p>User session not found.</p>";
    }
} else {
    echo "<p>Form not submitted.</p>";
}

require_once "../includes/fotter.php";
?>
