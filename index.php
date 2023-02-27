<?php
require_once "controllers/clientsingle.controller.php";
require_once "models/clientsingle.model.php";
?>

<link rel = "stylesheet" href = "views/assets/css/styles.css">

<script src="views/assets/plugins/sweetalert2/sweet_alert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="clearfix"></div>
	
<div class="content-wrapper">
  <div class="container-fluid">
   <div class="row pt-2 pb-2">
     <div class="col-sm-12">
  	    <h4 class="flex justify-center border border-blue text-red-600 bg-blue-500 py-6">CLIENT INFORMATION</h4>
     </div>
   </div>

    <div class="row">
      <div class="col-lg-12">
        <form role="form" id="client-form" method="POST" autocomplete="nope">
          <div class="card">
            <div class="card-body">
                 <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
                 <div class="row grid grid-cols-3 gap 4">
                      <div class="col-sm-10 col-span-2">
                          <label for="input-1">Client's Name</label>
                          <input type="text" class="form-control" id="tns-cname" placeholder="Enter Client Name" name="tns-cname" autocomplete="nope" required>
                      </div>

                      <div class="col-md-1 ... form-group">
                          <label>&nbsp;</label>
                          <div class="icheck-material-success">
                            <input type="checkbox" id="num-isactive" name="num-isactive" value="1" checked/>
                            <label for="num-isactive">Active</label>
                          </div>
                      </div>

                      <div class="col-sm-1 ... form-group">
                          <label for="input-2">Client ID</label>
                          <input type="text" class="form-control" id="tns-clientid" name="tns-clientid" value="">
                      </div>
                  </div>                 

                 <div class="form-group ...">
                    <label for="input-3">Address</label>
                    <input type="text" class="form-control" id="tns-address" placeholder="Enter Address" name="tns-address" autocomplete="nope">
                 </div>                                 

                 <div class="row">
                      <div class="col-sm-6 ... form-group">
                          <label for="input-4">Landline #</label>
                          <input type="text" class="form-control" id="num-phone" placeholder="Enter Landline #" name="num-phone" autocomplete="nope">
                      </div>
                      <div class="col-sm-6 ... form-group">
                          <label for="input-5">Mobile #</label>
                          <input type="text" class="form-control" id="num-mobile" placeholder="Enter Mobile #" name="num-mobile" autocomplete="nope">
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-4 form-group">
                          <label for="input-6">E-Mail</label>
                          <input type="text" class="form-control" id="tns-email" placeholder="Enter E-mail Address" name="tns-email" autocomplete="nope">
                      </div>
                      <div class="col-sm-4 form-group">
                          <label for="input-7">Website</label>
                          <input type="text" class="form-control" id="tns-website" placeholder="Enter Website URL" name="tns-website" autocomplete="nope">
                      </div>                      
                      <div class="col-sm-4 form-group">
                          <label for="input-8">Contact Person</label>
                          <input type="text" class="form-control" id="tns-cperson" placeholder="Enter Contact Person" name="tns-cperson" autocomplete="nope">
                      </div>                     
                  </div> 
            </div>

            <div class="card-footer">
              <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-9">
                  <div class="float-sm-right">
                    <button type="button" class="btn btn-light btn-round px-5" id="btn-new-client"><i class="fa fa-file"></i>&nbsp;&nbsp;New</button>

                    <button type="submit" class="btn btn-light btn-round px-5"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>

                    <button type="button" class="btn btn-light btn-round px-5" id="btn-search" data-toggle="modal" data-target="#modal-search-client"><i class="icon-search4 mr-2"></i> Search</button> 

                    <button type="button" class="btn btn-light btn-round px-5" id="btn-print-clients"><i class="fa fa-print"></i>&nbsp;&nbsp;Print</button>                          
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

<html>
<script src="views/js/clientsingle.js"></script>
</html>

