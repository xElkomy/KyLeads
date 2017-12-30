<!-- <?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../objects/Product.php';

// instantiate objects
$database = new Database();
$db = $database->getConnection();
// initialize objects
$product = new Product($db);

// query
$stmt = $product->read();
$num = $stmt->rowCount();

if($num>0){
    $products_arr = array();
    $products_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // make $row['name'] to $name only and other data
        extract($row);
        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name

        );

        array_push($products_arr["records"],$product_item);
    }
    echo json_encode($products_arr);
}
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?> -->
<?php 
echo 'tes';