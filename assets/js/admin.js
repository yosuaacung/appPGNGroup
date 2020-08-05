
function get_JadwalBerangkatByRuteID(obj, strlink){    
    $.ajax({
        method: 'post',
        url: strlink + 'register/get_JadwalBerangkatByRuteID',
        data: {id : obj},
        dataType: 'json',
        success: function(data){
            $('#id_jadwal').empty();
            $('#id_jadwal').append($('<option>', {
                value: '',
                text: '-- Pilih Jadwal Keberangkatan --'
            }));
            data.forEach(element => {
                $('#id_jadwal').append($('<option>', {
                    value: element.ID_JADWAL,
                    text: element.DATE
                }));
            });
        },
        error: function (request, error) {
            alert(" Can't do because: " + error);
        }
    });
}

function get_Rute(obj, strlink){    
    $.ajax({
        method: 'post',
        url: strlink + 'register/get_Rute',
        data: {id : obj},
        dataType: 'json',
        success: function(data){
            $('#id_rute').empty();
            $('#id_rute').append($('<option>', {
                value: '',
                text: '-- Pilih Rute --'
            }));
            data.forEach(element => {
                $('#id_rute').append($('<option>', {
                    value: element.ID_RUTE,
                    text: element.BERANGKAT + ' - ' + element.TUJUAN
                }));
            });
        },
        error: function (request, error) {
            alert(" Can't do because: " + error);
        }
    });
}

function get_DetailBooking(strlink){
    var obj = $('#kodeTiket').val();
    if (obj == ""){
        $('#txtRespon').text("Tidak Ada Data");
        $('#modalRespon').modal("show");
        return;
    }
    $.ajax({
        method: 'post',
        url: strlink + 'register/get_BookingByID',
        data: {id : obj},
        dataType: 'json',
        success: function(data){
            if (data == undefined || data.length == 0){
                $('#txtRespon').text("Tidak Ada Data");
                $('#modalRespon').modal("show");
            } else {
                $('#idBooking').val(data['ID_BOOKING']);
                $('#idKaryawan_Booking').val(data['ID_KARYAWAN']);
                $('#namaKaryawan_Booking').val(data['NAMA_KARYAWAN']);
                $('#slot_Booking').val(data['PERMINTAAN_SLOT']);
                $('#date_Booking').val(data['CRT_DT']);
                $('#status_Booking').val(data['STATUS']);
                $('#dateApprove_Booking').val(data['VALIDATION_DATE']);
                $('#modalDetailBooking').modal("show");
            }
        },
        error: function (request, error) {
            alert(" Can't do because: " + error);
        }
    });
}
