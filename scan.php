<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ProtechGuard </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-shield-alt me-2"></i>ProtechGuard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link">
                        <i class="fas fa-chart-line me-2"></i>Dashboard
                      </a>
                    <a href="subdomain.php" class="nav-item nav-link"><i class="fas fa-binoculars me-0"></i>Subdomain Hunter</a>
                    <a href="port.php" class="nav-item nav-link"><i class="fas fa-network-wired me-2"></i>PortShield</a>
                    <a href="scan.php" class="nav-item nav-link active"><i class="fas fa-user-secret me-2"></i>CyberScan</a>
                    <a href="QueryGuard.html" class="nav-item nav-link"><i class="fas fa-search me-2"></i>QueryGuard</a>
                    <a href="email.php" class="nav-item nav-link"><i class="fas fa-envelope me-2"></i>SecurEmailShield</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="signin.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4">Cyber Scan</h3>
                            <form action="http://localhost/utils/domain_scan.php" method="post">
                                <div class="mb-3">
                                    <label for="exampleDomain" class="form-label">Domain:</label>
                                    <input type="text" name="domain" class="form-control" id="exampleDomain"
                                        aria-describedby="domainHelp">
                                    <div id="domainHelp" class="form-text">Please conduct a vulnerability scan of your system.
                                    </div>
                                </div>
                                <button type="submit" name="scan" class="btn btn-primary">Scan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <?php
            if (isset($_GET["domain"])){
                $domain = $_GET["domain"];
                $download_url = "http://localhost/utils/$domain.txt";
                $domain = $_GET["domain"];
                $results = file_get_contents("./utils/$domain.txt");
                $results = explode("\n", $results);
            }
            else{
                $results = NULL;
                $download_url = NULL;
            }
            ?>
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 col-xl-12 mt-2">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="row">
                            <div class="col-md-11">
                            <h6 class="mb-4">Vulnerability Scan Results</h6>
                            </div>
                            <div class="col-md-1" style="align:right">
                            <a download href="<?php echo $download_url; ?>">
                             <i class="fa fa-download" style="color: white";></i></a>
             </div>
                            </div>
                            <table class="table">
                                <thead>
                                <?php
                                error_reporting(0);
                                        foreach($results as $result){ ?>
                                    <tr>
                                        
                                        <th scope="col"><?php echo $result . PHP_EOL; }?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
