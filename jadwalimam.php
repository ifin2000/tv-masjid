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
    <!-- data tables css -->
	<link rel="stylesheet" href="assets/css/plugins/dataTables.bootstrap4.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<?php
date_default_timezone_set('Asia/Jakarta');
$waktu=$_GET['saat'];
$saatini=date('Y-m-d');

// ambil data imam di database
require_once 'koneksi.php';
$no=1;
$sqx = "select hari,imam,cadangan from imam_rowatib";
$result = mysqli_query($koneksi,$sqx);
while ($row = mysqli_fetch_array($result)){
    $imam1[$no] = $row['imam'];
    $imam2[$no] = $row['cadangan'];
    $hari[$no] = $row['hari'];
    $no++;
}
$resolzz = mysqli_query($koneksi, "select jeda_page from setup_tv");
$setup = mysqli_fetch_array($resolzz);
?>

    <body class="" onload="pindah()">

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-content">

                <!-- [ Main Content ] start -->
                <div class="row">

                    <!--
                    <div class="col-sm-12" style="height:80px">
                        <div class="card bg-c-red text-white widget-visitor-card">
                            <div class="card-body text-center" style="margin-bottom: -15px;margin-top: -5px;">
                                <h4 class="text-white" style="margin-top: -10px;">MASJID AL-MADINAH AL-MUNAWWAROH</h4>
                                <h6 class="text-white">Perumahan Bukit Putra Blok E2 no.1, Situsari, Cileungsi, Kabupaten Bogor.</h6>
                                <i class="fas fa-mosque"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="height:60px">
                        <div class="card bg-c-green text-white widget-visitor-card">
                            <div class="card-body text-center" style="margin-bottom: -15px;margin-top: -5px;">
                                <h4 class="text-white" style="margin-top: -5px;">JADWAL IMAM ROWATIB</h4>
                            </div>
                        </div>
                    </div>-->

                    
                <div class="col-sm-12" style="padding-top:5px">
					<div class="card-body">
						<div class="dt-responsive table-responsive">
							<table id="user-list-table" class="table nowrap">
								<tbody>
                                    <tr>
										<td style="background-color: #31BA00"><h5 class="m-b-0" style="color: white; text-align: center;">HARI</h5></td>
										<td style="background-color: #31BA00">
                                        	<h5 class="m-b-0" style="color: white; text-align: center;">IMAM-1</h5>
										</td>
										<td style="background-color: #31BA00">
                                        	<h5 class="m-b-0" style="color: white; text-align: center;">IMAM-2</h5>
										</td>
									</tr>
									<tr>
										<td style="background-color: #9CCC65"><h5 class="m-b-0" style="color: black; text-align: center;">Senin</h5></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam1[1]; ?></h5>
												</div>
											</div></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam2[1]; ?></h5>
												</div>
											</div>
                                        </td>
									</tr>
									<tr>
										<td style="background-color: #9CCC65"><h5 class="m-b-0" style="color: black; text-align: center;">Selasa</h5></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam1[2]; ?></h5>
												</div>
											</div></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam2[2]; ?></h5>
												</div>
											</div>
                                        </td>
									</tr>
									<tr>
										<td style="background-color: #9CCC65"><h5 class="m-b-0" style="color: black; text-align: center;">Rabu</h5></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam1[3]; ?></h5>
												</div>
											</div></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam2[3]; ?></h5>
												</div>
											</div>
                                        </td>
									</tr>
									<tr>
										<td style="background-color: #9CCC65"><h5 class="m-b-0" style="color: black; text-align: center;">Kamis</h5></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam1[4]; ?></h5>
												</div>
											</div></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam2[4]; ?></h5>
												</div>
											</div>
                                        </td>
									</tr>
									<tr>
										<td style="background-color: #9CCC65"><h5 class="m-b-0" style="color: black; text-align: center;">Jumat</h5></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam1[5]; ?></h5>
												</div>
											</div></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam2[5]; ?></h5>
												</div>
											</div>
                                        </td>
									</tr>
                                    <tr>
										<td style="background-color: #9CCC65"><h5 class="m-b-0" style="color: black; text-align: center;">Sabtu</h5></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam1[6]; ?></h5>
												</div>
											</div></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam2[6]; ?></h5>
												</div>
											</div>
                                        </td>
									</tr>
                                    <tr>
										<td style="background-color: #9CCC65"><h5 class="m-b-0" style="color: black; text-align: center;">Ahad</h5></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam1[7]; ?></h5>
												</div>
											</div></td>
										<td><div class="d-inline-block align-middle">
                                        		<div class="d-inline-block">
													<h5 class="m-b-0"><?php echo $imam2[7]; ?></h5>
												</div>
											</div>
                                        </td>
									</tr>
							</table>
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
                setTimeout(function(){ window.location.href = 'motivasi1.php?saat=<?php echo $waktu; ?>'; }, <?php echo $setup['jeda_page'] * 1000; ?>); // pindah page stlh 30 detik
            }
        </script>

    </body>

</html>