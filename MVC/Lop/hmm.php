<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('loi');
$sql = "SELECT * FROM lop";
$data = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>List lớp học</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>THÔNG TIN LỚP</h2>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Mã lớp</th>
                            <th>Tên lớp</th>
                            <th>Mã ngành</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data) && $data != null) {
                            $i = 1;
                            while ($rows = mysqli_fetch_array($data)) {
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rows['MaLop'] ?></td>
                                    <td><?php echo $rows['Tenlop'] ?></td>
                                    <td><?php echo $rows['MaNganh'] ?></td>
                                    <td width="200px" align="center">
                                        <a href="./editlop.php?malop=<?php echo $rows['MaLop'] ?>"><img style="width: 35px;" src="../picture/changee.avif"></a>
                                        <a href="./deletelop.php?malop=<?php echo $rows['MaLop'] ?>"><img style="width: 35px;" src="../picture/deletee.jpg"></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>

</html>