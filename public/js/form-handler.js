function hitungSelisihTanggal(tanggalBerangkat, tanggalKembali) {
    var satuHari = 24 * 60 * 60 * 1000;
    var tanggalBerangkatObj = new Date(tanggalBerangkat);
    var tanggalKembaliObj = new Date(tanggalKembali);
    var selisihHari = Math.round(
        Math.abs((tanggalBerangkatObj - tanggalKembaliObj) / satuHari)
    );
    return selisihHari;
}

$("#tanggal-berangkat, #tanggal-kembali").on("change", function () {
    var tanggalBerangkat = $("#tanggal-berangkat").val();
    var tanggalKembali = $("#tanggal-kembali").val();
    var selisihHari = hitungSelisihTanggal(tanggalBerangkat, tanggalKembali);
    $("#jumlah-hari").val(selisihHari);
});

function totaluang(jumlahHari, uangHarian) {
    var total = Math.round(Math.abs(jumlahHari * parseFloat(uangHarian)));
    return total;
}

$("#jumlah-hari, #uang-perhari").on("change", function () {
    var jumlahHari = $("#jumlah-hari").val();
    var uangHarian = $("#uang-perhari").val();
    var totalUang = totaluang(jumlahHari, uangHarian);
    $("#uang-total").val(totalUang);
});

function jumlahbiaya(totalUang, biayaAkomodasi, biayaLain, biayaTiket) {
    var jumlahBiaya = Math.round(
        Math.abs(
            parseFloat(totalUang) +
                parseFloat(biayaAkomodasi) +
                parseFloat(biayaLain) +
                parseFloat(biayaTiket)
        )
    );
    return jumlahBiaya;
}

$("#uang-total, #biaya-akomodasi, #biaya-lain, #biaya-tiket").on(
    "change",
    function () {
        var totalUang = $("#uang-total").val();
        var biayaAkomodasi = $("#biaya-akomodasi").val();
        var biayaLain = $("#biaya-lain").val();
        var biayaTiket = $("#biaya-tiket").val();
        var jumlahBiaya = jumlahbiaya(
            totalUang,
            biayaAkomodasi,
            biayaLain,
            biayaTiket
        );
        $("#jumlah-biaya").val(jumlahBiaya);
    }
);

$(function () {
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if (month < 10) month = "0" + month.toString();

    if (day < 10) day = "0" + day.toString();

    var minDate = year + "-" + month + "-" + day;
    $("#tanggal-berangkat").attr("min", minDate);
    $("#tanggal-kembali").attr("min", minDate);
});

function calculateDays(startDate, endDate) {
    const start = new Date(startDate);
    const end = new Date(endDate);
    const timeDiff = end - start;
    const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
    return daysDiff;
}

document.getElementById('mulai-kontrak-modal').addEventListener('change', function() {
    const startDate = this.value;
    const endDate = document.getElementById('berakhir-kontrak-modal').value;
    if (startDate && endDate) {
        const days = calculateDays(startDate, endDate);
        document.getElementById('jumlah-hari-kontrak-modal').value = days;
    }
});

document.getElementById('berakhir-kontrak-modal').addEventListener('change', function() {
    const startDate = document.getElementById('mulai-kontrak-modal').value;
    const endDate = this.value;
    if (startDate && endDate) {
        const days = calculateDays(startDate, endDate);
        document.getElementById('jumlah-hari-kontrak-modal').value = days;
    }
});

document.getElementById('mulai-adendum-modal').addEventListener('change', function() {
    const startDate = this.value;
    const endDate = document.getElementById('berakhir-adendum-modal').value;
    if (startDate && endDate) {
        const days = calculateDays(startDate, endDate);
        document.getElementById('jumlah-hari-adendum-modal').value = days;
    }
});

document.getElementById('berakhir-adendum-modal').addEventListener('change', function() {
    const startDate = document.getElementById('mulai-adendum-modal').value;
    const endDate = this.value;
    if (startDate && endDate) {
        const days = calculateDays(startDate, endDate);
        document.getElementById('jumlah-hari-adendum-modal').value = days;
    }
});