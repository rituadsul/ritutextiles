
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Logout | LABMS</title>
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
            .col-md-6.my-custom-margin{
                padding: 0px;
            }
        }

        @media screen and (min-width: 600px) {
            .col-md-6.my-custom-margin{
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
                     <div class="col-md-3">
                     </div>

                    <div class="col-md-6">
                        <div class="row">
                             <div class="col-md-3">
                             </div>

                            <div class="col-md-6 my-custom-margin" style="border: 1px solid #ddd; border-radius: 20px; background-color: white;">
                                <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">

                                    <div class="mb-4 p-0 text-center">
                                        <a class='auth-logo' href=''>
                                            <img src="assets/images/logo.png" alt="logo-dark" class="mx-auto" height="48"/>
                                        </a>
                                    </div>
                                    
                                    <div class="text-center auth-title-section">
                                        <h3 class="text-dark fs-20 fw-medium mb-2">You are Logged Out</h3>
                                        <p class="text-muted fs-15">Thank you for using LABMS </p>
                                    </div>
                                
                                    <div class="text-center">
                                        <a class='btn btn-primary mt-3 me-1' href='login.php'> Log In </a>
                                    </div>

                                
                                </div>
                            </div>
                            <div class="col-md-3">
                             </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                     </div>


                  

                </div>
            </div>
        </div>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>