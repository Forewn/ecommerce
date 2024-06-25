<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="./css/sweetalert2.css">
</head>
<body>
    <header>
        <?php include "./modulos/navbar.php"; ?>
    </header>
    <main class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-7"><input type="text" class="form-control" placeholder="Buscar" oninput="search(this.value)"></div>
                <div class="col-3">
                    <button class="btn btn-outline-success">Buscar</button>
                </div>
            </div>
        </div>
        <table class="table mt-2 text-center">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="table">
                <?php
                    include "../php/conn.php";
                    $sql = "SELECT * FROM categorias;";
                    $result = $conn->query($sql);
                    while($producto = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$producto['id_categoria']."</td>";
                        echo "<td>".$producto['categoria']."</td>";
                        echo "<td><div class='row'>
                        <div class='col-12 col-lg-5'>
                            <button class='btn btn-outline-success'>U</button>
                        </div>
                        <div class='col-12 col-lg-5'>
                        <button class='btn btn-outline-warning'>D</button>
                        </div>
                        </div></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
<script src="./js/busqueda_categorias.js"></script>
<script src="./js/sweetalert2.min.js"></script>
</html>