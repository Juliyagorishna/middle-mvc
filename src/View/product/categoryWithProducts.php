<html>
<body>
<ul>
    <?php
    /** @global $categoryWithProducts */

        foreach ($categoryWithProducts as $valueproducts) {
     echo
            '<li>' . $valueproducts['name'] . '</li>';
            };
        ?>
</ul>
</body>
</html>

