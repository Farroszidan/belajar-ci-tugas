<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal text-body-emphasis">Dashboard - TOKO</h1>
    <p class="fs-5 text-body-secondary">
        <?= date("l, d-m-Y") ?>
        <span id="jam">00</span>:<span id="menit">00</span>:<span id="detik">00</span>
    </p>
</div>
<hr>
<div class="table-responsive card m-5 p-5">
    <table class="table text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Total Harga</th>
                <th>Ongkir</th>
                <th>Status</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transactions)): ?>
                <?php $i = 1; ?>
                <?php foreach ($transactions as $item): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= esc($item['username']) ?></td>
                        <td><?= esc($item['alamat']) ?></td>
                        <td><?= number_format($item['total_harga'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['ongkir'], 0, ',', '.') ?></td>
                        <td><?= esc($item['status']) ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($item['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Tidak ada data transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <center>
        <a href="<?= base_url('dashboard-toko/cetak') ?>" target="_blank">Cetak</a>
    </center>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        function updateClock() {
            const now = new Date();
            document.getElementById("jam").textContent = now.getHours().toString().padStart(2, '0');
            document.getElementById("menit").textContent = now.getMinutes().toString().padStart(2, '0');
            document.getElementById("detik").textContent = now.getSeconds().toString().padStart(2, '0');
        }
        updateClock();
        setInterval(updateClock, 1000);
    });
</script>
<?= $this->endSection() ?>