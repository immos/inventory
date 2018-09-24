<!--/////////////////////////////  modal/////////////////////////////////-->

<!--sales modal starts>-->

<div class="modal fade bd-example-modal-lg" id="sEdit<?php echo $sId; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Sales</div>

            <div class="header-body my-3">

                <form method="post">
                    <div class="form-row">

                        <div class="form-group col-sm-2">
                            <label for="" class="">InvoiceNo.</label>
                            <input type="text" name="sInvoice" class="form-control form-control-sm" value="<?php echo $sId; ?>">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">Date</label>
                            <input type="date" name="sDate" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[1]; ?>"/>
                        </div>


                        <div class="form-group col-sm-7">
                            <label for="">Customer Name/Company Name</label>
                            <input type="text" name="sCName" class="form-control form-control-sm" id="">
                        </div>
                    </div>
                    
                    <div class="form-row">
                       
                        <div class="form-group col-sm-1">
                            <label for="">No.</label>
                        </div>


                        <div class="form-group col-sm-5">
                            <label for="">Product Description</label>
                        </div>

                        <div class="form-group col-sm-1">
                            <label for="">Qty</label>
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="">Rate</label>

                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">Amount</label>

                        </div>
                        
                        
                        
                    </div>
                    
                    
                    
                    <?php 
                         $query_selecting_all_sales1= "SELECT * FROM `sales` WHERE sales_receipt_id = '$sId' ";
                         $query_selecting_all_sales_result1  = mysqli_query($connect,$query_selecting_all_sales1);
                        while($row1= mysqli_fetch_row($query_selecting_all_sales_result1)){
                      
                             
                        ?>

                   
                   
                    <div class="form-row">

                        <div class="form-group col-sm-1">
                            <input type="text" name="" class="form-control form-control-sm mb-2"  />
                        </div>


                        <div class="form-group col-sm-5">
                           
                    <input type="text" name="usPDes[]" class="form-control form-control-sm mb-2"/>
                    <input type="hidden" name="usPID[]" value="<?php echo $row1[0]; ?>" class="form-control form-control-sm mb-2" />
                            
                        </div>

                        <div class="form-group col-sm-1">
                            <input type="tel" name="usQty[]" class="form-control numbersOnly form-control-sm mb-2" value = "<?php echo $row1[3]; ?>"  />
                        </div>

                        <div class="form-group col-sm-2">
                            <input type="tel" name="usRate[]" class="form-control numbersOnly form-control-sm mb-2"  value = "<?php echo $row1[4]; ?>" />
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="tel" name="usAmount[]" class="form-control numbersOnly form-control-sm mb-2" value = "<?php echo $row1[5]; ?>"  />
                        </div>
                    </div>
                    <?php } ?>
                   



                    <div class="form-row">
                        <div class="mt-1">
                            <button type="submit" class="btn btn-dark">Add</button>
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">Total Amount</label>
                            <input type="tel" name="sTotalAmount" class="form-control numbersOnly form-control-sm" />
                        </div>
                    </div>






                    <div class="form-row">

                        <div class="form-group col-sm-3">
                            <label for="">Payment Mode</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="sPMode"  required>
                                    <option selected value="<?php echo $row[5]; ?>"><?php echo $row[5]; ?></option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">PersonName</label>
                            <input type="text" name="sPName" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group col-sm-1 ml-auto">
                            <label for="">TAX%</label>
                            <input type="tel" name="" class="form-control numbersOnly form-control-sm" />
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3 ">
                            <label for="">ChequeNo</label>
                            <input type="tel" name="sChequeNo" class="form-control form-control-sm" value="<?php echo $row[6]; ?>" />
                        </div>

                        <div class="form-group col-sm-3 ">
                            <label for="">Bank/Branch</label>
                            <input type="text" name="sBDetails" class="form-control form-control-sm" value="<?php echo $row[7]; ?>" />
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">GRAND TOTAL</label>
                            <input type="tel" name="sGrandTAmount" class="form-control numbersOnly form-control-sm " value="<?php echo $row[8]; ?>"/>
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" class="btn btn-dark" name="usUpdate">Submit</button>
                    </div>

                </form>
                
                <?php      
          
         
                if(isset($_POST['usUpdate'])){
             $sInvoice = $_POST['sInvoice'];
            $sPMode = $_POST['sPMode'];
            $sDate =  $_POST['sDate'];
            $sPName =  $_POST['sPName'];
            $sChequeNo =  $_POST['sChequeNo'];
            $sBDetails =  $_POST['sBDetails'];
            $sGrandTAmount =  $_POST['sGrandTAmount'];       
                    
            $usPDes =  $_POST['usPDes'];
            $usQty =  $_POST['usQty'];
            $usRate =  $_POST['usRate'];
            $usAmount =  $_POST['usAmount'];
            $usPID =  $_POST['usPID'];
                
            $query_for_s_update="UPDATE `sales_receipt` SET `sales_receipt_date`='$sDate',`sales_receipt_payment_mode`='$sPMode',`sales_receipt_cheque_no`='$sChequeNo',`sales_receipt_bank_details`='$sBDetails',`sales_receipt_amount`='$sGrandTAmount' WHERE sales_receipt_id = '$sInvoice'";
            echo $query_for_s_update;
                    
            $query_for_s_update_result = mysqli_query($connect, $query_for_s_update);        
                    
                    
                foreach($usPDes as $index => $value){  
                $raj123 = "UPDATE `sales` SET `sales_quantity`=  '$usQty[$index]',`sales_rate`=  '$usRate[$index]',`sales_amount`=  '$usAmount[$index]' WHERE `sales_id` = '$usPID[$index]'"; 
                    $resultQ = mysqli_query($connect,$raj123);
                    echo $raj123;
                }
                
                if(!$query_for_s_update_result || !$raj123){
                    echo "Error";
                }else{
                    header("location:sales.php");
                }
                    }  
                
                
                ?>

            </div>

        </div>
    </div>
