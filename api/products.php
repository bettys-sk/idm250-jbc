<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once '../db_connect.php';
require_once '../lib/auth.php';
require_once '../lib/product.php';

check_api_key($env);

$method = $_SERVER['REQUEST_METHOD'];
// $id = isset($_SERVER['PATH_INFO']) ? intval(ltrim($_SERVER['path_info'], '/')) : 0;


if ($method === 'GET') :
	$data = get_products();
    if ($data) {
        echo json_encode(['success' => true,
        'total_products' => $data['total'],
        'products' => $data['products']]);
    }
    else {
        http_response_code(404);
        echo json_encode(['error' => 'Products not found']);
    }
endif;
