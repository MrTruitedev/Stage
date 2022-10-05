<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./asset/script/script.js"></script>
    <title>Add loan</title>
</head>
<body>
<p>Choisir un client</p>
    <div id="board">
        <form method="#" name="searchForm" id="searchForm">
            <div id="f_search">
                <div id="f_search-input">
                    <input type="text" name="search" id="search" placeholder="Saisir le nom du client" onkeyup="showKeys(this.value)" autocomplete="off">
                </div>
            </div>
        </form>
        <div id="livesearch"></div>
    </div>

<form action="" method="post">
    <h3>Ajouter un loan</h3>
    <p>Choisir un item à loaner</p>
        <p><select name="id_item"></p>
            <option value="">Selectionnez un item</option>
            <?php
            $item = $bdd -> query('SELECT id_item, name_item FROM items');
            while($affichage = $item->fetch()){
                $selected = (isset($_POST['items']) AND $_POST['items'] == $affichage['id_item']) ? 'selected="selected"' : '';
                echo '<option value="'.$affichage['id_item'].'"'.$selected.'>'.$affichage['name_item'].'</option></br>';
            }
                ?>
        </select>

    <p>Ajouter une note</p>
    <textarea name="note" cols="30" rows="5"></textarea>
    <p><input type="submit" value="Ajouter" name="add"></p>    
</form>
</body>
</html>