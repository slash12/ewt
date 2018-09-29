<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 

        <title><?php print $product[0]->name; ?></title>
    </head>
    <body>
         <h1><?php print $product[0]->name; ?></h1>
        <div>
            <span class="label">Quantity:</span>
            <?php print $product[0]->quantity; ?>
        </div>
        <div>
            <span class="label">Price:</span>
            <?php print $product[0]->price; ?>
        </div>
    </body>
</html>