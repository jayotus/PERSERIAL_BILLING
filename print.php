<?php
require ('c:/xampp/htdocs/FPDF/fpdf.php');

include ('dbcon.php');

    
//A4 width: 219mm
//default margin :10mm each side
//writable horizontal : 219-(10*2)=189mm

// $pdf = new FPDF('p','mm','A4');

// $pdf -> AddPage();

$pdf = new FPDF('P', 'mm', array(209.55, 273.05)); // Custom paper size: 100mm x 150mm

$pdf->SetTopMargin(34.4);

$pdf->AddPage();

// sset font to arial, bold, 6pt

$pdf->SetFont('Arial','B',10);

// Cell(width, height, text, border, end line, [align])


// $pdf->Cell(30.988, 12.954,"SI Number: $sinumber",1,0);         // SI Number
// // $pdf->Cell(88.773, 12.954,'SOLD TO:',1,1);

// // $line_height = 2.1; // Adjust based on your font size
// // $num_lines = 2; // Adjust based on your text
// // $cell_height = $line_height * $num_lines;

// // $pdf->MultiCell(30.988, 12.954,'SI Number:',1,0);
// $pdf->MultiCell(88.773, 6.477, "SOLD TO: $soldto" . "\nTIN: $tin", 1);

// $pdf->Cell(30.988, 12.954,"SI DATE: $sidate",1,0);
// $pdf->MultiCell(88.773, 12.954,"ADDRESS: $address",1,1); 

// $pdf->Cell(30.988, 11.938,"TERMS: $terms",1,0);

// // $pdf->MultiCell(88.773, 5.969,"BUSS. STYLE:" . " \nPARTICULARS:",1,2); 


// $pdf->Cell(88.773, 5.969,"BUSS. STYLE: $bussstyle",1,2); 
// $pdf->Cell(88.773, 5.969,"PARTICULARS: $particulars",1,1);

$infoQuery = "SELECT * FROM info WHERE id = '{$_GET["id"]}'";
$infoResult = mysqli_query($con, $infoQuery);
$infoCounter = 0;

while($row = mysqli_fetch_array($infoResult)) {

    $pdf->Cell(30.988, 12.954, '            ' . $row["si_num"],0,0, 'C');         // SI Number
    // $pdf->Cell(88.773, 12.954,'SOLD TO:',1,1);

    // $line_height = 2.1; // Adjust based on your font size
    // $num_lines = 2; // Adjust based on your text
    // $cell_height = $line_height * $num_lines;

    // $pdf->MultiCell(30.988, 12.954,'SI Number:',1,0);
    $pdf->MultiCell(88.773, 6.477, $row['sold_to'] . "\n" . $row['tin'], 0,'C');

    $pdf->Cell(30.988, 12.954,$row["si_date"],0,0,'C');
    $pdf->MultiCell(88.773, 6.477, wordwrap($row["address"],80, "\n"), 0,'C');

    $pdf->Cell(30.988, 11.938,$row["term"],0,0);

    // $pdf->MultiCell(88.773, 5.969,"BUSS. STYLE:" . " \nPARTICULARS:",1,2); 


    $pdf->Cell(88.773, 5.969,'',0,2, 'C'); 
    $pdf->Cell(88.773, 5.969,'',0,1, 'C');

}

// LABEL


    // $pdf->Cell(18.288, 5.461,"QUANTITY ",0,0,'C'); 
    // $pdf->Cell(12.7, 5.461,'UNITS',0,0,'C');  
    // $pdf->Cell(88.773, 5.461,"ITEM DESCRIPTION ",0,0,'C'); 

    // $pdf->Cell(30.496, 5.461,"UNIT PRICE ",0,0,'C');
    // $pdf->Cell(33.671, 5.461,"TOTAL PRICE ",0,1,'C');
    
    $pdf->Cell(18.288, 5.461," ",0,0,'C'); 
    $pdf->Cell(12.7, 5.461,'',0,0,'C');  
    $pdf->Cell(88.773, 5.461," ",0,0,'C'); 

    $pdf->Cell(30.496, 5.461," ",0,0,'C');
    $pdf->Cell(33.671, 5.461," ",0,1,'C');


    
    $pdf->Cell(18.288, 6.35,'' ,0,0,'C'); 
    $pdf->Cell(12.7, 6.35,'',0,0,'C');  
    $pdf->Cell(88.773, 6.35,'',0,0,'C');
    $pdf->Cell(30.496, 6.35,'',0,0,'C');
    $pdf->Cell(33.671, 6.35,'',0,1,'C');

    // $pdf->Cell(18.288, 6.35,'' ,0,0,'C'); 
    // $pdf->Cell(12.7, 6.35,'',0,0,'C');  
    // $pdf->Cell(88.773, 6.35,'',0,0,'C');
    // $pdf->Cell(30.496, 6.35,'',0,0,'C');
    // $pdf->Cell(33.671, 6.35,'',0,1,'C');

    // $pdf->Cell(18.288, 6.35,'' ,0,0,'C'); 
    // $pdf->Cell(12.7, 6.35,'',0,0,'C');  
    // $pdf->Cell(88.773, 6.35,'',0,0,'C');
    // $pdf->Cell(30.496, 6.35,'',0,0,'C');
    // $pdf->Cell(33.671, 6.35,'',0,1,'C');

