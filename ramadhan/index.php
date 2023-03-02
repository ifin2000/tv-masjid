<!DOCTYPE html>
<html lang="id">

<head>
    <title>Marhaban Ramadhan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

    <style>
        .ityped-cursor {
            font-size: 2.2rem;
            opacity: 1;
            -webkit-animation: blink 0.3s infinite;
            -moz-animation: blink 0.3s infinite;
            animation: blink 0.3s infinite;
            animation-direction: alternate;
        }
        
        @keyframes blink {
            100% {
                opacity: 0;
            }
        }
        
        @-webkit-keyframes blink {
            100% {
                opacity: 0;
            }
        }
        
        @-moz-keyframes blink {
            100% {
                opacity: 0;
            }
        }
    </style>

</head>

<body>

<?php
$waktu = $_GET['saat'];
date_default_timezone_set('Asia/Jakarta');
// akses setting tv
require_once '../koneksi.php';
$resolzz = mysqli_query($koneksi, "select jeda_page,awal_ramadhan from setup_tv");
$setup = mysqli_fetch_array($resolzz);
$rmd = explode(" ", $setup['awal_ramadhan']);
$tglrmd = explode("-", $rmd[0]);
$wktrmd = explode(":", $rmd[1]);
?>

    <div class="bg-img1 size1 overlay1" style="background-image: url('images/bg01.jpg');">
        <div class="size1 p-l-15 p-r-15 p-t-30 p-b-50">

            <div class="flex-w flex-c-m cd100 wsize1 m-lr-auto p-t-56">
                <div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
                    <span class="l1-txt3 p-b-9 days"></span>
                    <span class="s1-txt2">Hari</span>
                </div>

                <div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
                    <span class="l1-txt3 p-b-9 hours"></span>
                    <span class="s1-txt2">Jam</span>
                </div>

                <div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
                    <span class="l1-txt3 p-b-9 minutes"></span>
                    <span class="s1-txt2">Menit</span>
                </div>

                <div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
                    <span class="l1-txt3 p-b-9 seconds"></span>
                    <span class="s1-txt2">Detik</span>
                </div>
            </div>

            <div class="wsize1 m-lr-auto">
                <p class="txt-center l1-txt1 p-b-60" style="padding-bottom: 10px;">
                    <span class="l1-txt2" style="font-size: 40px; color: yellow;">RAMADHAN KARIM</span>
                    <br><span id="ityped"></span>
                </p>

                <p class="txt-center m1-txt1 p-t-1" style="font-size: 20px; color: white;">
                    [penetapan 1 Ramadhan 1444H menunggu keputusan Pemerintah]
                </p>
            </div>

        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/moment.min.js"></script>
    <script src="vendor/countdowntime/moment-timezone.min.js"></script>
    <script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script>
        $('.cd100').countdown100({
            /*Set AWAL RAMADHAN here - Endtime must be > current time*/           
            endtimeYear: <?php echo $tglrmd[0]; ?>,  // tahun
            endtimeMonth: <?php echo $tglrmd[1]; ?>,    // bulan
            endtimeDate: <?php echo $tglrmd[2]; ?>,    // tanggal
            endtimeHours: <?php echo $wktrmd[0]; ?>,   // jam
            endtimeMinutes: <?php echo $wktrmd[1]; ?>, // menit
            endtimeSeconds: <?php echo $wktrmd[2]; ?>,  // detik
            timeZone: "Asia/Jakarta"
        });
    </script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <script src="https://unpkg.com/ityped@1.0.2"></script>
    <script>
        ityped.init(document.querySelector("#ityped"), {
            showCursor: true,
            backSpeed:  20,
            //backDelay:  500,
            strings: ['Ya Allah, sampaikan umurku kepadanya, aamiiinn...']
        })
    </script>

    <script type="text/javascript">
        window.onload = function() {
            pindah();
        }
        function pindah(){
            setTimeout(function(){ window.location.href = '../motivasi1.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page stlh 60 dtk x 15 = 15 menit
        }
    </script>

</body>

</html>