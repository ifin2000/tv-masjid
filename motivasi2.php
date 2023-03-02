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
        body{
            background:
            /* top, transparent black, faked with gradient */ 
                linear-gradient(
                    rgba(0, 0, 0, 0.8), 
                    rgba(0, 0, 0, 0.8)
                );
        }
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            /*filter: blur(3px);
            -webkit-filter: blur(3px);*/
            filter: opacity(30%);
            -webkit-filter: opacity(30%);
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
        color: #ffc;
        font-family: 'Amiri', serif;
        font-size: 26px;
      }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&effect=outline">
    <style>
      h2 {
        color: yellow;
        font-family: 'Roboto', serif;
        font-size: 26px;      
      }
      h4 {
        color: white;
        font-family: 'Roboto', serif;
        font-size: 22px;   
      }
    </style>

<link type="text/css" rel="stylesheet" href="assets/css/digijam2.css" />
<script type="text/javascript" src="assets/js/digijam2.js"></script>

</head>

<?php
require_once 'koneksi.php';
// pengaturan tampilan di hari jumat dan selain jumat
$waktu = $_GET['saat'];
//$waktu = 'shubuh';
//if($waktu==''){ $waktu='dhuhur'; }
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$namahari = date('l', strtotime($tanggal));
if ($namahari=='Friday'){
    $sqx = "select konten,sumber from hadits_jumat where id='8'";
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $teksid = $row['konten'];
    $sumber = $row['sumber'];
} else {
    $sqx = "select konten,sumber from motivasi2 where catatan='$waktu' ORDER BY RAND() limit 1";
    $result = mysqli_query($koneksi,$sqx);
    $row = mysqli_fetch_array($result);
    $teksid = $row['konten'];
    $sumber = $row['sumber'];
}
$resolzz = mysqli_query($koneksi, "select jeda_page from setup_tv");
$setup = mysqli_fetch_array($resolzz);
?>

    <body onload="pindah();waktu();">

    <div id="jam-digital">
        <div id="hours"><p id="jam"></p></div>
        <div id="minute"><p id="menit"></p></div>
        <div id="second"><p id="detik"></p></div>
    </div>
        
                <div>
                    <div>
                    <video autoplay muted loop id="myVideo">
                            <source src="assets/video/tawaf-lowres6.mp4" type="video/mp4">
                        </video>
				    </div>

                    <div id="konten1">
				        <!--<p class=""><h1 class="font-effect-outline"><?php echo $teksar; ?></h1></p>-->
                        <p class=""><h2 class="font-effect-outline"><?php echo $teksid; ?></h2></p>
                        <p class=""><h4 class="font-effect-outline">[ <?php echo $sumber; ?> ]</h4></p>
                    </div>
                    

                </div>

        <script type="text/javascript">
            var namahari = "<?php echo $namahari; ?>";
            function pindah(){
                if ((namahari=='Saturday') || (namahari=='Sunday')){
                    //setTimeout(function(){ window.location.href = 'taklim.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page stlh 30 detik
                    setTimeout(function(){ window.location.href = 'motivasi3.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>);
                } else {
                    setTimeout(function(){ window.location.href = 'jumatan.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page stlh 30 detik
                }
                //setTimeout(function(){ window.location.href = 'motivasi2.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>);
            }
        </script>

    </body>

</html>