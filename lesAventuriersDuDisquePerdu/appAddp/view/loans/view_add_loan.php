<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../asset/script/script.js"></script>
    <title>Add loan</title>
</head>
<body>
<p>Choisir un client</p>
    <div id="board">
        <form method="post" name="searchForm" id="searchForm">
            <div id="f_search">
                <div id="f_search-input">
                    <input type="text" name="search" id="search" placeholder="Saisir le nom du client" onkeyup="showKeys(this.value)" autocomplete="off">
                </div>
            </div>
        
        <div id="livesearch"></div>
    </div>


    <h3>Ajouter un loan</h3>
    <p>Vous souhaitez loaner : </p>
    <div id="scanItem"></div>
    <p>Ajouter une note</p>
    <textarea name="note" cols="30" rows="5"></textarea>
    <p><input type="submit" value="Ajouter" name="add"></p>    
</form>
</body>
</html>
