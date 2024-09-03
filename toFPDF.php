<?php 

if(empty($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    
    // This statement includes the file into this file. If it failes to fine the file, an error is produced and stops the script.
    require 'c:/xampp/htdocs/FPDF/fpdf.php';


    // Create a new instance of FPDF to allocate memory for it 
    // __construct([string orientation [, string unit [, mixed size]]])
    // ORIENTATION : P = Portrait and L = Landscape.
    // UNIT : pt = points, mm = milimeter, cm = centimeter, in = inches.
    // SIZE : custom 100x150 mm page size, 
    // A3, A4, A5, Letter, Legal.
    // Custom paper size: 100mm x 150mm  
    $pdf = new FPDF('P', 'mm', array(209.55, 273.05)); 
    
    
    // Add new Page to your PDF doc.
    $pdf->AddPage();
    
    // Defines the abscissa and ordinate of the current position. If the passed values are negative, they are relative respectively to the right and bottom of the page.
    $pdf -> SetXY(2,10);
    
    // Sets the font used to print character strings.
    // 1. Font Family.
    // 2. Font Style - B, I, U.
    // 3. Font Size in points.
    $pdf->SetFont('Arial','B',11);

    // Cell (widh, height, text, border, endline)
    $pdf->Cell(0.5,1,$fullname,1,0);
    $pdf->Cell(0.5,1, $address ,1,0);
    $pdf->Cell(0.5,1, $address ,1,0);


    $pdf->Output();

}else  {
    echo 'ERROR';
}

