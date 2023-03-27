
<?php
    session_start();
    ob_start();
    if(isset($_POST['sp_soLuong']) && ($_POST['sp_soLuong'])){
        $sp_id = $_POST['sp_id'];
        $sp_soLuong = $_POST['sp_soLuong'];

        if(isset($_POST['sp_soLuong']) && ($_POST['sp_soLuong'] >0)){
            $soLuong = $_POST['sp_soLuong'];
        }else{
            $soLuong = 1;
        }
       
        $i=0;
        $sp_soLuong=0;
        foreach ($_SESSION['cart'] as $sanpham) {
            if($sanpham[0] == $sp_id){
                // Cập nhật số lượng
                $soLuong += $sanpham[4];
                
                // Cập nhật số lượng mới dô giỏ hàng
                $_SESSION['cart'][$i][4] = $soLuong; // Cập nhật cột thứ 4(Số lượng) trong tại vị trí $i trong giỏ hàng
                $sp_soLuong= $_SESSION['cart'][$i][4];
                echo $sp_soLuong;
                break;
            }
        }
       
    }
?>
