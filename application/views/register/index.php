<?php
    if ($this->session->flashdata('flash')) :
?>

<div class="alert alert-<?= $this->session->flashdata('flash')[0]; ?> alert-dismissible fade show mt-3" role="alert"> <?= $this->session->flashdata('flash')[1]; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php if ($this->session->flashdata('flash')[0] == "success") : ?>
    <div class="card mt-3">
        <div class="card-header">
            Your Booking Information
        </div>
        <div class="card-body">
            <center>
                <label> Kode Booking </label>
                <h1> <?= $booking['ID_BOOKING'] ?> </h1>
                <label> <?= $booking['ID_KARYAWAN'] ?> </label> <br>
                <label> <?= $booking['NAMA_KARYAWAN'] ?> </label> <br>  
                <label> <?= $booking['NAMA_KENDARAAN'] ?> </label> <br>
                <label> <?= $booking['RUTE'] ?> </label> <br>
                <label> Jadwal Berangkat : <?= $booking['DATE'] ?> </label>
            </center>
        </div>
    </div>
    <?php unset($_SESSION['karyawan_ID']) ?>
<?php endif; ?>


<?php endif; ?>

<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalRegister" data-backdrop="static" data-keyboard="false">Daftar Booking</button>

<div class="jumbotron mt-3">
    <center>
    <h1 class="display-4">Booking Information</h1>
    <p class="lead">Dapatkan informasi booking yang sudah anda lakukan.</p>
    <hr class="my-4">
    <div class = "row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <input class = "form-control input-lg" type = "text" id = "kodeTiket" name = "kodeTiket" placeholder = "Masukan kode tiket anda .....">
        </div>
        <div class="col-sm-2">
        </div>
    </div>
    <button class ="btn btn-primary mt-2" type="button" onclick = "get_DetailBooking('<?= base_url() ?>')">Cari</button>
    </center>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="judulModal">Form Booking</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url() ?>register/addBooking", method="post">
            <div class="modal-body">
                    <input id = "hdnInput" name = "hdnInput" type = "hidden">
                    <div class="form-group">
                        <label for="id_karyawan" class="col-form-label">ID Karyawan</label>     
                        <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" placeholder = "Masukan ID Karyawan ...." required>
                    </div>
                    <div class="form-group">
                        <label for="id_transportasi" class="col-form-label">Transportasi</label>
                        <select class="form-control" id = "id_transportasi" name = 'id_transportasi' onchange = "get_Rute(this.value, '<?= base_url() ?>')" required>
                            <option value = "">-- Pilih Transportasi --</option>
                            <?php foreach($transportasi as $trans) : ?>
                                <option value = "<?= $trans['ID_KENDARAAN'] ?>"><?= $trans['NAMA_KENDARAAN'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_rute" class="col-form-label">Rute</label>  
                        <select class="form-control" id = "id_rute" name = 'id_rute' required onchange = "get_JadwalBerangkatByRuteID(this.value, '<?= base_url() ?>')">
                            <option value = "">-- Pilih Rute --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_jadwal" class="col-form-label">Jadwal Keberangkatan</label>
                        <select class="form-control" id = "id_jadwal" name = 'id_jadwal' required>
                            <option value = "">-- Pilih Jadwal Keberangkatan --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Banyak Penumpang</label>     
                        <input type="number" class="form-control" id="slot" name="slot" placeholder = "Masukan Banyak Penumpang ...." required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetailBooking" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="judulModalDetailBooking">Detail Booking</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="", method="post">
                <div class="form-group">
                    <label for="idBooking">Kode Booking</label>
                    <input type="text" class="form-control" id="idBooking" readonly>
                </div>
                <div class="form-group">
                    <label for="idKaryawan_Booking">ID Karyawan</label>
                    <input type="text" class="form-control" id="idKaryawan_Booking" readonly>
                </div>
                <div class="form-group">
                    <label for="namaKaryawan_Booking">Nama Karyawan</label>
                    <input type="text" class="form-control" id="namaKaryawan_Booking" readonly>
                </div>
                <div class="form-group">
                    <label for="slot_Booking">Slot Booking</label>
                    <input type="text" class="form-control" id="slot_Booking" readonly>
                </div>
                <div class="form-group">
                    <label for="date_Booking">Tanggal Booking</label>
                    <input type="text" class="form-control" id="date_Booking" readonly>
                </div>
                <div class="form-group">
                    <label for="status_Booking">Status Booking</label>
                    <input type="text" class="form-control" id="status_Booking" readonly>
                </div>
                <div class="form-group">
                    <label for="dateApprove_Booking">Tanggal Verifikasi Booking</label>
                    <input type="text" class="form-control" id="dateApprove_Booking" readonly>
                </div>
                <div class="form-group">
                    <label>Kode Tiket</label>
                    <input type="text" class="form-control" id="tiket" readonly>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRespon" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalRespon">Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label id="txtRespon"></label>
            </div>
        </div>
    </div>
</div>
