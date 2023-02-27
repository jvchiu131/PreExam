$(function() {
   $('#client-form input[id^="num"]').on("keypress", function (e) {
      return _helper.isNumeric(e) ? true : e.preventDefault();
   });

   $('#client-form input[id^="tns"]').on("keypress", function (e) {
      return _helper.allChars(e) ? true : e.preventDefault();
   });    

   $("#btn-new-client").click(function(){
   	  $("#tns-cname").focus();
      swal.fire({
          title: 'Do you want create new client details?',
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          cancelButtonText: 'Cancel!',
          confirmButtonClass: 'btn btn-outline-success',
          cancelButtonClass: 'btn btn-outline-danger',
          allowOutsideClick: false,
          buttonsStyling: false
      }).then(function(result) {
          if(result.value) {
          	initializeForm();
          }
     });
   });

   // SAVE CLIENT
   $("#client-form").submit(function (e) {
      e.preventDefault();

      if ($('#trans_type').val() == 'New'){
          var title = "DO YOU WANT TO SAVE NEW CLIENT?";
          var text = "";
      }else{
          var title = "Do you want to update client details?";
          var text = "";
      }

      swal.fire({
          title: title,
          text: text,
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, Save it!',
          cancelButtonText: 'Cancel!',
          confirmButtonClass: 'btn btn-outline-success',
          cancelButtonClass: 'btn btn-outline-danger',
          allowOutsideClick: false,
          buttonsStyling: false
      }).then(function(result) {
          if(result.value) {
            var trans_type = $("#trans_type").val();

            var cname = $("#tns-cname").val();
            if ($('#num-isactive').prop('checked')){
              var isactive = "1";
            }else{
              var isactive = "0";
            }
            var clientid = $("#tns-clientid").val();
            var address = $("#tns-address").val();
            var phone = $("#num-phone").val();
            var mobile = $("#num-mobile").val();
            var email = $("#tns-email").val();
            var website = $("#tns-website").val();
            var cperson = $("#tns-cperson").val();          
                        
            var client = new FormData();
            client.append("trans_type", trans_type);

            client.append("cname", cname);
            client.append("isactive", isactive);
            client.append("clientid", clientid);
            client.append("address", address);
            client.append("phone", phone);
            client.append("mobile", mobile);
            client.append("email", email);
            client.append("website", website);
            client.append("cperson", cperson);

            $.ajax({
               url:"ajax/client_save_record.ajax.php",
               method: "POST",
               data: client,
               cache: false,
               contentType: false,
               processData: false,
               dataType:"text",
               success:function(answer){
               },
               error: function () {
                  alert("Oops. Something went wrong!");
               },
               complete: function () {
                 swal.fire({
                    title: 'Client details successfully saved!',
                    type: 'success',
                    confirmButtonText: 'Got it!',
                    confirmButtonClass: 'btn btn-outline-success',
                    allowOutsideClick: false,
                    buttonsStyling: false
                 }).then(function(result){
                    if(result.value) {              
                      $("#btn-new-client").click();
                    }
                 })
               }
            })
          }
      });
   });

   $('.clientTable tbody').on('dblclick', 'tr', function () {
      var clientid = $(this).attr("clientid");
      var data = new FormData();
      data.append("clientid", clientid);
      $.ajax({
         url:"ajax/client_get_record.ajax.php",
         method: "POST",
         data: data,
         cache: false,
         contentType: false,
         processData: false,
         dataType:"json",
         success:function(answer){
          // This alert proves that record has been successfully fetched from the clients table
          alert(answer["cname"]);
          // You task here is to display the record in the client form, then
          // Continue with editing record...

          $("#trans_type").val("Update");
          $("#modal-search-client").modal('hide');
        }
      })
   });

           

   function initializeForm(){
     $("#tns-cname").val('');
     $("#tns-clientid").val('');
     $("#tns-address").val('');
     $("#num-phone").val('');
     $("#num-mobile").val('');
     $("#tns-email").val('');
     $("#tns-website").val('');
     $("#tns-cperson").val('');

     $("#trans_type").val('New');
     $("#tns-cname").focus();
   }    	
});    