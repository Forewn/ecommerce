<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <?php include "./modulos/navbar.php"; ?>
    <form action="./php/new_product.php" method="post" enctype="multipart/form-data">
        <div class="container p-md-5 mt-5">
            <label for="" class="form-label">Codigo</label>
            <input type="text" name="codigo" required class="form-control"><br>
            <label for="" class="form-label">Nombre</label>
            <input type="text" name="nombre" required class="form-control"><br>
            <label for="" class="form-label">Descripcion</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" required class="form-control" style="height:20px;"></textarea><br>

            <label for="" class="form-label">Categoria</label>
            <select name="categoria" id="categoria" required class="form-select"><br>
                <?php
                    require "../php/conn.php";
                    $sql = "SELECT * FROM categorias;";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        echo "<option value=".$row['id_categoria'].">".$row['categoria']."</option>";
                    }
                ?>
            </select><br>
            <label for="" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" required class="form-control"><br>
            <label for="" class="form-label">Foto producto</label>
            <input type="file" name="foto" id="foto" required class="form-control"><br>
            <center><input type="submit" value="Enviar" class="btn btn-outline-success"></center>
        </div>
    </form>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>