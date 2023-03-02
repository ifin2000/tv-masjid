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
        font-size: 34px;
      }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&effect=outline">
    <style>
      h2 {
        color: yellow;
        font-family: 'Roboto', serif;
        font-size: 30px;
        
      }
      h4{
        color: grey;
        font-family: 'Roboto', serif;
        font-size: 24px;
        
      }
    </style>

    <!--<script src="notif.js"></script>-->
</head>

<?php
require_once 'koneksi.php';
$resolzz = mysqli_query($koneksi, "select jeda_iqomat from setup_tv");
$setup = mysqli_fetch_array($resolzz);
$jedaiqomah = $setup["jeda_iqomat"];
// hitung waktu sholat
$waktu = $_GET['saat'];
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$namahari = date('l', strtotime($tanggal));
if ($namahari=='Friday'){
    if ($waktu=='dhuhur'){
        $inijumatan = 1;
        $sqx = "select konten,sumber from hadits_jumat where catatan='jeda' and id='10'";
        $jedaiqomah = 2200;
        $showIqomah = 0;
    } else {
        $inijumatan = 0;
        $sqx = "select konten,sumber from motivasi2 where catatan='jeda' and id='17'";
        //$jedaiqomah = 650;
        $showIqomah = 1;
    }
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $konten = $row['konten'];
    $sumber = $row['sumber'];
    $sqz = "select imam,cadangan from imam_rowatib where hari='Jumat'";
    $resalt = mysqli_query($koneksi,$sqz);
    $raw = mysqli_fetch_array($resalt);
    $imam = $raw['imam'];
    $cadangan = $raw['cadangan'];
} else {
    $inijumatan = 0;
    $waktu = $waktu;
    if ($waktu=='shubuh'){
        //$jedaiqomah = 800;
        $showIqomah = 1;
        $sqx = "select konten,sumber from motivasi2 where catatan='jeda' and id='14'";
    } else if ($waktu=='ashar') {
        //$jedaiqomah = 650;
        $showIqomah = 1;
        $sqx = "select konten,sumber from motivasi2 where catatan='jeda' and id='17'";
    } else if ($waktu=='isya') {
        //$jedaiqomah = 650;
        $showIqomah = 1;
        $sqx = "select konten,sumber from motivasi2 where catatan='jeda' and id='19'";
    } else if ($waktu=='dhuhur') {
        //$jedaiqomah = 650;
        $showIqomah = 1;
        $sqx = "select konten,sumber from motivasi2 where catatan='jeda' and id='14'";
    } else if ($waktu=='maghrib') {
        //$jedaiqomah = 650;
        $showIqomah = 1;
        $sqx = "select konten,sumber from motivasi2 where catatan='jeda' and id='17'";
    } else {
        //$jedaiqomah = 650;
        $showIqomah = 1;
        $sqx = "select konten,sumber from motivasi2 where catatan='jeda' and id='17'";
    }
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $konten = $row['konten'];
    $sumber = $row['sumber'];
    //$showIqomah = 1;
    if ($namahari=='Saturday'){
        $sqz = "select imam,cadangan from imam_rowatib where hari='Sabtu'";
    } elseif ($namahari=='Sunday'){
        $sqz = "select imam,cadangan from imam_rowatib where hari='Ahad'";
    } elseif ($namahari=='Monday'){
        $sqz = "select imam,cadangan from imam_rowatib where hari='Senin'";
    } elseif ($namahari=='Tuesday'){
        $sqz = "select imam,cadangan from imam_rowatib where hari='Selasa'";
    } elseif ($namahari=='Wednesday'){
        $sqz = "select imam,cadangan from imam_rowatib where hari='Rabu'";
    } elseif ($namahari=='Thursday'){
        $sqz = "select imam,cadangan from imam_rowatib where hari='Kamis'";
    }
    $resalt = mysqli_query($koneksi,$sqz);
    $raw = mysqli_fetch_array($resalt);
    $imam = $raw['imam'];
    $cadangan = $raw['cadangan'];
}
$iqomah = date('Y-m-d H:i:s', time() + $jedaiqomah);
?>

    <body class="">
        
                <div>

                    <div id="konten1">
                        <audio src="https://softanesia.com/tv-masjid/assets/sound/beep.mp3" id="notifme" preload="auto"></audio>
                        <p class=""><h1 class="font-effect-outline"><span style="color:#ffff00;">MASUK WAKTU <?php echo strtoupper($waktu); ?> !</span></h1></p>
                        <p class=""><h2 class="font-effect-outline"><?php echo $konten; ?></h2></p>
                        <p class=""><h4 class="font-effect-outline">[ <?php echo $sumber; ?> ]</h4></p>
                        <p></p>
                        <p class=""><h4 class="font-effect-outline"><span id="countdown" style="color:#ffbb00; font-size:66px;"></span></h4></p>
                        <p></p>
                        <?php if ($inijumatan) { } else { ?>
                            <p class=""><h4 class="font-effect-outline">IMAM SHOLAT FARDLU : <br><span id="imam1" style="color:#ffff00; font-size:35px;"><?php echo $imam; ?></span> / <span id="imam1" style="color:#ffff00; font-size:35px;"><?php echo $cadangan; ?></span></h4></p>
                        <?php } ?>
                    </div>
                    
                </div>

        <script type="text/javascript">
            window.onload = function() {
                //document.getElementById('notifme').play();
                pindah();
            }
            function pindah(){
                var countDownDate = new Date("<?php echo $iqomah; ?>").getTime();
                // Update the count down every 1 second
                var x = setInterval(function() {
                  var now = new Date().getTime();
                
                  var distance = countDownDate - now;
                
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                  <?php if ($showIqomah) { ?>
                    document.getElementById("countdown").innerHTML = minutes + ":" + seconds;
                    if ((minutes==0)&&(seconds<11)){
                        //document.getElementById('notifme').play();
                        startBeep();
                        //notifyMe();
                    } else {
                        //document.getElementById('notifme').pause();
                    }
                  <?php } else { ?>
                    document.getElementById("countdown").innerHTML = " ... ";   // awalnya hny buat waktu shubuh !
                  <?php } ?>
                  if (distance <= 0) {
                    clearInterval(x);
                    //window.location.href = 'motivasi1.php?saat=<?php echo $waktu; ?>'; // pindah page stlh ... detik
                    window.location.href = 'sholat.php?saat=<?php echo $waktu; ?>'; // pindah page stlh ... detik
                  }
                }, 1000);

                //setTimeout(function(){ window.location.href = 'motivasi1.php'; }, <?php echo $jedajumatan; ?>); // pindah page stlh 60 dtk x 15 = 15 menit
            }

            function startBeep(){
                document.getElementById('notifme').play();
                //alert("The sound has started to play");
            }

        </script>

    </body>

</html>