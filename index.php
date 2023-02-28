<?php
require_once "controllers/clientsingle.controller.php";
require_once "models/clientsingle.model.php";

?>

<link rel = "stylesheet" href = "views/assets/css/styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="views/js/clientsingle.js"></script>
<script src="views/assets/plugins/sweetalert2/sweet_alert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">


<div class="clearfix"></div>
	
<div class="content-wrapper">
  <div class="container-fluid">
   <div class="row pt-2 pb-2">
     <div class="col-sm-12">
  	    <h4 class="flex justify-center border border-blue text-white bg-blue-500 py-6">CLIENT INFORMATION</h4>
     </div>
   </div>

    <div class="row">
      <div class="col-lg-12">
        <form role="form" id="client-form" method="POST" autocomplete="nope">
          <div class="card">
            <div class="card-body ml-32">
                 <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
                 <div class="row grid grid-cols-3 gap 4 my-2 ">
                      <div class="col-sm-10 place-self-auto ">
                          
                          <input type="text" class="form-control rounded-lg border-2 border-blue-500 " id="tns-cname" placeholder="Enter Client Name" name="tns-cname" autocomplete="nope" required>
                      </div>

                      <div class="form-group">
                          <label>&nbsp;</label>
                          <div class="icheck-material-success place-self-auto  py-2">
                            <input type="checkbox" id="num-isactive" name="num-isactive" value="1" checked/>
                            <label for="num-isactive">Active</label>
                          </div>
                      </div>

                      <div class=" ... form-group place-self-auto ">
                          
                          <input type="text" class="form-control rounded-lg border-2 border-blue-500 pr-2" id="tns-clientid" name="tns-clientid" placeholder="Enter Client ID" value="">
                      </div>
                  </div>                 

                 <div class="row grid grid-cols-3 gap 4 my-2">

                 <div class="form-group flex justify-start border-sm  pr-2">
                   
                    <input type="text" class="form-control rounded-lg border-2 border-blue-500 pr-2" id="tns-address" placeholder="Enter Address" name="tns-address" autocomplete="nope">
                 </div>            
                      <div class="col-sm-6 place-self-auto form-group ">
                          
                          <input type="text" class="form-control rounded-lg border-2 border-blue-500 " id="num-phone" placeholder="Enter Landline #" name="num-phone" autocomplete="nope">
                      </div>
                      <div class="col-sm-6 place-self-auto form-group ">
                          
                          <input type="text" class="form-control rounded-lg border-2 border-blue-500 " id="num-mobile" placeholder="Enter Mobile #" name="num-mobile" autocomplete="nope">
                      </div>
                  </div>

                  <div class="row grid grid-cols-3 gap 4">
                      <div class="col-sm-4 form-group ">
                         
                          <input type="text" class="form-control  rounded-lg border-2 border-blue-500" id="tns-email" placeholder="Enter E-mail Address" name="tns-email" autocomplete="nope">
                      </div>
                      <div class="col-sm-4 form-group ">
                          
                          <input type="text" class="form-control rounded-lg border-2 border-blue-500" id="tns-website" placeholder="Enter Website URL" name="tns-website" autocomplete="nope">
                      </div>                      
                      <div class="col-sm-4 form-group ">
                          
                          <input type="text" class="form-control rounded-lg border-2 border-blue-500 " id="tns-cperson" placeholder="Enter Contact Person" name="tns-cperson" autocomplete="nope">
                      </div>                     
                  </div> 
            </div>

            <div class="card-footer">
              <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-9 flex justify-end my-6 mr-12">
                  <div class="float-sm-right">
                    <button type="button" class="btn btn-light text-center font-sans border border-blue-500 hover:bg-blue-700 hover:text-white transition duration-300 ease-linear font-bold px-5" id="btn-new-client"><i class="fa fa-file"></i>&nbsp;&nbsp;New</button>

                    <button type="submit" class="btn btn-light text-center font-sans border border-blue-500 hover:bg-blue-700 hover:text-white transition duration-300 ease-linear font-bold px-5"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>

                    <button type="button" class="btn btn-light text-center font-sans border border-blue-500 hover:bg-blue-700 hover:text-white transition duration-300 ease-linear font-bold px-5" id="btn-search" data-toggle="modal" data-target="#modal-search-client"><i class="icon-search4 mr-2"></i> Search</button> 
                          
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
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp;CLIENT LIST</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>

      <div class="modal-body">
        <table class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header clientTable" width="100%">
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Contact #</th>
            </tr>
          </thead>
          <tbody>
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
      </div>
    </div>
  </div>
</div>



