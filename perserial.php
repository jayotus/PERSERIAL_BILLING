
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css'>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js" integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script>
    <style>
    body{
        background-color: black;
    }
    
    *{
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
    }
    /* Designing button*/
    #addInput {
        padding: 8px 15px;
        background-color: darkcyan;
        color: white;
        border-radius: 8px;
        border: 0;
        transition-duration: 0.3s;
    }
    .submit {
        padding: 8px 15px;
        margin: 0 40px 0 0;
        background-color: #399918;
        color: white;
        border-radius: 8px;
        border: 0;
        transition-duration: 0.3s;
    }
    .inputContainer {
        margin: 30px 0 60px 0;
    }
    #removeInput {
        padding: 8px 15px;
        background-color: #991818;
        color: white;
        border-radius: 8px;
        border: 0;
        transition-duration: 0.3s;
        display: none;
    }
    .container {
        width: 80%;
        margin: 25px auto 0 auto;
    }
    .display-flex {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
    }

    .display-flex-bottom {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
    }

    #quantity, #units, #unitprice, #totalprice, #serial, #model, #copies {
        display: inline-block;
        vertical-align: middle;
        width: 120px;
    }

    #description {
        width: 450px;
        display: inline-block;
        vertical-align: middle;
    }

    label {
        font-size: 15px;
        font-weight: 500;
    }
    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=number] {
        width: 100%;
        padding: 12px 20px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="date"]{
    background-color: #0080ff;
    padding: 12px 20px;
    font-family: "Roboto Mono",monospace;
    color: #ffffff;
    font-size: 18px;
    border: none;
    outline: none;
    border-radius: 5px;
    }

    ::-webkit-calendar-picker-indicator{
        background-color: #ffffff;
        padding: 5px;
        cursor: pointer;
        border-radius: 3px;
    }


    #addInput:hover {
        cursor: pointer;
        background-color: black;
        font-size: 13.6px;
    } 

    #removeInput:hover {
        cursor: pointer;
        background-color: #744545;
        font-size: 13.6px;
    } 
    
    

    .submit:hover {
        cursor: pointer;
        background-color: darkgreen;
        font-size: 13.6px;
    }

    .left-side {
        width: 470px;
    }

    .right-side {
        width: 470px;
    }

    .buttom-part {
        display: inline-block ;
    }


    #inline-block-quantity, #inline-block-totalprice, #inline-block-units, #inline-block-unitprice,#inline-block-model,#inline-block-serial,#inline-block-copies{
        width: 120px;
    }
    #inline-block-description {
        width: 450px;
    }

    .bottom-part {
        margin-top: 50px;
    }

    /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    
    /* Modal Content/Box */
    .modal-content {
        transition-duration: 0.5s;
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    .title { 
        text-transform: uppercase;
        font-family:"Poppins", sans-serif;
        font-weight: 500;
    }
    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
    }
    </style>

