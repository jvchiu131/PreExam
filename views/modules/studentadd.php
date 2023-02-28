<?php
require_once "../../controllers/clients.controller.php";
require_once "../../models/clients.model.php";

?>

<link rel = "stylesheet" href = "../assets/css/styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/clients.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">


<div class="clearfix"></div>
	
    <div class="container px-8 py-12 max-w-3xl mx-auto my-20 border shadow-lg">
      <div class="">
       <div class="">
         <div class="flex justify-center">
              <h4 class="font-bold text-lg">CLIENT INFORMATION</h4>
         </div>
       </div>
    
        <div class="flex justify-center">
          <div class="">
            <form role="form" id="client-form" method="POST" autocomplete="nope">
              <div class="">
                <div class="">
                     <div class="flex flex-row my-2 space-x-24">
                          <div class="basis-1/4">
                              <input type="text" class=" rounded-lg text-center font-sans bg-gray-200 box-border h-8 w-152 border border-blue-500" id="tns-cname" placeholder="Enter Client Name" name="tns-cname" autocomplete="nope" required>
                          </div>
    
                          <div class="basis-1/4">
                              <input type="text" class="rounded-lg text-center font-sans bg-gray-200 box-border h-8 w-32 border border-blue-500" id="tns-clientid" name="tns-clientid" placeholder="Enter Client ID" value="">
                          </div>

                          <div class="basis-1/4">
                              <div class="icheck-material-success">
                                <input type="checkbox" id="num-isactive" name="num-isactive" value="1" checked/>
                                <label for="num-isactive">Active</label>
                              </div>
                          </div>
                      </div>                 
    
                                                   
                     <div class="flex flex-row my-6 space-x-24">
                     <div class="basis-1/4">
                        
                        <input type="text" class="rounded-lg text-center font-sans bg-gray-200 box-border h-8 w-152 border border-blue-500" id="tns-address" placeholder="Enter Address" name="tns-address" autocomplete="nope">
                     </div>   
                          <div class="basis-1/4">
                              
                              <input type="text" class="rounded-lg text-center font-sans bg-gray-200 box-border h-8 w-152 border border-blue-500" id="num-phone" placeholder="Enter Landline #" name="num-phone" autocomplete="nope">
                          </div>
                          <div class="basis-1/4">
                              
                              <input type="text" class="rounded-lg text-center font-sans bg-gray-200 box-border h-8 w-32 border border-blue-500" id="num-mobile" placeholder="Enter Mobile #" name="num-mobile" autocomplete="nope">
                          </div>
                      </div>
    
                      <div class="flex flex-row mb-8 my-6 space-x-24 ">
                          <div class="basis-1/4">
                              
                              <input type="text" class="rounded-lg text-center font-sans bg-gray-200 box-border h-8 w-152 border border-blue-500" id="tns-email" placeholder="Enter E-mail Address" name="tns-email" autocomplete="nope">
                          </div>
                          <div class="basis-1/4">
                              
                              <input type="text" class="rounded-lg text-center font-sans bg-gray-200 box-border h-8 w-152 border border-blue-500" id="tns-website" placeholder="Enter Website URL" name="tns-website" autocomplete="nope">
                          </div>                      
                          <div class="basis-1/4">
                              
                              <input type="text" class="rounded-lg text-center font-sans bg-gray-200 box-border h-8 w-152 border border-blue-500" id="tns-cperson" placeholder="Enter Contact Person" name="tns-cperson" autocomplete="nope">
                          </div>                     
                      </div> 
                </div>
    
                <div class="flex justify-end ">
                  <div class="row">
                    <div class="">
                      <div class=" space-x-8 text-lg  ">
                       <button type="button" class="btn btn-light  rounded-full text-center font-sans box-border h-12 w-32 border border-blue-500 hover:bg-blue-500 hover:text-white  transition duration-300 ease-linear font-bold px-5  px-5" id="btn-new"><i class="fa fa-file"></i>New</button>
                       <button type="submit" class="btn btn-light  rounded-full text-center font-sans box-border h-12 w-32 border border-blue-500 hover:bg-blue-500 hover:text-white  transition duration-300 ease-linear font-bold px-5"><i class="fa fa-save"></i>Save</button>           
                      </div>
                    </div>
                  </div>
                </div>  <!-- footer -->
    
              </div>    <!-- card -->
            </form>
    
            <?php
              $createClient = new ControllerClients();
              $createClient -> ctrCreateClient();
            ?>
          </div>
        </div><!--End Row-->
    
      <div class="overlay toggle-menu"></div>
      </div>    <!-- container-fluid -->
    </div>      <!-- content-wrapper -->



    <div class="content-wrapper">
   <div class="container-fluid">
     <div class="row pt-2 pb-2">
        <div class="col-sm-12">
          <h4 class="page-title">Customer List</h4>
        </div>
     </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header float-sm-right">
              <button type="button" class="btn btn-light btn-round waves-effect waves-light m-1" onClick="location.href='clientadd'"><i class="fa fa-plus"></i> <span>&nbsp;ADD CUSTOMER</span> </button>
            </div>            

            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered table-hover table-striped clientlist">
                <thead>
                    <tr>
                      <th>Client</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Mobile</th>
                      <th>Contact Person</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $clients = (new ControllerClients)->ctrShowClients();
                    foreach ($clients as $key => $value) {
                      echo '<tr>
                              <td>'.$value["cname"].'</td>
                              <td>'.$value["email"].'</td>
                              <td>'.$value["phone"].'</td>  
                              <td>'.$value["mobile"].'</td>
                              <td>'.$value["cperson"].'</td>            
                              <td>
                                <div class="btn-group group-round m-1">
                                  <button class="btn btn-sm btn-light waves-effect waves-light btnEditClient" idClient="'.$value["id"].'"><i class="fa fa-pencil"></i></button>
                                </div>  
                              </td>
                            </tr>';
                      }
                  ?>
                </tbody>

              </table>

              <script>
               $(document).ready(function() {
                   $('#default-datatable').DataTable({
                       "paging": true,
                       "ordering": true,
                       "searching": true,
                       "info": true,
                       "responsive": true,
                       "lengthChange": true,
                       "pageLength": 10 // You can adjust the number of rows displayed per page here
                  });
                 });
              </script>
            </div>
            </div>
          </div>
        </div>
      </div>    <!-- row -->

    <div class="overlay toggle-menu"></div>
  </div>        <!-- container-fluid -->
</div>          <!-- content-wrapper -->