<?php ob_start(); ?>
<?php include('includes/header.php')?>


<!--------insert new product query------------->

<?php
     if(isset($_POST['pInsertSubmit'])){
                $query_p_insert= "INSERT INTO `product`(`product_id`, `product_category`, `product_type`, `product_brand`, `product_name`, `product_description`, `product_rate`, `product_unit`, `product_quantity`) VALUES('','$_POST[insertPCategory]','$_POST[insertPType]','$_POST[insertPBrand]','$_POST[insertPName]','$_POST[insertPDescription]','$_POST[insertPRate]','$_POST[insertPUnit]','$_POST[insertPQuantity]')";
                $query_p_insert_result  = mysqli_query($connect,$query_p_insert); 

                if(!$query_p_insert_result){
                echo mysqli_connect($connect);
                }
    
                }
?>


<!-- page content starts here   -->

<div class="h2 mb-3">Products</div>

<section>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#product_form" role="tab" aria-controls="profile" aria-selected="false">Add New Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#product_table" role="tab" aria-controls="home" aria-selected="true">Products Records</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content py-4">
        <!--------------------------------------add product section--------------------------->
        <div class="tab-pane active" id="product_form" role="tabpanel" aria-labelledby="home-tab">

            <div class="container">

                <form method="post">
                    <div class="form-row">

                        <div class="form-group col-sm-1">
                            <label for="" class="">No</label>
                            <input type="text" name="" class="form-control form-control-sm" id="" value="<?php  ?>">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">ProductCategory</label>
                            <input type="text" name="insertPCategory" class="form-control contactsOnly  form-control-sm" />
                        </div>


                        <div class="form-group col-sm-2">
                            <label for="">ProductType</label>
                            <input type="text" name="insertPType" class="form-control form-control-sm" id="">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="">ProductBrand</label>
                            <input type="text" name="insertPBrand" class="form-control form-control-sm" id="">
                        </div>
                         <div class="form-group col-sm-1">
                            <label for="">Tax</label>
                            <input type="text" name="insertPTax" class="form-control form-control-sm" id="">
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="">unit</label>
                            <input type="tel" name="insertPUnit" class="form-control numbersOnly form-control-sm" />
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="">Quantity</label>
                            <input type="tel" name="insertPQuantity" class="form-control numbersOnly form-control-sm" />
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="">Rate</label>
                            <input type="tel" name="insertPRate" class="form-control numbersOnly form-control-sm" />
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-4">
                            <label for="">ProductName</label>
                            <input type="text" name="insertPName" class="form-control form-control-sm" id="">
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Product Description</label>
                            <input type="text" name="insertPDescription" class="form-control form-control-sm" />
                        </div>
                    </div>


                    <div class="mt-1">
                        <button type="submit" name="pInsertSubmit" class="btn btn-dark">Submit</button>
                    </div>

                </form>

                


            </div>



        </div>

        <!---------------------------table---------------------------->
        <div class="tab-pane" id="product_table" role="tabpanel" aria-labelledby="profile-tab">

            <div class="container">
                <table id="table_id" class="display table-bordered">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Product Id</th>
                            <th>Product Cat</th>
                            <th>Product type</th>
                            <th>Product brand</th>
                            <th>Product Name</th>
                            <th>Product Des</th>
                            <th>Product rate</th>
                            <th>product sales rate</th>
                            <th>Product unit</th>
                            <th>Product qaunty</th>
                        </tr>
                    </thead>


                    <?php 
                $query= "SELECT * FROM `product`";
                $result  = mysqli_query($connect,$query); 
                while($row= mysqli_fetch_row($result)){
                $pId=$row[0];
        ?>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <a href="#edit<?php echo $pId;?>" data-toggle="modal" id="productEditLink"><i class="fa fa-edit " aria-hidden="true"></i></a>
                                <a href="#productDelete<?php echo $pId;?>"data-toggle="modal"><i class="fa fa-trash " aria-hidden="true"></i></a>
                                 <a href="" data-toggle="modal" class="bar" target="_blank"><i class="fa fa-barcode " aria-hidden="true"></i></a>

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
                            <td>
                                <?php echo $row[9];?>
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
    $('.bar').click(function(){
   var x =  prompt('how many barcodes');
    $(this).attr('href','includes/barcode.php?barid='+x+'&pId=<?php echo $pId?>');
    
});    

</script>

<?php include('includes/footer.php')?>
