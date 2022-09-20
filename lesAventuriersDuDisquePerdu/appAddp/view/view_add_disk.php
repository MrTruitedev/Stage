<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <title>Add disk</title>
</head>
<body>
    <h3>Ajouter un disque</h3>
    <form action="" method="post">
        <p>saisir le nom :</p>
        <p><input type="text" name="name_disk"></p>
        <p>saisir la taille :</p>
        <p><input type="text" name="size_disk"></p>
        <p>saisir la date d'achat :</p>
        <p><input type="date" name="date_bought"></p>
        <p>saisir le prix d'achat :</p>
        <p><input type="text" name="price_bought"></p>
        <p><input type="submit" value="Ajouter" name="add"></p>
    </form>
    <div id="error"></div>
</body>
</html>