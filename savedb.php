<?php

include "dbcon.php";
    

$con = mysqli_connect("localhost", "root", "", "sale invoice");

if (isset($_POST['submit'])) {
    $sinumber=mysqli_real_escape_string($con,$_POST["sinumber"]);
    $sidate=date("Y-m-d",strtotime($_POST["sidate"]));
    $terms=mysqli_real_escape_string($con,$_POST["terms"]);
    $soldto=mysqli_real_escape_string($con,$_POST["soldto"]);
    $tin=mysqli_real_escape_string($con,$_POST["tin"]);
    $address=mysqli_real_escape_string($con,$_POST["address"]);
    $bussstyle=mysqli_real_escape_string($con,$_POST["bussstyle"]);
    $particulars=mysqli_real_escape_string($con,$_POST["particulars"]);

    // Prepare the first statement
    $stmt = $con->prepare("INSERT INTO info (si_num, si_date, term, sold_to, tin, address, buss_style, particulars) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $sinumber, $sidate, $terms, $soldto, $tin, $address, $bussstyle, $particulars);

    // Sanitize and format data
    // $sinumber = $_POST['sinumber'];
    // $sidate = date("Y-m-d", strtotime($_POST['sidate']));
    // $terms = $_POST['terms'];
    // ... other data sanitization and formatting

    // Execute the statement
    if ($stmt->execute()) {
        $infoKey = $con->insert_id;

        // Prepare the second statement
        $stmt2 = $con->prepare("INSERT INTO sales_2 (quantity, units, item_description, unit_price, total_price, info_key) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("ssssss", $quantity, $units, $description, $unitprice, $totalprice, $infoKey);

        // Insert multiple rows
        for ($i = 0; $i < count($_POST['description']); $i++) {
            $quantity = $_POST['quantity'][$i];
            $units = $_POST['units'][$i];
            $description = $_POST['description'][$i];
            $unitprice = $_POST['unitprice'][$i];
            $totalprice = $_POST['totalprice'][$i];

            $stmt2->execute();
        }

        echo "<script>alert()</script>";
    } else {
        echo "<h1>Error inserting into info: " . $stmt->error . "</h1>";
    }

    $stmt->close();
    $stmt2->close();
}

$con->close();
?>

<?php


