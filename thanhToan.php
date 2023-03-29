<?php
    include('./mainInclude/header.php');
    //  SESSION_start();
    //  ob_start();
     include('./donHang.php');
    //  include('./hoaDon.php');
     
    // Nếu click button Thanh toán
     if((isset($_POST['thanhToan'])) && (isset($_POST['thanhToan']))){
        // Lấy dữ liệu khi lick thanh toán
        $tongDonHang = $_POST['tongdonhang'];
        $hoTen = $_POST['hoten'];
        $diaChi = $_POST['diachi'];
        $email = $_POST['email'];
        $sdt = $_POST['sodienthoai'];
        $pttt = $_POST['pttt'];
        // Tạo mã đơn hàng
        $maDonHang = "LKDT".rand(0,999999);
        // Tạo đơn hàng (insert thông tin vào bản tlb_order)
        $idDonHang=taoDonHang($maDonHang, $tongDonHang, $pttt, $hoTen, $diaChi, $email, $sdt); // donHang.php

        $_SESSION['idDonHang'] = $idDonHang;
        // Tạo giỏ hàng (insert thông tin vào bản tlb_cart)
        if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0) ){
            foreach ($_SESSION['cart'] as $sanpham){
                addtocart($idDonHang, $sanpham[0], $sanpham[1], $sanpham[2], $sanpham[3], $sanpham[4]);
            }
            // Xóa giỏ hàng sau khi đặt
            unset($_SESSION['cart']);
        }
        
     }
     
?>

<!-- Giao diện thông tin sau khi thanh toán -->
<div class="container text-center">
  <div class="row">
    <div class="col-9">
    <?php
    // Hiển thị đơn hàng vừa thanh toán
    if(isset($_SESSION['idDonHang']) && ($_SESSION['idDonHang'] > 0)){
    $getShowCart = getShowCart($idDonHang);
    if (isset($getShowCart) && (count($getShowCart) > 0)) {
            ?>
             <h1 style="text-align: center;">Thông tin đặt hàng</h1>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Hình</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    // $sanpham = array($sp_id, $sp_ten, $sp_hinhAnh, $sp_gia, $soLuong);
                        $tongTien = 0;
                        $i = 0;
                        foreach ($getShowCart as $sanpham) {
                            $thanhTien = $sanpham['soLuong'] * $sanpham['donGia'];
                            $tongTien += $thanhTien;
                            echo '
                                <tr>
                                    <td>' . ($i + 1) . '</td>
                                    <td><img src="' . $sanpham['img'] . '" width="100"></td>
                                    <td>' . $sanpham['tenSanPham'] . '</td>
                                    <td>' . $sanpham['donGia'] . '</td>
                                    <td>' . $sanpham['soLuong'] . '</td>
                                    <td>' . $thanhTien . '</td>
                                
                                </tr>
                            ';
                            $i++;
                        }
                        ?>
                        <tr>
                            <td colspan="5">Tổng đơn hàng</td>
                            <td style="background-color: #CCC;"><?php echo $tongTien ?></td>
                            <td></td>
                        </tr>

                    </tbody>
    <?php
            }
    ?>    
    </div>
    <div class="col">
    <?php
        // Hiển thị thông tin người đặt
         if(isset($_SESSION['idDonHang']) && ($_SESSION['idDonHang'] > 0)){
            $orderInfor = getOderInfor($_SESSION['idDonHang']);
            if(count($orderInfor) > 0){
        ?>  
                    <table class="datHang">
                        <tr>
                            <td><h1>Thông tin người đặt</h1></td>
                        </tr>
                        <tr>
                            <td><h4>Mã đơn hàng: <?=$orderInfor[0]['madh']?> </h4></td>
                        </tr>
                        <tr>
                            <td>Tên người nhận: <?=$orderInfor[0]['name']?> </td>
                        </tr>
                        <tr>
                        <td>Địa chỉ người nhận: <?=$orderInfor[0]['address']?> </td>
                        </tr>
                        <tr>
                        <td>Email người nhận: <?=$orderInfor[0]['email']?> </td>
                        </tr>
                        <tr>
                        <td>Điện thoại người nhận: <?=$orderInfor[0]['tel']?></td>
                        </tr>

                        <tr>
                            <td>Phương thức thanh toán
                            <?php
                                switch ($orderInfor[0]['pttt']) {
                                    case '1':
                                        $txtMess="Thanh toán khi nhận hàng";
                                        break;
                                    case '2':
                                        $txtMess="Thanh toán khi giao hàng";
                                        break;
                                    default:
                                        $txtMess="Quý khách chưa chọn ...";
                                        break;
                                }
                                echo $txtMess;
                            ?></td>
                        </tr>
                    
                    </table>
                
                    <?php
                    }
        }
        ?>
    <?php
        }
    ?>
    </div>
  </div>
 
</div>

<?php  
include('./mainInclude/footer.php');
ob_flush(); 
?>