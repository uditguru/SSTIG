<?php
session_start();
if (!isset($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] !== TRUE) {
    $_SESSION['message'] = 'Please login first.';
    header('location:index.php');
} else {
    include_once 'connect.php';
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once 'includes/extra-header.php'; ?>
        <script type="text/javascript">
            function checkDelete(){
                var res = confirm('Do you realy want to delete?');
                if(res == true){
                    window.location = url;
                }else{
                    return false;
                }
            }
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

        <!-- start content-outer ........................................................................................................................START -->
        <div id="content-outer">
            <!-- start content -->
            <div id="content">

                <!--  start page-heading -->
                <div id="page-heading">
                    <h1>Manage Notes</h1>
                </div>
                <!-- end page-heading -->

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
                            <!--  start content-table-inner ...................................................................... START -->
                            <div id="content-table-inner">

                                <!--  start table-content  -->
                                <div id="table-content">
                                    <?php if(isset($_SESSION['message']) && $_SESSION['message']=="error"){ ?>
                                    <div id="message-red">
                                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="red-left">Error Occurred.Please try again.</td>
                                                    <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php unset($_SESSION['message']); } ?>
                                    <?php if(isset($_SESSION['message']) && $_SESSION['message']=="deleted"){ ?>
                                    <div id="message-red">
                                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="red-left">Note deleted successfully.</td>
                                                    <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php unset($_SESSION['message']); } ?>
                                    <?php if(isset($_SESSION['message']) && $_SESSION['message']=="added"){ ?>
                                    <div id="message-green">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                                <td class="green-left">Note added successfully.</td>
                                                <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
                                        </tr>
                                        </table>
                                        </div>
                                    <?php unset($_SESSION['message']); } ?>
                                    <?php if(isset($_SESSION['message']) && $_SESSION['message']=="updated"){ ?>
                                   <div id="message-yellow">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                                <td class="yellow-left">Note updated successfully.</td>
                                                <td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
                                        </tr>
                                        </table>
                                    </div>
                                    <?php unset($_SESSION['message']); } ?>
                                    <!--  start product-table ..................................................................................... -->
                                    <form id="mainform" action="">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                                            <tr>
                                                <th class="table-header-repeat line-left"><a href="">S No</a>	</th>
                                                <th class="table-header-repeat line-left"><a href="">Title</a></th>
                                                <th class="table-header-repeat line-left"><a href="">Category</a></th>
                                                <th class="table-header-repeat line-left"><a href="">Added On</a></th>
                                                <th class="table-header-options line-left"><a href="">Action</a></th>
                                            </tr>
                                            <?php
                                                $cat_query = mysql_query("SELECT * FROM `tbl_note`, `tbl_category` WHERE `tbl_note`.`note_cat_id` = `tbl_category`.`cat_id` AND `tbl_note`.`user_id`='".$_SESSION['user_id']."' ORDER BY `tbl_note`.`note_dateAdded` DESC");
                                                $s_no = 1;
                                                if(mysql_num_rows($cat_query)>0){
                                                while($result = mysql_fetch_assoc($cat_query)){
                                                    if($s_no%2 == 0){
                                                        $class="";
                                                    }else{
                                                        $class ='class="alternate-row"';
                                                    }
                                            ?>
                                                <tr <?php echo $class; ?>>
                                                    <td><?php echo $s_no; ?></td>
                                                    <td><?php echo $result['note_title']; ?></td>
                                                    <td><?php echo $result['cat_title']; ?></td>
                                                    <td><?php echo date(DATE_FORMAT, strtotime($result['note_dateAdded'])); ?></td>
                                                    <td class="options-width">
                                                        <a href="edit-note.php?id=<?php echo $result['note_id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>
                                                        <a href="delete-note.php?id=<?php echo $result['note_id']; ?>" title="Delete" class="icon-2 info-tooltip" onclick="return checkDelete(this.href);"></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                    $s_no++;
                                                }//while ends
                                                }else{
                                            ?>
                                            <tr>
                                                <td colspan="5" align="center"><h3>No record found</h3></td>
                                            </tr>
                                            <?php
                                                }//else ends 
                                            ?>
                                            
                                        </table>
                                        <!--  end product-table................................... --> 
                                    </form>
                                </div>
                                <!--  end paging................ -->

                                <div class="clear"></div>

                            </div>
                            <!--  end content-table-inner ............................................END  -->
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
        <!--  end content-outer........................................................END -->

        <div class="clear">&nbsp;</div>

        <!-- start footer -->         
        <div id="footer">
            <?php include_once 'includes/footer.php'; ?>
        </div>
        <!-- end footer -->

    </body>
</html>