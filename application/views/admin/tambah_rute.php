<?php
    if ($this->session->flashdata('flash')) :
?>

<div class="alert alert-<?= $this->session->flashdata('flash')[0]; ?> alert-dismissible fade show mt-3" role="alert"> <?= $this->session->flashdata('flash')[1]; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php endif; ?>

<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalTambahRute" data-backdrop="static" data-keyboard="false">Tambah Rute</button>

<div class = "mt-3">
    <h3> Daftar Rute </h3>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">KENDARAAN</th>
                <th scope="col">BERANGKAT</th>
                <th scope="col">TUJUAN</th>
                <th scope="col">TOTAL SLOT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rute as $rt) : ?>
                <tr>
                    <th scope="row"><?= $rt['ID_RUTE'] ?></th>
                    <td><?= $rt['NAMA_KENDARAAN'] ?></td>
                    <td><?= $rt['BERANGKAT'] ?></td>
                    <td><?= $rt['TUJUAN'] ?></td>
                    <td><?= $rt['TOTAL_SLOT'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambahRute" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="judulModal">Form Tambah Rute</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url() ?>admin/proses_tambah_rute", method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="id_transportasi" class="col-form-label">Transportasi</label>
                    <select class="form-control" id = "id_transportasi" name = 'id_transportasi' required>
                        <option value = "">-- Pilih Transportasi --</option>
                        <?php foreach($kendaraan as $trans) : ?>
                            <option value = "<?= $trans['ID_KENDARAAN'] ?>"><?= $trans['NAMA_KENDARAAN'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Kota Asal</label>     
                    <input type="text" class="form-control" id="berangkat" name="berangkat" placeholder = "Masukan Kota Asal ...." required>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Kota Tujuan</label>     
                    <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder = "Masukan Kota Tujuan ...." required>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Banyak Slot</label>     
                    <input type="text" class="form-control" id="slot" name="slot" placeholder = "Masukan Banyak Slot ...." required>
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