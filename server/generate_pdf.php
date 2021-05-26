
<?php 

include("./db.php");
include("./G_PDF/fpdf.php");

$con = new ConnectionDB();
$pdf = new FPDF();

class PDF extends FPDF
{
    
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../images/logo.png',8,7,7);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(15);
        // Logo
        $this->Cell(17,3,'RGB System',0,0,'C');
        //salto de linea
        $this->Ln(15);
        //Titulo
        $this->Cell(190, 10, 'REPORTE', 1, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','',8);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headTable()
    {
        $this->SetFont('Arial','B',14);
        $this->Cell(10, 10, utf8_decode("Nº"), 1, 0, 'C');
        $this->Cell(30, 10, "ID", 1, 0, 'C');
        $this->Cell(90,10,"NOMBRE PRODUCTO", 1, 0, 'C');
        $this->Cell(30, 10, "UNIDADES", 1, 0, 'C');
        $this->Cell(30,10,utf8_decode("PRECIO C/U"), 1, 0, 'C');
        $this->Ln(10);
    }
    function DataTable($n, $id_producto, $nombre_producto, $cantidad_unidades, $precio_unitario)
    {
        $this->SetFont('Arial','',11);
        $this->Cell(10, 10, $n, 1, 0, 'C');
        $this->Cell(30, 10, $id_producto, 1, 0, 'C');
        $this->Cell(90,10,$nombre_producto, 1, 0, 'C');
        $this->Cell(30, 10, $cantidad_unidades, 1, 0, 'C');
        $this->Cell(30,10,$precio_unitario, 1, 0, 'C');
        $this->Ln(10);
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->HeadTable();

$data = $con->TotalData();
$i = 0;
while($i < count($data)){
    $pdf->DataTable($i + 1, $data[$i]["id_producto"],$data[$i]["nombre_producto"],$data[$i]["unidades_producto"],"$" . $data[$i]["precio_producto"]);
    $i++;
}
$pdf->Output();


?>

