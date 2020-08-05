<?php
    if ($this->session->flashdata('flash')) :
?>

<div class="alert alert-<?= $this->session->flashdata('flash')[0]; ?> alert-dismissible fade show mt-3" role="alert"> <?= $this->session->flashdata('flash')[1]; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php endif; ?>

<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalTambahKendaraan" data-backdrop="static" data-keyboard="false">Tambah Kendaraan</button>

<div class = "mt-3">
    <h3> Daftar Kendaraan </h3>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">KENDARAAN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kendaraan as $kd) : ?>
                <tr>
                    <th scope="row"><?= $kd['ID_KENDARAAN'] ?></th>
                    <td><?= $kd['NAMA_KENDARAAN'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambahKendaraan" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="judulModal">Form Tambah Kendaraan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url() ?>admin/proses_tambah_kendaraan", method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label">Nama Kendaraan</label>     
                    <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" placeholder = "Masukan Nama Kendaraan ...." required>
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