<?php 
$filename = $_GET['image'];
// $gdimage = imagecreatefromjpeg($filename);
header('Content-Type: image/jpg');
readfile($filename);