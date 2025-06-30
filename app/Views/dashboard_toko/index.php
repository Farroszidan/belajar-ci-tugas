<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal text-body-emphasis">Dashboard - TOKO</h1>
    <p class="fs-5 text-body-secondary"><?= date("l, d-m-Y") ?> <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span></p>
</div>
<hr>
<div class="table-responsive card m-5 p-5">
    <table class="table text-center">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 10%;">Username</th>
                <th style="width: 30%;">Alamat</th>
                <th style="width: 10%;">Total Harga</th>
                <th style="width: 10%;">Ongkir</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 25%;">Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php if (!empty($penjualan)): ?>
                <?php foreach ($penjualan as $item): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= esc($item['username']) ?></td>
                        <td><?= esc($item['alamat']) ?></td>
                        <td><?= esc($item['total_harga']) ?></td>
                        <td><?= esc($item['ongkir']) ?></td>
                        <td><?= esc($item['status']) ?></td>
                        <td><?= esc($item['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <center>
        <a href="<?= base_url('dashboard-toko/cetak') ?>" target="_blank">Cetak</a>
    </center>
</div>

<script>
    function waktu() {
        var waktu = new Date();
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
        setTimeout(waktu, 1000);
    }
    waktu();
</script>

<?= $this->endSection() ?>