<div class="jumbotron mt-3">
    <h1 class="display-4">MUDIS</h1>
    <p class="lead">Mudik Gratis Karyawan PGN Group dan Keluarga.</p>
    <hr class="my-4">
    <p>Klik tombol di bawah ini untuk booking tiket.</p>
    <a class="btn btn-primary btn-lg" href="<?= base_url(); ?>register" role="button">GO</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kendaraan</th>
            <th scope="col">Berangkat</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Total Slot</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1; 
            foreach($rute as $rt) : 
        ?>
        <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $rt['NAMA_KENDARAAN'] ?></td>
            <td><?= $rt['BERANGKAT'] ?></td>
            <td><?= $rt['TUJUAN'] ?></td>
            <td><?= $rt['TOTAL_SLOT'] ?></td>
        </tr>
        <?php
            $i += 1; 
            endforeach; 
        ?>
    </tbody>
</table>
