<!DOCTYPE html>
<html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>
                <?php print htmlentities($title) ?>
            </title>
        </head>
    <body>
 <?php
    if ( $errors ) 
    {
        print '<ul>';
        foreach ( $errors as $field => $error ) 
        {
            print '<li>'.htmlentities($error).'</li>';
        }
        print '</ul>';
    }
 ?>
        <form method="POST" action="">
            <label for="name">Name:</label><br/>
            <input type="text" name="name" value="<?php print htmlentities($name) ?>"/>
            <br/>
            <label for="phone">Quantity:</label><br/>
            <input type="text" name="quantity" value="<?php print htmlentities($quantity)?>"/>
            <br/>
            <label for="email">Price:</label><br/>
            <input type="text" name="price" value="<?php print htmlentities($price) ?>"/>
            <br/>
            <input type="hidden" name="proform-submitted" value="1" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>