</div>

<!--sales modal ends here-->


<!--purchase modal starts>-->


<div class="modal fade bd-example-modal-lg" id="editPurchase<?php echo $puId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Purchase</div>


            <div class="header-body my-3">

                 <form method="post">


                    <div class="form-row">

                        <div class="form-group col-sm-2">
                            <label for="" class="">InvoiceNo.</label>
                            <input type="text" name="PuInvoice" class=" form-control form-control-sm" value="<?php echo $row[0]; ?>">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">Date</label>
                            <input type="date" name="PuDate" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[8]; ?>">
                        </div>


                        <div class="form-group col-sm-7">
                            <label for="">Vendor Name</label>
                            <input type="text" name="PuVName" class="form-control form-control-sm" id="">
                        </div>
                    </div>
<!--                  ...................................................-->

  <div class="form-row">


                        <div class="form-group col-sm-1">
                            <label for="">No.</label>
                        </div>


                        <div class="form-group col-sm-5">
                            <label for="">Product Description</label>


                        </div>
    
                        <div class="form-group col-sm-1">
                            <label for="">Qty</label>
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="">Rate</label>

                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">Amount</label>

                        </div>
                    </div>





<!--...............................................-->

<!--////////////////////////////////////////////////////////////////////////////////////-->

 <?php 
                         $query_selecting_all_purchase1= "SELECT * FROM `purchase` WHERE purchase_receipt_id = '$puId' ";
                         $query_selecting_all_purchase_result1  = mysqli_query($connect,$query_selecting_all_purchase1);
                        while($row1= mysqli_fetch_row($query_selecting_all_purchase_result1)){
                      
                             
                            

    
    ?>
    
                    <div class="form-row">


                        <div class="form-group col-sm-1">
<!--                            <label for="">No.</label>-->
                            <input type="text" name="" class="form-control form-control-sm mb-2" />
                        </div>


                        <div class="form-group col-sm-5">
<!--                            <label for="">Product Description</label>-->
                            <input type="text" name="upuPDes[]" class="form-control form-control-sm mb-2" />
                            <input type="hidden" name="upuPID[]" value="<?php echo $row1[0]; ?>" class="form-control form-control-sm mb-2" />

                            
                 

                        </div>
    
                        <div class="form-group col-sm-1">
<!--                            <label for="">Qty</label>-->
                            <input type="tel" name="upuQty[]" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $row1[3]; ?>"/>

                        </div>

                        <div class="form-group col-sm-2">
<!--                            <label for="">Rate</label>-->
                            <input type="tel" name="upuRate[]" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $row1[4]; ?>"/> 


                        </div>

                        <div class="form-group col-sm-3">
<!--                            <label for="">Amount</label>-->
                            <input type="tel" name="upuAmount[]" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $row1[5]; ?>"/>    

                        </div>
                    </div>
                          
<?php   } ?>
                    
                    
<!--                    ///////////////////////////////////////////////////////////////////////////////-->
                    
                    

                    <div class="form-row">
                        <div class="mt-1">
                            <button type="button" class="btn btn-dark">Add</button>
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">Total Amount</label>
                            <input type="tel" name="PuTotalAmount" class="form-control numbersOnly form-control-sm" />
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-sm-3">
                            <label for="">Payment Mode</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="PuPMode" required>
                                    <option value="<?php echo $row[4]; ?>" selected><?php echo $row[4]; ?></option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">PersonName</label>
                            <input type="text" name="PuPName" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group col-sm-1 ml-auto">
                            <label for="">TAX%</label>
                            <input type="tel" name="PuTax" class="form-control numbersOnly form-control-sm" />
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3 ">
                            <label for="">ChequeNo</label>
                            <input type="tel" name="PuChequeNo" class="form-control form-control-sm" value="<?php echo $row[5]; ?>" />
                        </div>

                        <div class="form-group col-sm-3 ">
                            <label for="">Bank/Branch</label>
                            <input type="text" name="PuBDetails" class="form-control form-control-sm" value="<?php echo $row[6]; ?>" />
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">GRAND TOTAL</label>
                            <input type="tel" name="PuGrandTAmount" class="form-control numbersOnly form-control-sm" value="<?php echo $row[7]; ?>" />
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" class="btn btn-dark" name="upuUpdate">Submit</button>
                    </div>

                </form>
          <?php      
  
         
                if(isset($_POST['upuUpdate'])){
            $upuPDes =  $_POST['upuPDes'];
            $upuQty =  $_POST['upuQty'];
            $upuRate =  $_POST['upuRate'];
            $upuAmount =  $_POST['upuAmount'];
            $upuPID =  $_POST['upuPID'];
            
                  
                
                foreach($upuPDes as $index => $value){
                    
                
                    
                $rajQ = "UPDATE `purchase` SET `purchase_quantity`=  '$upuQty[$index]',`purchase_rate`=  '$upuRate[$index]',`purchase_amount`=  '$upuAmount[$index]' WHERE `purchase_id` = '$upuPID[$index]'";
                    $resultQ = mysqli_query($connect,$rajQ);
                    echo  $rajQ;
                      
                }

                    
                    
     $query_for_pu_update= "UPDATE `purchase_receipt` SET `purchase_receipt_payment_mode`='$_POST[PuPMode]',`purchase_receipt_cheque_no`='$_POST[PuChequeNo]',`purchase_receipt_bank`='$_POST[PuBDetails]',`purchase_receipt_amount`='$_POST[PuGrandTAmount]',`purchase_receipt_date`='$_POST[PuDate]' WHERE `purchase_receipt_id`='$_POST[PuInvoice]'";
                    
                    
                 
                
                    $query_for_pu_update_result  =  mysqli_query($connect,$query_for_pu_update); 
             
                    
                     if($query_for_pu_update_result)
                     {
                         
                    header("location:purchase.php");
                         
                     }
                                
                    
                }           
                
                
                
               
                
                ?>


            </div>
        </div>
    </div>
