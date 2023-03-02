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
    <!-- data tables css -->
	<link rel="stylesheet" href="assets/css/plugins/dataTables.bootstrap4.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .segera {
            color:#4680ff; 
            background-color:#e0f2fc
        }
        .nanti {
            color:#000; 
            background-color:#fff
        }
    </style>

</head>

<?php
date_default_timezone_set('Asia/Jakarta');
$waktu=$_GET['saat'];
$saatini=date('Y-m-d');
$tgl=explode('-',$saatini); 
$bln=$tgl[1]; 
$thn=$tgl[0]; 
$ref_date=strtotime( "$saatini" ); 
//$week_of_year=date( 'W', $ref_date );
$week_of_month = $week_of_year - date( 'W', strtotime( "$bln/01/$thn" ) );   
// cek tgl utk minggu bulan ini
$periode_awal = "01-".date("m-Y");
//$periode_akhir = "30-".date("m-Y");
$periode_akhir = date("t-m-Y", strtotime($saatini));

$explodeTgl1 = explode("-", $periode_awal);

$tgl1 = $explodeTgl1[0];
$bln1 = $explodeTgl1[1];
$thn1 = $explodeTgl1[2];
 
$i = 0;
$sum = 0;

do
{
    $tanggal = date("d-m-Y", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));
    if (date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0)
    {
        $sum++;
        $pekan[$sum] = $tanggal;
    }
    $i++;
}
while ($tanggal != $periode_akhir);
// looping di atas akan terus dilakukan selama tanggal yang digenerate tidak sama dengan periode awal.

// ambil data kajian di database
require_once 'koneksi.php';
//$sqx = "select ustadz,tema,catatan from kajian where pekan='$week_of_month'";
$no=1;
$sqx = "select pekan,ustadz,tema,catatan from kajian";
$result = mysqli_query($koneksi,$sqx);
while ($row = mysqli_fetch_array($result)){
    $ustadz[$no] = $row['ustadz'];
    $tema[$no] = $row['tema'];
    $gambar[$no] = $row['catatan'];
    if ($gambar[$no]==''){ $gambar[$no]='ustadz3.jpg'; }
    else { $gambar[$no]=$gambar[$no]; }
    $minggu[$no] = tgl_indo($pekan[$no]);
    $no++;
}
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
 return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
}
$reserzz = mysqli_query($koneksi, "select nama,alamat,telp from organisasi");
$setid = mysqli_fetch_array($reserzz);
$resolzz = mysqli_query($koneksi, "select jeda_page from setup_tv");
$setup = mysqli_fetch_array($resolzz);
// lokasi photo ustadz
$folder_photo = "../simasjid/incl/assets/images/ustadz/";
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
                                <h4 class="text-white" style="margin-top: -10px;"><?php echo strtoupper($setid["nama"]); ?></h4>
                                <h6 class="text-white"><?php echo $setid["alamat"]. ", Telp: ". $setid["telp"]; ?></h6>
                                <i class="fas fa-mosque"></i>
                            </div>
                        </div>
                    </div>
                    <!-- visitors  end -->

					<div class="col-sm-12" style="height:60px">
                        <div class="card bg-c-green text-white widget-visitor-card">
                            <div class="card-body text-center" style="margin-bottom: -15px;margin-top: -5px;">
                                <h4 class="text-white" style="margin-top: -5px;">JADWAL TAKLIM AHAD SHUBUH</h4>
                                
                            </div>
                        </div>
                    </div>

                    
                <div class="col-sm-12" style="padding-top:5px">
				<div class="card user-profile-list">
					<div class="card-body">
						<div class="dt-responsive table-responsive">
							<table id="user-list-table" class="table nowrap">
								<tbody>
									<tr>
										<td><h5 class="m-b-0">Ahad ke-1</h5></td>
										<td><?php echo $minggu[1]; ?></td>
										<td><div class="d-inline-block align-middle">
												<img src="<?php echo $folder_photo.$gambar[1]; ?>" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height:40px;">
												<div class="d-inline-block">
													<h5 class="m-b-0">Ust.<?php echo $ustadz[1]; ?></h5>
													<p class="m-b-0">Tema : <?php echo $tema[1]; ?></p>
												</div>
											</div>
                                        </td>
									</tr>
									<tr>
										<td><h5 class="m-b-0">Ahad ke-2</h5></td>
										<td><?php echo $minggu[2]; ?></td>
										<td><div class="d-inline-block align-middle">
                                        <img src="<?php echo $folder_photo.$gambar[2]; ?>" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height:40px;">
												<div class="d-inline-block">
													<h5 class="m-b-0">Ust.<?php echo $ustadz[2]; ?></h5>
													<p class="m-b-0">Tema : <?php echo $tema[2]; ?></p>
												</div>
											</div>
                                        </td>
									</tr>
									<tr>
										<td><h5 class="m-b-0">Ahad ke-3</h5></td>
										<td><?php echo $minggu[3]; ?></td>
										<td><div class="d-inline-block align-middle">
                                        <img src="<?php echo $folder_photo.$gambar[3]; ?>" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height:40px;">
												<div class="d-inline-block">
													<h5 class="m-b-0">Ust.<?php echo $ustadz[3]; ?></h5>
													<p class="m-b-0">Tema : <?php echo $tema[3]; ?></p>
												</div>
											</div>
                                        </td>
									</tr>
									<tr>
										<td><h5 class="m-b-0">Ahad ke-4</h5></td>
										<td><?php echo $minggu[4]; ?></td>
										<td><div class="d-inline-block align-middle">
                                        <img src="<?php echo $folder_photo.$gambar[4]; ?>" alt="user image" class="img-radius align-top m-r-15" style="width:40px; height:40px;">
												<div class="d-inline-block">
													<h5 class="m-b-0">Ust.<?php echo $ustadz[4]; ?></h5>
													<p class="m-b-0">Tema : <?php echo $tema[4]; ?></p>
												</div>
											</div>
                                        </td>
									</tr>
									
							</table>
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

        <!-- datatable Js -->
        <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>

        <script>
	        $('#user-list-table').DataTable();
        </script>

        <script type="text/javascript">
            function pindah(){
                setTimeout(function(){ window.location.href = 'motivasi2.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page stlh 30 detik
            }
        </script>

    </body>

</html>