<?php
namespace Kirolos\GalleryApp\Categories;

use Kirolos\GalleryApp\Db\db; // Import the db class

class Categories 
{
    use \General;
    private $db;

    public function __construct()
    {
        $this->db = new db; // Create an instance of the db class
    }
}
