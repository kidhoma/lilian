<?php

function output($product) 
{
    
    $output = "";

    $output = $output . '<div class="col-md-3 text-center">';
    $output = $output . '<div class="well">';
    $output = $output . '<a href="/phone/?id=' . $product['sku'] . '">';
    $output = $output . '<img height="250px" width="250px" src="' . $product["img"] . '" alt="' . $product["name"] . '">';
    $output = $output . '<hr>';
    $output = $output . '<button class="btn btn-success">View details</button>';
    $output = $output . "</a>";
    $output = $output . '</div>';
    $output = $output . '</div>';

    return $output;

}

function search($q)
{
    $results = array();

    $allProducts = allProducts();

    foreach ($allProducts as $product) 
    {
        if (stripos($product['name'], $q) !== false) 
        {
            $results[] = $product;
        }                
    }

    return $results;
}

function recentProducts()
{

    $allProducts = allProducts();

    $recent = array();

    $total_products = count($allProducts);

    $position = 0;
    
    foreach ($allProducts as $product) 
    {
        $position = $position + 1;

        if ($total_products - $position < 4) 
        {
            $recent[] = $product;
        }

    }

    return $recent;

}

function allProducts()
{
    $products = array();

    $products[101] = array(
    	"name" => "M9 Bluetooth Smart-Wrist-Watch",
    	"img" => "/img/phones/smartwatch.jpg",
    	"price" => 50,
    	"paypal" => "DPC2S7KG49NQQ",
        "color" => array("Black","White","Pink")
    );

    $products[102] = array(
    	"name" => "FERO A4501 SmartPhone",
        "img" => "/img/phones/fero.jpg",
        "price" => 80,
        "paypal" => "2MQXRL5KGHK9L",
        "color" => array("Black","White","Pink")
    );

    $products[103] = array(
        "name" => "HTC Desire 510 SmartPhone",
        "img" => "/img/phones/htcdesire.jpg",    
        "price" => 100,
        "paypal" => "YAKN74QNBVQ2N",
        "color" => array("Black","White","Pink")
    );

    $products[104] = array(
        "name" => "Homtom HD SmartPhone",
        "img" => "/img/phones/homtom.jpg",    
        "price" => 90,
        "paypal" => "QVS3E7A5QDB24",
        "color" => array("Black","White","Pink")
    );

    $products[105] = array(
        "name" => "UYI TOUCH SmartPhone",
        "img" => "/img/phones/uyi.jpg",    
        "price" => 99,
        "paypal" => "Q22QAPWV2JX72",
        "color" => array("Black","White","Pink")
    );

    $products[106] = array(
        "name" => "Vivo Y22 SmartPhone",
        "img" => "/img/phones/vivo.jpg",    
        "price" => 103,
        "paypal" => "2FMAE4BGWMQ22",
        "color" => array("Black","White","Pink")
    );

    $products[107] = array(
        "name" => "Samsung Galaxy S7 SmartPhone",
        "img" => "/img/phones/s7.jpg",    
        "price" => 200,
        "paypal" => "FNXW5BJW8QR4N",
        "color" => array("Black","White","Pink")
    );

    $products[108] = array(
        "name" => "U8 Bluetooth Smart-Wrist-Watch",
        "img" => "/img/phones/u8.jpg",    
        "price" => 70,
        "paypal" => "SU7PY683CFL8E",
        "color" => array("Black","White","Pink")
    );

    foreach ($products as $product_id => $product) 
    {
        $products[$product_id]['sku'] = $product_id;
    } 

    return $products;
}

$products  = allProducts();

$recent = recentProducts();

?>