</div>




<!--purchase modal ends here-->


<!--product edit modal-->


<div class="modal fade bd-example-modal-lg" id="edit<?php echo $pId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Products</div>


            <div class="header-body my-3">

                <form method="post">
                    <div class="form-row">

                        <div class="form-group col-sm-1">
                            <label for="" class="">No</label>
                            <input type="text" name="pId" class=" form-control form-control-sm disabled" id="" aria-describedby="" value="<?php echo $row[0];?>">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">ProductCategory</label>
                            <input type="text" name="pCategory" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[1];?>" />
                        </div>


                        <div class="form-group col-sm-2">
                            <label for="">ProductType</label>
                            <input type="text" name="pType" class="form-control form-control-sm" id="" value="<?php echo $row[2];?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">ProductBrand</label>
                            <input type="text" name="pBrand" class="form-control form-control-sm" id="" value="<?php echo $row[3];?>">
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="">unit</label>
                            <input type="tel" name="pUnit" class="form-control numbersOnly form-control-sm" value="<?php echo $row[7];?>" />
                        </div>

                        <div class="form-group col-sm-1">
                            <label for="">QTY</label>
                            <input type="tel" name="pQuantity" class="form-control numbersOnly form-control-sm" value="<?php echo $row[8];?>" />
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="">Rate</label>
                            <input type="tel" name="pRate" class="form-control numbersOnly form-control-sm" value="<?php echo $row[6];?>" />
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-4">
                            <label for="">ProductName</label>
                            <input type="text" name="pName" class="form-control form-control-sm" id="" value="<?php echo $row[4]; ?>">
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Product Description</label>
                            <input type="text" name="pDescription" class="form-control form-control-sm" value="<?php echo $row[5];?>" />
                        </div>
                    </div>


                    <div class="mt-1">
                        <button type="submit" class="btn btn-dark" name="pUpdateSubmit">Submit</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</div>

