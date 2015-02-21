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
        <script type="text/javascript">
            function checkForm(){
                var error = true;
                var cat = $("#cat_name").val();
                if(cat.length==0){
                    $("#cat_name").removeClass('inp-form');
                    $("#cat_name").addClass('inp-form-error');
                    $("#cat_error").show();
                    error = false;
                }else{
                    $("#cat_name").addClass('inp-form');
                    $("#cat_name").removeClass('inp-form-error');
                    $("#cat_error").hide();
                }
                return error;
            }
            <?php if(isset($_SESSION['message'])){ ?>
                alert('<?php echo $_SESSION['message']; ?>');
            <?php unset($_SESSION['message']); } ?>
        </script>
    </head>
    <body> 
        <!-- Start: page-top-outer -->
        <div id="page-top-outer">    

            <!-- Start: page-top -->
            <div id="page-top">
                <?php include_once 'includes/header.php'; ?>
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


                <div id="page-heading"><h1>Add Category</h1></div>


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
                                            <!-- start id-form -->
                                            <form action="save-categorty.php" method="post" onsubmit="return checkForm();">
                                            <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                                                <tr>
                                                    <th valign="top">Category name:</th>
                                                    <td><input type="text" name="cat_name" id="cat_name" class="inp-form" /></td>
                                                    <td>
                                                        <div style="display: none;" id="cat_error">
                                                            <div class="error-left"></div>
                                                            <div class="error-inner">Please enter category name.</div>
                                                        </div>
                                                    </td>
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
                                            </form>
                                            <!-- end id-form  -->

                                        </td>
                                        <td>

                                            <!--  start related-activities -->
                                            <!-- end related-activities -->

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
            <?php include 'includes/footer.php'; ?>
        </div>
        <!-- end footer -->

    </body>
</html>