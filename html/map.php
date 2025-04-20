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
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- page css -->
    <link href="css/pages/google-vector-map.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #gmaps-simple {
            height: 600px;
            width: 100%;
            border-radius: 8px;
        }

        .zoom-mrt {
            margin-bottom: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            padding: 6px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .btn-mrt {
            margin-bottom: 10px;
            border: none;
            color: white;
            padding: 6px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .btn-success {
            background-color: #28a745;
        }
        
        .btn-primary {
            background-color: #007bff;
        }
        
        .btn-info {
            background-color: #17a2b8;
        }
        
        .btn-mrt:hover {
            opacity: 0.9;
        }
        
        #map-container {
            position: relative;
        }
        
        .station-info-panel {
            position: absolute;
            top: 10px;
            right: 10px;
            background: white;
            border-radius: 8px;
            width: 280px;
            max-height: 580px;
            overflow-y: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: all 0.3s;
            transform: translateX(300px);
            display: none;
        }
        
        .station-info-panel.active {
            transform: translateX(0);
            display: block;
        }
        
        .info-header {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            background-color: #28a745;
            color: white;
            border-radius: 8px 8px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .info-header h4 {
            margin: 0;
            font-size: 16px;
        }
        
        .info-body {
            padding: 15px;
        }
        
        .station-item {
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 8px;
            border-left: 3px solid #28a745;
            background-color: #f8f9fa;
            transition: all 0.2s;
        }
        
        .station-item:hover {
            background-color: #e9ecef;
        }
        
        .station-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .station-details {
            font-size: 13px;
            color: #6c757d;
        }
        
        .station-popup {
            width: 220px;
        }
        
        .popup-header {
            background-color: #28a745;
            color: white;
            padding: 8px 12px;
        }
        
        .popup-header h5 {
            margin: 0;
            font-size: 15px;
        }
        
        .popup-body {
            padding: 12px;
        }
        
        .info-row {
            margin-bottom: 6px;
            font-size: 13px;
        }
        
        .info-label {
            font-weight: 500;
            margin-right: 5px;
        }
        
        .map-legend {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: white;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 990;
            font-size: 12px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        
        .legend-color {
            width: 20px;
            height: 8px;
            margin-right: 8px;
        }
        
        .green-line {
            background-color: #28a745;
        }
        
        .blue-line {
            background-color: #007bff;
        }
        
        .weather-widget {
            background-color: white;
            border-radius: 4px;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .weather-icon {
            font-size: 32px;
            margin-right: 15px;
            color: #f8c032;
        }
        
        .weather-info {
            flex-grow: 1;
        }
        
        .weather-temp {
            font-size: 22px;
            font-weight: 600;
            margin: 0;
        }
        
        .weather-desc {
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">JakLine</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <?php
                include 'logo.php';?>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'leftbar.php';?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">MRT Map</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">MAP</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Statiun MRT</h4>
                                <div class="d-flex mb-3">
                                    <button class="zoom-mrt mr-2" onclick="zoomToMRT()">Zoom Jalur Hijau MRT</button>
                                    <button class="btn-mrt btn-primary mx-2" onclick="zoomToMap()">View All</button>
                                    <button class="btn-mrt btn-info mx-2" id="toggle-stations">Station Info</button>
                                </div>
                                <div id="map-container">
                                    <div id="gmaps-simple"></div>
                                    
                                    <!-- Station Info Panel -->
                                    <div class="station-info-panel" id="station-info-panel">
                                        <div class="info-header">
                                            <h4><i class="fa fa-subway me-2"></i>MRT Stations</h4>
                                            <button class="btn-close btn-close-white" id="close-info"></button>
                                        </div>
                                        <div class="info-body">
                                            <div id="station-list">
                                                <!-- Station list will be populated by JavaScript -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Map Legend -->
                                    <div class="map-legend">
                                        <h6 class="mb-2">Legend</h6>
                                        <div class="legend-item">
                                            <div class="legend-color green-line"></div>
                                            <span>Jalur Hijau (Operational)</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color blue-line"></div>
                                            <span>Jalur Biru (Planned)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © JakLite by <a href="">JakLite.com</a> </footer>
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
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Wait for page load
        $(document).ready(function() {
            // Hide preloader after page load
            setTimeout(function() {
                $('.preloader').fadeOut();
            }, 1000);
            
            // Toggle station info panel
            $('#toggle-stations').click(function() {
                $('#station-info-panel').toggleClass('active');
            });
            
            $('#close-info').click(function() {
                $('#station-info-panel').removeClass('active');
            });
            
            // Update weather time
            function updateWeatherTime() {
                const now = new Date();
                let hours = now.getHours();
                let minutes = now.getMinutes();
                const ampm = hours >= 12 ? 'PM' : 'AM';
                
                hours = hours % 12;
                hours = hours ? hours : 12;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                
                const timeString = hours + ':' + minutes + ' ' + ampm;
                $('#weather-time').text(timeString);
            }
            
            updateWeatherTime();
            setInterval(updateWeatherTime, 60000);
            
            // Simulate weather updates
            function simulateWeatherUpdate() {
                const temps = [28, 29, 30, 31, 32];
                const randomTemp = temps[Math.floor(Math.random() * temps.length)];
                $('#weather-temp').text(randomTemp + '°C');
            }
            
            setInterval(simulateWeatherUpdate, 300000); // Update every 5 minutes
        });

        // MRT Map Configuration
        const mrtStations = [
            { id: 1, name: "Bundaran HI", lat: -6.1930, lng: 106.8236, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "TransJakarta, Bus" } },
            { id: 2, name: "Dukuh Atas BNI", lat: -6.2008, lng: 106.8230, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing, ATM", connections: "KRL, TransJakarta, Airport Rail Link" } },
            { id: 3, name: "Setiabudi Astra", lat: -6.2088, lng: 106.8229, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "TransJakarta" } },
            { id: 4, name: "Bendungan Hilir", lat: -6.2147, lng: 106.8189, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "Bus" } },
            { id: 5, name: "Istora Mandiri", lat: -6.2226, lng: 106.8102, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "TransJakarta" } },
            { id: 6, name: "Senayan", lat: -6.2260, lng: 106.8021, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing, ATM", connections: "TransJakarta, Bus" } },
            { id: 7, name: "ASEAN", lat: -6.2291, lng: 106.7967, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "Bus" } },
            { id: 8, name: "Blok M BCA", lat: -6.2440, lng: 106.7992, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing, ATM", connections: "TransJakarta, Bus" } },
            { id: 9, name: "Blok A", lat: -6.2550, lng: 106.7971, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "Bus" } },
            { id: 10, name: "Haji Nawi", lat: -6.2644, lng: 106.7971, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "Bus" } },
            { id: 11, name: "Cipete Raya", lat: -6.2715, lng: 106.7984, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "Bus" } },
            { id: 12, name: "Fatmawati", lat: -6.2820, lng: 106.7989, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing", connections: "Bus" } },
            { id: 13, name: "Lebak Bulus", lat: -6.2906, lng: 106.7751, type: "green", 
              details: { facilities: "Elevator, Toilet, Ticketing, Park & Ride", connections: "TransJakarta, Bus" } }
        ];
        
        // Replace image-based map with interactive map
        var map = L.map('gmaps-simple').setView([-6.2353, 106.8062], 12);
        
        // Add OpenStreetMap base layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        
        // Draw MRT Green Line
        const greenLineCoords = mrtStations
            .filter(station => station.type === 'green')
            .map(station => [station.lat, station.lng]);
            
        const greenLine = L.polyline(greenLineCoords, {
            color: '#28a745',
            weight: 5,
            opacity: 0.7
        }).addTo(map);
        
        // Add station markers
        const stationMarkers = {};
        
        mrtStations.forEach(station => {
            // Create marker
            const marker = L.circleMarker([station.lat, station.lng], {
                radius: 8,
                fillColor: station.type === 'green' ? '#28a745' : '#007bff',
                color: '#fff',
                weight: 2,
                opacity: 1,
                fillOpacity: 0.9
            }).addTo(map);
            
            stationMarkers[station.id] = marker;
            
            // Create popup content
            const popupContent = `
                <div class="station-popup">
                    <div class="popup-header">
                        <h5>${station.name}</h5>
                    </div>
                    <div class="popup-body">
                        <div class="info-row">
                            <span class="info-label">Facilities:</span>
                            <span>${station.details.facilities}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Connections:</span>
                            <span>${station.details.connections}</span>
                        </div>
                    </div>
                </div>
            `;
            
            // Bind popup to marker
            marker.bindPopup(popupContent);
            
            // Add station to info panel
            const stationHtml = `
                <div class="station-item" data-station-id="${station.id}">
                    <div class="station-name">${station.name}</div>
                    <div class="station-details">
                        <i class="fa fa-exchange-alt me-1"></i>${station.details.connections}
                    </div>
                </div>
            `;
            
            $('#station-list').append(stationHtml);
        });
        
        // Station item click event
        $(document).on('click', '.station-item', function() {
            const stationId = $(this).data('station-id');
            const station = mrtStations.find(s => s.id === stationId);
            
            // Open popup and center map
            map.setView([station.lat, station.lng], 15);
            stationMarkers[stationId].openPopup();
        });
        
        // Zoom to Green Line function (original function name kept)
        function zoomToMRT() {
            map.fitBounds(greenLine.getBounds(), {
                padding: [50, 50]
            });
        }
        
        // Zoom to entire map
        function zoomToMap() {
            map.setView([-6.2353, 106.8062], 12);
        }
    </script>
</body>

</html>
