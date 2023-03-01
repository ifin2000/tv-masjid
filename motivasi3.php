<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart TV Masjid Al Madinah Al Munawwaroh</title>
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
    <meta name="description" content="Smart TV Application for Masjid Masjid Al Madinah Al Munawwaroh" />
    <meta name="keywords" content="Smart TV for Masjid Masjid Al Madinah Al Munawwaroh">
    <meta name="author" content="M. Syamsul Arifin & Team" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    
    <style>
        body{
            background:
            /* top, transparent black, faked with gradient */ 
                linear-gradient(
                    rgba(0, 0, 0, 0.8), 
                    rgba(0, 0, 0, 0.8)
                );
        }
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
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&effect=outline">
    <style>
      h1 {
        color: #fff;
        font-family: 'Amiri', serif;
        font-size: 26px;
      }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&effect=3d-float">
    <style>
      h2,h4 {
        color: #fff;
        font-family: 'Roboto', serif;
        font-size: 24px;
        
      }
    </style>

    <style>
    @font-face {
         font-family: 'al_qalam_quran_majeedregular';
         src: url('../assets/fonts/al_qalam_quran_majeed-webfont.woff') format('woff');
         font-weight: normal;
         font-style: normal;
         font-size: 26px;
    }

    h5 {
        font-family : "al_qalam_quran_majeedregular" ;
    } 
    </style>

<link type="text/css" rel="stylesheet" href="assets/css/digijam2.css" />
<script type="text/javascript" src="assets/js/digijam2.js"></script>

</head>

<?php
//ambil data hadits/quran di API
require_once 'koneksi.php';
// pengaturan tampilan di hari jumat dan selain jumat
$waktu = $_GET['saat'];
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$namahari = date('l', strtotime($tanggal));
//$namahari = 'Saturday';
if ($namahari=='Friday'){
    $sqx = "select konten,sumber from hadits_jumat where id='5'";
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $teksid = $row['konten'];
    $sumber = $row['sumber'];
} else {
    /*$sqx = "select surat_rawi,ayat_nom from motivasi where no='4'";
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $perawi = $row['surat_rawi'];
    $nohdts = $row['ayat_nom'];
    $url = 'https://api.hadith.sutanlab.id/books/'.$perawi.'/'.$nohdts;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    $teksar = $response['data']['contents']['arab'];
    $teksid = $response['data']['contents']['id'];
    $sumber = $response['data']['name']." : ".$response['data']['contents']['number'];*/
    $sqx = "select konten,sumber from motivasi2 where catatan='$waktu' ORDER BY RAND() limit 1";
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $teksid = $row['konten'];
    $sumber = $row['sumber'];
}
?>

    <body class="" onload="pindah();waktu();">

    <div id="jam-digital">
        <div id="hours"><p id="jam"></p></div>
        <div id="minute"><p id="menit"></p></div>
        <div id="second"><p id="detik"></p></div>
    </div>
        
                <div>
                    <div>
				        <img class="img-fluid card-img" src="assets/images/khusus/pexels-kedar-bhave.jpg" alt="Card image" style="opacity: 0.7;">
				    </div>

                    <div id="konten1">
				        <!--<p class=""><h1 class="font-effect-outline"><?php echo $teksar; ?></h1></p>-->
                        <p class=""><h2 class="font-effect-3d-float"><?php echo substr($teksid, strpos($teksid, " bersabda") + 0);; ?></h2></p>
                        <p class=""><h4>[ <?php echo $sumber; ?> ]</h4></p>
				    </div>
                    

                </div>

        <script type="text/javascript">
            function pindah(){
                setTimeout(function(){ window.location.href = 'index.php'; }, 15000); // pindah page stlh 60 detik
            }
        </script>

    </body>

</html>