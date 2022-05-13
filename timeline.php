<?php

require_once "auth.php";
require_once "config.php";

$pesan = $kategori = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $kategori = $_POST['kategori'];
    $ket = $_POST['keterangan'];

    $input_jumlah = $_POST['jumlah'];
    if(empty($input_jumlah)){
        $jumlah_err = "Tidak boleh kosong.";
    } else{
        $jumlah = $input_jumlah;
    }

    $dates = $_POST['dates'];


    $pesan = $_POST['pesan'];
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $noHp = $_POST['noHp'];    
    if(empty($jumlah_err)){
    $sql = "INSERT INTO donasi (nama, kategori, keterangan, jumlah, date, pesan, noHP) 
            VALUES ('$name', '$kategori', '$ket', '$jumlah', '$dates', '$pesan', '$noHp')";
    $stmt = mysqli_query($db, $sql);

        if($stmt){
            header("location: show.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        
         
        unset($stmt);
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function tampilkan(){
        var kat=document.getElementById("form").kategori.value;
        if (kat=="Zakat")
            {
                document.getElementById("keterangan").innerHTML="<option value='Zakat Fitrah'>Zakat Fitrah</option><option value='Zakat Fidyah'>Zakat Fidyah</option><option value='Zakat Kafarat'>Zakat Kafarat</option><option value='Zakat Maal'>Zakat Maal</option><option value='Zakat Fitrah'>Zakat Fitrah</option><option value='Zakat Penghasilan'>Zakat Penghasilan</option>";
            }
        else if (kat=="Pendidikan")
            {
                document.getElementById("keterangan").innerHTML="<option value='Beasiswa'>Beasiswa</option><option value='Bantuan Biaya Pendidikan'>Bantuan Biaya Pendidikan</option><option value='Bangun Sekolah di Pelosok'>Bangun Sekolah di Pelosok</option><option value='Pojok Baca Sekolah Pelosok Negeri'>Pojok Baca Sekolah Pelosok Negeri</option><option value='Institut Kemandirian'>Institut Kemandirian</option><option value='Bantu Guru Indonesia'>Bantu Guru Indonesia</option>";
            }
            else if (kat=="Kemanusiaan")
            {
                document.getElementById("keterangan").innerHTML="<option value='Sembako Untuk Isoman'>Sembako Untuk Isoman</option><option value='Bangun Masjid Terdampak Bencana'>Bangun Masjid Terdampak Bencana</option><option value='Darurat Banjir Indonesia'>Darurat Banjir Indonesia</option><option value='Air Untuk Kehidupan'>Air Untuk Kehidupan</option><option value='Foodbank Palestine'>Foodbank Palestine</option><option value='Save Al-Aqsa'>Save Al-Aqsa</option>";
            }
        }
    </script>
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
        .jumbotron{
         height : 5px;
}
    </style>
</head>
<body>
    <nav class = "navbar navbar-dark bg-primary">
    <form class="form-outline">
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <a href="show.php" class="btn btn-success">Lihat Riwayat Donasi</a>
        </form>
    </nav>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Pilihan Donasi </h2>
                    <form class="was-validated" id="form" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                        <label>Kategori</label>
								<div class="form-select">
									<select id="kategori" onchange="tampilkan()" name="kategori" class="form-control custom-select" required>	
                                        <option value="" selected >Select an Option</option>										
                                        <option value="Zakat">Zakat</option>
                                        <option value="Pendidikan" >Pendidikan</option>
                                        <option value="Kemanusiaan" >Kemanusiaan</option>												
                                    </select>
							    </div>
						</div>
                        <div class="form-group">
                        <label>Pengkhususan Donasi</label>
							<div class="form-select">
                                <select id="keterangan" name="keterangan" class="form-control custom-select" required>
                                <option value="" selected disabled hidden>Select an Option</option>
                                </select>
							</div>
						</div>
                        <div class="form-group">
                            <label>Jumlah Donasi</label>
                            <input type="number" class="form-control <?php echo (!empty($jumlah_err)) ? 'is-invalid' : ''; ?>" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Donasi</label>
                            <br>
                            <div id="date-picker" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                                <input placeholder="Select date" name="dates" type="date" id="datepicker" class="form-control" required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Pesan</label>
                            <textarea class="form-control"  name="pesan" value="<?php echo $pesan; ?>"></textarea>
                        </div>
                        <hr style="border-top: 3px double black">
                        <h2 class="mt-5">Profil Donatur </h2>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo  $_SESSION["user"]["nama"] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION["user"]["email"] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>No. Handphone</label>
                            <input type="text" class="form-control" name="noHp" value="<?php echo $_SESSION["user"]["no_hp"] ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Donasi Sekarang">
                            <a href="show.php" class="btn btn-secondary ml-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>