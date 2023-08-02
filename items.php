<?php
    session_start();
    if (isset($_SESSION['userid'])) {
    
?>
  
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
          <h1 class="h3 mb-4 text-gray-800">Items Page</h1>

          <div class="card o-hidden border-0 shadow-lg my-5 " id="divadditem">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create Item Name!</h1>

                        <?php

                          if (isset($_REQUEST['status'])) {

                            $status = $_REQUEST['status'];
                            if ($status==1) {

                              echo '<div class="alert alert-success">New Item Added Successfully!</div>';
                              
                            }else if ($status==2) {
                              echo '<div class="alert alert-danger">Delete Successfully!</div>';
                              # code...
                            }else{
                              echo '<div class="alert alert-info">Update Successfully!</div>';
                            }
                            
                          }
                        ?>

                      </div>
                      <form class="user" action="additem.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="item_code" required="required"  placeholder="Item Code">
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Types</label>
                              <select class="form-control" name="type_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from types";
                                    $result=$conn->query($sql);
                                    //var_dump($result);          
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Sizes</label>
                              <select class="form-control" name="size_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from sizes";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                              </select>
                            </div>
                            
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Colors</label>
                              <select class="form-control" name="color_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from colors";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Gender</label>
                              <select class="form-control" name="gender_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from genders";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                              </select>
                              
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Brand</label>
                              <select class="form-control" name="brand_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from brands";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="price" required="required"  placeholder="Price">
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="quantity" required="required"  placeholder="Item Quantity">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="file" class="form-control " name="photo" required="required" >
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <textarea class="form-control" name="description"   placeholder="Item Description"></textarea> 
                            </div>
                          </div>
                        </div>  

                          <div class="form-group">
                            <input type="submit" class="btn-info form-control col-4 offset-4" id="brand" value="Add">
                          </div>
                                                 
                      </form>
                     
                     
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="card o-hidden border-0 shadow-lg my-5 " id="divedititem">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Items Name!</h1>

                        <?php

                          if (isset($_REQUEST['status'])) {

                            $status = $_REQUEST['status'];
                            if ($status==1) {

                              echo '<div class="alert alert-success">New Item Added Successfully!</div>';
                              
                            }else if ($status==2) {
                              echo '<div class="alert alert-danger">Delete Successfully!</div>';
                              # code...
                            }
                            
                          }
                        ?>

                      </div>
                      <form class="user" action="updateitem.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6">
                            <input type="hidden" name="item_id" id="item_id" >
                            <input type="hidden" name="oldphotolink" id="oldphotolink">
                            
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="item_code" id="uitem_code" required="required"  placeholder="Item Code">
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Type</label>
                              <select class="form-control" name="type_id" id="utype_id">

                                <?php 

                                    include('database.php');
                                    $sql="select * from types";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                                
                                
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Size</label>
                              <select class="form-control" name="size_id" id="usize_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from sizes";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                               
                              </select>
                            </div>
                            
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                               <label>Select Color</label>
                              <select class="form-control" name="color_id" id="ucolor_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from colors";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Gender</label>
                              <select class="form-control" name="gender_id" id="ugender_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from genders";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                              </select>
                              
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Brand</label>
                              <select class="form-control" name="brand_id" id="ubrand_id">
                                
                                <?php 

                                    include('database.php');
                                    $sql="select * from brands";
                                    $result=$conn->query($sql);
                                    //var_dump($result);
                                    while ($row=$result->fetch_assoc()) {
                                      //print_r($row);
                                      $id=$row['id'];
                                      $name=$row['name'];
                                      echo "<option value=$id>$name</option>";
                                      # code...
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="price" required="required" id="uprice"  placeholder="Price">
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="quantity" id="uquantity" required="required"  placeholder="Item Quantity">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group" id="divshowoldphoto">
                              <img src="" id="img" width="100" height="100">
                              <button class="btn btn-danger" id="deletebtn">Delete</button>
                            </div>
                            <div class="form-group" id="divphotoupload">
                              <input type="file" class="form-control" name="photo">
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <textarea class="form-control" name="description" id="udescription"  placeholder="Item Description"></textarea> 
                            </div>
                          </div>
                        </div>  

                          <div class="form-group">
                            <input type="submit" class="btn-info form-control col-4 offset-4" id="item" value="Update">
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
                      <th>Item Code</th>
                      <th>Type</th>
                      <th>Size</th>
                      <th>Color</th> 
                      <th>Gender</th>
                      <th>Brand</th> 
                      <th>Price</th> 
                      <th>Quantity</th> 
                      <th>Photo</th>
                      <th>Edit</th>    
                      <th>Delete</th> 

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Item Code</th>
                      <th>Type</th>
                      <th>Size</th>
                      <th>Color</th> 
                      <th>Gender</th>
                      <th>Brand</th> 
                      <th>Price</th> 
                      <th>Quantity</th> 
                      <th>Photo</th>
                      <th>Edit</th>    
                      <th>Delete</th>     
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                        include ('database.php');
                        $sql="SELECT i.*,t.name as type_name,s.name as size_name,c.name as color_name,g.name as gender_name,b.name as brand_name FROM items i INNER JOIN types t ON i.type_id=t.id INNER JOIN sizes s ON i.size_id=s.id INNER JOIN colors c ON c.id=i.color_id INNER JOIN genders g ON g.id=i.gender_id INNER JOIN brands b ON b.id=i.brand_id";

                          $result=$conn->query($sql);
                          // var_dump($result);
                          if ($result->num_rows>0) {
                            $i=1;
                            while ( $row=$result->fetch_assoc()) {
                              //fetch_assoc() ka row takhu chin ko htoke pay tar
                              //print_r($row);

                              // Array ( [id] => 1 [type_id] => 1 [gender_id] => 1 [size_id] => 1 [color_id] => 1 [price] => 5800 [brand_id] => 2 [item_code] => 34 [photo] => photo/11.jpg [detailinfo] => hhhhnnnnh [quantity] => 999 [created_at] => 2019-03-07 11:39:36 [updated_at] => 2019-03-07 11:39:36 [type_name] => Shirt [size_name] => Small [color_name] => white [gender_name] => men [brand_name] => Giordano )

                              $id=$row['id'];
                              $item_code = $row['item_code'];
                              $type_name = $row['type_name'];                              
                              $size_name = $row['size_name'];
                              $color_name = $row['color_name'];
                              $gender_name = $row['gender_name'];
                              $brand_name = $row['brand_name'];
                              $price = $row['price'];
                              $photo = $row['photo'];
                              $quantity = $row['quantity'];
                              //$name=$row['name'];

                              echo"<tr>
                                      <td>$id</td>
                                      <td>$item_code</td>
                                      <td>$type_name</td>
                                      <td>$size_name</td>
                                      <td>$color_name</td>
                                      <td>$gender_name</td>
                                      <td>$brand_name</td>
                                      <td>$price</td>
                                      <td><img src='$photo' width=100 height=100></td>
                                      <td>$quantity</td>
                                      <td><a href='#' data-id=$id class='btn btn-info edit'>Edit</a></td>
                                      <td>
                                          <form action='deleteitem.php' method='POST' onsubmit='return confirm(\"Are you sure?\")' >
                                            <input type='hidden' name='item_id' value='$id'>
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
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
    $("#divedititem").hide();
    $("#divadditem").show();
    $(".edit").click(function(){
    $("#divedititem").show();
    $("#divadditem").hide();
      var id=$(this).data('id');
      // alert(id);
      $.post('edititem.php',{id:id},function(data){
        // console.log(data);
         var jsondata=JSON.parse(data);
         console.log(jsondata);
        $("#item_id").val(jsondata.id);

        $("#uitem_code").val(jsondata.item_code);
        $("#ugender_id").val(jsondata.gender_id);
        $("#utype_id").val(jsondata.type_id);
        $("#ucolor_id").val(jsondata.color_id);
        $("#ubrand_id").val(jsondata.brand_id);
        $("#uprice").val(jsondata.price);
        $("#uquantity").val(jsondata.quantity);
        $("#udescription").val(jsondata.detailinfo);
        $("#divphotoupload").hide();
        $("#divshowoldphoto").show();
        $("#img").attr("src",jsondata.photo);

        $("#oldphotolink").val(jsondata.photo);
      });
    })

    $("#divshowoldphoto").on('click','#deletebtn',function(e){
        e.preventDefault();
        $("#divshowoldphoto").hide();
        $("#divphotoupload").show();
    })
  </script>


</body>

</html>

<?php
    }else{
      header('location: login.php');
    }
?>



