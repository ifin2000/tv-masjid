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
            margin: 30px;
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
        font-size: 26px;
        
      }
    </style>

    <style>
    @font-face {
         font-family: 'al_qalam_quran_majeedregular';
         src: url('../assets/fonts/al_qalam_quran_majeed-webfont.woff') format('woff');
         font-weight: normal;
         font-style: normal;
         font-size: 22px;
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
    $sqx = "select konten,sumber from hadits_jumat where id='9'";
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $teksid = $row['konten'];
    $sumber = $row['sumber'];
} else {
    /*$sqx = "select surat_rawi,ayat_nom from motivasi where no='2'";
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $surat = $row['surat_rawi'];
    $ayat = $row['ayat_nom'];
    //$url = 'https://api.hadith.sutanlab.id/surah/'.$surat.'/'.$ayat;
    $url = 'https://api.quran.sutanlab.id/surah/59/18';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, true);
    $teksar = $response['data']['text']['arab'];
    $teksid = $response['data']['translation']['id'];
    $sumber = $response['data']['surah']['name']['transliteration']['id']." : ".$response['data']['number']['inSurah'];*/
    $sqx = "select konten,sumber from motivasi2 where catatan='$waktu' ORDER BY RAND() limit 1";
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $teksid = $row['konten'];
    $sumber = $row['sumber'];
}
$resolzz = mysqli_query($koneksi, "select jeda_page from setup_tv");
$setup = mysqli_fetch_array($resolzz);
$reserzz = mysqli_query($koneksi, "select bank,norek,anrek from organisasi");
$raw = mysqli_fetch_array($reserzz);
?>

    <body class="" onload="pindah();waktu();">

    <div id="jam-digital">
        <div id="hours"><p id="jam"></p></div>
        <div id="minute"><p id="menit"></p></div>
        <div id="second"><p id="detik"></p></div>
    </div>
        
                <div>
                    <div>
				        <img class="img-fluid card-img" src="assets/images/khusus/pexels-manprit-kalsi.jpg" alt="Card image" style="opacity: 0.7;">
				    </div>

                    <div id="konten1">
				        <!--<p class=""><h2 class="font-effect-3d-float">
                        “Setiap pagi hari terdapat dua malaikat yang turun. Satunya berdoa, “Ya Allah, berikanlah orang yang berinfaq ganti (dari apa yang ia infakkan)”. Yang lain berkata, “Ya Allah, berikanlah kepada orang yang menahan (hartanya) kebinasaan (hartanya).”<br>
                        [ HR. Al Bukhari dan Muslim ]
                        </h2></p>-->
                        <p class=""><h2 class="font-effect-3d-float">
                        <span style="color:white; font-size:27px;">Salah satu amalan yg pahalanya terus mengalir setelah kita meninggal adalah berinfaq untuk Masjid.<br><br>Salurkan donasi Anda melalui :</span>
                        </h2></p>
                        <p class=""><h4><span style="color:yellow; font-size:30px; -webkit-text-stroke: 1px #1c6d06;">Rekening <br><?php echo $raw["bank"]." no.".$raw["norek"]."<br>a/n ".$raw["anrek"]; ?></span></h4></p>
				    </div>
                    

                </div>

        <script type="text/javascript">
            function pindah(){
                setTimeout(function(){ window.location.href = 'taklim.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page stlh 60 detik
                //setTimeout(function(){ window.location.href = 'jumatan.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>);
                //setTimeout(function(){ window.location.href = 'index.php'; }, <?php echo $setup['jeda_page'] * 1000; ?>);
            }
        </script>

    </body>

</html>