<?php    
            if(isset($_POST['pUpdateSubmit'])){
                
                
                
            $query_for_update= "UPDATE product SET product_description = '$_POST[pDescription]',product_name='$_POST[pName]',product_category='$_POST[pCategory]',product_type='$_POST[pType]',product_brand='$_POST[pBrand]',product_rate='$_POST[pRate]',product_unit='$_POST[pUnit]',product_quantity='$_POST[pQuantity]' WHERE product_id = '$_POST[pId]' ";
                
            $query_for_update_result  = mysqli_query($connect,$query_for_update); 
                
                if($query_for_update_result){
                    header("location:products.php");
                }
                                
                                
                            }



?>

<!--product modal end-->

<!--//////////////////////////////////////////////modal end////////////////////////-->

<!--vendor edit modal-->



<div class="modal fade bd-example-modal-lg" id="vendorEdit<?php echo $vId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Vendor</div>


            <div class="header-body my-3">


                <form method="post">
                    <div class="form-row">
                        <input type="hidden" name="vId" class="form-control numbersOnly form-control-sm" value="<?php echo $row[0];?>" />

                        <div class="form-group col-sm-6">
                            <label for="" class="">Vendor Person Name</label>
                            <input type="text" class=" form-control form-control-sm" name="vPName" id="" aria-describedby="" value="<?php echo $row[2];?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Vendor Company Name</label>
                            <input type="text" class="form-control form-control-sm" id="" name="vCName" value="<?php echo $row[1];?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="" class="">Contact Number</label>
                            <input type="text" max-length="10" class="form-control contactsOnly  form-control-sm" name="vCNum" value="<?php echo $row[3];?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Email Address</label>
                            <input type="email" name="vEmail" class="form-control  form-control-sm" value="<?php echo $row[4];?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Pan Number</label>
                            <input type="text" name="vPNum" class="form-control form-control-sm" value="<?php echo $row[7];?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Gst Number</label>
                            <input type="text" name="vGNum" class="form-control form-control-sm" value="<?php echo $row[6];?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Credit Amount</label>
                            <input type="text" name="vCAmt" class="form-control numbersOnly form-control-sm" value="<?php echo $row[8];?>" />
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" name="vUpdateSubmit" class="btn btn-dark">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['vUpdateSubmit'])){
                
                
                
                
                
            $query_for_v_update= "UPDATE `vendors` SET `vendor_company_name`='$_POST[vCName]',`vendor_person_name`='$_POST[vPName]',`vendor_contact_no`='$_POST[vCNum]',`vendor_email`='$_POST[vEmail]',`vendor_gst_no`='$_POST[vGNum]',`vendor_pan_no`='$_POST[vPNum]',`vendor_credit_amount`='$_POST[vCAmt]' WHERE `vendors_id`='$_POST[vId]'";
                
            $query_for_v_update_result  = mysqli_query($connect,$query_for_v_update); 
                
                if($query_for_v_update_result){
                    header("location:vendor.php");
                }
                                
                                
                            }



?>


<!--vendor edit modal ends here-->



<!--expense edit modal-->

