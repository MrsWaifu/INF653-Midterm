<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $category = new Category($db);

  $category->id = isset($_GET['id']) ? $_GET['id'] : die();

  $category->read_single();

  if($category->category){
    $cat_arr = array(
      'id' => $category->id,
      'category' => $category->category
    );
    print_r(json_encode($cat_arr));
  }else{
    print_r(json_encode(array('message'=> 'categoryId Not Found')));
  }
