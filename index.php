<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart TV Masjid :: SIMASJID</title>
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
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- jam analog css -->
    <link rel="stylesheet" href="assets/css/jam-analog.css">

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
    </style>
</head>

<?php
// akses setting tv
require_once 'koneksi.php';
$result = mysqli_query($koneksi, "select id,nama,alamat,telp,bank,norek,anrek from organisasi");
$row = mysqli_fetch_array($result);
$resolzz = mysqli_query($koneksi, "select jeda_page,bg_image_cover,awal_ramadhan from setup_tv");
$setup = mysqli_fetch_array($resolzz);
// GET FROM API
date_default_timezone_set('Asia/Jakarta');
$thn = date('Y');
$bln = date('m');
$tgl = date('d');
$url = 'https://api.myquran.com/v1/sholat/jadwal/'.$row['id'].'/'.$thn.'/'.$bln.'/'.$tgl;     // $row['id']: kode kab/kota -> sumber API https://documenter.getpostman.com/view/841292/Tz5p7yHS#intro
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response = json_decode($response_json, true);
$shubuh = $response['data']['jadwal']['subuh'];
$terbit = $response['data']['jadwal']['terbit'];
$dhuhur = $response['data']['jadwal']['dzuhur'];
$ashar = $response['data']['jadwal']['ashar'];
$maghrib = $response['data']['jadwal']['maghrib'];
$isya = $response['data']['jadwal']['isya'];
// variabel utk javascript
$saatsekarang = date("Y-m-d H:i:s");
$saatshubuh = date("Y-m-d")." ".$shubuh.":00";
$saatdhuhur = date("Y-m-d")." ".$dhuhur.":00";
$saatashar = date("Y-m-d")." ".$ashar.":00";
$saatmaghrib = date("Y-m-d")." ".$maghrib.":00";
$saatisya = date("Y-m-d")." ".$isya.":00";
// bandingkan waktuu terdekat sekarang dgn waktu sholat
if (($saatsekarang > $saatisya) && ($saatsekarang < $saatshubuh)){
    $skrg = 'shubuh'; // ke shubuh
    $pakai = $saatshubuh;
} else if (($saatsekarang > $saatmaghrib) && ($saatsekarang < $saatisya)){
    $skrg = 'isya'; // ke isya
    $pakai = $saatisya;
} else if (($saatsekarang > $saatashar) && ($saatsekarang < $saatmaghrib)){
    $skrg = 'maghrib'; // ke maghrib
    $pakai = $saatmaghrib;
} else if (($saatsekarang > $saatdhuhur) && ($saatsekarang < $saatashar)){
    $skrg = 'ashar'; // ke ashar
    $pakai = $saatashar;
} else if (($saatsekarang > $saatshubuh) && ($saatsekarang < $saatdhuhur)){
    $skrg = 'dhuhur'; // ke dhuhur
    $pakai = $saatdhuhur;
} else if ($saatsekarang < $saatshubuh) {
    $skrg = 'shubuh'; // ke shubuh 
    $pakai = $saatshubuh;
} else {
    $skrg = 'shubuh'; // ke shubuh hari berikutnya
    $pakai = date('Y-m-d', strtotime('+9 hours'));   
}
?>

    <body class="">

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-content">

                <div>
				    <img class="img-fluid" src="../simasjid/incl/assets/images/<?php echo $setup['bg_image_cover']; ?>" alt="Card image" style="opacity: 0.9; height: 100%; width:200%; left:-50px">
				</div>

                <!-- [ Main Content ] start -->
                <div class="row">

                    <!-- visitors  start -->
                    <div class="col-sm-12" style="height:80px">
                        <div class="card bg-c-red text-white widget-visitor-card">
                            <div class="card-body text-center" style="margin-bottom: -15px;margin-top: -5px;">
                                <h4 class="text-white" style="margin-top: -10px;"><?php echo strtoupper($row["nama"]); ?></h4>
                                <h6 class="text-white"><?php echo $row["alamat"]. ", Telp: ". $row["telp"]; ?></h6>
                                <i class="fas fa-mosque"></i>
                            </div>
                        </div>
                    </div>
                                            <div class="col-xs-6 col-sm-6">     <!-- aslinya <div class="col-sm-12">-->
                                                <div class="card user-profile-list" style="opacity: 0.8;">
                                                    <div class="card-body">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="user-list-table" class="table nowrap">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <!-- <img src="assets/images/user/avatar-1.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;"> -->
                                                                            <div class="d-inline-block">
                                                                                <h4 class="m-b-0">SHUBUH</h4>
                                                                                    <p class="m-b-0"></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red;"><?php echo $shubuh; ?></h3>
                                                                    </td>
                                                                </tr>
                                                                <!--<tr>
                                                                <td>
                                                                    <div class="d-inline-block align-middle">
                                                                        <div class="d-inline-block">
                                                                            <h4 class="m-b-0">TERBIT</h4>
                                                                                <p class="m-b-0"></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><h4 style="color: red;"><?php echo $terbit; ?></h5></td>
                                                                </tr>-->
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <!-- <img src="assets/images/user/avatar-3.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;"> -->
                                                                            <div class="d-inline-block">
                                                                                <h4 class="m-b-0">DHUHUR</h4>
                                                                                    <p class="m-b-0"></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red;"><?php echo $dhuhur; ?></h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <!-- <img src="assets/images/user/avatar-4.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;"> -->
                                                                            <div class="d-inline-block">
                                                                                <h4 class="m-b-0">ASHAR</h4>
                                                                                    <p class="m-b-0"></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red;"><?php echo $ashar; ?></h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <!-- <img src="assets/images/user/avatar-4.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;"> -->
                                                                            <div class="d-inline-block">
                                                                                <h4 class="m-b-0">MAGHRIB</h4>
                                                                                    <p class="m-b-0"></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red;"><?php echo $maghrib; ?></h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <!-- <img src="assets/images/user/avatar-5.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;"> -->
                                                                            <div class="d-inline-block">
                                                                                <h4 class="m-b-0">ISYA</h4>
                                                                                    <p class="m-b-0"></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red;"><?php echo $isya; ?></h3>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                    <div class="col-xs-6 col-sm-6">
                        <div class="card user-card2" style="opacity: 0.8;">
                            <div class="card-body text-center">
                                <div style="width:100%;text-align:center">
                                    <div style="display:inline-block;margin:0 auto"><object type="image/svg+xml" data="https://www.al-habib.info/islamic-clock/images/station-clock-allah-muhammad.dyn.svg?di=austria&hh=swiss&bgo=allah&dic=167175&hhc=001d1f&bgoc=adeaf3&bglc=2eab92" width="320" height="320"></object><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="https://widgets.al-habib.info/images/blank.gif?_alhacid=iclock001-1616236730">
                                    </div>
                                </div>
                            </div>
                            <div style="text-align:center;"><p id="countdown" style="padding-top:10px"></p></div>
                        </div>
                    </div>

                    <!-- liveline1-section start -->
                    <div class="col-xs-12 col-sm-12" style="margin-top: -40px;">
                        <div id="stastic-slider-full4" class="carousel slide stastic-slider-full-card" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="12000">
                                    <div class="row no-gutters">
                                        <div class="col-xs-12 col-sm-12">
                                            <div class="card bg-dark rounded-0 shadow-none">
                                                <div class="card-body d-flex justify-content-between align-items-center">
                                                    <span class="text-white d-flex justify-content-center align-items-center">... dan mohon lah pertolongan (kepada Allah) dengan sabar dan sholat. Dan (sholat) itu sungguh berat, kecuali bagi yang khusyu'</span>
                                                    <h6 class="badge badge-light-primary float-rightd-inline-block m-0"></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" data-interval="12000">
                                    <div class="row no-gutters">
                                        <div class="col-xs-12 col-sm-12">
                                            <div class="card bg-dark rounded-0 shadow-none">
                                                <div class="card-body d-flex justify-content-between align-items-center">
                                                    <span class="text-white d-flex justify-content-center align-items-center">infaq/sodaqoh silahkan transfer ke >> <?php echo $row["bank"]." no.".$row["norek"]." a/n ".$row["anrek"]; ?></span>
                                                    <h6 class="badge badge-light-primary float-rightd-inline-block m-0"></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- liveline1-section end -->

                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <!-- Required Js -->
        <script src="assets/js/vendor-all.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/ripple.js"></script>
        <script src="assets/js/pcoded.min.js"></script>

        <script type="text/javascript">
            const secondHand = document.querySelector('.jarum_detik');
            const minuteHand = document.querySelector('.jarum_menit');
            const jarum_jam = document.querySelector('.jarum_jam');

            function setDate() {
                const now = new Date();

                const seconds = now.getSeconds();
                const secondsDegrees = ((seconds / 60) * 360) + 90;
                secondHand.style.transform = `rotate(${secondsDegrees}deg)`;
                if (secondsDegrees === 90) {
                    secondHand.style.transition = 'none';
                } else if (secondsDegrees >= 91) {
                    secondHand.style.transition = 'all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1)'
                }

                const minutes = now.getMinutes();
                const minutesDegrees = ((minutes / 60) * 360) + 90;
                minuteHand.style.transform = `rotate(${minutesDegrees}deg)`;

                const hours = now.getHours();
                const hoursDegrees = ((hours / 12) * 360) + 90;
                jarum_jam.style.transform = `rotate(${hoursDegrees}deg)`;
            }

        </script>

        <script type="text/javascript">
            window.onload = function() {
                //jam();
                pindah();
            }

            function jam() {
                var e = document.getElementById('isi-jam'),
                    d = new Date(),
                    h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());

                e.innerHTML = h + ':' + m + ':' + s;

                setTimeout('jam()', 1000);
            }

            function set(e) {
                e = e < 10 ? '0' + e : e;
                return e;
            }
        
            function pindah(){
                var countDownDate = new Date("<?php echo $pakai; ?>").getTime();
                var ramadhan = new Date('<?php echo $setup["awal_ramadhan"]; ?>');     // awal ramadhan
                // Update the count down every 1 second
                var x = setInterval(function() {
                  var now = new Date().getTime();
                
                  var distance = countDownDate - now;
                
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  document.getElementById("countdown").innerHTML = " "+ hours + " jam " + minutes + " mnt " + seconds + " dtk menuju waktu <?php echo $skrg; ?>";
                  if (distance <= 0) {
                    clearInterval(x);
                    window.location.href = 'kosong.php?saat=<?php echo $skrg; ?>'; // pindah page stlh ... detik
                  } else if ((hours==0) && (minutes<=8)) {
                    // tetap di tampilan jam saat kurang dari 8 menit menuju awal waktu sholat
                  } else {
                    //setTimeout(function(){ window.location.href = 'jadwalimam.php?saat=<?php echo $skrg; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page jadwal imam
                    if (now >= ramadhan){
                        setTimeout(function(){ window.location.href = 'kajianumum.php?saat=<?php echo $skrg; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page awal ramadhan
                    } else {
                        setTimeout(function(){ window.location.href = 'ramadhan/index.php?saat=<?php echo $skrg; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page count-down ramadhan
                    }
                  }
                }, 1000);

            }
        </script>

    </body>

</html>