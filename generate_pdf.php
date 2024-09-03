<?php
include("dbcon.php");
require('c:/xampp/htdocs/FPDF/fpdf.php');

if (isset($_POST['generate_pdf'])) {

    // Query to fetch all sales data with their corresponding details
    $query = "SELECT s2.sales_invoice_num, s2.sales_invoice_date, s2.terms, s2.soldto, s2.tin, s2.address, s2.bussstyle, s2.particulars, 
                     sd.quantity, sd.unit, sd.item_description, sd.unit_price, sd.total_price 
              FROM sales_2 s2
              JOIN sales_details sd ON s2.sales_invoice_num = sd.sales_invoice_num
              ORDER BY s2.sales_invoice_num";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Sales Invoices', 0, 1, 'C');

        $current_invoice_num = null;

        while ($row = $result->fetch_assoc()) {
            // Check if it's a new sales invoice number
            if ($current_invoice_num != $row['sales_invoice_num']) {
                if ($current_invoice_num != null) {
                    $pdf->Ln(10); // Add space between different invoices
                }

                // Set the current invoice number
                $current_invoice_num = $row['sales_invoice_num'];

                // Display the sales invoice details
                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(0, 10, 'Sales Invoice Number: ' . $row['sales_invoice_num'], 0, 1);
                $pdf->Cell(0, 10, 'Sales Invoice Date: ' . $row['sales_invoice_date'], 0, 1);
                $pdf->Cell(0, 10, 'Terms: ' . $row['terms'], 0, 1);
                $pdf->Cell(0, 10, 'Sold To: ' . $row['soldto'], 0, 1);
                $pdf->Cell(0, 10, 'TIN: ' . $row['tin'], 0, 1);
                $pdf->Cell(0, 10, 'Address: ' . $row['address'], 0, 1);
                $pdf->Cell(0, 10, 'Business Style: ' . $row['bussstyle'], 0, 1);
                $pdf->Cell(0, 10, 'Particulars: ' . $row['particulars'], 0, 1);
                $pdf->Ln(5);

                // Header for sales details
                $pdf->SetFont('Arial', 'B', 9);
                $pdf->Cell(30, 7, 'Quantity', 1);
                $pdf->Cell(30, 7, 'Unit', 1);
                $pdf->Cell(70, 7, 'Item Description', 1);
                $pdf->Cell(30, 7, 'Unit Price', 1);
                $pdf->Cell(30, 7, 'Total Price', 1);
                $pdf->Ln();
            }

            // Display the sales details
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(30, 7, $row['quantity'], 1);
            $pdf->Cell(30, 7, $row['unit'], 1);
            $pdf->Cell(70, 7, $row['item_description'], 1);
            $pdf->Cell(30, 7, $row['unit_price'], 1);
            $pdf->Cell(30, 7, $row['total_price'], 1);
            $pdf->Ln();
        }

        $pdf->Output('D', 'Sales_Invoice.pdf');
    } else {
        echo 'No records found';
    }

    $con->close();
}
?>
