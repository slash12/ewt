<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Products</title>
        <style type="text/css">
            table.products 
            {
                width: 100%;
            }

            table.products thead 
            {
                background-color: #eee;
                text-align: left;
            }

            table.products thead th 
            {
                border: solid 1px #fff;
                padding: 3px;
            }

            table.products tbody td 
            {
                border: solid 1px #eee;
                padding: 3px;
            }

            a, a:hover, a:active, a:visited 
            {
                color: blue;
                text-decoration: underline;
            }
        </style>
    </head>
 <body>
    <div>
        <a href="proindex.php?op=new">Add new Product</a>
    </div>
    <table border="0" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><a href="?orderby=name">Name</a></th>
                <th><a href="?orderby=quantity">quantity</a></th>
                <th><a href="?orderby=price">price</a></th>                
                <th>&nbsp;</th>
            </tr>
        </thead>
    <tbody>
    <?php 
    //foreach ($contacts as $contact):
        // var_dump($products);
        foreach ($products as $product):
        ?>
    <tr>
    <td>
        <a href="proindex.php?op=show&id=<?php print $product['id']; ?>"><?php print htmlentities($product['name']); ?></a>
    </td>
    <td><?php print htmlentities($product['quantity']); ?></td>
    <td><?php print htmlentities($product['price']); ?></td>
    <td>
        <a href="proindex.php?op=delete&id=<?php print $product['id'];?>">delete</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
 </body>
</html>