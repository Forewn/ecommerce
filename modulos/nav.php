<?php include "cambio.php" ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="css/radio.css">
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light sticky-top" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">Tienda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="shop.php">Productos</a></li>
        <li class="nav-item"><a href="pedidos.php" class="nav-link">Pedidos</a></li>
        <li class="nav-item cta cta-colored"><a href="login.php" class="nav-link"><span class="icon-user"></span></a>
        </li>
        <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span
              class="icon-shopping_cart"></span>[0]</a></li>
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
<link rel="stylesheet" href="./css/searchBar.css">
<div class="container" id="searchBar">
  <form class="form-inline justify-content-center thaps-search-form" id="searchFORM" method="get">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="search-icon">
          <i class="bi bi-search"></i>
        </span>
      </div>
      <input type="text" class="form-control" id="s" placeholder="Buscar" oninput="search(this.value)">
      <div class="input-group-append">
        <button type="submit" class="btn btn-primary" id="thaps-search-button">
          Buscar
        </button>
      </div>
    </div>
    <input type="hidden" name="post_type" value="product">
    <span class="badge badge-secondary" id="selected_option"></span>
  </form>
  <div class="container" id="searchResults">
    <ul class="list-group" style="list-style: none;">
    </ul>
  </div>
</div>






<script src="./js/searchBtn.js"></script>
<script src="./js/currencies.js"></script>