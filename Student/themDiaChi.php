
<?php
include_once("../dbconnection.php");

if (isset($_POST['stusignup']) && isset($_POST['hoten']) && isset($_POST['sodienthoai']) && isset($_POST['sonha'])) {
    $hoten = $_POST['hoten'];
    $sodienthoai = $_POST['sodienthoai'];
    $sonha = $_POST['sonha'];
    $thanhpho;
    $tinh;
    $huyen;
    $email =  $_POST['email'];

    $key_tp = $_POST['thanhpho']; // key = mã thành phố
    $key_tinh = $_POST['tinh'];
    $key_huyen = $_POST['huyen']; 

    $sql_jone = "SELECT tpho.name as tp_ten, tinh.name as tinh_ten, huyen.name as huyen_ten, tpho.matp as id_tp, tinh.maqh as id_tinh, huyen.xaid as id_huyen
    FROM devvn_tinhthanhpho tpho
    JOIN devvn_quanhuyen tinh
       ON tpho.matp = tinh.matp
    JOIN devvn_xaphuongthitran huyen 
       ON tinh.maqh = huyen.maqh
                 WHERE  tpho.matp = '$key_tp' AND tinh.maqh = '$key_tinh' AND huyen.xaid = '$key_huyen'";
    $result = $conn->query($sql_jone);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $thanhpho = $row['tp_ten'];
            $tinh = $row['tinh_ten'];
            $huyen = $row['huyen_ten'];
        }
    }

    $sql = "INSERT INTO diachi(dc_hoten, dc_sdt, dc_sonha, dc_thanhpho, dc_tinh, dc_xa, nm_email) VALUE ('$hoten' ,'$sodienthoai', '$sonha', '$thanhpho', '$tinh', '$huyen', '$email')";

    if ($conn->query($sql) == TRUE) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}

?>
<?php  
include("./stuInclude/footer.php");
?>
