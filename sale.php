<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php 
        include('navbar.php');
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php 
            include('topbar.php');
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Sale Page</h1>

          <div class="card o-hidden border-0 shadow-lg my-5 " id="divaddbrand">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Scan Item Code</h1>

                        <?php

                          if (isset($_REQUEST['status'])) {

                            $status = $_REQUEST['status'];
                            if ($status==1) {

                              echo '<div class="alert alert-success">New Brand Added Successfully!</div>';
                              
                            }else if ($status==2) {
                              echo '<div class="alert alert-danger">Delete Successfully!</div>';
                              # code...
                            }else{
                              echo '<div class="alert alert-info">Update Successfully!</div>';
                            }
                            
                          }
                        ?>

                      </div>
                      <form class="user" action="addbrand.php" method="POST">
                        
                        <div class="form-group">
                          <input type="text" class="form-control" name="brand_name" required="required" id="item_code" placeholder="Item Code">
                        </div>

                        <div class="form-group">
                          <table class="table table-bordered ">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                              </tr>
                            </thead>

                            <tbody id="mytbody">
                              
                            </tbody>

                          </table>
                           <a href="#" class="btn btn-info btn-icon-split order">
                              <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Check out</span>
                            </a>

                        </div>
                                               
                      </form>
                     
                     
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="card o-hidden border-0 shadow-lg my-5 " id="diveditbrand">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Brand Name!</h1>

                        <?php

                          if (isset($_REQUEST['status'])) {

                            $status = $_REQUEST['status'];
                            if ($status==1) {

                              echo '<div class="alert alert-success">New Brand Added Successfully!</div>';
                              
                            }else if ($status==2) {
                              echo '<div class="alert alert-danger">Delete Successfully!</div>';
                              # code...
                            }
                            
                          }
                        ?>

                      </div>
                      <form class="user" action="updatebrand.php" method="POST">
                        <input type="hidden" name="brand_id" id="brand_id">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="brand_name" required="required" id="brand_name" placeholder="Brand Name">
                        </div>

                        <div class="form-group">
                          <input type="submit" class="btn-info form-control col-4 offset-4" id="brand" value="Update">
                        </div>
                                               
                      </form>
                     
                     
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Edit</th>
                      <th>Delete</th>                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Edit</th>
                      <th>Delete</th>    
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                        include ('database.php');
                        $sql="Select * from brands";

                          $result=$conn->query($sql);
                          // var_dump($result);
                          if ($result->num_rows>0) {
                            $i=1;
                            while ( $row=$result->fetch_assoc()) {
                              //fetch_assoc() ka row takhu chin ko htoke pay tar
                              // print_r($row);

                              $id=$row['id'];
                              $name=$row['name'];

                              echo"<tr>
                                      <td>$id</td>
                                      <td>$name</td>
                                      <td><a href='#' data-id=$id class='btn btn-info edit'>Edit</a></td>
                                      <td>
                                          <form action='deletebrand.php' method='POST' onsubmit='return confirm(\"Are you sure?\")' >
                                            <input type='hidden' name='brand_id' value='$id'>
                                            <input type='submit' value='Delete' class='btn btn-danger'>
                                            </form>
                                      </td>
                                    </tr>";
                                    $i++;
                              
                            }
                            
                          }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
 
  <script type="text/javascript">
    showtable();
    $("#diveditbrand").hide();
    $("#divaddbrand").show();
    $(".edit").click(function(){
      $("#diveditbrand").show();
    $("#divaddbrand").hide();
      var id=$(this).data('id');
      // alert(id);
      $.post('editbrand.php',{id:id},function(data){
        // console.log(data);
        var jsondata=JSON.parse(data);
        $("#brand_id").val(jsondata.id);
        $("#brand_name").val(jsondata.name);
      });
    })


    $("#item_code").change(function(){

        var item_code = $(this).val();
        $.post('get_item_info.php',
          {item_code:item_code},
          function(data){
            //console.log(data);

            var mydata = JSON.parse(data);
            mydata.qty=1;
            console.log(mydata);
            var mylist = localStorage.getItem('mylist');
            if (!mylist) {
              mylist = '{"mylist":[]}';
            }
            var mylistobj = JSON.parse(mylist);

            var length =mylistobj.mylist.length;
            //alert(length);
            var mylist = mylistobj.mylist;
            for (var i = 0; i < length; i++) {
              if (mylist[i].id == mydata.id) {
                var exit=1;
                mylist[i].qty++;
              }
            }
            if (!exit) {
              mylistobj.mylist.push(mydata);

            }            
            //console.log(mylistobj);
            localStorage.setItem('mylist',JSON.stringify(mylistobj));
            $('#item_code').val('');
            showtable();
          })
    })
    
    function showtable(){
      var mylist = localStorage.getItem('mylist');
      if (mylist) {
        var mylistobj = JSON.parse(mylist);
        var html=''; var total=0; var j=1;
        $.each(mylistobj.mylist,function(i,v){
          if (v) {
            var item_code = v.item_code;
            var price = v.price;
            var quantity =v.qty;
            var subtotal =parseInt(price)*parseInt(quantity);
            total=parseInt(total)+parseInt(subtotal);
            console.log(total);
            html=html+'<tr><td>'+j+'</td><td>'+item_code+'</td><td>'+price+'</td><td>'+quantity+'</td><td>'+subtotal+'</td></tr>';
            j++;
          }
          



        })
        html=html+'<tr><td colspan=4>Total</td><td>'+total+'</td></tr>';
        $("#mytbody").html(html);
      }else{
        $('#mytbody').html('');
      }
    }
    ///Insert into Database 
    $('.order').click(function(){
      //alert('ckicked order btn');
      var myorder = localStorage.getItem('mylist');/// 'mylist' is array in table
      if (myorder) {
        var mylistorder = JSON.parse(myorder);
        var mylistarr = mylistorder.mylist; ///Second mylist is array 
        //console.log(mylistarr);
        $.post('order.php',{item:mylistarr},function(response){
          alert(response);
          if (response) {              ////if(response==success) nae wrie ya
            localStorage.clear();
            showtable();
          }

        })
      }
    })
  </script>


</body>

</html>
