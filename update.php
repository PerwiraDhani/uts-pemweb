<?php
require_once "config.php";

$pesan = "";
 
    if(isset($_GET["id"])){
        
    }
        $id =  ($_GET["id"]);
        
        $sql = "SELECT * FROM donasi WHERE id=$id";
        $result = mysqli_query($db, $sql);
        $data = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) < 1 ){
            die("Data tidak ditemukan...");
        }
        
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Profil Donatur dan Pesan</h2>
                    <p>Silahkan ubah nama, no handphone dan tambahkan pesan yang ingin disampaikan</p>
                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                        <h2 class="mt-5">Profil Donatur </h2>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label>No. Handphone</label>
                            <input type="text" class="form-control" name="noHp" value="<?php echo $data['noHp'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Pesan</label>
                            <textarea class="form-control"  name="pesan" value="<?php echo $data['pesan'] ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update Data" name="Submit">
                            <a href="show.php" class="btn btn-secondary ml-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST["Submit"])){
    $id = $_POST["id"];

    $pesan = $_POST['pesan'];
    $noHp = $_POST["noHp"];
    $input_name = $_POST['nama'];
    if(empty($input_name)){
        $name_err = "Tidak boleh kosong.";
    } else{
        $name = $input_name;
    }

    if(empty($name_err)){
        $sql = "UPDATE donasi SET nama='$name', pesan='$pesan', noHp='$noHp' WHERE id='$id'";
        $stmt = mysqli_query($db, $sql);
    
            if($stmt){
                header("location: show.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }       
            unset($stmt);
        }
    unset($db);
}
?>