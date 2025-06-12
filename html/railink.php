<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Jadwal Railink</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <style>
        :root {
            --primary: #0275d8;
            --success: #5cb85c;
            --danger: #d9534f;
            --warning: #f0ad4e;
            --info: #5bc0de;
            --light: #f7f7f7;
            --dark: #333;
            --accent: #7c4dff;
            --text: #3c4858;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .main-content-wrapper {
            background: url('/api/placeholder/1920/1080') no-repeat center center fixed;
            background-size: cover;
            color: var(--text);
        }
        
        .overlay {
            background-color: rgba(255, 255, 255, 0.92);
            min-height: 100vh;
        }
        
        .page-header {
            padding: 20px 0;
            margin-bottom: 20px;
        }
        
        .page-header h1 {
            font-size: 24px;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 10px;
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #777;
            padding: 0;
            margin: 0;
            background: transparent;
        }
        
        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }
        
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 20px;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .route-display {
            padding: 30px;
            position: relative;
            overflow-x: auto;
        }
        
        .route-container {
            position: relative;
            width: 100%;
            padding-top: 70px;
        }
        
        .route-line {
            position: absolute;
            height: 6px;
            background: linear-gradient(to right, #0275d8, #7c4dff);
            top: 50%;
            left: 25px;
            right: 25px;
            transform: translateY(-50%);
            border-radius: 3px;
            z-index: 1;
        }
        
        .station-points {
            display: flex;
            justify-content: space-between;
            width: 100%;
            position: relative;
            z-index: 2;
        }
        
        .station-point {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100px;
        }
        
        .station-marker {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 4px solid white;
            background-color: var(--primary);
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(2, 117, 216, 0.3);
            transition: all 0.2s ease;
        }
        
        .station-point.major .station-marker {
            background-color: var(--success);
            width: 28px;
            height: 28px;
            box-shadow: 0 2px 8px rgba(92, 184, 92, 0.3);
        }
        
        .station-point.active .station-marker {
            transform: scale(1.3);
            box-shadow: 0 4px 12px rgba(124, 77, 255, 0.5);
            background-color: var(--accent);
        }
        
        .station-point:hover .station-marker {
            transform: scale(1.2);
        }
        
        .station-name {
            font-size: 12px;
            font-weight: 500;
            text-align: center;
            max-width: 100px;
            color: #666;
            transition: all 0.3s ease;
        }
        
        .station-point:hover .station-name,
        .station-point.active .station-name {
            color: var(--accent);
            font-weight: 600;
        }
        
        .station-detail {
            padding: 30px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            animation: slideUp 0.4s ease;
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .station-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .station-header h2 {
            font-size: 22px;
            font-weight: 600;
            color: var(--accent);
        }
        
        .station-info {
            margin-bottom: 20px;
            color: #666;
            line-height: 1.6;
        }
        
        .schedule-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .schedule-card {
            flex: 1;
            background: rgba(247, 247, 247, 0.8);
            border-radius: 12px;
            padding: 20px;
            min-width: 250px;
        }
        
        .schedule-card h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .schedule-card h3 i {
            color: var(--primary);
        }
        
        .schedule-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .schedule-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .direction {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }
        
        .direction i {
            font-size: 14px;
            color: var(--primary);
        }
        
        .time {
            margin-left: auto;
            font-weight: 500;
            background: rgba(124, 77, 255, 0.1);
            padding: 4px 10px;
            border-radius: 20px;
            color: var(--accent);
        }
        
        .mrt-features {
            margin-top: 20px;
            padding: 20px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(247, 247, 247, 0.9));
            border-radius: 16px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0275d8, #7c4dff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            margin-bottom: 15px;
        }
        
        .feature-card h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text);
        }
        
        .feature-card p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        /* Add these styles to your existing CSS */

        .station-image-container {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .station-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        /* Background image alternative */
        .station-image-bg {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
        }

        .station-image-container:hover .station-image,
        .station-image-container:hover .station-image-bg {
            transform: scale(1.05);
        }

        .station-image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            color: white;
            font-weight: 500;
            font-size: 16px;
        }

        /* Fallback styling */
        .station-image-container.no-image {
            background: linear-gradient(135deg, #0275d8, #7c4dff);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .station-image-container.no-image::before {
            content: "Railink";
            color: rgba(255, 255, 255, 0.3);
            font-size: 32px;
            font-weight: 700;
        }
    </style>
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Railink</p>
        </div>
    </div>
    
    <!-- Main wrapper -->
    <div id="main-wrapper">
        <!-- Topbar header -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <?php include 'logo.php' ?>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <ul class="navbar-nav me-auto">
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar header -->
        
        <!-- Left Sidebar -->
        <?php include 'leftbar.php' ?>
        <!-- End Left Sidebar -->
        
        <!-- Page wrapper -->
        <div class="page-wrapper">
            <!-- Container fluid -->
            <div class="container-fluid">
                <!-- Bread crumb and page title -->
                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                        <div class="page-header">
                        <h3 class="text-themecolor">Daftar Keberangkatan Kereta Railink</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Jadwal</li>
                        </ol>
                        </div>
                    </div>
                </div>
                </div>
                <!-- End Bread crumb and page title -->
                    
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="content-card">
                            <div class="route-display">
                                <div class="route-container">
                                    <div class="route-line"></div>
                                    <div class="station-points" id="station-points">
                                        <!-- Station points will be generated here -->
                                    </div>
                                </div>
                            </div>
                            
                            <div class="station-detail" id="station-detail">
                                <!-- Station details will be shown here -->
                            </div>
                        </div>
                        
                        <div class="mrt-features">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <h3>Jadwal Tepat Waktu</h3>
                                <p>Railink terkenal dengan ketepatan waktu keberangkatan dan kedatangan yang mencapai 99.8%.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <h3>Aman dan Nyaman</h3>
                                <p>Railink selalu mengutamakan keamanan dan kenyamanan Anda dalam perjalanan ke bandara.</p>
                            </div>
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="fa fa-exchange"></i>
                                </div>
                                <h3>Integrasi Multi-moda</h3>
                                <p>Terhubung dengan KRL Commuter Line untuk mobilitas yang lebih nyaman di Jakarta.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->
            </div>
        </div>
        <!-- End Container fluid -->
        
        <!-- footer -->
        <footer class="footer"> © 2025 Railink by <a href="">Railink.com</a> </footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper -->
    </div>
    <!-- End Wrapper -->
    
    <!-- All Jquery -->
    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- jQuery peity -->
    <script src="../assets/node_modules/peity/jquery.peity.min.js"></script>
    <script src="../assets/node_modules/peity/jquery.peity.init.js"></script>
    
    <script>
        const stations = [
            {
                title: "Bandara Soekarno-Hatta",
                isMajor: true,
                info: "Stasiun utama Railink yang terletak di Bandara Soekarno-Hatta. Stasiun ini berada di Terminal 3 dan terintegrasi langsung dengan area keberangkatan dan kedatangan bandara internasional ini.",
                image: "images/rail/SKHATTA.jpg",
                jadwal: {
                    berangkat: {
                        keManggarai: "04:30 – 22:30",
                        keBandara: "-"
                    },
                    datang: {
                        dariManggarai: "-",
                        dariBandara: "-"
                    }
                }
            },
            {
                title: "Batu Ceper",
                isMajor: false,
                info: "Stasiun Batu Ceper terletak di kawasan industri Tangerang. Stasiun ini melayani penumpang dari wilayah Tangerang dan sekitarnya yang ingin menuju bandara atau pusat kota Jakarta.",
                image: "images/rail/ceper.webp",
                jadwal: {
                    berangkat: {
                        keManggarai: "04:45 – 22:45",
                        keBandara: "05:15 – 23:15"
                    },
                    datang: {
                        dariManggarai: "05:15 – 23:15",
                        dariBandara: "04:45 – 22:45"
                    }
                }
            },
            {
                title: "Duri",
                isMajor: false,
                info: "Stasiun Duri merupakan salah satu stasiun penting di jalur Railink. Terletak di Jakarta Barat, stasiun ini menjadi titik transit bagi penumpang dari berbagai wilayah Jakarta.",
                image: "images/rail/duri.jpg",
                jadwal: {
                    berangkat: {
                        keManggarai: "05:00 – 23:00",
                        keBandara: "05:30 – 23:30"
                    },
                    datang: {
                        dariManggarai: "05:30 – 23:30",
                        dariBandara: "05:00 – 23:00"
                    }
                }
            },
            {
                title: "Tanah Abang",
                isMajor: true,
                info: "Stasiun Tanah Abang terletak di pusat perdagangan tekstil terbesar di Asia Tenggara. Stasiun ini sangat strategis bagi wisatawan dan pedagang yang ingin menuju bandara.",
                image: "images/rail/abang.jpg",
                jadwal: {
                    berangkat: {
                        keManggarai: "05:15 – 23:15",
                        keBandara: "05:45 – 23:45"
                    },
                    datang: {
                        dariManggarai: "05:45 – 23:45",
                        dariBandara: "05:15 – 23:15"
                    }
                }
            },
            {
                title: "Sudirman",
                isMajor: true,
                info: "Stasiun Sudirman terletak di jantung pusat bisnis Jakarta. Stasiun ini terintegrasi dengan MRT Jakarta dan menjadi titik transit penting bagi penumpang Railink.",
                image: "images/rail/sudirman.jpg",
                jadwal: {
                    berangkat: {
                        keManggarai: "05:30 – 23:30",
                        keBandara: "06:00 – 00:00"
                    },
                    datang: {
                        dariManggarai: "06:00 – 00:00",
                        dariBandara: "05:30 – 23:30"
                    }
                }
            },
            {
                title: "Manggarai",
                isMajor: true,
                info: "Stasiun Manggarai merupakan stasiun akhir Railink di Jakarta. Stasiun ini terintegrasi dengan KRL Commuter Line dan menjadi pusat transit penting di Jakarta Selatan.",
                image: "images/rail/manggarai.jpg",
                jadwal: {
                    berangkat: {
                        keManggarai: "-",
                        keBandara: "06:15 – 00:15"
                    },
                    datang: {
                        dariManggarai: "-",
                        dariBandara: "-"
                    }
                }
            }
        ];

        const stationPointsContainer = document.getElementById('station-points');
        const stationDetailContainer = document.getElementById('station-detail');

        // Generate station points
        stations.forEach((station, index) => {
            const stationEl = document.createElement('div');
            stationEl.classList.add('station-point');
            if (station.isMajor) stationEl.classList.add('major');
            if (index === 0) stationEl.classList.add('active');
            
            stationEl.innerHTML = `
                <div class="station-marker"></div>
                <div class="station-name">${station.title}</div>
            `;
            
            stationEl.addEventListener('click', () => {
                // Remove active class from all stations
                document.querySelectorAll('.station-point').forEach(el => {
                    el.classList.remove('active');
                });
                
                // Add active class to clicked station
                stationEl.classList.add('active');
                
                // Update station details
                updateStationDetails(station);
            });
            
            stationPointsContainer.appendChild(stationEl);
        });

        // Show details for first station by default
        updateStationDetails(stations[0]);

        function updateStationDetails(station) {
            const j = station.jadwal;
            stationDetailContainer.innerHTML = `
                <div class="station-header">
                    <h2>${station.title}</h2>
                    <div class="station-badges">
                        ${station.isMajor ? '<span class="badge bg-success">Major Station</span>' : ''}
                    </div>
                </div>
                
                <div class="station-info">
                    <p>${station.info}</p>
                </div>

                <!-- Station Image Section -->
                <div class="station-image-container">
                    <img src="${station.image}" alt="Stasiun ${station.title}" class="station-image">
                    <div class="station-image-overlay">
                        <span>Stasiun Railink ${station.title}</span>
                    </div>
                </div>
                
                <div class="schedule-container">
                    <div class="schedule-card">
                        <h3><i class="fa fa-train"></i> Keberangkatan</h3>
                        <div class="schedule-item">
                            <div class="direction">
                                <i class="fa fa-arrow-right"></i>
                                <span>Ke Manggarai</span>
                            </div>
                            <div class="time">${j.berangkat.keManggarai || '-'}</div>
                        </div>
                        <div class="schedule-item">
                            <div class="direction">
                                <i class="fa fa-arrow-right"></i>
                                <span>Ke Bandara</span>
                            </div>
                            <div class="time">${j.berangkat.keBandara || '-'}</div>
                        </div>
                    </div>
                    
                    <div class="schedule-card">
                        <h3><i class="fa fa-train"></i> Kedatangan</h3>
                        <div class="schedule-item">
                            <div class="direction">
                                <i class="fa fa-arrow-left"></i>
                                <span>Dari Manggarai</span>
                            </div>
                            <div class="time">${j.datang.dariManggarai || '-'}</div>
                        </div>
                        <div class="schedule-item">
                            <div class="direction">
                                <i class="fa fa-arrow-left"></i>
                                <span>Dari Bandara</span>
                            </div>
                            <div class="time">${j.datang.dariBandara || '-'}</div>
                        </div>
                    </div>
                </div>
            `;
        }
    </script>
</body>
</html>