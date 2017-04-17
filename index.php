<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php'; 

	$pageTitle = owner . " | Home";
	$page = "home";

	require_once products;
	require_once header;

	echo '<div class="alert alert-success"><h1 class="text-center">' . owner . ' Latest Phones</h1></div>';
	echo '<div class="row">';

	$total_products = count($products);
	$position = 0;
	$list_view_html = "";

	foreach($products as $product_id => $product) 
	{ 
		$position = $position + 1;
		if ($total_products - $position < 4) 
		{
			$list_view_html = get_list_view_html($product_id,$product) . $list_view_html;
		}
	}

	echo $list_view_html;

	echo "</div>";

	require_once footer;
	
?>