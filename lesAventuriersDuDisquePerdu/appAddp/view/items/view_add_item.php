<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add item</title>
</head>

<body>
    <div class="text-center py-3">
        <h3 >Ajouter un item</h3>
        <div class="py-3">
            <button class="btn btn-outline-primary mb-3" onclick="createItemProperty()">Ajouter une propriété</button>
        </div>
        <form action="" method="post">
            <p><input type="text" class="form-control mx-auto w-auto mb-4" name="name_item" id="nom" placeholder="Saisir le nom de l'item"></p>
            <label for="date"> Saisir la date d'achat :</label>
            <p><input type="date" class="mb-2 w-auto" name="date_bought" id="date"></p>
            <div id="php">
                <label for="select">Selectionnez un produit</label>
            <p><select name="products" class="form-select w-auto  mx-auto" id="select"></p>
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
            <p><input class="btn btn-outline-primary mb-3 type="submit" value="Ajouter" name="add"></p>
        </form>
    </div>
    <div id="error"></div>
    
    <script src="./asset/script/script.js"></script>

</body>

</html>