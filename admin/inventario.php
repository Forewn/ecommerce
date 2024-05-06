<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
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
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="table">
                <?php
                    include "../php/conn.php";
                    $sql = "SELECT a.codigo_producto, a.nombre, a.descripcion, a.precio, c.categoria, b.cantidad, a.foto_producto FROM productos a JOIN inventario b ON a.codigo_producto = b.codigo_producto JOIN categorias c ON c.id_categoria = a.id_categoria;";
                    $result = $conn->query($sql);
                    while($producto = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$producto['codigo_producto']."</td>";
                        echo "<td>".$producto['nombre']."</td>";
                        echo "<td>".$producto['descripcion']."</td>";
                        echo "<td>".$producto['precio']."</td>";
                        echo "<td>".$producto['categoria']."</td>";
                        echo "<td>".$producto['cantidad']."</td>";
                        echo "<td><button class='btn btn-outline-info' onclick='openAlert({$producto['codigo_producto']}, \"{$producto['foto_producto']}\")'>a</button></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
<script src="./js/inventario.js"></script>
<script src="./js/sweetalert2.min.js"></script>
</html>