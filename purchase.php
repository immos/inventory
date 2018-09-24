<?php ob_start(); ?>
<?php include('includes/header.php')?>


<!-- page content starts here   -->

<div class="h2 mb-3">Purchase</div>

<section>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#purchase_form" role="tab" aria-controls="profile" aria-selected="false">Purchase Receipt</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#purchase_table" role="tab" aria-controls="home" aria-selected="true">Purchase Records</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content py-4">
        <!--------------------------------------add product section--------------------------->
        <div class="tab-pane active" id="purchase_form" role="tabpanel" aria-labelledby="home-tab">

            <div class="container">
                <form method="post">


                    <div class="form-row">

                        <div class="form-group col-sm-2">
                            <label for="" class="">InvoiceNo.</label>
                            <input type="text" name="insertPuInvoice" class=" form-control form-control-sm">
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="" class="">Date</label>
                            <input type="date" name="insertPuDate" class="form-control contactsOnly  form-control-sm">
                        </div>


                        <div class="form-group col-sm-8">
                            <label for="">Vendor Name</label>
                            <input type="text" name="insertPuVName" class="form-control form-control-sm" id="">
                        </div>
                    </div>

                    <div class="form-row">


                        <div class="form-group col-sm-1 puNewCol">
                            <label for="">No.</label>
                            <input type="text" name="" class="form-control form-control-sm mb-2" disabled />
                        </div>


                        <div class="form-group col-sm-5 puNewCol1">
                            <label for="">Product Description</label>
                            <input type="text" name="puPDes[]" class="form-control form-control-sm mb-2" />

                 

                        </div>

                        <div class="form-group col-sm-1 puNewCol2">
                            <label for="">Qty</label>
                            <input type="tel" name="puQty[]" class="form-control numbersOnly form-control-sm mb-2" />

                        </div>

                        <div class="form-group col-sm-2 puNewCol3">
                            <label for="">Rate</label>
                            <input type="tel" name="puRate[]" class="form-control numbersOnly form-control-sm mb-2" /> 


                        </div>

                        <div class="form-group col-sm-3 puNewCol4">
                            <label for="">Amount</label>
                            <input type="tel" name="puAmount[]" class="form-control numbersOnly form-control-sm mb-2" />    


                        </div>
                    </div>




                    <div class="form-row">
                        <div class="mt-1">
                            <button type="button" class="btn btn-dark addNewPuRow">Add</button>
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">Total Amount</label>
                            <input type="tel" name="insertPuTotalAmount" class="form-control numbersOnly form-control-sm" />
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-sm-3">
                            <label for="">Payment Mode</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="insertPuPMode" required>
                                    <option value="">Select</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">PersonName</label>
                            <input type="text" name="insertPuPName" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group col-sm-1 ml-auto">
                            <label for="">TAX%</label>
                            <input type="tel" name="" class="form-control numbersOnly form-control-sm" />
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3 ">
                            <label for="">ChequeNo</label>
                            <input type="tel" name="insertPuChequeNo" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group col-sm-3 ">
                            <label for="">Bank/Branch</label>
                            <input type="text" name="insertPuBDetails" class="form-control form-control-sm" />
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">GRAND TOTAL</label>
                            <input type="tel" name="insertGrandTAmount" class="form-control numbersOnly form-control-sm" />
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" class="btn btn-dark" name="puInsertSubmit">Submit</button>
                    </div>

                </form>

        <?php if(isset($_POST['puInsertSubmit'])){
    
            $insertPuPMode = $_POST['insertPuPMode'];
            $insertPuDate =  $_POST['insertPuDate'];
            $insertPuTotalAmount =  $_POST['insertPuTotalAmount'];
            $insertPuPName =  $_POST['insertPuPName'];
            $insertPuChequeNo =  $_POST['insertPuChequeNo'];
            $insertPuBDetails =  $_POST['insertPuBDetails'];
            $insertGrandTAmount =  $_POST['insertGrandTAmount'];
        
            $puPDes =  $_POST['puPDes'];
            $puQty =  $_POST['puQty'];
            $puRate =  $_POST['puRate'];
            $puAmount =  $_POST['puAmount'];
    
            
           
    
             $insert_purchase_receipt_query = "INSERT INTO `purchase_receipt`(`purchase_receipt_id`, `purchase_receipt_vendor_id`, `purchase_receipt_employee_id`, `purchase_receipt_Invoice_no`, `purchase_receipt_payment_mode`, `purchase_receipt_cheque_no`, `purchase_receipt_bank`, `purchase_receipt_amount`, `purchase_receipt_date`) VALUES ('','','','','$insertPuPMode','$insertPuChequeNo','$insertPuBDetails','$insertGrandTAmount','$insertPuDate')";
    
    
    
                $insert_purchase_receipt_query_result = mysqli_query($connect,$insert_purchase_receipt_query); 
    
    
            $get_purchase_receipt_id_query= "SELECT `purchase_receipt_id` FROM `purchase_receipt` ORDER BY purchase_receipt_id DESC LIMIT 1";
            
    
     $get_purchase_receipt_id_query_result = mysqli_query($connect,$get_purchase_receipt_id_query); 
        $get_pid=0;
        while($row= mysqli_fetch_row( $get_purchase_receipt_id_query_result)){
        $get_pid=$row[0];
                }
              
    
              

                foreach($puPDes as $index => $value){
                    
//                  print_r($puQty);
            $insert_purchase_query = "INSERT INTO `purchase`(`purchase_id`, `purchase_receipt_id`, `purchase_product_id`, `purchase_quantity`, `purchase_rate`, `purchase_amount`) VALUES ('','$get_pid','','$puQty[$index]','$puRate[$index]','$puAmount[$index]')";
                $insert_purchase_query_result = mysqli_query($connect,$insert_purchase_query);   

                }
    

    if(!$insert_purchase_query_result || !$insert_purchase_receipt_query_result){
       echo mysqli_connect($connect);
    }else{
//        header("location:purchase.php");
    }
          }
             
             
             ?>



            </div>



        </div>

        <!---------------------------table---------------------------->
        <div class="tab-pane" id="purchase_table" role="tabpanel" aria-labelledby="profile-tab">

            <div class="container">

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Id</th>
                            <th>Vendor Id</th>
                            <th>Employee Id</th>
                            <th>Inovice No</th>
                            <th>Payment Mode</th>
                            <th>Cheque No</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Date</th>



                        </tr>
                    </thead>
                    <tbody>
                       
            <?php
                
               $query_selecting_all_purchase= "SELECT * FROM `purchase_receipt`";
               $query_selecting_all_purchase_result  = mysqli_query($connect,$query_selecting_all_purchase);
               while($row= mysqli_fetch_row($query_selecting_all_purchase_result)){
                   $puId=$row[0];
            ?>
                        
                        <tr>
                            <td class="text-center">
                                <a href="#editPurchase<?php echo $puId;?>" data-toggle="modal" id="purchaseEditLink"><i class="fa fa-edit mx-2" aria-hidden="true"></i></a>
                                <a href="#purchaseDelete<?php echo $puId;?>"data-toggle="modal"><i class="fa fa-trash mx-2" aria-hidden="true"></i></a>
                                

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
                         
         
                     <?php include('includes/edit.php')?>

                    <?php } ?>
                             
 </tbody>
                </table>



            </div>


        </div>
    </div>
</section>

<?php include('includes/footer.php')?>
