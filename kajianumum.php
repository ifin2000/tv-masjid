<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart TV :: SIMASJID</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Smart TV Application for Masjid :: SIMASJID" />
    <meta name="keywords" content="Smart TV for Masjid :: SIMASJID">
    <meta name="author" content="M. Syamsul Arifin & Team" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    
    <style>
        .img-fluid {
            /* Set rules to fill background */
            min-height: 100%;
            min-width: 1024px;

            /* Set up proportionate scaling */
            width: 100%;
            height: auto;

            /* Set up positioning */
            position: fixed;
            top: 0;
            left: 0;
        }

        #konten1{
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        body{
            background: #00712B;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #00A347, #00712B);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #00A347, #00712B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&effect=outline">
    <style>
      h1 {
        color: #ffc;
        font-family: 'Amiri', serif;
        font-size: 32px;
      }
      h6{
        color: white;
        font-family: 'Roboto', serif;
        font-size: 18px;     
        margin-top: 6px;
        margin-bottom: 6px;  
      }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&effect=outline">
    
    <style>
      h2 {
        color: yellow;
        font-family: 'Roboto', serif;
        font-size: 26px;
        
      }
      h4{
        color: grey;
        font-family: 'Roboto', serif;
        font-size: 22px;
        
      }
      h3{
        color: yellow;
        font-family: 'Roboto', serif;
        font-size: 18px;
        
      }
      
    </style>

</head>

<?php
require_once 'koneksi.php';
$waktu = $_GET['saat'];
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
?>

    <body class="">
        
                <div>

                <div>
				        <img class="img-fluid card-img" src="assets/images/moroccan-flower-dark.png" alt="Card image" style="opacity: 0.4;">
				    </div>

                    <div id="konten1">
                        <p class=""><img src="assets/images/marhaban-ramadhan.jpeg" style="border:4px;" width="100%"></img></p>
                        <!--<p></p>-->
                    </div>
                    
                </div>

        <script type="text/javascript">
            window.onload = function() {
                pindah();
            }
            function pindah(){
                setTimeout(function(){ window.location.href = 'motivasi1.php?saat=dhuhur'; }, 30000); // pindah page stlh 60 dtk x 15 = 15 menit
            }

        </script>

    </body>

</html>