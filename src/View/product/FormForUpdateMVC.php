    <html>
    <body>
    <form method="post" action="index.php?action=update-product2" target="_blank">
<?php
/** @global $products */

foreach ($products as $valueProduct) {
    echo
        '<label>  Name 
<input type="text" name="name" value="' . $valueProduct['name'] . '"> </label> <br>
<label> Category
<input type="text" name="category" value="' . $valueProduct['category'] . '"> </label> <br>
<label> Sku
<input type="text" name="sku" value="' . $valueProduct['sku'] . '"> </label> <br>
<label> Price
<input type="text" name="price" value="' . $valueProduct['price'] . '"> </label> <br>
<label> Quantity
<input type="text" name="quantity" value="' . $valueProduct['quantity'] . '"> </label> <br>
<input type="submit" Обновить продукт/> <br>
 <button> <a href="index.php?action=delete-product&name=' . $valueProduct['name'] . '&category=' . $valueProduct['category'] . '">' . 'Удалить' . '</a> </button>
';
}
echo
'</form>

</body>
</html> '
    ?>
