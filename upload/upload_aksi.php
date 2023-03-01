<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filejadwal']['name']) ;
move_uploaded_file($_FILES['filejadwal']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filejadwal']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filejadwal']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

  $var1 = $data->val($i, 1);  
  $var2 = $data->val($i, 2);  
  $var3 = $data->val($i, 3); 
  $var4 = $data->val($i, 4); 
  $var5 = $data->val($i, 5); 
  $var6 = $data->val($i, 6);  
  $var7 = $data->val($i, 7);  
  $var8 = $data->val($i, 8);  
  $var9 = $data->val($i, 9);  
  /*$var10 = $data->val($i, 10);  
  $var11 = $data->val($i, 11);  
  $var12 = $data->val($i, 12);  
  $var13 = $data->val($i, 13); 
  $var14 = $data->val($i, 14); 
  $var15 = $data->val($i, 15); 
  $var16 = $data->val($i, 16);  
  $var17 = $data->val($i, 17);  
  $var18 = $data->val($i, 18);  
  $var19 = $data->val($i, 19);  
  $var20 = $data->val($i, 20);  
  $var21 = $data->val($i, 21);  
  $var22 = $data->val($i, 22);  
  $var23 = $data->val($i, 23); 
  $var24 = $data->val($i, 24); 
  $var25 = $data->val($i, 25); 
  $var26 = $data->val($i, 26);  
  $var27 = $data->val($i, 27);  
  $var28 = $data->val($i, 28);  
  $var29 = $data->val($i, 29);
  $var30 = $data->val($i, 30);*/

	//$query = "INSERT INTO data_warga_blank VALUES('$var1','$var2','','$var3','$var4','$var5','$var6','$var7','$var8','$var9','$var10','$var11','$var12','$var13','$var14','$var15','$var16','$var17','$var18','$var19','$var20','$var21','$var22','$var23','$var24','$var25','$var26','$var27','$var28','$var29','$var30')";
  $query = "INSERT INTO jadwalsholat VALUES('$var1','$var2','$var3','$var4','$var5','$var6','$var7','$var8','$var9')";
  $hasil = mysqli_query($koneksi,$query); 
  $berhasil++;

}

// hapus kembali file .xls yang di upload tadi 
unlink($_FILES['filejadwal']['name']);

// alihkan halaman ke index.php
header("location:upload.php?berhasil=$berhasil");
?>