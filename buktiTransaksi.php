<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Transaksi</title>
    <!-- Link Icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container pt-5 pb-5">
        <?php 
        class Shell {
            public $jenis;
            public $harga;
            public $jumlah;
            public $ppn;

            public function __construct($jenis, $harga, $jumlah, $ppn) {
                $this->jenis = $jenis;
                $this->harga = $harga;
                $this->jumlah = $jumlah;
                $this->ppn = $ppn;
            }

            public function totalHarga() {
                $totalHarga = $this->harga * $this->jumlah;
                $totalPpn = $totalHarga * ($this->ppn / 100);
                return $totalHarga + $totalPpn;
            }

            public function hargaPpn() {
                $totalHarga = $this->harga * $this->jumlah;
                $totalPpn = $totalHarga * ($this->ppn / 100);
                return $totalPpn;
            }
        }

        class Beli extends Shell {
            public function __construct($jenis, $harga, $jumlah, $ppn) {
                parent::__construct($jenis, $harga, $jumlah, $ppn);
            }

            public function buktiTransaksi() {
                $hargaDasar = number_format($this->harga, 0, ",", ".");
                $totalHarga = number_format($this->totalHarga(), 0, ",", ".");
                $hargaPpn = number_format($this->hargaPpn(), 0, ",", ".");

                return "Jenis bahan bakar : " . $this->jenis . "<br> Jumlah liter : " . $this->jumlah . " liter <br> Harga per liter : Rp" . $hargaDasar . "<br> Harga dasar : Rp" . number_format($this->harga * $this->jumlah, 0, ",", ".") . "<br> PPN (10%) : Rp" . $hargaPpn . "<br> Total yang harus dibayar : Rp" . $totalHarga;
            }
        }

        $harga = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ppn = 10;
            $jenis = isset($_POST["jenis"]) ? $_POST["jenis"] : "";
            $jumlah = isset($_POST["jumlah"]) ? intval($_POST["jumlah"]) : 0;

            switch ($jenis) {
                case 'Shell Super':
                    $harga = 15420;
                    break;
                case 'Shell V-Power':
                    $harga = 16000;
                    break;
                case "Shell V-Power Diesel":
                    $harga = 18310;
                    break;
                case "Shell V-Power Nitro":
                    $harga = 16510;
                    break;
                default:
                    $harga = 0;
                    break;
            }
        }

        if ($harga > 0) {
            $beli = new Beli($jenis, $harga, $jumlah, $ppn);
            echo "<div class='container'>
                    <div class='row justify-content-center'>
                        <div class='col-md-7'>
                            <div class='text-center border border-primary shadow rounded p-5 ' style='box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>
                                <h1 class='text-primary'>Bukti Transaksi</h1>";
            echo $beli->buktiTransaksi();
            echo "<br>
                                <div class='text-start'>
                                    <a href='index.php' class='btn btn-primary mt-4'><i class='bx bx-left-arrow-alt'></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>";
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert' style='color: red;'>
                    Jenis bahan bakar tidak valid!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }
        ?>

    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
