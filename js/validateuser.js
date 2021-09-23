$(document).ready(function(){
    $("form").submit(function(){
        //check first name
        var ufname=$('#user_fname').val();
        var ulname=$('#user_lname').val();
        var uname=$('#user_name').val();
        var uemail=$('#user_email').val();
        var udob=$('#dob').val();
        var unic=$('#nic').val();
        var utelno=$('#user_tel_no').val();
        var image=$('#user_image').val();
        var role_id=$('#role_id').val();
        var district=$('#district_id').val();
        
        var patt=/^[a-zA-Z]+$/; //Regular Expression
        var pat=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var pa=/^[0-9]{9}[vVxX]$/;
        var p=/^\+94[0-9]{9}$/; 
        
        
        if(ufname==""){
            $('#msg').text("First name cannot be empty");
            $('#user_fname').focus();
            return false;            
        }
        if(!ufname.match(patt)){
            $('#msg').text("First Name is invalid");
            $('#user_fname').focus();
            $('#user_fname').select();
            return false;
        }
        if(ulname==""){
            $('#msg').text("Last name cannot be empty");
            $('#user_lname').focus();
            return false;
        }    
        if(!ulname.match(patt)){
            $('#msg').text("Last Name is invalid");
            $('#user_lname').focus();
            $('#user_lname').select();
            return false;
        }
        if(uname==""){
            $('#msg').text("User name cannot be empty");
            $('#user_name').focus();
            return false;
        }    
        if(!uname.match(patt)){
            $('#msg').text("User Name is invalid");
            $('#user_name').focus();
            $('#user_name').select();
            return false;
        }
        if(uemail==""){
            $('#msg').text("E-mail cannot be empty");
            $('#user_email').focus();
            return false;
        }
           
        if(!uemail.match(pat)){
            $('#msg').text("E-mail is invalid");
            $('#user_email').focus();
            $('#user_email').select();
            return false;
        }
        
        if(udob==""){
            $('#msg').text("DOB cannot be empty");
            $('#dob').focus();
            return false;
        }
             
        
        
        //Current Date
        var current= new Date();
        var cyear=current.getFullYear();
        var cmonth=current.getMonth();
        var cdate=current.getDate();
        //Birth Date
        var bdate= new Date(udob);
        var byear=bdate.getFullYear();
        var bmonth=bdate.getMonth();
        var bd=bdate.getDate();
        
        var age=cyear-byear;
        var m=cmonth-bmonth;
        var d=cdate-bd;
        if(m<0 || (m==0 && d<0)){
            age--;
        }
        
        if(age<0){
            $('#msg').text("Please Enter Birth day correctly");
            $('#dob').focus();
            return false;
        }  
        
        
        if(age<18){
            $('#msg').text("Under 18");
            $('#dob').focus();
            return false;
        }  
        
        if(age>60){
            $('#msg').text("Over 60");
            $('#dob').focus();
            return false;
        }  
        
        if(!($('#male').is(':checked') || $('#female').is(':checked'))){
            $('#msg').text("Please select your gender");
            return false;
        }
        
        if(!unic.match(pa)){
            $('#msg').text("NIC invalid");
            $('#nic').focus();
            return false;
        }
        
        var a=udob.substring(2,4);
        var b=unic.substring(0,2);
//        var c=toString(a);
        if(b!=a){
            $('#msg').text("DOB and NIC is not matching");
            $('#nic').focus();
            $('#nic').select();
            return false;
        }
        
        if(role_id==""){
            $('#msg').text("Please select a role");
            $('#role_id').focus();
            return false;
        }
        
        if(image!=""){
            var getExt=image.split(".");
            getExt.reverse();
            var im=getExt[0].toLowerCase();
            var ext=['gif','jpg','jpeg','tiff','svg','swf','bmp','png'];
            if($.inArray(im,ext)==-1){
            $('#msg').text("Invalid image extension!")
            return false;
        }
        if(!utelno.match(p)){
            $('#msg').text("Telephone no. is invalid");
            $('#user_tel_no').focus();
            return false;
        }
        
        if(district==""){
            $('#msg').text("Please select a district");
            $('#district_id').focus();
            return false;
        }
        
    }
        
    });
});