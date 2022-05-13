<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1400px;
            margin: 0 auto;
        }
        table tr td{
            /* width: 100%; */
            height: 200px;            
        }

        td:nth-child(1) {
        width: 50px;
        }
        td:nth-child(4) {
        width: 150px;
        }
        td:nth-child(7) {
        width: 200px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Riwayat Donasi</h2>
                        <a href="timeline.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> DONASI</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM donasi";
                    if($result = mysqli_query($db, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped table-responsive-lg" id="table">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>No</th>";
                                        echo "<th>Nama Donatur</th>";
                                        echo "<th>Kategori Donasi</th>";
                                        echo "<th>Keterangan Donasi</th>";
                                        echo "<th>Jumlah</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Pesan</th>";
                                        echo "<th>No. HP</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['kategori'] . "</td>";
                                        echo "<td>" . $row['keterangan'] . "</td>";
                                        echo "<td>" . $row['jumlah'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['pesan'] . "</td>";
                                        echo "<td>" . $row['noHp'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Data tidak ditemukan.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
</body>
</html>