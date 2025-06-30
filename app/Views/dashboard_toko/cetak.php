<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Toko - Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        @media print {
            a {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Dashboard - TOKO</h1>
        <p class="fs-5 text-body-secondary"><?= date("l, d-m-Y") ?> <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span></p>
    </div>
    <hr>
    <div class="table-responsive card m-5 p-5">
        <table class="table table-bordered text-center">
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
        <p class="text-end">Dicetak pada: <?= date('Y-m-d H:i:s'); ?></p>
    </div>

    <script>
        function waktu() {
            const waktu = new Date();
            document.getElementById("jam").textContent = waktu.getHours();
            document.getElementById("menit").textContent = waktu.getMinutes();
            document.getElementById("detik").textContent = waktu.getSeconds();
            setTimeout(waktu, 1000);
        }
        waktu();
    </script>

    <script>
        window.print(); // langsung buka print dialog saat dibuka
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>