<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>MRT Jakarta</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!--     1 Page CSS -->
    <link href="css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        /*  ===== GENERAL RESET  =====  */
        :root {
            --primary: #103d5e;
            --primary-dark: #07263d;
            --primary-light: #ebf3fa;
            --accent: #0d6efd;
            --radius: 0.75rem;
        }

        body {
            background-color: #f7f9fc;
            color: #12263a;
        }

        /*  ===== HERO SECTION  ===== */
        .hero {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: #fff;
            overflow: hidden;
        }

        .hero__skyline {
            position: absolute;
            inset: 0;
            background: url("assets/img/skyline.svg") center/cover no-repeat;
            opacity: 0.2;
            pointer-events: none;
        }

        .hero__train {
            max-width: 900px;
            width: 100%;
        }

        /*  ===== SEARCH WRAPPER  ===== */
        .search-wrapper {
            margin-top: -3.5rem; /* Pull up over white section */
            background: #fff;
            border-radius: var(--radius);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            padding: 2rem;
        }

        .search-wrapper .input-group {
            overflow: hidden;
            border-radius: var(--radius);
        }

        .search-wrapper input.form-control {
            border: none;
            padding: 1rem 1.25rem;
            font-size: 1rem;
        }

        .search-wrapper .btn-search {
            background: var(--accent);
            color: #fff;
            padding: 0 2.5rem;
        }

        /*  ===== ACTION CARDS  ===== */
        .action-card {
            border: 1px solid #e1e7ec;
            border-radius: var(--radius);
            transition: all 0.25s ease;
            height: 100%;
        }

        .action-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .action-card i {
            font-size: 1.5rem;
            margin-right: 0.5rem;
        }

        /*  ===== UTILITIES  ===== */
        .z-top {
            position: relative;
            z-index: 5;
        }
    </style>
</head>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <?php
                    include 'logo.php';?>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php
         include 'leftbar.php';?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="margin-top: -10px;">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">HOME PAGE</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">HOME PAGE</li>
                        </ol>
                    </div>
                </div>
                <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JakLine – Cari Jadwal MRT</title>

  <!--  BOXICONS  -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!--  CUSTOM STYLE (only for this page)  -->
  <style>
    /*  ===== GENERAL RESET  =====  */
    :root {
      --primary: #103d5e;
      --primary-dark: #07263d;
      --primary-light: #ebf3fa;
      --accent: #0d6efd;
      --radius: 0.75rem;
    }

    body {
      background-color: #f7f9fc;
      color: #12263a;
    }

    /*  ===== HERO SECTION  ===== */
    .hero {
      width: 100vw;
      position: relative;
      left: 50%;
      right: 50%;
      margin-left: -50vw;
      margin-right: -50vw;
      background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
      color: #fff;
      overflow: hidden;
    }

    .hero__skyline {
      position: absolute;
      inset: 0;
      background: url("assets/img/skyline.svg") center/cover no-repeat;
      opacity: 0.2;
      pointer-events: none;
    }

    .hero__train {
      max-width: 900px;
      width: 100%;
    }

    /*  ===== SEARCH WRAPPER  ===== */
    .search-wrapper {
      margin-top: -3.5rem; /* Pull up over white section */
      background: #fff;
      border-radius: var(--radius);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
      padding: 2rem;
    }

    .search-wrapper .input-group {
      overflow: hidden;
      border-radius: var(--radius);
    }

    .search-wrapper input.form-control {
      border: none;
      padding: 1rem 1.25rem;
      font-size: 1rem;
    }

    .search-wrapper .btn-search {
      background: var(--accent);
      color: #fff;
      padding: 0 2.5rem;
    }

    /*  ===== ACTION CARDS  ===== */
    .action-card {
      border: 1px solid #e1e7ec;
      border-radius: var(--radius);
      transition: all 0.25s ease;
      height: 100%;
    }

    .action-card:hover {
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      transform: translateY(-2px);
    }

    .action-card i {
      font-size: 1.5rem;
      margin-right: 0.5rem;
    }

    /*  ===== UTILITIES  ===== */
    .z-top {
      position: relative;
      z-index: 5;
    }
  </style>
</head>
    <!--  ===== HERO  ===== -->
    <section class="hero pb-4">
      <div class="hero__skyline"></div>
      <div class="container z-top pt-5 text-center">
        <!--  TITLE  -->
        <h1 class="display-5 fw-bold mb-4" style="color:rgb(235, 229, 229);">Temukan Jadwal MRT<br />Antar Daerah di Kotamu</h1>
        <!--  TRAIN IMAGE  -->
        <img src="images/mrt.png" alt="gambar" class="hero__train mb-4" style="max-width: 250px; width: 50%; height: auto;" />
      </div>
    </section>

    <!--  ===== SEARCH BLOCK  ===== -->
    <section class="search-wrapper mx-auto" style="max-width: 900px;">
      <form action="search.php" method="get" class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Cari Jadwal MRT" />
        <button class="btn btn-search" type="submit">Cari</button>
      </form>
      <div class="row mt-4 g-3">
        <div class="col-6">
          <a href="jadwal.php" class="d-block text-decoration-none text-reset h-100">
            <div class="p-3 action-card d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <i class='bx bx-calendar'></i> <span class="fw-medium">Lihat Jadwal</span>
              </div>
              <i class='bx bx-chevron-right'></i>
            </div>
          </a>
        </div>
        <div class="col-6">
          <a href="map.php" class="d-block text-decoration-none text-reset h-100">
            <div class="p-3 action-card d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <i class='bx bx-map'></i> <span class="fw-medium">Tata Rute</span>
              </div>
              <i class='bx bx-chevron-right'></i>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!--  ===== FOOTER  ===== -->
    <footer class="text-center mt-5 mb-4 small text-muted">© 2025 JakLine by JakLine.com</footer>
  </div>

  <!--  ===== SCRIPTS  ===== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




                    <!-- End Feeds -->
                </div>
                <!-- ============================================================== -->
                <!-- End Notification And Feeds -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== --> `
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
</body>

</html>
