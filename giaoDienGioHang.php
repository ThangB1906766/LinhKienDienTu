<!-- Start Including Header -->
<?php
include('./dbconnection.php');
include('./mainInclude/header.php');
?>
<?php
    // session_start(); 
    // ob_start();
    if( isset($_SESSION['cart']) ){
    //    echo var_dump($_SESSION['cart']);
       // echo '<br> Có tiếp tục <a href="thongTinSanPham.php"> đặt hàng </a>';
?>
<!-- End Including Header -->


<div class="boxcenter">
        <h2>ĐƠN HÀNG CỦA BẠN</h2>
        <table style="border-collapse:collapse; ">
            <tr>
                <th>STT</th>
                <th>Hình</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
            <?php
                $tongTien=0;
                $i=0;
                foreach($_SESSION['cart'] as $sanpham ){
                    $thanhTien = $sanpham[3] * $sanpham[4];
                    $tongTien+=$thanhTien;
                    echo '
                        <tr>
                            <td>'.($i+1).'</td>
                            <td><img src="'.$sanpham[2].'" width="100"></td>
                            <td>'.$sanpham[1].'</td>
                            <td>'.$sanpham[3].'</td>
                            <td>'.$sanpham[4].'</td>
                            <td>'.$thanhTien.'</td>
                            <td style="text-align:center"><a href="xoaGioHang.php?id='.$i.'">Xóa</a></td>
                        </tr>
                    ';
                    $i++;
                }
            ?> 
            <!-- <tr>
                <td>1</td>
                <td>hinh</td>
                <td>tensp</td>
                <td>don gia</td>
                <td>sl</td>
                <td>thanhtien</td>
                <td style="text-align:center"><a href="#">Xóa</a></td>
            </tr> -->
            <tr>
                <td colspan="5">Tổng đơn hàng</td>
                <td style="background-color: #CCC;"><?php echo $tongTien ?></td>
                <td></td>
            </tr>

        </table>
        <p><a href="index.php">Tiếp tục đặt hàng?</a></p>
        <p><a href="xoaGioHang.php">Xóa giỏ hàng?</a></p>
    </div>

    <?php
        } else {
            echo '<br> Giỏ hàng rỗng. Bạn muốn đặt hàng không <a href="index.php"> đặt hàng </a>';
        }
    ?>
<!-- Start Including Footer -->
<?php
include('./mainInclude/footer.php')
?>
<!-- End Including Footer -->
