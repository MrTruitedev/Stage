<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>modifier item</title>
</head>
<body>
    <h3>Modifier un loan</h3>
    <form action="" method="post">
        <p>Modifier le client :</p>
        <p><input type="text" name="society" id="society"></p>
        <p>Modifier la date de prêt :</p>
        <p><input type="date" name="date_loan" id="date"></p>
        <p>Modifier l'objet</p>
        <p><select name="items" ></p>
            <option value="">Selectionnez un objet</option>
            <?php
            $item = $bdd -> query('SELECT id_item, name_item FROM items');
            while($affichage = $item->fetch()){
                echo '<option value="'.$affichage['id_item'].'"id="select">'.$affichage['name_item'].'</option></br>';
            }
                ?>
        <p><input type="submit" value="Modifier" name="modify"></p>
    </form>
    <div id="error"></div>
</body>
</html>