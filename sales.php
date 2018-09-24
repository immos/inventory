<?php ob_start(); ?>
<?php include('includes/header.php')?>

<!-- page content starts here   -->


<div class="h2 mb-3">SALES</div>

<section>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#sales_form" role="tab" aria-controls="profile" aria-selected="false">Sales Receipt</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#sales_table" role="tab" aria-controls="home" aria-selected="true">Sales Records</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content py-4">
        <!--------------------------------------add sales section--------------------------->
        <div class="tab-pane active" id="sales_form" role="tabpanel" aria-labelledby="home-tab">


            <div class="container">
                <form method="post">
                    <div class="form-row">

                        <div class="form-group col-sm-2">
                            <label for="" class="">InvoiceNo.</label>
                            <input type="text" name="insertSInvoice" class=" form-control form-control-sm">
                        </div>

                        <div class="form-group col-sm-2 ">
                            <label for="" class="">Date</label>
                            <input type="date" name="insertSDate" class="form-control contactsOnly  form-control-sm" />
                        </div>


                        <div class="form-group col-sm-8">
                            <label for="">Customer Name/Company Name</label>
                            <input type="text" name="insertSCName" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-1 sNewCol">
                            <label for="">No.</label>
                        </div>

                        <div class="form-group col-sm-5 sNewCol1">
                            <label for="">Product Description</label>
                        </div>

                        <div class="form-group col-sm-1 sNewCol2">
                            <label for="">Qty</label>
                        </div>

                        <div class="form-group col-sm-1 sNewCol3">
                            <label for="">Rate</label>
                        </div>

                        <div class="form-group col-sm-1 sNewCol4">
                            <label for="">Tax%</label>
                        </div>


                        <div class="form-group col-sm-3 sNewCol5">
                            <label for="">Amount</label>
                        </div>
                        
                    </div>
                    
                    <div class="form-row">

                        <div class="form-group col-sm-1 sNewCol">                          
                            <input type="text" name="" class="form-control form-control-sm mb-2" />
                        </div>


                        <div class="form-group col-sm-5 sNewCol1">                         
                            <input type="text" name="sPDes[]" class="form-control form-control-sm mb-2" />
                        </div>

                        <div class="form-group col-sm-1 sNewCol2">                       
                            <input type="number" name="sQty[]" class="form-control numbersOnly form-control-sm mb-2" />
                        </div>

                        <div class="form-group col-sm-1 sNewCol3">               
                            <input type="number" name="sRate[]" class="form-control numbersOnly form-control-sm mb-2" />
                        </div>

                        <div class="form-group col-sm-1 sNewCol4">
                            <input type="number" name="sTax[]" class="form-control numbersOnly form-control-sm mb-2" />
                        </div>


                        <div class="form-group col-sm-3 sNewCol5">
                            <input type="number" name="sAmount[]" class="form-control numbersOnly form-control-sm mb-2" />
                        </div>
                        
                    </div>




                    <div class="form-row">
                        <div class="mt-1">
                            <button type="submit" class="btn btn-dark addNewSRow">Add</button>
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">Total Amount</label>
                            <input type="tel" name="insertSTotalAmount" class="form-control numbersOnly form-control-sm" />
                        </div>
                    </div>






                    <div class="form-row">

                        <div class="form-group col-sm-3">
                            <label for="">Payment Mode</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="insertSPMode" id="payment" required>
                                    <option readonly>Select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group col-sm-3">
                            <label for="">PersonName</label>
                            <input type="text" name="insertSPName" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group col-sm-1 ml-auto">
                            <label for="">TAX</label>
                            <input type="tel" name="insertSTax" class="form-control numbersOnly form-control-sm" />
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="">ChequeNo</label>
                            <input type="tel" name="insertSChequeNo" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">Bank/Branch</label>
                            <input type="text" name="insertSBDetails" class="form-control form-control-sm" />
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">GRAND TOTAL</label>
                            <input type="tel" name="insertSGrandTAmount" class="form-control numbersOnly form-control-sm " />
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" class="btn btn-dark" name="sInsertSubmit">Submit</button>
                    </div>

                </form>

                <?php if(isset($_POST['sInsertSubmit'])){

        $insertSPMode = $_POST['insertSPMode'];
        $insertSDate =  $_POST['insertSDate'];
        $insertSTotalAmount =  $_POST['insertSTotalAmount'];
        $insertSCName =  $_POST['insertSCName'];
        $insertSChequeNo =  $_POST['insertSChequeNo'];
        $insertSBDetails =  $_POST['insertSBDetails'];
        $insertSGrandTAmount =  $_POST['insertSGrandTAmount'];
        $insertSInvoice =  $_POST['insertSInvoice'];
        $insertSTotalAmount =  $_POST['insertSTotalAmount'];
        $insertSPName =  $_POST['insertSPName'];
        $insertSTax =  $_POST['insertSTax'];

        $sPDes =  $_POST['sPDes'];
        $sQty =  $_POST['sQty'];
        $sRate =  $_POST['sRate'];
        $sAmount =  $_POST['sAmount'];
        $sTax = $_POST['sTax'];
        $empId = $_SESSION['emp_id'];


        $insert_sales_receipt_query = "INSERT INTO `sales_receipt`(`sales_receipt_id`, `sales_receipt_date`, `sales_receipt_customer_id`, `sales_receipt_employee_id`, `sales_receipt_invoice_no`, `sales_receipt_payment_mode`, `sales_receipt_cheque_no`, `sales_receipt_bank_details`, `sales_receipt_amount`, `sales_receipt_person_name`, `sales_receipt_tax`, `sales_receipt_grand_total`) VALUES ('','$insertSDate','','$empId','$insertSInvoice','$insertSPMode','$insertSChequeNo','$insertSBDetails','$insertSTotalAmount','$insertSPName','$insertSTax','$insertSGrandTAmount')";
        $insert_sales_receipt_query_result = mysqli_query($connect,$insert_sales_receipt_query); 


        $get_sales_receipt_id_query = "SELECT `sales_receipt_id` FROM `sales_receipt` ORDER by sales_receipt_id DESC LIMIT 1";
        $get_sales_receipt_id_query_result = mysqli_query($connect,$get_sales_receipt_id_query); 


        $get_receipt_id=0;
        while($row= mysqli_fetch_row( $get_sales_receipt_id_query_result)){
        $get_receipt_id=$row[0];
        }


        foreach($sPDes as $index => $value){

        $insert_sales_query = "INSERT INTO `sales`(`sales_id`, `sales_receipt_id`, `sales_product_id`, `sales_quantity`, `sales_rate`, `sales_amount`) VALUES ('','$get_receipt_id','','$sQty[$index]','$sRate[$index]','$sAmount[$index]')";
            echo $insert_sales_query;
        $insert_sales_query_result = mysqli_query($connect,$insert_sales_query);   

        }

        if(!$insert_sales_query_result || !$insert_sales_receipt_query_result){
        die ("Error ".mysqli_connect($connect));
        }else{
          header("location:sales.php");
        }
        }


