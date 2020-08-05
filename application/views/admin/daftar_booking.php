<?php
    if ($this->session->flashdata('flash')) :
?>

<div class="alert alert-<?= $this->session->flashdata('flash')[0]; ?> alert-dismissible fade show mt-3" role="alert"> <?= $this->session->flashdata('flash')[1]; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php endif; ?>

<div class = "mt-3">
    <h3> Daftar Jadwal Keberangkatan </h3>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">ID BOOKING</th>
                <th scope="col">ID_KARYAWAN</th>
                <th scope="col">NAMA_KARYAWAN</th>
                <th scope="col">KENDARAAN</th>
                <th scope="col">RUTE</th>
                <th scope="col">SLOT</th>
                <th scope="col">STATUS</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($daftar_booking as $db) : ?>
                <tr>
                    <th scope="row"><?= $db['ID_BOOKING'] ?></th>
                    <td><?= $db['ID_KARYAWAN'] ?></td>
                    <td><?= $db['NAMA_KARYAWAN'] ?></td>
                    <td><?= $db['NAMA_KENDARAAN'] ?></td>
                    <td><?= $db['RUTE'] ?></td>
                    <td><?= $db['PERMINTAAN_SLOT'] ?></td>
                    <?php if ($db['STATUS'] == "Menunggu" || $db['STATUS'] == "") { ?>
                        <td>Menunggu Konfirmasi</td>
                        <td>
                            <div class = "row">
                                <div class = "col">
                                    <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>admin/update_StatusBooking/<?= $db['ID_BOOKING'] ?>/approve" role="button">Approve</a>
                                </div>
                                <div class = "col">
                                    <a class="btn btn-danger btn-sm" href="<?= base_url(); ?>admin/update_StatusBooking/<?= $db['ID_BOOKING'] ?>/reject" role="button">Reject</a>
                                </div>
                            </div>
                        </td>
                    <?php } else { ?> 
                        <td><?= $db['STATUS'] ?></td>
                        <td>-</td>
                    <?php } ?>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>