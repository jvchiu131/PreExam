<?php
require_once "controllers/clientsingle.controller.php";
require_once "models/clientsingle.model.php";

?>

<link rel = "stylesheet" href = "views/assets/css/styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
<script src="views/js/clientsingle.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<div class="w-full bg-fixed bg-cover bg-center" style="height:50rem; background-image: url(views/assets/bg1.jpg);">
<div class="clearfix"></div>
	
<div class="container bg-white border-none px-8 py-12 max-w-md mx-auto my-20  md:container px-8 py-12 max-w-3xl mx-auto my-20 border shadow-xl">
  <div class="">
   <div class="">
     <div class="flex justify-center">
  	    <h4 class="font-bold text-lg">CUSTOMER INFORMATION</h4>
     </div>
   </div>

    <div class="flex justify-center">
      <div class="">
        <form role="form" id="client-form" method="POST" autocomplete="nope">
          <div class="">
            <div class="">
                 <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
                 <div class="grid grid-cols-1 md:grid-cols-4 my-2 space-x-12 ">
                      <div class="col-span-1 md:col-span-2 font-sans bg-gray-200 box-border h-8 md:w-152 overflow-hidden border border-blue-500">
                          
                          <input type="text" class="box-border h-8 bg-gray-200" id="tns-cname" placeholder="Enter Customer Name" name="tns-cname" autocomplete="nope" required>
                      </div>

                      <div class=" rounded-lg col-span-1 font-sans bg-gray-200 box-border h-8 md:w-152 overflow-hidden border border-blue-500">
                          <input type="text" class="box-border h-8 bg-gray-200" id="tns-clientid" name="tns-clientid" placeholder="Enter Customer ID" value="">
                      </div>

                      <div class="col-span-1">
                          <div class="icheck-material-success place-self-auto  py-2">
                            <input type="checkbox" id="num-isactive" name="num-isactive" value="1" checked/>
                            <label for="num-isactive">Active</label>
                          </div>
                      </div>

                      
                  </div>                 

                 <div class="grid grid-cols-1 md:grid-cols-4 my-6 space-x-12">

                 <div class="col-span-1 md:col-span-2 rounded-lg font-sans bg-gray-200 box-border h-8 w-152 overflow-hidden border border-blue-500">
                    <input type="text" class="box-border h-8 bg-gray-200" id="tns-address" placeholder="Enter Address" name="tns-address" autocomplete="nope">
                 </div>            
                      <div class="col-span-1 rounded-lg font-sans bg-gray-200 box-border h-8 w-152 overflow-hidden border border-blue-500">
                          
                          <input type="text" class="fbox-border h-8 bg-gray-200" id="num-phone" placeholder="Landline #" name="num-phone" autocomplete="nope">
                      </div>
                      <div class="col-span-1 rounded-lg font-sans bg-gray-200 box-border h-8 w-152 overflow-hidden border border-blue-500">
                          
                          <input type="text" class="box-border h-8 bg-gray-200 " id="num-mobile" placeholder="Enter Mobile #" name="num-mobile" autocomplete="nope">
                      </div>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-3 space-x-12 mb-12">
                      <div class="col-span-1 rounded-lg font-sans bg-gray-200 box-border h-8 w-152 overflow-hidden border border-blue-500">
                         
                          <input type="text" class="box-border h-8 bg-gray-200 " id="tns-email" placeholder="Enter E-mail Address" name="tns-email" autocomplete="nope">
                      </div>
                      <div class="col-span-1 rounded-lg font-sans bg-gray-200 box-border h-8 w-152 overflow-hidden border border-blue-500">
                          
                          <input type="text" class="box-border h-8 bg-gray-200" id="tns-website" placeholder="Enter URL Website" name="tns-website" autocomplete="nope">
                      </div>                      
                      <div class="col-span-1 rounded-lg font-sans bg-gray-200 box-border h-8 w-152 overflow-hidden border border-blue-500">
                          
                          <input type="text" class="box-border h-8 bg-gray-200" id="tns-cperson" placeholder="Enter Contact Person" name="tns-cperson" autocomplete="nope">
                      </div>                     
                  </div> 
            </div>

            <div class="card-footer">
              <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="flex justify-end">
                  <div class="float-sm-right">
                    <button type="button" class="btn btn-light rounded-full text-center font-sans box-border h-12 w-32 border border-blue-500 hover:bg-blue-500 hover:text-white  transition duration-300 ease-linear font-bold px-5" id="btn-new-client"><i class="fa fa-file"></i>New</button>

                    <button type="submit" class="btn btn-light rounded-full text-center font-sans box-border h-12 w-32 border border-blue-500 hover:bg-blue-500 hover:text-white  transition duration-300 ease-linear font-bold px-5"><i class="fa fa-save"></i>Save</button>

                    <a href="index.php"class="btn btn-light rounded-full text-center font-sans box-border h-12 w-32 border border-blue-500 hover:bg-blue-500 hover:text-white  transition duration-300 ease-linear font-bold px-5">Go Back To Main</a>

                  </div>
                </div>
              </div>
            </div>  <!-- footer -->

          </div>    <!-- card -->
        </form>
      </div>
    </div><!--End Row-->
  </div>    <!-- container-fluid -->
</div>      <!-- content-wrapper -->

<div id="modal-search-client" class="modal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content"">
      <div class="modal-header">
        <h5 class="flex justify-center text-center font-bold  text-white"><i class="icon-menu7 mr-2"></i>CUSTOMER LIST</h5>
      </div>

      <div class="h-divider">
      </div>

      <div class="modal-body">
        <table id="datatable" class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header clientTable" width="100%">
          <thead class="bg-blue-500">
            <tr>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Contact #</th>
            </tr>
          </thead>
          <tbody class="text-center bg-white">
          <?php
            $clients = (new ControllerClient)->ctrShowClientList();
            foreach ($clients as $key => $value) {
              echo '<tr clientid='.$value["clientid"].'>
                      <td>'.$value["cname"].'</td>
                      <td>'.$value["address"].'</td>
                      <td>'.$value["mobile"].'</td>
                    </tr>';
              }
          ?>
          </tbody>
        </table>

        <script>
  $(document).ready(function() {
     $('#datatable').DataTable({
     "ordering": true,
     "searching": true,
      "info": true,
     "responsive": true,
     "lengthChange": true,
     "pageLength": 10
     });
  });
</script>
      </div>
    </div>
  </div>
</div>



