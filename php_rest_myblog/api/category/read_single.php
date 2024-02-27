<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$category = new Category($db);

// Get id from URL
$category->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get Post
$category->read_single();

// Create array
$cat_arr = array(
    'id' => $category->id,
    'name' => $category->name,
    'created_at' => $category->created_at
);

// MakeJSON
print_r(json_encode($cat_arr));