<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-center align-items-start">
      <span class="navbar-brand position-absolute mx-0 border rounded-4" style="background-color: white; color: #0d6efd ; font-weight: bold;">LADDP</span>
      <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-auto" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item dropdown mx-5">
              <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Loans</a>
              <div class="dropdown-menu ml-3">
                <a class="dropdown-item" href="?allLoans">Tous les loans</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?addLoan">Ajouter un loan</a>          
              </div>
            </li>
            <li class="nav-item dropdown mx-5">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Items</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="?allItems">Tous les items</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?addItem">Ajouter un item</a>
              </div>
            </li>
            <li class="nav-item dropdown mx-5">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Clients</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="?allClients">Tous les clients</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?addClient">Ajouter un client</a>          
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
  </html>