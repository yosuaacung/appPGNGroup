<?php
    if ($this->session->flashdata('flash')) :
?>

<div class="alert alert-<?= $this->session->flashdata('flash')[0]; ?> alert-dismissible fade show mt-3" role="alert"> <?= $this->session->flashdata('flash')[1]; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php endif; ?>

<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalTambahJadwal" data-backdrop="static" data-keyboard="false">Tambah Jadwal Keberangkatan</button>

<div class = "mt-3">
    <h3> Daftar Jadwal Keberangkatan </h3>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">KENDARAAN</th>
                <th scope="col">BERANGKAT</th>
                <th scope="col">TUJUAN</th>
                <th scope="col">JADWAL KEBERANGKATAN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($jadwal as $jd) : ?>
                <tr>
                    <th scope="row"><?= $jd['ID_JADWAL'] ?></th>
                    <td><?= $jd['NAMA_KENDARAAN'] ?></td>
                    <td><?= $jd['BERANGKAT'] ?></td>
                    <td><?= $jd['TUJUAN'] ?></td>
                    <td><?= $jd['DATE'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="judulModal">Form Tambah Jadwal Keberangkatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url() ?>admin/proses_tambah_jadwal_keberangkatan", method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="id_transportasi" class="col-form-label">Transportasi</label>
                    <select class="form-control" id = "id_transportasi" name = 'id_transportasi' onchange = "get_Rute(this.value, '<?= base_url() ?>')" required>
                        <option value = "">-- Pilih Transportasi --</option>
                        <?php foreach($kendaraan as $trans) : ?>
                            <option value = "<?= $trans['ID_KENDARAAN'] ?>"><?= $trans['NAMA_KENDARAAN'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_rute" class="col-form-label">Rute</label>  
                    <select class="form-control" id = "id_rute" name = 'id_rute' required>
                        <option value = "">-- Pilih Rute --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Jadwal Keberangkatan</label> 
                    <input class = "form-control" type="datetime-local" id="jadwal_keberangkatan" name="jadwal_keberangkatan">
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