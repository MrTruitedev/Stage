<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./asset/style/style.css"> -->
    <title>Add item</title>
</head>

<body>
    <div class="main">
        <h3>Ajouter un item</h3>
        <div class="btn">
            <button class="property" onclick="createItemProperty()">Ajouter une propriété</button>
        </div>
        <form action="" method="post">
            <p>saisir le nom :</p>
            <p><input type="text" name="name_item"></p>
            <p>saisir la date d'achat :</p>
            <p><input type="date" name="date_bought"></p>
            <p>saisir le type de produit :</p>
            <div id="php">
            <p><select name="products"></p>
                <option value="">Selectionnez un produit</option>
                <?php
                $product = $bdd -> query('SELECT id_product, name_product FROM products');
                while($affichage = $product->fetch()){
                    $selected = (isset($_POST['products']) AND $_POST['products'] == $affichage['id_product']) ? 'selected="selected"' : '';
                    echo '<option value="'.$affichage['id_product'].'"'.$selected.'>'.$affichage['name_product'].'</option></br>';
                }
                ?>
            </select>
            </div>
            <div class="itemProperties">
                <p id="itemForm1"></p>
                <p id="itemForm2"></p>
            </div>
            <p><input type="submit" value="Ajouter" name="add"></p>
        </form>
    </div>
    <div id="error"></div>
    
    <script src="./asset/script/script.js"></script>

</body>

</html>