<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="assets/icons/homelandlogo.png" />
  <title>HomeLand</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="nav_container">
    <div class="nav_logo">
      <a href="homepage.php"><img class="nav_logo" src="assets/icons/homelandlogo.png" alt="logo" /></a>
    </div>

    <ul class="nav_mid">
      <li class="nav_link"><a href="homepage.php">Home</a></li>
      <li class="nav_link"><a href="produk.php">Produk</a></li>
      <li class="nav_link"><a href="#tentangkami">Tentang Kami</a></li>
    </ul>

    <ul class="nav_right">
      <li class="nav_link">
        <a href="keranjang.php"><i class="bi bi-cart3"></i></a>
      </li>
      <li class="separator"></li>
      <li>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person-circle"></i> </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="akunsaya.php">Akun saya</a></li>
            <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>