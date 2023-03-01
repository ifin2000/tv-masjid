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
?>

    <div class="bg-img1 size1 overlay1" style="background-image: url('images/bg01.jpg');">
        <div class="size1 p-l-15 p-r-15 p-t-30 p-b-50">

            <div class="wsize1 m-lr-auto">
                <p class="txt-center l1-txt1 p-b-60" style="padding-bottom: 20px; padding-top: 30px;">
                    <span class="l1-txt2" style="font-size: 36px; color: yellow;">6 AMALAN SUNNAH SHOLAT IDUL FITRI</span>
                </p>

                <p class="txt-center m1-txt1 p-t-1" style="font-size: 30px; color: white; width:780px; line-height:48px;">
                1. Mandi Besar (mandi seperti mandi janabat).<br>
                2. Memakai Pakaian Terbaik dan Wewangian.<br>
                3. Gunakan Rute berbeda saat Berangkat & Pulang.<br>
                4. Makan dahulu sebelum berangkat Sholat Ied.<br>
                5. Mengumandangkan Takbir sebanyak-banyaknya.<br>
                6. Saling mengucapkan "Taqabbalallahu minna wa minkum" kepada sesama Muslim.
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
            strings: ['kecuali PUASA, sesungguhnya puasa itu untukKu dan Akulah yang akan memberinya pahala langsung.']
        })
    </script>

    <script type="text/javascript">
        window.onload = function() {
            pindah();
        }
        function pindah(){
            setTimeout(function(){ window.location.href = '../motivasi1.php?saat=<?php echo $waktu; ?>'; }, 60000); // pindah page stlh 60 dtk x 15 = 15 menit
        }
    </script>

</body>

</html>