<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Online File Sharing</title>
        <link rel="stylesheet" href="css/login.css" type="text/css" media="screen" title="default" />
        <!--  jquery core -->
        <script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
        <!-- Custom jquery scripts -->
        <script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
        <!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
        <script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
        <!-- JQuery UI -->
        <link rel="stylesheet" href="css/jquery-ui-1.7.3.custom.css" type="text/css" media="screen" title="default" />
        <script src="js/jquery/jquery-ui-1.7.3.custom.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                var current_year = new Date().getFullYear();
                $('#dob').datepicker({ 
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1960:"+current_year
                });
                $("#email").blur(function(){
                    var email =  $("#email").val();
                    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                    if(email.length>0 && pattern.test(email)){
                        $("#email_img").show();
                        $.post('check-mail.php', {email:email}, function(data){
                            if(data == 1){
                                $("#email_img").attr('src', 'images/avialable.gif');
                            }else{
                                $("#email_img").attr('src', 'images/not-avail.png');
                            }
                        });
                    }//if ends
                });
            });
            function checkForm(){
                var error= true;
                var email = $("#email").val();
                var name = $("#name").val();
                var mobile = $("#mobile").val();
                var password = $("#password").val();
                var re_password = $("#re_password").val();
                var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var pattern_name = /^[A-Za-z\s]+$/; 
                var pattern_mobile =/^[0-9]+$/;
                
                if(name.length==0 || !pattern_name.test(name)){
                    $("#name").css('border', '1px solid #FF0000');
                    error = false;
                }else{
                    $("#name").css('border', 'none');
                }
    
                if(email.length==0 || !pattern.test(email)){
                    $("#email").css('border', '1px solid #FF0000');
                    error = false;
                }else{
                    $("#email").css('border', 'none');
                }
                if(mobile.length!=10 || !pattern_mobile.test(mobile)){
                    $("#mobile").css('border', '1px solid #FF0000');
                    error = false;
                }else{
                    $("#mobile").css('border', 'none');
                }
                if(password.length==0){
                    $("#password").css('border', '1px solid #FF0000');
                    error = false;
                }else{
                    $("#password").css('border', 'none');
                }
                if(re_password.length==0){
                    $("#re_password").css('border', '1px solid #FF0000');
                    error = false;
                }else{
                    $("#re_password").css('border', 'none');
                }
                if(re_password != password){
                    $("#pass_error").show();
                    error = false;
                }else{
                    $("#pass_error").hide();
                }
                return error;
            }
            function checkLogin(){
                var error= true;
                var email = $("#u_name").val();
                var password = $("#u_pass").val();
                var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(email.length==0 || !pattern.test(email)){
                    $("#u_name").css('border', '1px solid #FF0000');
                    error = false;
                }else{
                    $("#u_name").css('border', 'none');
                }
                if(password.length==0){
                    $("#u_pass").css('border', '1px solid #FF0000');
                    error = false;
                }else{
                    $("#u_pass").css('border', 'none');
                }
                return error;
            }
            $(document).ready(function(){
                $("#login_link").click(function(){
                    $("#login_form").toggle('slow');
                });
            });
        </script>
    </head>
    <body> 
        <div class="wrpper">
            <div class="header">
                <div class="header-left">

                </div>
                <div class="header-right">
                    <a href="javascript:void(0)" id="login_link">Login</a>
                    <div id="login_form" style="display: none;">
                        <form action="authenticate-user.php" method="post" onsubmit="return checkLogin();">
                            <table >
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Login</td>
                                </tr>
                                <?php if (isset($_SESSION['message'])) { ?>
                                    <tr class="error" style="display: block !important;">
                                        <td>&nbsp;</td>
                                        <td><?php echo $_SESSION['message']; ?></td>
                                    </tr>
                                    <?php unset($_SESSION['message']);
                                } ?>
                                <tr>
                                    <td><label for="u_name" class="txt_lable">Email Id</label></td>
                                    <td><input type="text" name="u_name" id="u_name" class="txt_field" placeholder="Email Id"/></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><label for="u_pass" class="txt_lable">Email Id</label></td>
                                    <td><input type="password" name="u_pass" id="u_pass" class="txt_field" placeholder="Password"/></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">
                                        <input type="submit" value="Login" class="btn" id="login_bn" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="left-content">
                
            </div>
            <div class="right-content">
                <form action="register-submit.php" method="post" onsubmit="return  checkForm();">
                    <table cellpadding="5" cellspacing="5">
                        <tr>
                            <td>&nbsp;</td>
                            <td>Please Register</td>
                        </tr>
                        <tr id="pass_error" class="error">
                            <td>&nbsp;</td>
                            <td>Password not matched.</td>
                        </tr>
                        <tr>
                            <td><label for="name" class="txt_lable">Name</label></td>
                            <td><input type="text" name="name" id="name" class="txt_field" placeholder="Name"/></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label for="email" class="txt_lable">E-Mail</label></td>
                            <td><input type="text" name="email" id="email" class="txt_field" placeholder="email"/></td>
                            <td><img src="images/ajax-loader.gif" id="email_img" style="display: none;"/></td>
                        </tr>
                        <tr>
                            <td><label for="mobile" class="txt_lable">Mobile No</label></td>
                            <td><input type="text" name="mobile" id="mobile" class="txt_field" placeholder="Mobile Number" autocomplete="off"/></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label for="dob" class="txt_lable">Birthday</label></td>
                            <td><input type="text" name="dob" id="dob" class="txt_field" placeholder="Date of birth" readonly="readonly"/></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label for="password" class="txt_lable">Password</label></td>
                            <td><input type="password" name="password" id="password" class="txt_field" placeholder="Password"/></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label for="re_password" class="txt_lable">Retype Password</label></td>
                            <td><input type="password" name="re_password" id="re_password" class="txt_field" placeholder="Retype Password"/></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="register" id="register" value="Register" class="btn" /></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="clear"></div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>