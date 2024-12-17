<?php include 'nama_halaman.php'; ?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $page_title ?> | Powerplan </title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <link rel="icon" href="./.../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <link href="../../assets/img/desain/logo.jpg" rel="icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <!-- Fonts and icons -->
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>

    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["../../assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <style>
        /* Styling dasar untuk tombol shape */
        .shape-button {
            display: inline-block;
            width: 60px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            margin: 8px;
            border: none;
            font-size: 18px;
            font-weight: bold;
            /* cursor untuk drop */
            cursor: grab;
            color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
        }

        /* Hover Effect */
        .shape-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        /* Lingkaran */
        .shape-circle {
            background-color: #f44336;
            border-radius: 50%;
        }

        /* Persegi panjang */
        .shape-rectangle {
            background-color: #2196f3;
            width: 80px;
            height: 50px;
        }

        /* Segitiga */
        .shape-triangle {
            background-color: transparent;
            width: 0;
            height: 0;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            border-bottom: 60px solid #4caf50;
        }

        /* Segitiga sama sisi */
        .shape-equilateral {
            background-color: transparent;
            width: 0;
            height: 0;
            border-left: 35px solid transparent;
            border-right: 35px solid transparent;
            border-bottom: 60px solid #e91e63;
        }

        /* Segitiga sama kaki */
        .shape-isosceles {
            background-color: transparent;
            width: 0;
            height: 0;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            border-bottom: 60px solid #ffc107;
        }

        /* Segi enam */
        .shape-hexagon {
            background-color: #00bcd4;
            width: 60px;
            height: 60px;
            clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
        }

        /* Segi lima */
        .shape-pentagon {
            background-color: #9c27b0;
            width: 60px;
            height: 60px;
            clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
        }

        /* Oval */
        .shape-oval {
            background-color: #ff5722;
            border-radius: 50%;
            width: 80px;
            height: 50px;
        }

        /* Additional Styling */
        #additionalShapes {
            display: none;
            /* Hidden by default */
        }

        #showMoreShapes {
            cursor: pointer;
            color: #2196f3;
            text-decoration: underline;
            margin-top: 10px;
            display: inline-block;
        }

        /* Style untuk ukuran slider */
        .size-slider {
            width: 100%;
            margin: 10px 0;
        }

        /* Style untuk dropdown ukuran latar belakang */
        .aspect-ratio-dropdown {
            width: 100%;
            margin: 10px 0;
        }
    </style>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css?v=<?= time(); ?>" />
    <link rel="stylesheet" href="../../assets/css/plugins.min.css?v=<?= time(); ?>" />
    <link rel="stylesheet" href="../../assets/css/kaiadmin.min.css?v=<?= time(); ?>" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../../assets/css/demo.css?v=<?= time(); ?>" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="tes.css" />

</head>