<div class="modal fade bd-example-modal-lg" id="ExpenseEdit<?php echo $eId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Expense</div>


            <div class="header-body my-3">


                <form method="post">

                    <div class="form-row">

                        <div class="form-group col-sm-1">
                            <label for="" class="">No.</label>
                            <input type="text" name="eNo" class=" form-control form-control-sm" value="<?php echo $row[0]; ?> ">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">Date</label>
                            <input type="date" name="eDate" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[6]; ?>" />
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="">ExpenseType</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="eType">
                                    <option value="<?php echo $row[2]; ?>" selected>
                                        <?php echo $row[2]; ?>
                                    </option>
                                    <option value="Voucher">Voucher</option>
                                    <option value="CashMemo">Cash Memo</option>
                                    <option value="Payment">Payment</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Expense Name</label>
                            <input type="text" name="eName" class="form-control form-control-sm" value="<?php echo $row[3]; ?>">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label for="">Details</label>
                            <textarea name="eDetails" class="form-control" id="" cols="" rows="2"><?php echo $row[4]; ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3 ">
                            <label for="">Amount</label>
                            <input type="tel" name="eAmount" class="form-control numbersOnly form-control-sm" value="<?php echo $row[5]; ?>" />
                        </div>

                    </div>
                    <div class="mt-1">
                        <button type="submit" name="eUpdateSubmit" class="btn btn-dark">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['eUpdateSubmit'])){
                
                
                
                
                
            $query_for_e_update= "UPDATE `expense` SET
            `expense_type`='$_POST[eType]',`expense_name`='$_POST[eName]',`expense_comment`='$_POST[eDetails]',`expense_amount`='$_POST[eAmount]',`expense_date`='$_POST[eDate]' WHERE `expense_id`='$_POST[eNo]'";
                
            $query_for_e_update_result  = mysqli_query($connect,$query_for_e_update); 
                
                if($query_for_e_update_result){
                    header("location:expense.php");
                }
                                
                                
                            }



?>



<!--expense edit modal end-->










<!-- customer edit start-->



<div class="modal fade bd-example-modal-lg" id="customerEdit<?php echo $cId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Customer</div>


            <div class="header-body my-3">

                <form method="post">
                    <div class="form-row">
                        <input type="hidden" name="cNo" value="<?php echo $row[0]; ?>">

                        <div class="form-group col-sm-4">
                            <label for="" class="">Customer Name</label>
                            <input type="text" name="cName" class="form-control form-control-sm" value="<?php echo $row[1] ?>">
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Company Name</label>
                            <input type="text" name="cCName" class="form-control form-control-sm" value="<?php echo $row[2] ?>">
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="" class="">Contact Number</label>
                            <input type="text" max-length="10" name="cCnumber" class="form-control contactOnly  form-control-sm" value="<?php echo $row[3] ?>" />
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Email Address</label>
                            <input type="email" name="cEmail" class="form-control  form-control-sm" value="<?php echo $row[4] ?>" />
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="">Pan Number</label>
                            <input type="text" name="cPNumber" class="form-control form-control-sm" value="<?php echo $row[7] ?>" />
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Gst Number</label>
                            <input type="text" name="cGnumber" class="form-control form-control-sm" value="<?php echo $row[6] ?>" />
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="">Credit Amount</label>
                            <input type="text" name="cCAmt" class="form-control numbersOnly form-control-sm" value="<?php echo $row[10] ?>" />
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="">Credit Limit</label>
                            <input type="text" name="cCLimit" class="form-control numbersOnly form-control-sm" value="<?php echo $row[9] ?>" />
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Credit Days</label>
                            <input type="number" min="0" name="cCDays" class="form-control numbersOnly form-control-sm" value="<?php echo $row[8] ?>" />
                        </div>

                        <div class="form-group col">
                            <label for="">Address</label>
                            <textarea class="form-control" name="cAdd" rows="2"><?php echo $row[5] ?></textarea>
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" name="cUpdateSubmit" class="btn btn-dark">Submit</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['cUpdateSubmit'])){
                
                
                
                
                
            $query_for_c_update= "UPDATE `customer` SET 
            `customer_name`='$_POST[cName]',`customer_company_name`='$_POST[cCName]',`customer_contact_no`='$_POST[cCnumber]',`customer_email`='$_POST[cEmail]',`customer_address`='$_POST[cAdd]',`customer_gst_no`='$_POST[cGnumber]',`customer_pan_no`='$_POST[cPNumber]',`customer_credit_days`='$_POST[cCDays]',`customer_credit_limit`='$_POST[cCLimit]',`customer_credit_amount`='$_POST[cCAmt]' WHERE `customer_id`='$_POST[cNo]'";
                
            $query_for_c_update_result  = mysqli_query($connect,$query_for_c_update); 
                
                if($query_for_c_update_result){
                    header("location:customer.php");
                }
                                
                                
                            }



