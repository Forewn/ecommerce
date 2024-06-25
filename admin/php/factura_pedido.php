<?php 
    require "../../lib/fpdf/fpdf.php";

    class PDF extends FPDF{
        public function header(){
            $this->SetFont('Times', '', 12);
            $this->MultiCell(200, 5, "SENIAT\nRIF J-123456789\nEL TOCHAZO C.A.\nBARRIO EL LOBO CC MARICARMEN LOCAL 35\nSAN CRISTOBAL, TACHIRA, VENEZUELA", 0 , 'C');
            $this->Ln(5);
            $this->Text(11, 45, 'CEDULA: V-29699505');
            $this->Text(170, 45, "FACTURA #12343");
            $this->Ln(5);
            $this->Text(11, 50, "NOMBRE: JHOSMAR SUAREZ");
            $this->Text(180, 50, date('d/m/Y'));

            $this->Text(11, 60, "VENDEDOR: ELIANA PEREZ");

            $this->Line(0, 70, 210, 70);
            $this->Text(11, 75, "CODIGO");
            $this->Text(30, 75, "PRODUCTO");
            $this->text(90, 75, "PRECIO");
            $this->Text(115, 75, "CANTIDAD");
            $this->Text(130, 75, "COSTO");

        }
    }

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->Output();