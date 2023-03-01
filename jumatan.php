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
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<?php
date_default_timezone_set('Asia/Jakarta');
$waktu = $_GET['saat'];
//$day = date('w');
//$week_start = date('m-d-Y', strtotime('-'.$day.' days'));
//$week_end = date('m-d-Y', strtotime('+'.(6-$day).' days'));
//$next_jumat = date("d F Y", strtotime('friday this week'));
$next_jumat = date("Y-m-d", strtotime('friday this week'));
$jumat_yad = tgl_indo($next_jumat);
// ambil data jumatan di database
require_once 'koneksi.php';
$sqx = "select khotib,bilal,muadzin,photo_khotib,photo_bilal,photo_muadzin from jumatan where tgl='$next_jumat'";
$result = mysqli_query($koneksi,$sqx);
$row = mysqli_fetch_array($result);
$khotib = $row['khotib'];
$bilal = $row['bilal'];
$muadzin = $row['muadzin'];
$gambar = $row['photo_khotib'];
$gambar2 = $row['photo_bilal'];
$gambar3 = $row['photo_muadzin'];
if ($muadzin==''){ $muadzin=$bilal; }
else { $muadzin=$muadzin; }
if ($gambar==''){ $gambar='ustadz3.jpg'; }
else { $gambar=$gambar; }
if ($gambar2==''){ $gambar2='ustadz3.jpg'; }
else { $gambar2=$gambar2; }
if ($gambar3==''){ $gambar3='ustadz3.jpg'; }
else { $gambar3=$gambar3; }
// fungsi ubah bhs_indonesia
function tgl_indo($tanggal){
 $bulan = array (
 1 =>   'Januari',
 'Februari',
 'Maret',
 'April',
 'Mei',
 'Juni',
 'Juli',
 'Agustus',
 'September',
 'Oktober',
 'November',
 'Desember'
 );
 $pecahkan = explode('-', $tanggal);
 // variabel 0 = tanggal
 // variabel 1 = bulan
 // variabel 2 = tahun
 return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

    <body class="" onload="pindah()">

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-content">

                <!-- [ Main Content ] start -->
                <div class="row">

                    <!-- visitors  start -->
                    <div class="col-sm-12" style="height:80px">
                        <div class="card bg-c-red text-white widget-visitor-card">
                            <div class="card-body text-center" style="margin-bottom: -15px;margin-top: -5px;">
                                <h4 class="text-white" style="margin-top: -10px;">MASJID AL-MADINAH AL-MUNAWWAROH</h4>
                                <h6 class="text-white">Perumahan Bukit Putra Blok E2 no.1, Situsari, Cileungsi, Kabupaten Bogor.</h6>
                                <i class="fas fa-mosque"></i>
                            </div>
                        </div>
                    </div>
                    <!-- visitors  end -->

					<div class="col-sm-12" style="height:90px">
                        <div class="card bg-c-green text-white widget-visitor-card">
                            <div class="card-body text-center" style="margin-bottom: -15px;margin-top: -5px;">
                                <h4 class="text-white" style="margin-top: -5px;">SHOLAT JUMAT TGL : <?php echo $jumat_yad; ?></h4>
                            </div>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade show active" id="user5" role="tabpanel" aria-labelledby="user5-tab" style="width:90%; margin: 0 auto;">
						<div class="row">
						
							<div class="col-xl-4 col-md-4">
								<div class="card user-card user-card-3 support-bar1">
									<div class="card-body ">
										<div class="text-center">
											<img class="img-radius img-fluid wid-150" src="assets/images/khusus/<?php echo $gambar3; ?>" alt="User image" style="border: 3px solid grey;">
											<h3 class="mb-1 mt-3 f-w-400">Bpk.<?php echo $muadzin; ?></h3>
											<p class="mb-3 text-muted">========</p>
										</div>
									</div>
									<div class="card-footer bg-light">
										<div class="row text-center">
											<div class="col">
												<h6 class="mb-1">Muadzin</h6>
												<p class="mb-0"></p>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-md-4">
								<div class="card user-card user-card-3 support-bar1" style="background-color:#ffc">
									<div class="card-body ">
										<div class="text-center">
											<img class="img-radius img-fluid wid-150" src="assets/images/khusus/<?php echo $gambar; ?>" alt="User image" style="border: 3px solid green;">
											<h3 class="mb-1 mt-3 f-w-400">Ust.<?php echo $khotib; ?></h3>
											<p class="mb-3 text-muted">=================</p>
										</div>
									</div>
									<div class="card-footer bg-light">
										<div class="row text-center">
											<div class="col">
												<h6 class="mb-1">Khotib & Imam</h6>
												<p class="mb-0"></p>
											</div>
											
										</div>
									</div>
									
								</div>
							</div>
							<div class="col-xl-4 col-md-4">
								<div class="card user-card user-card-3 support-bar1">
									<div class="card-body ">
										<div class="text-center">
											<div class="position-relative d-inline-block">
												<img class="img-radius img-fluid wid-150" src="assets/images/khusus/<?php echo $gambar2; ?>" alt="User image" style="border: 3px solid grey;">
												<!--<div class="certificated-badge" data-toggle="tooltip" data-placement="right" title="Certificated">
													<i class="fas fa-certificate text-c-blue bg-icon"></i>
													<i class="fas fa-medal front-icon text-white"></i>
												</div>-->
											</div>
											<h3 class="mb-1 mt-3 f-w-400">Bpk.<?php echo $bilal; ?></h3>
											<p class="mb-3 text-muted">==========</p>
										</div>
									</div>
									<div class="card-footer bg-light">
										<div class="row text-center">
											<div class="col">
												<h6 class="mb-1">Bilal</h6>
												<p class="mb-0"></p>
											</div>
											
											</div>
										</div>
									</div>
								</div>
							
							</div>
                        </div>
                    </div>

                    

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
            function pindah(){
                setTimeout(function(){ window.location.href = 'motivasi3.php?saat=<?php echo $waktu; ?>'; }, 20000); // pindah page stlh 30 detik
            }
        </script>

    </body>

</html>