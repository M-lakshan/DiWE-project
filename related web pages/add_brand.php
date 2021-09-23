<?php
    //ERROR REPORTING
    // error_reporting(E_ERROR | E_WARNING | E_PARSE);

    include '../../../common/dbconnection.php'; 
    include '../../../common/dbsession.php'; 
    include '../../../common/logincheck_product_m.php';

    include '../model/product_model.php';

    //create a new obj product
    $objbr = new product();

    $resultbrand_count=$objbr->viewBrandCount();
    $rowbrand=$resultbrand_count->fetch_assoc();
    
    $cid=$rowbrand['brand_id'];
    $newid=$cid+1; // add 1 to the current id value
    $newid=str_pad($newid, 4,'0', STR_PAD_LEFT); // use STR_PAD_ for add additional 0s

    //retrieve all brands from brand table
    $resultbrand=$objbr->viewBrand();

?>

<!DOCTYPE html>
    
    <head>
        <title>Add Brand</title>
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
        
        <!--facebox code part start-->
        <script src="../../../facebox/facebox.js" type="text/javascript"></script>
        <link href="../../../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('a[rel*=facebox]').facebox({
                    loadingImage : '../../../facebox/loading.gif',
                    closeImage : '../../../facebox/closelabel.png'
                });
            })
        </script>
        <!--facebox code part end-->
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

        <div id="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-8 hea1" style="margin-top: 15px;">M.I.S - ADD BRAND PANEL</div>
                    <div class="col-md-2">&nbsp;</div>
                </div>
            </div>        
        </div>

        <div id="main">

            <div id="logged">
                <?php include '../../../common/loggedsession_product_m.php'; ?>  
            </div>

            <div id="navi">
                <ol class="breadcrumb">
                    <li><a href="../../../dashboard.php">Dashboard</a></li>
                    <li><a href="product.php">Product Management</a></li>       
                    <li><a href="#">Add Brand</a></li>       
                </ol>
            </div>
            
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            
            <div id="content">
                
                <div class="container-fluid">

                    <div class="row"> 
                        <div class="col-md-12"> &nbsp; </div>
                        <div class="col-md-12"> &nbsp; </div>
                    </div>
                    <div class="row">
                        <h1 style="text-align: center">Add Brand</h1>
                    </div>                   
                    <div class="row"> 
                        <div class="col-md-12"> &nbsp; </div>
                        <div class="col-md-12"> &nbsp; </div>
                    </div>

                </div>
                
                <form method="post" action="../controller/product_controller.php?status=addBrand"
                enctype="multipart/form-data">
                
                    <div class="container">

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
                                    class="form-control" value="<?php echo $newid ?>" />
                                    <input type="hidden" name="brand_id" id="brand_id" 
                                    class="form-control" value="<?php echo $newid ?>"/>
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
                                    <input type="text" name="brand_name" id="brand_name"
                                    class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> &nbsp; </div>                            
                            </div>
                            <div class="row" style="display: flex; align-items: center; height: 100px;">
                                <div class="col-md-6" style="display: flex; align-items: center; justify-content: center; height: 100px;">
                                    <h4>&nbsp;Brand Decription</h4>
                                </div> 
                                <div class="col-md-6">
                                    <textarea name="brand_dec" id="brand_dec" class="multiline_textarea" class="form-control" 
                                    style="height: 100px; width: 255px;" placeholder="Input a desription here.." rows="10" cols="24"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> &nbsp; </div>                            
                            </div>
                        </div>
                        <div class="col-md-6">                       
                            <div class="col-md-6">
                                <h4 style="display: flex; align-items: center; justify-content: center; height: 115px;">Brand IMG</h4>
                            </div> 
                            <div class="col-md-6" id="img-prev-holder-container" style="display: flex; align-items: center; height: 115px;">
                                <div class="row" id="img-prev-holder" class="tag-hidden">
                                    <img id="img_prev" style=" margin-bottom: 10px; height: 75px; border-radius: 5px;"/>
                                </div>
                                <div class="row">
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
                                <button type="reset" name="res" class="btn btn-danger"> 
                                    <i class="glyphicon glyphicon-refresh"></i>
                                Reset</button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="sub" class="btn btn-primary"> 
                                    <i class="glyphicon glyphicon-send"></i>
                                Submit</button>
                            </div>
                        </div>
                    <!-- End of Buttons Row -->

                    </div>
   
                </form>

                <div class="row">
                    <div class="col-md-12"> &nbsp; </div>                            
                </div> 
        
                <div class="container">
                    <div class="row">
                    
                        <div class="row">

                            <div class="col-md-12" style="display: flex; align-items: center; justify-content: center;">
                                <div style="text-align: center">
                                    <?php if(isset($_REQUEST['msg'] )){ 
                                        $msg= base64_decode($_REQUEST['msg']);
                                        if($_GET['status']==1) {
                                            $style="alert-success";
                                        }
                                        else if($_GET['status']==2) {
                                            $style="alert-warning";
                                        }
                                        else {
                                            $style="alert-danger";
                                        }
                                        echo "<span style='margin: 0%; padding: 5px; border-radius: 5px;' class='".$style."'>".$msg."</span>";
                                    } ?>
                                </div>
                            </div>
                            
                        </div>
                                                
                        <div class="row">
                            <div class="col-md-12"> &nbsp; </div>                            
                            <div class="col-md-12"> &nbsp; </div>                            
                        </div>
                    
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="col-md-13">
                                    <div class="col-md-13">
                                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; width: 11px;">&nbsp;</th>  
                                                    <th style="text-align: center; width: 76px;">Brand IMG&nbsp;</th> 
                                                    <th style="text-align: center; width: 79px;">Brand ID&nbsp;</th> 
                                                    <th style="text-align: center; width: 101px;">Brand Name&nbsp;</th> 
                                                    <th style="text-align: center; width: 487px;">Brand Description&nbsp;</th>
                                                    <th style="text-align: center; width: 170px;">Action &nbsp;</th> 
                                                </tr> 
                                            </thead>
                                            <tbody>
                                            <?php
                                                $count=0;
                                                while ( $viewbrand=$resultbrand->fetch_assoc() ) {
                                                    $count++;                                            
                                            ?>
                                                <tr>
                                                    <td style="width: 20px;"><?php echo $count ?></td>
                                                    <td style="width: 85px;">
                                                        <?php switch ($viewbrand['brand_img']) {
                                                            case ($viewbrand['brand_img']!="") : ?>
                                                                <img src="../../../images/brand_images/<?php echo $viewbrand['brand_img']; ?>" style="height: 65px; width: 65px; border-radius: 5px"/>
                                                            <?php break;
                                                            default : ?>
                                                                <img src="../../../images/brand_images/default_item.jpg" style="height: 65px; width: 65px; border-radius: 5px"/>
                                                            <?php break;
                                                        } ?>
                                                    </td>
                                                    <td style="width: 88px;">
                                                        <?php switch($viewbrand['brand_id']) {
                                                                    case (strlen($viewbrand['brand_id'])==1):
                                                                        echo "000".$viewbrand['brand_id'];
                                                                        break;
                                                                    case (strlen($viewbrand['brand_id'])==2):
                                                                        echo "00".$viewbrand['brand_id'];
                                                                        break;
                                                                    case (strlen($viewbrand['brand_id'])==3):
                                                                        echo "0".$viewbrand['brand_id'];
                                                                        break;
                                                                    default :
                                                                        $viewbrand['brand_id'];
                                                                        break;
                                                                } ?></td>
                                                    <td style="width: 110px;"><?php echo $viewbrand['brand_name'] ?></td>
                                                    <td style="width: 496px; text-align: center;"><?php echo $viewbrand['brand_dec'] ?></td>
                                                    <td style="width: 178px;">
                                                        <a href="view_brand.php?brand_id=<?php echo $viewbrand['brand_id']; ?>">
                                                            <button class ="btn btn-success" style="width: 40px">View</button></a>&nbsp;&nbsp;&nbsp;
                                                        <a href="update_brand.php?brand_id=<?php echo $viewbrand['brand_id']; ?>" rel="facebox">
                                                            <button class ="btn btn-primary" style="width: 55px">Update</button></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div id="footer" class="foo">
            <?php include '../../../common/footer.php'; ?>  
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
                document.querySelector('#img-prev-holder-container').style.flexDirection="column";
                console.log(tagHiddens);
                tagHiddens.forEach(function(tagHiddenRemover) {
                    tagHiddenRemover.classList.remove('tag-hidden');
                    document.querySelector('#img-prev-holder').style.display="block";
                });
            }
            else {
                document.querySelector('#img-prev-holder').style.display="none";
            }
        }   
    </script> 
        
</html>