</head>
    <body>
         <!-- Trigger/Open The Modal -->
         
            <?php
            // include 'dbcon.php';
            include "dbcon.php";

            $con = mysqli_connect("localhost", "root", "", "sale invoice");

            if (isset($_POST['submit'])) {
    $sinumber=mysqli_real_escape_string($con,$_POST["sinumber"]);
    $sidate=date("Y-m-d",strtotime($_POST["sidate"]));
    $soldto=mysqli_real_escape_string($con,$_POST["soldto"]);
    $tin=mysqli_real_escape_string($con,$_POST["tin"]);
    $address=mysqli_real_escape_string($con,$_POST["address"]);
    
        //VAT
    $total_sale=mysqli_real_escape_string($con,$_POST["total_sale"]);
    $vat=mysqli_real_escape_string($con,$_POST["vat"]);
    $total_amount_payable=mysqli_real_escape_string($con,$_POST["total_amount_payable"]);

    $copies=mysqli_real_escape_string($con,$_POST["copies"]);
    $model=mysqli_real_escape_string($con,$_POST["model"]);
    $unitprice=mysqli_real_escape_string($con,$_POST["unitprice"]);
    $totalprice=mysqli_real_escape_string($con,$_POST["totalprice"]);
    $description=mysqli_real_escape_string($con,$_POST["description"]);

    // Prepare the first statement
    $stmt = $con->prepare("INSERT INTO info (si_num, si_date, sold_to, tin, address, total_sale, vat, total_amount_payable) VALUES ( ?, ?, ?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $sinumber, $sidate,$soldto,$tin, $address,$total_sale,$vat,$total_amount_payable);
    
    // Sanitize and format data
    // ... other data sanitization and formatting

    // Execute the statement
    if ($stmt->execute()) {
        $infoKey = $con->insert_id;

        // Prepare the second statement
        $stmt2 = $con->prepare("INSERT INTO perserial (model, serial, copies, unitprice, total_price, item_description, info_key) VALUES (?, ?, ?, ?, ?, ?,?)");
        $stmt2->bind_param("sssssss", $model, $serial,$copies, $unitprice, $totalprice, $description, $infoKey);
        $stmt2->execute();

        echo "<div class='alert alert-success'>Invoice Added Successfully. <a href='print.php?id={$infoKey}' target='_BLANK'>Click </a> here to Print Invoice </div> ";
    } else {
        echo "<h1>Error inserting into info: " . $stmt->error . "</h1>";
    }

         $stmt->close();
         $stmt2->close();

            }
           
            ?>

 
         <!-- Modal content -->
             <div class="modal-content">
                <!-- Close Button -->


                <h3 class="title">PER SERIAL INVOICE</h3>

                <div class="container">

                    <form action="perserial.php" method="post" autocomplete="off">
                        <div class="display-flex">
                            <div class="left-side">
                                <label for="si-number">Invoice No</label>
                                <input type="number" id="si-number" name="sinumber">
                                
                                <label for="sidate">Invoice Date</label><br>
                                
                                <input type="date" id="sidate" name="sidate"  value="<?php echo date("Y-m-d");?>" require>
                                <br>
                            </div>
                            <div class="right-side">
                                <label for="soldto">Name</label>
                                <input type="text" id="soldto" name="soldto">

                                <label for="tin">TIN</label>
                                <input type="text" id="tin" name="tin">
                                
                                <label for="address">ADDRESS: </label>
                                
                                <input type="text" id="address" name="address">
                                
                                <label for="description">Description</label>
                                
                                <input type="text" id="description" name="description">
                                
                               
                                
                            </div>
                        </div>
                        <h4> Product Details </h4>
                        <div class="bottom-part display-flex-bottom" id="input-container">
                            

                            <div id="inline-block-model">
                                <label for="model">Model</label>
                                <input class="model" type="text" id="model" name='model'>
                            </div>

                            <div id="inline-block-serial">
                                <label for="serial">Serial</label>
                                <input class="serial" type="number" id="serial" name='serial'>
                            </div>


                            <div id="inline-block-copies">
                                <label for="copies">Copies Made</label>
                                <input class="copies" type="number" id="copies" name='copies'>
                            </div>

                            
                            
                            <div id="inline-block-unitprice">
                                <label class="unitprice" for="unitprice">Cost/Copy</label>
                                
                                <input class="unitprice" type="number" step="0.01" min="0" id="unitprice" name='unitprice'>
                                
                            </div>


                            <div id="inline-block-totalprice">
                                <label class="totalprice" for="totalprice">Total Price </label>
                                
                                <input class="totalprice" type="number" step="0.01" min="0" id="totalprice" name='totalprice'>
                            </div>



                        </div>
                        

                        <div class="display-flex">
                            <div class="right-side">
                                
                                <label for="total_sale">Total Sale</label>
                                
                                <input type="number" step="0.01" min="0" id="total_sale" name="total_sale">
                                
                                <label for="vat">VAT</label>
                                
                                <input type="number" step="0.01" min="0" id="vat" name="vat">

                                <label for="total_amount_payable">Total Amount Payable</label>
                                
                                <input type="number" step="0.01" min="0" id="total_amount_payable" name="total_amount_payable">
                                
                            </div>
                        </div>


                        <div class="inputContainer">
                            <button class="submit" type="submit" name="submit">Submit</button>
                            
                        </div>
                        
                    </form>
                </div>
                
             </div> 
 
         </div>
    
    <script>
    // Set max date for date input
    const today = new Date();
    document.getElementById('sidate').max = today.toISOString().split('T')[0];

    // Get references to all relevant input elements
    const copiesInput = document.getElementById('copies');
    const unitpriceInput = document.getElementById('unitprice');
    const total_priceInput = document.getElementById('totalprice');
    const totalSalesInput = document.getElementById('total_sale');
    const vatInput = document.getElementById('vat');
    const totalInput = document.getElementById('total_amount_payable');

    // Function to calculate and update total price, sales, VAT, and total amount payable
    function updateValues() {
        const copies = parseFloat(copiesInput.value) || 0;
        const unitprice = parseFloat(unitpriceInput.value) || 0;

        const totalPrice = copies * unitprice;
        total_priceInput.value = totalPrice.toFixed(2);

        const totalSales = totalPrice / 1.12;
        totalSalesInput.value = totalSales.toFixed(2);

        const vat = totalPrice - totalSales;
        vatInput.value = vat.toFixed(2);

        totalInput.value = totalPrice.toFixed(2);
    }

    // Add event listeners to quantity and unit price inputs
    copiesInput.addEventListener("input", updateValues);
    unitpriceInput.addEventListener("input", updateValues);

</script>

    </body>
</html>