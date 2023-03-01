window.setTimeout("waktu()", 1000);

function waktu() {
    var tanggal = new Date();
    setTimeout("waktu()", 1000);
    var hours = tanggal.getHours();
    var minutes = tanggal.getMinutes();
    var seconds = tanggal.getSeconds();
    if (tanggal.getHours() < 10) { hours = '0' + tanggal.getHours(); }
    if (tanggal.getMinutes() < 10) { minutes = '0' + tanggal.getMinutes(); }
    if (tanggal.getSeconds() < 10) { seconds = '0' + tanggal.getSeconds(); }
    document.getElementById("jam").innerHTML = hours;
    document.getElementById("menit").innerHTML = minutes;
    document.getElementById("detik").innerHTML = seconds;
}