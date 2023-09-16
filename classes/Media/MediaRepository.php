<?php
namespace Kirolos\GalleryApp\Media;

use PDO;

class MediaRepository
{
    private $conn;

    public function __construct()
    {
        $servername = "localhost"; // Replace with your database server name or IP address
        $username = "root"; // Replace with your database username
        $password = ""; // Replace with your database password
        $dbname = "gallery"; // Replace with the name of your database

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getById($id)
    {
        $query = "SELECT * FROM `media` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByCategory($categoryId)
    {
        $query = "SELECT * FROM `media` WHERE category_id = :category_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":category_id", $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySubcategory($subcategoryId)
    {
        $query = "SELECT * FROM `media` WHERE subcategory_id = :subcategory_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":subcategory_id", $subcategoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllMedia()
    {
        $query = "SELECT * FROM `media`";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateMedia($id, $title, $description)
    {
        $query = "UPDATE `media` SET title = :title, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteMedia($id)
    {
        $query = "DELETE FROM `media` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function addMedia($title, $description, $file_path, $category_id, $subcategory_id, $user_id, $media_type)
{
    $query = "INSERT INTO `media` (title, description, file_path, category_id, subcategory_id, user_id, media_type) VALUES (:title, :description, :file_path, :category_id, :subcategory_id, :user_id, :media_type)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":file_path", $file_path);
    $stmt->bindParam(":category_id", $category_id, PDO::PARAM_INT);
    $stmt->bindParam(":subcategory_id", $subcategory_id, PDO::PARAM_INT);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":media_type", $media_type);
    
    if ($stmt->execute()) {
        return true; // Media added successfully
    } else {
        return false; // Failed to add media
    }
}

}
