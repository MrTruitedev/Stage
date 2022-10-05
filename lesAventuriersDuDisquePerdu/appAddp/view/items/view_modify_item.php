<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <title>modifier item</title>
</head>
<body>
    <h3>Modifier un item</h3>
    <form action="" method="post">
        <p>Modifier le nom :</p>
        <p><input type="text" name="name_item" id="nom"></p>
        <p>Modifier la date d'achat :</p>
        <p><input type="date" name="date_bought" id="date"></p>
        <p>Modifier le produit</p>
        <p><select name="id_product"></p>
            <option value="">Selectionnez un produit</option>
            <?php
            $product = $bdd -> query('SELECT id_product, name_product FROM products');
            while($affichage = $product->fetch()){
                $selected = (isset($_POST['products']) AND $_POST['products'] == $affichage['id_product']) ? 'selected="selected"' : '';
                echo '<option value="'.$affichage['id_product'].'"'.$selected.'>'.$affichage['name_product'].'</option></br>';
            }
                ?>
        <p><input type="submit" value="Modifier" name="modify"></p>
    </form>
    <div id="error"></div>
</body>
</html>