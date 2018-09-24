</div>
</div>

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="assests/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    //if(localStorage.getItem('sidebarStatus')=='sidebarChanged'){
    if (sessionStorage.getItem('sidebarStatus') == 'sidebarChanged') {
        $('#sidebar').addClass('active');
        $('#content').addClass('adjustContentDiv');
    }
    
    $(document).ready(function() {
        $('.xy').hide();
 $("select#payment").change(function(){
        var pM = $("#payment option:selected").val();
     if(pM=="Cash"){
         $('.xy').fadeOut();
     }
     if(pM=="Cheque")
         $('.xy').fadeIn();
         
    });
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');

        });


        $('.numbersOnly').keyup(function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });

        $('.contactOnly').keyup(function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('#table_id').DataTable();



        $('#myTab a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
        
        
     
        $(".addNewPuRow").click(function() {
          $('.puNewCol input:last').clone(true).insertAfter('.puNewCol input:last');
          $('.puNewCol1 input:last').clone(true).insertAfter('.puNewCol1 input:last');
          $('.puNewCol2 input:last').clone(true).insertAfter('.puNewCol2 input:last');
          $('.puNewCol3 input:last').clone(true).insertAfter('.puNewCol3 input:last');
          $('.puNewCol4 input:last').clone(true).insertAfter('.puNewCol4 input:last');
          return false;
            
        });
        
        
        $(".addNewSRow").click(function() {
          $('.sNewCol input:last').clone(true).insertAfter('.sNewCol input:last');
          $('.sNewCol1 input:last').clone(true).insertAfter('.sNewCol1 input:last');
          $('.sNewCol2 input:last').clone(true).insertAfter('.sNewCol2 input:last');
          $('.sNewCol3 input:last').clone(true).insertAfter('.sNewCol3 input:last');
          $('.sNewCol4 input:last').clone(true).insertAfter('.sNewCol4 input:last');
          $('.sNewCol5 input:last').clone(true).insertAfter('.sNewCol5 input:last');
          return false;
                });
        
        
        

    }); /*ready function ends here */
    
    

    //        storing tab status in local storage

    $('#myTab a').on("shown.bs.tab", function(e) {
        var id = $(e.target).attr("href");
        //                alert(id);
        localStorage.setItem('selectedTab', id)
    });

    var selectedTab = localStorage.getItem('selectedTab');
    if (selectedTab != null) {
        var x = $('#myTab a[href="' + selectedTab + '"]');
        $('#myTab a[href="' + selectedTab + '"]').tab('show');
        console.log(x);
    }



    //    sidebar active on reload as well
    $('#sidebarCollapse').on('click', function() {

        if ($('#sidebar').hasClass('active')) {
            //localStorage.removeItem('sidebarStatus');
            sessionStorage.removeItem('sidebarStatus');
            $('#content').removeClass('adjustContentDiv');
        } else {
            //localStorage.setItem('sidebarStatus', 'sidebarChanged');
            sessionStorage.setItem('sidebarStatus', 'sidebarChanged');
            $('#content').addClass('adjustContentDiv');
        }
    });
    
    
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(100).css({'overflow':'visible'});
})

   

 
    
    
    
</script>
</body>

</html>
