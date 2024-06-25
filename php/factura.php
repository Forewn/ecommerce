<?php
    require '../lib/fpdf/fpdf.php';

    class PDF extends FPDF{
        function Header()
        {
            // $donation = json_decode($_GET['donation']);
            $this->SetTitle("Donacion#");
            // Arial bold 15
            $this->SetFont('Times','B', 10);
            $this->MultiCell(190, 5, utf8_decode("República Bolivariana de Venezuela
            J-Rif de la entidad
            Nombre tienda
            Direccion tienda
            
            "), 0, 'C');
            $this->Ln(5);
        }
    
        function Body($id, $factura, $productos){
            $this->SetFontSize(20);
            $this->Cell(190, 5, utf8_decode("Factura"), 0, 0, 'C');
            $this->SetFont('Times','B', 10);
            $this->Ln(5);
            $this->Ln(5);
            $this->SetX(20);
            $this->Write(10, '#'.$id);
            $this->Ln(5);
            $this->SetX(20);
            $this->Write(10, 'Comprador: '.$factura['Nombre'].' '.$factura['Apellido']);
            $this->Ln(5);
            $this->SetX(20);
            $this->Write(10, 'Cedula: '.$factura['Cedula']);
            $this->Ln(5);
            $this->SetX(20);
            $this->Write(10, 'Fecha: '.date('d-m-Y'));            
            $this->Ln(20);
            $this->Cell(20);
            $this->Cell(10,10,'#', 0, 0, 'C');
            $this->Cell(15);
            $this->Cell(10,10,'Producto', 0, 0, 'C');
            $this->Cell(20);
            $this->Cell(10,10,'Precio', 0, 0, 'C');
            $this->Cell(20);
            $this->Cell(10,10, 'Cantidad', 0, 0, 'C');
            $this->Cell(20);
            $this->Cell(10,10, utf8_decode("Total"), 0, 0, 'C');
            $i = 1;
            $this->Ln(10);
            $this->SetFont('Times', '', 10);
            while($producto = $productos->fetch_assoc()){
                $this->Cell(20);
                $this->Cell(10,10,$producto['codigo_producto'], 0, 0, 'C');
                $this->Cell(15);
                $this->Cell(10,10,$producto['nombre'], 0, 0, 'C');
                $this->Cell(20);
                $this->Cell(10,10,$producto['precio'], 0, 0, 'C');
                $this->Cell(20);
                $this->Cell(10,10,$producto['cantidad'], 0, 0, 'C');
                $this->Cell(20);
                $this->Cell(10,10,$producto['costo'], 0, 0, 'C');
                $this->Ln(10);
                $i++;
            }
            $this->Ln(40);
            $this->SetX(-70);
            $this->SetFontSize(20);
            $this->Cell(0,10, "Total: Bs ".$factura['total'],0,0,'C');
        }
        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10, utf8_decode("Página ").$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    
    require "./conn.php";
    $id = $_GET['id'];
    $sql = "SELECT u.Nombre, u.Apellido, u.Cedula, f.total, f.fecha FROM factura f
    JOIN usuarios u
    ON u.Cedula = f.cedula_usuario
    WHERE f.id_factura = $id";
    $result = $conn->query($sql);
    $factura = $result->fetch_assoc();
    $sql = "SELECT p.codigo_producto, p.nombre, p.precio, d.cantidad, d.costo
            FROM detalles_factura d
            JOIN productos p
            ON d.id_producto = p.codigo_producto
            WHERE d.id_factura = $id";
    $productos = $conn->query($sql);
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->Body($id, $factura, $productos);
    $pdf->AliasNbPages();
    $pdf->Output();



?>