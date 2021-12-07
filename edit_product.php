<html>
<body>

<?php
$aisle_name = $_POST['aisle'];

$id = $_POST['id'];

$name = $_POST['name'];

$price = $_POST['price'];

$description = $_POST['description'];

$image = $_POST['image'];

$width = $_POST['width'];

$height = $_POST['height'];


$xml = new DomDocument('1.0', 'utf-8');
$xml->load('products.xml', LIBXML_NOBLANKS);
$xml->formatOutput = true;
$products = $xml->getElementsByTagName('product');
$old_product;


foreach($products as $product){
  if ($product->childNodes[0]->textContent == $id){
    $old_product = $product;
    break;
  }
}



$new_product = $xml->createElement('product');



$d_name = $xml->createElement('name', $name);
$d_id = $xml->createElement('id', $id);
$d_price = $xml->createElement('price', $price);
$d_description = $xml->createElement('description', $description);
$d_image = $xml->createElement('image', $image);
$d_width = $xml->createElement('i_width', $width);
$d_height = $xml->createElement('i_height', $height);

$new_product->appendChild($d_id);
$new_product->appendChild($d_name);
$new_product->appendChild($d_price);
$new_product->appendChild($d_description);
$new_product->appendChild($d_image);
$new_product->appendChild($d_width);
$new_product->appendChild($d_height);

$old_product->parentNode->replaceChild($new_product, $old_product);


$xml->save('products.xml');

echo "<meta http-equiv=\"refresh\" content=\"0;URL=product_list.php\">";

?>

</body>
</html>