?>



            </div>





        </div>

        <!---------------------------table---------------------------->
        <div class="tab-pane" id="sales_table" role="tabpanel" aria-labelledby="profile-tab">

            <div class="container">
                <table id="table_id" class="display table-bordered">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Sales Id</th>
                            <th>Date</th>
                            <th>Customer Id</th>
                            <th>Employee Id</th>
                            <th>Invoice No</th>
                            <th>Mode of payment</th>
                            <th>ChequeNo</th>
                            <th>Bank Details</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <?php
        
   $query_selecting_all_sales= "SELECT * FROM `sales_receipt`";
   $query_selecting_all_sales_result  = mysqli_query($connect,$query_selecting_all_sales);
   while($row= mysqli_fetch_row($query_selecting_all_sales_result)){
       $sId = $row[0];
            ?>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <a href="#sEdit<?php echo $sId; ?>" data-toggle="modal"><i class="fa fa-edit   " aria-hidden="true"></i></a>
                                <a href="#salesDelete<?php echo $sId;?>" data-toggle="modal"><i class="fa fa-trash   " aria-hidden="true"></i></a>
                                <a target="_blank" href="includes/print.php?id=<?php echo $row[0]; ?>"><i class="fa fa-print" aria-hidden="true"></i></a>

                            </td>
                            <td>
                                <?php echo $row[0];?>
                            </td>
                            <td>
                                <?php echo $row[1];?>
                            </td>
                            <td>
                                <?php echo $row[2];?>
                            </td>
                            <td>
                                <?php echo $row[3];?>
                            </td>
                            <td>
                                <?php echo $row[4];?>
                            </td>
                            <td>
                                <?php echo $row[5];?>
                            </td>
                            <td>
                                <?php echo $row[6];?>
                            </td>
                            <td>
                                <?php echo $row[7];?>
                            </td>
                            <td>
                                <?php echo $row[8];?>
                            </td>

                        </tr>
                    </tbody>


                    <?php include('includes/edit.php')?>

                    <?php } ?>

                </table>
            </div>




        </div>

    </div>
</section>




<script>

</script>

<script>



</script>





<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->



<?php include('includes/footer.php')?>
