<?php 
namespace Kirolos\GalleryApp\Db;

interface DatabaseInterface {
    public function query($query);
    public function bindParam($parameter, $value);
    public function execute();
}
