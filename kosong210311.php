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
            background:
            /* top, transparent black, faked with gradient */ 
                linear-gradient(
                    rgba(0, 0, 0, 0.8), 
                    rgba(0, 0, 0, 0.8)
                );
        }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&effect=outline">
    <style>
      h1 {
        color: #ffc;
        font-family: 'Amiri', serif;
        font-size: 30px;
      }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&effect=outline">
    <style>
      h2 {
        color: yellow;
        font-family: 'Roboto', serif;
        font-size: 25px;
        
      }
      h4{
        color: grey;
        font-family: 'Roboto', serif;
        font-size: 20px;
        
      }
    </style>

</head>

<?php
// ambil data hadits/quran di API
/*$url = 'https://api.hadith.sutanlab.id/books/tirmidzi/196';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response = json_decode($response_json, true);
$teksar = $response['data']['contents']['arab'];
$teksid = $response['data']['contents']['id'];
$sumber = $response['data']['name']." : ".$response['data']['contents']['number'];*/
$waktu = $_GET['saat'];
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$namahari = date('l', strtotime($tanggal));
if (($namahari=='friday') && ($waktu=='dhuhur')){
    $inijumatan = 1;
    $jedajumatan = 2700000;    // 60x45 = 45 menit !
} else {
    $inijumatan = 0;
    $jedajumatan = 900000;      // 60x15 = 15 menit
}
?>

    <body class="">
        
                <div>

                    <!--<div>
				        <img class="img-fluid card-img" src="assets/images/khusus/pexels-julia-volk.jpg" alt="Card image" style="opacity: 0.7; background-blend-mode: darken;">
				    </div>-->

                    <div id="konten1">
                        <p class=""><h1 class="font-effect-outline">WAKTU <?php echo strtoupper($waktu); ?> TELAH TIBA !</h1></p>
                        <p class=""><h2 class="font-effect-outline">"Sesungguhnya do’a yang tidak tertolak adalah do’a antara adzan dan iqomah, maka berdo’alah (di waktu itu)"</h2></p>
                        <!--<p class=""><h1 class="font-effect-outline"><?php echo $teksar; ?></h1></p>-->
                        <!--<p class=""><h2 class="font-effect-outline"><?php echo $teksid; ?></h2></p>-->
                        <p class=""><h4 class="font-effect-outline">Registration closes in <span id="time">05:00</span> minutes!</h4></p>
                    </div>
                    <div><h4 class="font-effect-outline"></h4></div>
                    
                </div>
        
        <script type="text/javascript">

            window.onload = function() {
                pindah();
            }
            function pindah(){
                setTimeout(function(){ window.location.href = 'motivasi1.php'; }, <?php echo $jedajumatan; ?>); // pindah page stlh 60 dtk x 15 = 15 menit
            }

            function startTimer(duration, display) {
                var timer = duration, minutes, seconds;
                setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);
                
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
                
                    display.textContent = minutes + ":" + seconds;
                
                    if (--timer < 0) {
                        timer = duration;
                    }
                }, 1000);
            }

            window.onload = function () {
                var fiveMinutes = 60 * 5,
                    display = document.querySelector('#time');
                startTimer(fiveMinutes, display);
            };
            
        </script>


    </body>

</html>