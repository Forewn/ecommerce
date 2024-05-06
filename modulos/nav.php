<?php include "cambio.php" ?>
<link rel="stylesheet" href="css/radio.css">
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Tienda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalogo</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="shop.php">Tienda</a>
            <a class="dropdown-item" href="product-single.php">Productos</a>
            <a class="dropdown-item" href="cart.php">Carrito</a>
            <a class="dropdown-item" href="checkout.php">Checkout</a>
            </div>
            </li>
            <li class="nav-item"><a href="about.php" class="nav-link">Acerca</a></li>
            <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Contacto</a></li>
            <li class="nav-item cta cta-colored"><a href="login.php" class="nav-link"><span class="icon-user"></span></a></li>
            <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
            <div class="radio-input" id="currencies">
              <label>
              <input type="radio" id="usd" name="value-radio">
              <span>USD</span>
              </label>
              <label>
                <input type="radio" id="ves" name="value-radio">
              <span>VES</span>
              </label>
              <label>
                <input type="radio" id="cop" name="value-radio">
              <span>COP</span>
              </label>
              <span class="selection"></span>
            </div>
          </ul>
        </div>
    </div>
</nav>
<link rel="stylesheet" href="css/searchBtn.css">
<div id="container">
<form role="search" method="get" id="searchform" action="">
  <label for="s">
    <i class="icon-search"></i>
  </label>
  <input type="text" value="" placeholder="search" class="" id="s" />
</form>
</div>
<script src="./js/searchBtn.js"></script>
<script src="./js/currencies.js"></script>