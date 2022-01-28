<html>
<body>
<ul>
    <?php
    /** @global $list */
    foreach ($list as $valuecategory) {
        echo
            '<li><a href="index.php?action=show-category-with-product&category=' .  $valuecategory['category'] . '">'
            . $valuecategory['category'] . '</li> </a>';
    }
    ?>

    </ul>

</body>
</html>


