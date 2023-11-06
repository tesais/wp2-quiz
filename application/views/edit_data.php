<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<style>
    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
        margin: 20px 0;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    select,
    input[type="radio"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[readonly] {
        background-color: #eee;
    }

    button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    button:hover {
        background-color: #1e87d6;
    }
</style>

<body>
    <h1>Edit Data Tiket Pesawat</h1>
    <form action="<?= base_url('lat1/update') ?>" method="post">
        <input type="hidden" name="id" value="<?= $penumpang->id ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?= $penumpang->nama ?>" required><br>

        <label for="pesawat">Pesawat:</label>
        <select name="pesawat" id="pesawat">
            <option value="GRD" <?= ($penumpang->pesawat == 'GRD') ? 'selected' : '' ?>>Garuda</option>
            <option value="MPT" <?= ($penumpang->pesawat == 'MPT') ? 'selected' : '' ?>>Merpati</option>
            <option value="BTV" <?= ($penumpang->pesawat == 'BTV') ? 'selected' : '' ?>>Batavia</option>
        </select><br>

        <label>Kelas:</label>
        <input type="radio" name="kelas" value="Bisnis" <?= ($penumpang->kelas == 'Bisnis') ? 'checked' : '' ?>> Bisnis
        <input type="radio" name="kelas" value="Ekonomi" <?= ($penumpang->kelas == 'Ekonomi') ? 'checked' : '' ?>> Ekonomi
        <input type="radio" name="kelas" value="Eksklusif" <?= ($penumpang->kelas == 'Eksklusif') ? 'checked' : '' ?>> Eksklusif<br>

        <label for="jml_tiket">Jumlah Tiket:</label>
        <input type="number" name="jml_tiket" id="jml_tiket" value="<?= $penumpang->jml_tiket ?>" required><br>

        <label for="harga">Harga Tiket:</label>
        <input type="text" name="harga" id="harga" value="<?= $penumpang->harga ?>" readonly><br>

        <label for="total_harga">Total Harga Tiket:</label>
        <input type="text" name="total" id="total_harga" value="<?= $penumpang->total ?>" readonly><br>

        <button type="submit">Update</button>
        <button type="button" onclick="window.location.href='<?= base_url('lat1') ?>'">Kembali</button>
    </form>

    <script>
        // Fungsi untuk mengatur harga tiket berdasarkan pilihan kode pesawat dan kelas
        function updateHargaTiket() {
            var pesawat = document.getElementById('pesawat').value;
            var kelas = document.querySelector('input[name="kelas"]:checked').value;

            var hargaTiket = 0;

            if (pesawat === 'GRD') {
                if (kelas === 'Bisnis') {
                    hargaTiket = 900000;
                } else if (kelas === 'Ekonomi') {
                    hargaTiket = 500000;
                } else if (kelas === 'Eksklusif') {
                    hargaTiket = 1500000;
                }
            } else if (pesawat === 'MPT') {
                if (kelas === 'Bisnis') {
                    hargaTiket = 800000;
                } else if (kelas === 'Ekonomi') {
                    hargaTiket = 400000;
                } else if (kelas === 'Eksklusif') {
                    hargaTiket = 1200000;
                }
            } else if (pesawat === 'BTV') {
                if (kelas === 'Bisnis') {
                    hargaTiket = 700000;
                } else if (kelas === 'Ekonomi') {
                    hargaTiket = 300000;
                } else if (kelas === 'Eksklusif') {
                    hargaTiket = 1000000;
                }
            }

            var jmlTiket = parseInt(document.getElementById('jml_tiket').value);
            var totalHarga = hargaTiket * jmlTiket;

            document.getElementById('harga').value = hargaTiket;
            document.getElementById('total_harga').value = totalHarga;
        }

        // Panggil fungsi updateHargaTiket ketika ada perubahan pada pesawat, kelas, atau jumlah tiket
        document.getElementById('pesawat').addEventListener('change', updateHargaTiket);
        document.querySelectorAll('input[name="kelas"]').forEach(function(radio) {
            radio.addEventListener('change', updateHargaTiket);
        });
        document.getElementById('jml_tiket').addEventListener('change', updateHargaTiket);

        // Panggil fungsi updateHargaTiket saat halaman pertama kali dimuat
        updateHargaTiket();
    </script>
</body>

</html>
