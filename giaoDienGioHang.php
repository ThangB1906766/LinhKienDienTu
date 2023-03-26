<!-- Start Including Header -->
<?php
include('./dbconnection.php');
include('./mainInclude/header.php');
?>

<div class="container text-center">
  <div class="row">
    <div class="col-9">
    <?php
    // session_start(); 
    // ob_start();
    if (isset($_SESSION['cart'])) {
        // echo var_dump($_SESSION['cart']);
        // echo '<br> Có tiếp tục <a href="thongTinSanPham.php"> đặt hàng </a>';
    ?>
        <!-- End Including Header -->
        <h1 style="text-align: center;">Giỏ Hàng</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Xóa</th>

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
                            <td style="text-align:center"><a href="xoaGioHang.php?id=' . $i . '">Xóa</a></td>
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
        </table>
        <p><a href="index.php">Tiếp tục đặt hàng?</a></p>
        <p><a href="xoaGioHang.php">Xóa giỏ hàng?</a></p>


    </div>
    <div class="col-3">
    <h3 style="text-align: center;">Thông tin đặt hàng</h3>
    <form action="thanhtoan.php" method="POST">
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
            <tr>
                <td>Phương thức thanh toán <br>
                    <input type="radio" name="pttt" value="1"> Thanh toán khi nhận hàng <br>
                    <input type="radio" name="pttt" value="2"> Thanh toán khi giao hàng <br>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Thanh toán" name="thanhToan"></td>
            </tr>
        </table>
    </form>

    <?php
    } else {
        echo '<br> Giỏ hàng rỗng. Bạn muốn đặt hàng không <a href="index.php"> đặt hàng </a>';
    }
    ?>
    </div>
  </div>
</div>


   
<!-- Start Including Footer -->
<?php
include('./mainInclude/footer.php')
?>
<!-- End Including Footer -->