$(document).ready(function(){
    $('form').submit(function(){
      
         var user_fname=$('#user_fname').val();
         var user_lname=$('#user_lname').val();
         var user_email=$('#user_email').val();
         var dob=$('#dob').val();
         var nic=$('#nic').val();
         var user_tel=$('#user_tel').val();
         var role_id=$('#role_id').val();
         
         var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
         var patnic=/^[0-9]{9}[vVxX]$/;
         var pattel=/^\+94[0-9]{9}$/;
         
        if(user_fname==""){ // to check
            $('#error_msg').text("First name is empty");//to display error
            $('#error_msg').addClass("alert alert-danger");// to add class by jquery
            $('#user_fname').focus();
            return false;  // to stay at same page
        }if(user_lname==""){ // to check
            $('#error_msg').text("Last name is empty");//to display error
            $('#error_msg').addClass("alert alert-danger");// to add class by jquery\
            $('#user_lname').focus();
            return false;  // to stay at same page
        }if($('input[name=gender]:checked').length<=0){
             $('#error_msg').text("Please select a gender");//to display error
            $('#error_msg').addClass("alert alert-danger");// to add class by jquery
            $('#gen').addClass("alert alert-danger");// to add class by jquery
            return false;  // to stay at same page
        }if(dob==""){ // to check
            $('#error_msg').text("DOB is empty");//to display error
            $('#error_msg').addClass("alert alert-danger");// to add class by jquery
            $('#dob').focus();
            return false;  // to stay at same page
        }
        
        if(!(nic.match(patnic))){
            $('#error_msg').text("NIC is invalid");
            $('#error_msg').addClass("alert alert-danger");// to add class by jquery
            $('#nic').focus();
            return false;
        }
        
        if(dob!="" && nic!=""){
            var doby=dob.substring(2,4);
            alert(doby);
            return false;
        }
        
        // if((!user_tel.match(pattel))){
        //    $('#error_msg').text("Telephone No is invalid");
        //    $('#error_msg').addClass("alert alert-danger");// to add class by jquery
        //    $('#user_tel').focus();
        //    return false;
        // }
        
        if(role_id==""){ // to check
            $('#error_msg').text("Role id is empty");//to display error
            $('#error_msg').addClass("alert alert-danger");// to add class by jquery
            $('#role_id').focus();
            return false;  // to stay at same page
        }
        
        
        
    });
});