$query = "SELECT * FROM perserial WHERE info_key = '{$_GET["id"]}'";
$result = mysqli_query($con, $query);
$counter = 0;

while($row = mysqli_fetch_array($result)) {
    $pdf->Cell(18.288, 6.35,"1",0,0,'C'); 
    $pdf->Cell(12.7, 6.35,'',0,0,'C');


    // Store the initial X and Y positions
$xStart = $pdf->GetX();
$yStart = $pdf->GetY();

// Print the MultiCell
$pdf->MultiCell(88.773, 3.175, wordwrap($row["item_description"], 40, "\n"), 0, 'C');





// Store the Y position after the MultiCell
$yEnd = $pdf->GetY();

// Calculate the height used by the MultiCell
$cellHeight = $yEnd - $yStart;

// Reset the Y position back to the start of the row
$pdf->SetXY($xStart + 88.773, $yStart); // Move X to the right of the MultiCell and Y back to the start

// Draw the subsequent cells with the same height as the MultiCell
$pdf->Cell(30.496, $cellHeight,'', 0, 0, 'C');
$pdf->Cell(33.671, $cellHeight,'', 0, 1, 'C');

    $pdf->Cell(18.288, 6.35,' ',0,0);
    $pdf->Cell(12.7, 6.35,' ',0,0);  
    $pdf->Cell(88.773, 6.35,' ',0,0);
    $pdf->Cell(30.496, 6.35,' ',0,0);
    $pdf->Cell(33.671, 6.35,' ',0,1);

    $pdf->Cell(18.288, 6.35,' ',0,0);
    $pdf->Cell(12.7, 6.35,' ',0,0);  
    $pdf->Cell(88.773, 6.35,"Copies made..  ". $row["colortype"],0,0,'R');
    $pdf->Cell(30.496, 6.35, $row["copies"],0,0,'R');
    $pdf->Cell(33.671, 6.35,' ',0,1);

   
    $pdf->Cell(18.288, 6.35,' ',0,0);
    $pdf->Cell(12.7, 6.35,' ',0,0);  
    $pdf->Cell(88.773, 6.35,"Cost/Copy  ",0,0,'R');
    $pdf->SetLineWidth(0.5);
    $pdf->Cell(30.496, 6.35, $row["unitprice"],'B',0,'R');
    
    $pdf->Cell(33.671, 6.35,' ',0,1);

    $pdf->Cell(18.288, 6.35,' ',0,0);
    $pdf->Cell(12.7, 6.35,' ',0,0);  
    $pdf->Cell(88.773, 6.35,"Total....  ",0,0,'R');
    $pdf->Cell(30.496, 6.35,'',0,0,'C');
    $pdf->Cell(33.671, 6.35, $row["total_price"]."     ",0,1,'C');

    // $pdf->Cell(88.773, 6.35,$row["item_description"],0,0,'C');
    // $pdf->MultiCell(88.773, 3.175,wordwrap($row["item_description"],50, "\n"),0,'C');
    // $pdf->Cell(30.496, 6.35,$row["unitprice"],0,0,'C');
    // $pdf->Cell(33.671, 6.35,$row["total_price"],0,1,'C');
    $counter++;
}

for($i = 0; $i < 8 - $counter ; $i++) {

    $pdf->Cell(18.288, 6.35,' ',0,0);
    $pdf->Cell(12.7, 6.35,' ',0,0);  
    $pdf->Cell(88.773, 6.35,' ',0,0);
    $pdf->Cell(30.496, 6.35,' ',0,0);
    $pdf->Cell(33.671, 6.35,' ',0,1);

}

$query2 = "SELECT * FROM perserial WHERE info_key = '{$_GET["id"]}'";
$result2 = mysqli_query($con, $query2);

while($row = mysqli_fetch_array($result2)) {
    $pdf->Cell(18.288, 6.35,' ',0,0); 
    $pdf->Cell(12.7, 6.35,' ',0,0);  
    $pdf->Cell(88.773, 6.35,"Model: ". $row["model"],0,0);
    $pdf->Cell(30.496, 6.35,'',0,0);
    $pdf->Cell(33.671, 6.35,'',0,1);
    
    $pdf->Cell(18.288, 6.35,' ',0,0); 
    $pdf->Cell(12.7, 6.35,' ',0,0);  
    $pdf->Cell(88.773, 6.35,"Serial No. ". $row["serial"],0,0);
    $pdf->Cell(30.496, 6.35,'',0,0);
    $pdf->Cell(33.671, 6.35,'',0,1);
}


