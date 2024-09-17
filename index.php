<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container border border-primary shadow rounded col-md-6 pt-5 pb-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center text-primary mb-4">Bahan Bakar</h1>
                <form action="buktiTransaksi.php" method="post">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Jenis Bahan Bakar</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="" disabled selected hidden>Pilih jenis bahan bakar</option>
                            <option value="Shell Super">Shell Super</option>
                            <option value="Shell V-Power">Shell V-Power</option>
                            <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                            <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Jumlah Liter</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>  
                    <button type="submit" name="beli" class="btn btn-primary w-100">Beli</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
