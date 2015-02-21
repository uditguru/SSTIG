<?php
session_start();
if(!isset ($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] !== TRUE){
    $_SESSION['message'] = 'Please login first.';
    header('location:index.php');
}else{
    include_once 'connect.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once 'includes/extra-header.php'; ?>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
            function checkForm(){
                var error = true;
                var title = $("#title").val();
                var category = $("#category").val();
                if(title.length==0){
                    $("#title").removeClass('inp-form');
                    $("#title").addClass('inp-form-error');
                    $("#title").focus();
                    error = false;
                }else{
                    $("#title").removeClass('inp-form-error');
                    $("#title").addClass('inp-form');
                }
                if(category.length==0){
                    $('#category').css('border','1px solid #FF0000')
                    $("#category").focus();
                    error = false;
                }else{
                    $('#category').css('border','1px solid #ACACAC  ')
                }
                return error;
            }
        </script>
    </head>
    <body> 
        <!-- Start: page-top-outer -->
        <div id="page-top-outer">    

            <!-- Start: page-top -->
            <div id="page-top">
                <?php include 'includes/header.php'; ?>
            </div>
            <!-- End: page-top -->

        </div>
        <!-- End: page-top-outer -->

        <div class="clear">&nbsp;</div>

        <!--  start nav-outer-repeat................................................................................................. START -->
        <div class="nav-outer-repeat"> 
            <!--  start nav-outer -->
            <div class="nav-outer"> 
                <?php include_once 'includes/menu.php'; ?>
            </div>
            <div class="clear"></div>
            <!--  start nav-outer -->
        </div>
        <!--  start nav-outer-repeat................................................... END -->

        <div class="clear"></div>

        <!-- start content-outer -->
        <div id="content-outer">
            <!-- start content -->
            <div id="content">


                <div id="page-heading"><h1>Add Note</h1></div>


                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                    <tr>
                        <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                        <th class="topleft"></th>
                        <td id="tbl-border-top">&nbsp;</td>
                        <th class="topright"></th>
                        <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
                    </tr>
                    <tr>
                        <td id="tbl-border-left"></td>
                        <td>
                            <!--  start content-table-inner -->
                            <div id="content-table-inner">

                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    <tr valign="top">
                                        <td>
                                            <form action="save-note.php" method="post" onsubmit="return checkForm();" enctype="multipart/form-data">
                                            <!-- start id-form -->
                                            <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                                                <tr>
                                                    <th valign="top">Title:</th>
                                                    <td><input type="text" class="inp-form" name="title" id="title" /></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Category:</th>
                                                    <td>	
                                                        <select  class="sel_box" name="category" id="category">
                                                            <option value="">Select</option>
                                                            <?php
                                                                $cat_query = mysql_query("SELECT * FROM `tbl_category` ORDER BY `cat_title` ASC ");
                                                                while($result = mysql_fetch_assoc($cat_query)){
                                                            ?>
                                                                <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_title']; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Description:</th>
                                                    <td><textarea name="text_desc" id="text_desc" cols="" class="form-textarea"></textarea></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Attach a file :</th>
                                                    <td><input type="file" name="attach" class="attach" id="" class="inp-form"/></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <td valign="top">
                                                        <input type="submit" value="" class="form-submit" />
                                                        <input type="reset" value="" class="form-reset"  />
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            <!-- end id-form  -->
                                            </form>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                                        <td></td>
                                    </tr>
                                </table>

                                <div class="clear"></div>


                            </div>
                            <!--  end content-table-inner  -->
                        </td>
                        <td id="tbl-border-right"></td>
                    </tr>
                    <tr>
                        <th class="sized bottomleft"></th>
                        <td id="tbl-border-bottom">&nbsp;</td>
                        <th class="sized bottomright"></th>
                    </tr>
                </table>















                <div class="clear">&nbsp;</div>

            </div>
            <!--  end content -->
            <div class="clear">&nbsp;</div>
        </div>
        <!--  end content-outer -->



        <div class="clear">&nbsp;</div>

        <!-- start footer -->         
        <div id="footer">
            <?php include_once 'includes/footer.php'; ?>
        </div>
        <!-- end footer -->
        <script>
            CKEDITOR.replace( 'text_desc',
                {
                       
                });
        </script>
    </body>
</html>