$infoQuery2 = "SELECT * FROM info WHERE id = '{$_GET["id"]}'";
$infoResult2 = mysqli_query($con, $infoQuery2);

while($row = mysqli_fetch_array($infoResult2)) {

$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
$pdf->Cell(30.496, 6.35,'',0,0);
$pdf->Cell(33.671, 6.35,$row["total_amount_payable"],0,1,'C');

$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
$pdf->Cell(30.496, 6.35,'',0,0);
$pdf->Cell(33.671, 6.35,'',0,1);

$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
$pdf->Cell(30.496, 6.35,'',0,0);
$pdf->Cell(33.671, 6.35,'',0,1);


$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
$pdf->Cell(30.496, 6.35,' ',0,0);
$pdf->Cell(33.671, 6.35,'',0,1);


$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
$pdf->Cell(30.496, 6.35,' ',0,0);
$pdf->Cell(33.671, 6.35,'',0,1);


$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
$pdf->Cell(30.496, 6.35,' ',0,0);
$pdf->Cell(33.671, 6.35,'',0,1);
// $pdf->Cell(33.671, 6.35,$row["zero_rated_sale"],1,1);

$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
// $pdf->Cell(30.496, 6.35,'Total Sale',0,0);
$pdf->Cell(30.496, 6.35,' ',0,0);
$pdf->Cell(33.671, 6.35,$row["total_sale"],0,1,'C');

$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
// $pdf->Cell(30.496, 6.35,'VAT',0,0);
$pdf->Cell(30.496, 6.35,' ',0,0);
$pdf->Cell(33.671, 6.35,$row["vat"],0,1,'C');

$pdf->Cell(18.288, 6.35,' ',0,0); 
$pdf->Cell(12.7, 6.35,' ',0,0);  
$pdf->Cell(88.773, 6.35,' ',0,0);
// $pdf->Cell(30.496, 6.35,'Total Amount Payable',0,0);
$pdf->Cell(30.496, 6.35,' ',0,0);
$pdf->Cell(33.671, 6.35,$row["total_amount_payable"],0,1,'C');

    
}


// $pdf->Cell(18.288, 6.35,' ',1,0); 
// $pdf->Cell(12.7, 6.35,' ',1,0);  
// $pdf->Cell(88.773, 6.35,' ',1,0);
// $pdf->Cell(30.496, 6.35,'VATable Sale',1,0);
// $pdf->Cell(33.671, 6.35,' ',1,1);

// $pdf->Cell(18.288, 6.35,' ',1,0); 
// $pdf->Cell(12.7, 6.35,' ',1,0);  
// $pdf->Cell(88.773, 6.35,' ',1,0);
// $pdf->Cell(30.496, 6.35,'VAT Exempt Sale',1,0);
// $pdf->Cell(33.671, 6.35,' ',1,1);

// $pdf->Cell(18.288, 6.35,' ',1,0); 
// $pdf->Cell(12.7, 6.35,' ',1,0);  
// $pdf->Cell(88.773, 6.35,' ',1,0);
// $pdf->Cell(30.496, 6.35,'Zero Rated Sale',1,0);
// $pdf->Cell(33.671, 6.35,' ',1,1);

// $pdf->Cell(18.288, 6.35,' ',1,0); 
// $pdf->Cell(12.7, 6.35,' ',1,0);  
// $pdf->Cell(88.773, 6.35,' ',1,0);
// $pdf->Cell(30.496, 6.35,'Total Sale',1,0);
// $pdf->Cell(33.671, 6.35,' ',1,1);

// $pdf->Cell(18.288, 6.35,' ',1,0); 
// $pdf->Cell(12.7, 6.35,' ',1,0);  
// $pdf->Cell(88.773, 6.35,' ',1,0);
// $pdf->Cell(30.496, 6.35,'VAT',1,0);
// $pdf->Cell(33.671, 6.35,' ',1,1);

// $pdf->Cell(18.288, 6.35,' ',1,0); 
// $pdf->Cell(12.7, 6.35,' ',1,0);  
// $pdf->Cell(88.773, 6.35,' ',1,0);
// $pdf->Cell(30.496, 6.35,'Total Amount Payable',1,0);
// $pdf->Cell(33.671, 6.35,' ',1,1);


// $pdf->Cell(40, 10, 'Hello World!');

// // Move to the next line
// $pdf->Ln(10);  // Moves the cursor 20mm down

// // Add another cell
// $pdf->Cell(40, 10, 'This is a new line.');


$pdf->Output();

// }

?>