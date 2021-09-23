$(document).ready(function(){
    $('form').submit(function(){
       var user_fname=$('#user_fname').val();
       var user_lname=$('#user_lname').val();
       var user_email=$('#user_email').val();
       var dob=$('#dob').val();
       var role_id=$('#role_id').val();
       var nic=$('#nic').val();
       var user_tel=$('#user_tel').val();
 
       
       var patnic=/^[0-9]{9}[vVxX]$/;
       var pattel=/^\+94[0-9]{9}$/;
var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;     
       
       if(user_fname==""){
           $('#error_msg').text("First Name is emptyiiiii");//To display error
           $('#error_msg').addClass('alert-danger');
           $('#user_fname').focus();
           return false; //
       }
       if(user_lname==""){
           $('#error_msg').text("Last Name is empty");//To display error
           $('#error_msg').addClass('alert-danger');
           $('#user_lname').focus();
           return false; //
       }
       if(user_email==""){
           $('#error_msg').text("Email Address is empty");//To display error
           $('#error_msg').addClass('alert-danger');
           $('#user_email').focus();
           return false; //
       }
       if(!(user_email.match(patemail))){ //To check email validity
           $('#error_msg').text("Email Address is invalid");//To display error
           $('#error_msg').addClass('alert-danger');
           $('#user_email').focus();
           return false; //
       }
       
       if($('input[name=gender]:checked').length<=0)
        {
           $('#error_msg').text("Please select a Gender");//To display error
           $('#error_msg').addClass('alert-danger');
           $('#gen').addClass('alert-danger');
           return false;
        }
       
       if(dob==""){
           $('#error_msg').text("Date of Birth is empty");//To display error
           $('#error_msg').addClass('alert-danger');
           $('#dob').focus();
           return false; //
       }
       
       if(nic!="" && !(nic.match(patnic))){
           $('#error_msg').text("NIC is invalid");
           $('#error_msg').addClass('alert-danger');
           $('#nic').focus();
           return false; //        
           
       }
       if(user_tel!="" && !(user_tel.match(pattel))){
           $('#error_msg').text("Telephone No is invalid");
           $('#error_msg').addClass('alert-danger');
           $('#user_tel').focus();
           return false; //        
           
       }
       
       if(role_id==""){
           $('#error_msg').text("Role Name is empty");//To display error
           $('#error_msg').addClass('alert-danger');
           $('#role_id').focus();
           return false; //
       }
       
       
       
     
       
       
    });
    
});

