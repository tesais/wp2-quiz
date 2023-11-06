<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pesawat</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('background.jpg');
            /* Ganti dengan URL gambar latar belakang Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
        }

        .card {
            background-color: #f8f9fa;
            border: none;
            border-radius: 10px;
        }

        .card-title {
            font-size: 24px;
            color: #333;
        }

        .card-text {
            color: #666;
        }

        h1 {
            color: #fff;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Tiket Pesawat</h1>
        <div class="actions">
            <a href="<?= base_url('lat1/input') ?>" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="row">
            <?php foreach ($penumpang as $p) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nomor Tiket: <?= '0' . $p->id ?></h5>
                            <p class="card-text">Nama : <?= $p->nama ?></p>
                            <p class="card-text">Pesawat : <?= $p->pesawat ?></p>
                            <p class="card-text">Kelas : <?= $p->kelas ?></p>
                            <p class="card-text">Harga : <?= $p->harga ?></p>
                            <p class="card-text">Jumlah : <?= $p->jml_tiket ?></p>
                            <p class="card-text">Total : <?= $p->harga * $p->jml_tiket ?></p>
                        </div>
                        <div class="actions">
                            <a href="<?= base_url('lat1/edit/' . $p->id) ?>" class="btn btn-primary">Edit</a>
                            <a href="<?= base_url('lat1/hapus/' . $p->id) ?>" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>