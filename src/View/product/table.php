<?php

/**
 * @global $hello
 * @global $products
 * @global $user
 * @global $message
 */

echo $hello;
?>
<html>
<body>
<table>
    <tr>
        <td>name</td>
        <td>category</td>
        <td>sku</td>
        <td>price</td>
        <td>quantity</td>
    </tr>

           <?php
foreach ($products as $valueProduct) {
    echo
    '<tr>';
    if ($user != 0) {
        echo
            '<td> <a href="index.php?action=update-product&name=' . $valueProduct['name'] . '">' . $valueProduct['name'] . '</a> </td>';
    } else {
        echo
            '<td> ' . $valueProduct['name'] . '</td>' ;
}
    echo
        '<td> ' . $valueProduct['category'] . '</td>
        <td> ' . $valueProduct['sku'] . '</td>
        <td> ' . $valueProduct['price'] . '</td>
        <td> ' . $valueProduct['quantity'] . '</td>
    </tr>';
}
?>
</table>
<?php
if ($_GET['message']) {
    echo $_GET['message'];
}
    if ($user != 0) {
        echo
'<form method="post" action="index.php?action=creat-product" target="_blank">
<label>
        Name
        <input type="text" name="name"/>
    </label><br>
    <label>
        Category
        <input type="text" name="category"/>
    </label><br>
    <label>
        Sku
        <input type="text" name="sku"/>
    </label><br>
    <label>
        Price
        <input type="text" name="price"/>
    </label><br>
    <label>
        Quantity
        <input type="text" name="quantity"/>
    </label><br>
   <input type="submit" Создать новый продукт</>
   </form>';
}
    ?>
</body>
</html>

