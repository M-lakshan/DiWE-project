<?php
    //ERROR REPORTING
    // error_reporting(E_ERROR | E_WARNING | E_PARSE);

    include '../../../common/dbconnection.php'; 
    include '../../../common/dbsession.php'; 
    include '../../../common/logincheck_product_m.php';

    include '../model/product_model.php';

    //requesting the selected brand id from add_brand
    $brand_id=trim($_REQUEST['brand_id']);

    //create a new obj product
    $objbr = new product();

    //retrieve all brands from brand table
    $resultabrand=$objbr->viewABrand($brand_id);
    $viewabrand=$resultabrand->fetch_assoc();
?>

<!DOCTYPE html>
    
    <head>
        <title>Update Brand</title>
        <link type="text/css" rel="stylesheet" href="../../../css/layout.css" />
        <link type="text/css" rel="stylesheet" href="../../../css/style.css" />
        <link type="text/css" rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
        
        <link type="text/css" rel="stylesheet" href="../../../css/dataTables.bootstrap4.min.css">
        <link type="text/css" rel="stylesheet" href="../../../css/dataTables.bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../../../css/semantic.min.css">
        <link type="text/css" rel="stylesheet" href="../../../css/dataTables.semanticui.min.css">
        <link type="text/css" rel="stylesheet" href="../../../css/buttons.semanticui.min.css">
        
        <script>
            function disConfirm(str){
                var r=confirm("Do You Want to "+str+"?");
                if(!r){
                    return false;
                }
            }
        </script>
            
        <link rel="stylesheet" href="../../../css/jquery.dataTables.min.css">
            
        <style>
            div.dataTables_wrapper {
                margin-bottom: 3em;
            }
            
            tr {
                display: flex;
            }
            
            td {
                height: 100px;
                display: flex; 
                align-items: center;
                justify-content: center;
            }
        </style>
  
        <script src="../../../js/jquery-1.12.4.js"></script>
    
        <script src="../../../js/jquery.dataTables.min.js"></script>
        <script src="../../../js/dataTables.bootstrap4.min.js"></script>
 
        <script src="../../../js/dataTables.semanticui.min.js"></script>
        <script src="../../../js/dataTables.buttons.min.js"></script>
        <script src="../../../js/pdfmake.min.js"></script>
        <script src="../../../js/vfs_fonts.js"></script>
        <script src="../../../js/buttons.html5.min.js"></script>
        
        <script src="../../../js/jszip.min.js"></script>
        <script src="../../../js/buttons.semanticui.min.js"></script>
        
        <script src="../../../js/buttons.colVis.min.js"></script>
        <script src="../../../js/buttons.print.min.js"></script>
    
        <script>  
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    lengthChange: false,
                    buttons: [ 'copy', 'excel', 'pdf','print','csv','colvis' ]
                } );
            
                table.buttons().container()
                    .appendTo( $('div.eight.column:eq(0)', table.table().container()) );
            } );
        </script>  
    </head>

    <body>

        <div id="main">

            <div id="content">
                
                <div class="container-fluid">

                    <div class="row"> 
                        <div class="col-md-12"> &nbsp; </div>
                        <div class="col-md-12"> &nbsp; </div>
                    </div>
                    <div class="row">
                        <h1 style="text-align: center">Update Brand</h1>
                    </div>                   
                    <div class="row"> 
                        <div class="col-md-12"> &nbsp; </div>
                        <div class="col-md-12"> &nbsp; </div>
                    </div>

                </div>
                
                <div class="container">
                
                    <form method="post" action="../controller/product_controller_update.php?status=updateBrand"
                    enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-12" > &nbsp; </div>
                            </div>

                        <!-- Start of Row -->
                            <div class="col-md-6">
                                <div class="row">                       
                                    <div class="col-md-6">
                                        <h4 style="text-align: center;">Brand ID&nbsp;</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="brand_id" id="brand_id" disabled=""
                                        class="form-control" value="<?php echo $viewabrand['brand_id'] ?>" />
                                        <input type="hidden" name="brand_id" id="brand_id" 
                                        class="form-control" value="<?php echo $viewabrand['brand_id'] ?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> &nbsp; </div>                            
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 style="text-align: center;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Brand Name</h4>
                                    </div> 
                                    <div class="col-md-6">
                                        <input type="text" name="brand_name" id="brand_name" value="<?php echo $viewabrand['brand_name'] ?>"
                                        class="form-control" placeholder="<?php echo $viewabrand['brand_name'] ?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> &nbsp; </div>                            
                                </div>
                                <div class="row" style="display: flex; align-items: center; height: 100px;">
                                    <div class="col-md-6" style="display: flex; align-items: center; justify-content: center; height: 100px;">
                                        <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Brand Decription</h4>
                                    </div> 
                                    <div class="col-md-6">
                                        <textarea name="brand_dec" id="brand_dec" class="multiline_textarea" class="form-control" style="height: 100px; width: 255px; margin-top: 10px;" 
                                        placeholder="<?php echo $viewabrand['brand_dec'] ?>" rows="10" cols="24"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> &nbsp; </div>                            
                                </div>
                            </div>
                            <div class="col-md-6">                       
                                <div class="col-md-3">
                                    <h4 style="display: flex; align-items: center; justify-content: center; height: 150px;">Item IMG</h4>
                                </div>
                                <div class="col-md-8">
                                    <div class="row" id="img-prev-holder-container" style="display: flex; flex-direction: row; padding: 0%; height: 120px;">
                                        <div class="col-md-8" id="img-prev-holder" style="display: flex; flex-direction: column; align-content: space-between; text-align: center; height: 120px; padding-right: 0%; width: 130px;">
                                            <?php switch ($viewabrand['brand_img']) {
                                                case ($viewabrand['brand_img']!="") : ?>
                                                    <img id="img_existing" style="margin: 0% 10px 2px 15px; height: 75px; width: 98px; border-radius: 5px;" src="../../../images/brand_images/<?php echo $viewabrand['brand_img']; ?>"/><br>
                                                    <small class="tag-hidden" style="color: gray; width: 130px; margin-bottom: 10px;"> * existing * </small>
                                                    <?php break;
                                                default : ?>
                                                    <img id="img_existing" style="margin: 0% 10px 5px 0px; height: 75px; border-radius: 5px;" src="../../../images/brand_images/default_item.jpg"/><br>
                                                    <small class="tag-hidden" style="color: gray; width: 130px; margin-bottom: 10px;"> * existing * </small>
                                                    <?php break;
                                            } ?>
                                        </div>
                                        <div class="col-md-8" id="img-prev-holder" class="tag-hidden" style="flex-direction: column; align-content: space-between; text-align: center; text-align: center; padding: 0%; width: 130px; position: relative;">
                                            <img id="img_prev" style=" margin: 0% 10px 0% 10px; height: 75px; border-radius: 5px;"/><br>
                                            <small class="tag-hidden" style="color: gray; width: 130px; margin: 2px 10px 0% 0%;"> * current upload * </small>
                                        </div>
                                    </div>
                                    <div class="col-md-10">                          
                                        <input type="file" name="brand_img" id="brand_img" placeholder="Brand Image"
                                        onchange="readURL(this)"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> &nbsp; </div>
                                </div>
                            </div>
                        <!-- End of Row -->

                        <!--Start of Button Row -->
                            <div class="row">
                                <div class="col-md-1"> &nbsp; </div>
                                <div class="col-md-2">
                                    <button type="reset" name="res" class="btn btn-warning" onclick="hideUpload()"> 
                                        <i class="glyphicon glyphicon-refresh"></i>
                                    Undo</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" name="sub" class="btn btn-primary"> 
                                        <i class="glyphicon glyphicon-send"></i>
                                    Update</button>
                                </div>
                            </div>
                        <!-- End of Buttons Row -->

                    </form>

                </div>

                <div class="row">
                    <div class="col-md-12"> &nbsp; </div>                            
                    <div class="col-md-12"> &nbsp; </div>                            
                </div> 

            </div>

        </div>
 
    </body>
    
    <script type="text/javascript">
        function readURL(input) {
            let sts;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_prev')
                    .attr('src', e.target.result)
                    .height(75);
                };
                reader.readAsDataURL(input.files[0]);
                sts=1;
            }
            else {
                sts=0;
            }

            const tagHiddens = document.querySelectorAll('.tag-hidden');
            if (sts==1) {
                console.log(tagHiddens);
                tagHiddens.forEach(function(tagHiddenRemover) {
                    tagHiddenRemover.classList.remove('tag-hidden');
                    document.querySelector('#img-prev-holder').style.display="flex";
                });
            }
            else {
                document.querySelector('#img-prev-holder').style.display="none";
            }
        }   

        function hideUpload() {
            let upImg = document.getElementById('img_prev');
            upImg.style.display="none";

            if(upImg.style.display=='none') {
                document.querySelectorAll('.tag-hidden').style.display="none";
            }
        }
    </script> 
        
</html>