
<?php 
ob_start();
date_default_timezone_set('Asia/Calcutta');
require('function.php');
session_start();
$db= new DB();

$mac_address="";
$ip_address="";
$mac_address = exec('getmac');
$mac_address=strtok($mac_address, ' ');
$ip_address=getHostByName(getHostName());

if(isset($_POST['btnLogin']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];

  $getUsers=$db->getAssoc($db->con, "SELECT * from users WHERE email=:email AND password=:password AND is_active=:is_active", array('email'=>$email, 'password'=>$password, 'is_active'=>'Y'));

  if($getUsers)
  {
    $_SESSION['ro_id']=$getUsers[0]['ro_id'];
    $_SESSION['user_id']=$getUsers[0]['user_id'];
    $_SESSION['user']=$getUsers[0]['email'];
    $_SESSION['department_id']=$getUsers[0]['department_id'];
    $_SESSION['user_role']=$getUsers[0]['user_role_id'];

    $_SESSION['month']=date('m');
    $_SESSION['year']= date('Y');
    $_SESSION["login_time_stamp"] = time();


    $db->setData($db->con, "INSERT INTO `user_log`(`user_id`, `login_time`,  `mac_address`, `ip_address`) VALUES (:user_id, :login_time, :mac_address, :ip_address)", array('user_id'=>$getUsers[0]['user_id'], 'login_time'=>date("Y-m-d H:i:s"), 'mac_address'=>$mac_address, 'ip_address'=>$ip_address ) );
    header("location:index.php");exit;
}
else
{

    $_SESSION['error']="User Details not matched...!!";
    header("location:login.php");exit;
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Log In | LABMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
    <meta name="author" content="LABMS"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        @media screen and (max-width: 600px) {
            .my-custom-margin {
                margin: 20px;
            }
            .row>*{
                max-width: 95%;
            }
            .mx-auto{
                margin-left:0!important;
                margin-right: 0!important;
            }
            .col-md-7.my-custom-margin{
                padding: 0px;
            }
        }

        @media screen and (min-width: 600px) {
            .col-md-7.my-custom-margin{
                padding: 30px;
            }
        }
    </style>

</head>

<body style="background-color: #537AEF;">
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0">
                <div class="col-xl-3">
                </div>
                <div class="col-xl-6">
                    <div class="row">
                     <div class="col-md-7 my-custom-margin" id="myDiv" style="border: 1px solid #ddd; border-radius: 20px; background-color: white;">

                        <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                            <div class="mb-4 p-0">
                                <a class='auth-logo' href='/tapeli/html/'>
                                    <img src="assets/images/logo.png" alt="logo-dark" class="mx-auto" height="45" />
                                    <span style="font-size: 20px;"><b>LABMS</b></span>
                                </a>
                            </div>

                            <div class="login-box">

                                <?php              
                                if (isset($_SESSION['error'])) 
                                {
                                    ?>
                                    <div class="alert alert-danger" id="card-box">>
                                        <strong>Fail!</strong> <?php echo $_SESSION['error']; ?>.
                                    </div>
                                    <?php
                                } 
                                unset($_SESSION['error']);
                                ?>

                                <div class="pt-0">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="my-4">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress" class="form-label">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email" name="email">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password">
                                        </div>

                                       <!--  <div class="form-group d-flex mb-3">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                </div>
                                            </div>

                                        </div>
 -->
                                        <div class="form-group mb-0">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary" name="btnLogin" type="submit"> Log In </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                </div>
            </div>
        </div>
    </div>

    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.js"></script>
    <script>
      const myDiv = document.getElementById('myDiv');

      if (window.innerWidth > 600) {
        myDiv.classList.add('mx-auto');
    } else {
        myDiv.classList.remove('mx-auto');
    }

    window.addEventListener('resize', () => {
        if (window.innerWidth > 600) {
          myDiv.classList.add('mx-auto');
      } else {
          myDiv.classList.remove('mx-auto');
      }
  });
</script>
</body>
</html>