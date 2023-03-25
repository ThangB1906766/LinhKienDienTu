<?php
     SESSION_start();
     ob_start();
     include('./donHang.php');
    //  include('./hoaDon.php');

     
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

        // Tạo giỏ hàng (insert thông tin vào bản tlb_cart)
        if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0) ){
            foreach ($_SESSION['cart'] as $sanpham){
                addtocart($idDonHang, $sanpham[0], $sanpham[1], $sanpham[2], $sanpham[3], $sanpham[4]);
            }
        }
        
     }
     
?>
    <?php
    // session_start(); 
    // ob_start();
    if (isset($_SESSION['cart'])) {
        // echo var_dump($_SESSION['cart']);
        // echo '<br> Có tiếp tục <a href="thongTinSanPham.php"> đặt hàng </a>';
    ?>
        <!-- End Including Header -->

        <!-- <h1 style="text-align: center;">Giỏ Hàng</h1> -->
        <!-- <h3>ID Đơn hàng: <?=$idDonHang?></h3> -->
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
                $tongTien = 0;
                $i = 0;
                foreach ($_SESSION['cart'] as $sanpham) {
                    $thanhTien = $sanpham[3] * $sanpham[4];
                    $tongTien += $thanhTien;
                    echo '
                        <tr>
                            <td>' . ($i + 1) . '</td>
                            <td><img src="' . $sanpham[2] . '" width="100"></td>
                            <td>' . $sanpham[1] . '</td>
                            <td>' . $sanpham[3] . '</td>
                            <td>' . $sanpham[4] . '</td>
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
       

    <h1 style="text-align: center;">Thông tin đặt hàng</h1>
        <h3>ID Đơn hàng: <?=$idDonHang?></h3>
        <input type="hidden" name="tongdonhang" value="<?=$tongTien?>">
        <table class="datHang">
            <tr>
                <td><input type="text" name="hoten" placeholder="Nhập họ tên"></td>
            </tr>
            <tr>
            <td><input type="text" name="diachi" placeholder="Nhập địa chỉ"></td>
            </tr>
            <tr>
            <td><input type="text" name="email" placeholder="Nhập email"></td>
            </tr>
            <tr>
            <td><input type="text" name="sodienthoai" placeholder="Nhập số điện thoại"></td>
            </tr>
        
        </table>
    

    <?php
    } else {
        echo '<br> Giỏ hàng rỗng. Bạn muốn đặt hàng không <a href="index.php"> đặt hàng </a>';
    }
    ?>
<?php  ob_flush(); ?>