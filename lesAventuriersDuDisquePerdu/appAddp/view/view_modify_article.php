<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <title>modifier disk</title>
</head>
<body>
    <h3>Ajouter un disque</h3>
    <form action="" method="post">
        <p>Modifier le nom :</p>
        <p><input type="text" name="name_disk" id="nom"></p>
        <p>Modifier la taille :</p>
        <p><input type="text" name="size_disk" id="size"></p>
        <p>Modifier la date d'achat :</p>
        <p><input type="date" name="date_bought" id="date"></p>
        <p>Modifier le prix d'achat :</p>
        <p><input type="text" name="price_bought" id="price"></p>
        <p><input type="submit" value="Modifier" name="modify"></p>
    </form>
    <div id="error"></div>
</body>
</html>