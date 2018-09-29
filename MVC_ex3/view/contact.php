<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">        
        <title><?php print $contact[0]->name; ?></title>
    </head>
    <body>
         <h1><?php print $contact[0]->name; ?></h1>
        <div>
            <span class="label">Phone:</span>
            <?php print $contact[0]->phone; ?>
        </div>
        <div>
            <span class="label">Email:</span>
            <?php print $contact[0]->email; ?>
        </div>
        <div>
            <span class="label">Address:</span>
            <?php print $contact[0]->address; ?>
        </div>
    </body>
</html>