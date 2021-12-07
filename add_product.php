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
$products = $xml->getElementsByTagName($aisle_name)->item(0);

if(empty($products)){
  $new_aisle = $xml->createElement($_POST['aisle']);
  $xml->childNodes[0]->appendChild($new_aisle);
  $products = $xml->getElementsByTagName($aisle_name)->item(0);
}

$product = $xml->createElement('product');

$products->appendChild($product);

$d_name = $xml->createElement('name', $name);
$d_id = $xml->createElement('id', $id);
$d_price = $xml->createElement('price', $price);
$d_description = $xml->createElement('description', $description);
$d_image = $xml->createElement('image', $image);
$d_width = $xml->createElement('i_width', $width);
$d_height = $xml->createElement('i_height', $height);

$product->appendChild($d_id);
$product->appendChild($d_name);
$product->appendChild($d_price);
$product->appendChild($d_description);
$product->appendChild($d_image);
$product->appendChild($d_width);
$product->appendChild($d_height);




$xml->save('products.xml');

echo "<meta http-equiv=\"refresh\" content=\"0;URL=product_list.php\">";
?>

</body>
</html>
