<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlyhocphi')
    or die('failed');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $malop = $_POST["malop"];
        $tenlop = $_POST["tenlop"];
        $manganh = $_POST["manganh"];
     $sql = "INSERT INTO lop (MaLop, Tenlop,MaNganh) VALUES ('$malop', '$tenlop','$manganh')";
     if (mysqli_query($conn, $sql)) {
        echo "Lớp đã được thêm thành công.";
    } else {
        echo "Lỗi thêm lớp: " . mysqli_error($conn);
    }
    $sql_check = "SELECT * FROM lop WHERE MaLop='$malop'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "Mã lớp đã tồn tại. Vui lòng chọn mã lớp khác.";
    } else {
        // Thêm lớp vào bảng lop
        $sql = "INSERT INTO lop (MaLop,Tenlop,MaNganh) VALUES ('$malop', '$tenlop','$manganh')";

        if (mysqli_query($conn, $sql)) {
            echo "Lớp đã được thêm thành công.";
        } else {
            echo "Lỗi thêm lớp: " . mysqli_error($conn);
        }
    }


    mysqli_close($conn);
}

    ?>
    <!DOCTYPE html>
<html>
<head>
    <title>Thêm lớp mới</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Thêm lớp mới</h1>

    <form action="add_class.php" method="POST">
        <label for="malop">Mã lớp:</label>
        <input type="text" name="malop">
        <br>

        <label for="tenlop">Tên lớp:</label>
        <input type="text" name="tenlop">
        <br>

        <label for="tenlop">Mã Ngành:</label>
        <input type="text" name="manganh">
        <br>

        <input type="submit" value="Thêm lớp">
    </form>
</body>
</html>