?>



<!--customer edit modal end-->










<!--employee edit modal starts?>-->





<div class="modal fade bd-example-modal-lg" id="employeeEdit<?php echo $emId; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Employee</div>


            <div class="header-body my-3">

                <form method="post">
                    <div class="form-row">
                        <input type="hidden" value="<?php echo $row[0]; ?>" name="emNo">

                        <div class="form-group col-sm-6">
                            <label for="" class="">Employee First Name</label>
                            <input type="text" name="emFName" class=" form-control form-control-sm" value="<?php echo $row[1] ?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Employee Last Name</label>
                            <input type="text" name="emLName" class="form-control form-control-sm" value="<?php echo $row[2] ?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="" class="">Contact Number</label>
                            <input type="text" max-length="10" name="emCnumber" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[4] ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Email Address</label>
                            <input type="email" name="emEmail" class="form-control  form-control-sm" value="<?php echo $row[3] ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Password</label>
                            <input type="password" name="emPass" class="form-control form-control-sm" value="<?php echo $row[2] ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Designation</label>

                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="emDesig" required>
                                    <option value="<?php echo $row[6]; ?>" selected>
                                        <?php echo $row[6]; ?>
                                    </option>
                                    <option value="Executive">Executive</option>
                                    <option value="SeniorExecutive">Senior Executive</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <!--                    <input type="text" name="" class="form-control form-control-sm" />-->
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Joining Date</label>
                            <input type="date" name="emJDate" class="form-control form-control-sm" value="<?php echo $row[7]; ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Salary</label>
                            <input type="text" name="emSalary" class="form-control numbersOnly form-control-sm" value="<?php echo $row[8]; ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Aadhar No</label>
                            <input type="text" name="emAadhar" class="form-control numbersOnly form-control-sm" value="<?php echo $row[10]; ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Address</label>
                            <textarea class="form-control" name="emAdd" rows="2"><?php echo $row[9]; ?></textarea>
                        </div>

                    </div>


                    <div class="mt-1">
                        <button type="submit" name="emUpdateSubmit" class="btn btn-dark">Submit</button>
                    </div>


                </form>


            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['emUpdateSubmit'])){
                
                
                
                
                
            $query_for_em_update= "UPDATE `employee` SET `employee_first_name`='$_POST[emFName]',`employee_last_name`='$_POST[emLName]',`employee_email`='$_POST[emEmail]',`employee_contact_no`='$_POST[emCnumber]',`employee_password`='$_POST[emPass]',`employee_designation`='$_POST[emDesig]',`employee_joining_date`='$_POST[emJDate]',`employee_salary`='$_POST[emSalary]',`employee_address`='$_POST[emAdd]',`employee_aadhar`='$_POST[emAadhar]' WHERE `employee_id`='$_POST[emNo]'";
                
            $query_for_em_update_result  = mysqli_query($connect,$query_for_em_update); 
                
                if($query_for_em_update_result){
                    header("location:employee.php");
                }
                                
                                
                            }



?>




<!--employee edit modal ends-->



<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////-->





<!--expense delete modal starts here>?-->






<div class="modal fade bd-example-modal-lg" id="expenseDelete<?php echo $eId; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Expense</div>


            <div class="header-body my-3">


                <h5> Are you sure to delete Expense No
                    <?php echo $row[0]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteExpense" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="eDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['eDelete'])){
                
                
                
                
                
            $query_for_e_delete= "DELETE FROM `expense` WHERE `expense_id`='$_POST[deleteExpense]'";
                
            $query_for_e_delete_result  = mysqli_query($connect,$query_for_e_delete); 
                
                if($query_for_e_delete_result){
                    header("location:expense.php");
                }
                                
                                
                            }



?>


<!--expense delete modal ends here-->










<!--products delete modal starts here-->



<div class="modal fade bd-example-modal-lg" id="productDelete<?php echo $pId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Product</div>


            <div class="header-body my-3">


                <h5> Are you sure to delete product No
                    <?php echo $row[0]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteProduct" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="pDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['pDelete'])){
                
                
                
                
                
            $query_for_p_delete= "DELETE FROM `product` WHERE `product_id`=$_POST[deleteProduct]";
                
            $query_for_p_delete_result  = mysqli_query($connect,$query_for_p_delete); 
                
                if($query_for_p_delete_result){
                    header("location:products.php");
                }
                                
                                
                            }



?>







<!--products delete modal ends here-->





<!--customer modal delete-->




<div class="modal fade bd-example-modal-lg" id="deleteCustomer<?php echo $cId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Customer</div>


            <div class="header-body my-3">


                <h5> Are you sure to delete Customer
                    <?php echo $row[1]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteCustomer" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="cDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['cDelete'])){
                
                
                
                
                
            $query_for_c_delete= "DELETE FROM `customer` WHERE `customer_id`=$_POST[deleteCustomer]";
                
            $query_for_c_delete_result  = mysqli_query($connect,$query_for_c_delete); 
                
                if($query_for_c_delete_result){
                    header("location:customer.php");
                }
                                
                                
                            }



?>










<!--customer modal ends here-->




<!--employee modal start here?-->



<div class="modal fade bd-example-modal-lg" id="deleteEmployee<?php echo $emId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Employee</div>


            <div class="header-body my-3">


                <h5> Are you sure to delete Employee
                    <?php echo $row[1]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteEmployee" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="emDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['emDelete'])){
                
                
                
                
                
            $query_for_em_delete= "DELETE FROM `employee` WHERE `employee_id`=$_POST[deleteEmployee]";
                
            $query_for_em_delete_result  = mysqli_query($connect,$query_for_em_delete); 
                
                if($query_for_em_delete_result){
                    header("location:employee.php");
                }
                                
                                
                            }



?>





<!--employee modal  delete ends here?-->






<!--vendor delete modal start-->

<div class="modal fade bd-example-modal-lg" id="vendorDelete<?php echo $vId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Vendor</div>


            <div class="header-body my-3">


                <h5> Are you sure to delete vendor
                    <?php echo $row[1]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteVendor" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="vDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['vDelete'])){
                
                
                
                
                
            $query_for_v_delete= "DELETE FROM `vendors` WHERE `vendors_id`=$_POST[deleteVendor]";
                
            $query_for_v_delete_result  = mysqli_query($connect,$query_for_v_delete); 
                
                if($query_for_v_delete_result){
                    header("location:vendor.php");
                }
                                
                                
                            }



?>




<!--vendor delete modal end here>/-->




<!--purchase delete modal starts here-->





<div class="modal fade bd-example-modal-lg" id="purchaseDelete<?php echo $puId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Purchase Receipt</div>


            <div class="header-body my-3">


                <h5> Are you sure to delete Purchase Receipt
                    <?php echo $row[0]; ?>?
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deletePurchase" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="puDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['puDelete'])){
                
                
                
                
                
            $query_for_pu_delete= "DELETE FROM `purchase_receipt` WHERE `purchase_receipt_id`=$_POST[deletePurchase]";
                
            $query_for_pu_delete_result  = mysqli_query($connect,$query_for_pu_delete); 
                
                
                
                $imn="DELETE FROM `purchase` WHERE `purchase_receipt_id`=$_POST[deletePurchase]";
                         
                    $imn_result  = mysqli_query($connect,$imn); 
                    
                
                if($query_for_pu_delete_result){
                    header("location:purchase.php");
                }
                                
                                
                            }



?>










<!--purchase delete modal ends here-->





<!--sales delete modal starts here-->


<div class="modal fade bd-example-modal-lg" id="salesDelete<?php echo $sId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Sales Receipt</div>


            <div class="header-body my-3">


                <h5> Are you sure to delete sales Receipt
                    <?php echo $row[0]; ?>?
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteSales" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="sDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['sDelete'])){
                
                
                
                
                
            $query_for_s_delete= "DELETE FROM `sales_receipt` WHERE `sales_receipt_id`=$_POST[deleteSales]";
                
            $query_for_s_delete_result  = mysqli_query($connect,$query_for_s_delete); 
                
                
                
                $imn1="DELETE FROM `sales` WHERE `sales_receipt_id`=$_POST[deleteSales]";
                         
                    $imn1_result  = mysqli_query($connect,$imn1); 
                    
                
                if($query_for_s_delete_result){
                    header("location:sales.php");
                }
                                
                                
                            }



?>








<!--sales delete modal ends here-->



