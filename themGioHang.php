<!-- Start Including Header -->
<?php
include('./dbconnection.php');
include('./mainInclude/header.php');
?>

<?php
    SESSION_start();
    ob_start();

    if(!isset($_SESSION['cart'])){ // Nếu chưa có giỏ hàng thì tạo
        $_SESSION['cart'] = array();
    }
    if(isset($_POST['addtocart']) && ($_POST['addtocart'])){ // name="addtocart" in thongTinSanPham.php
        $sp_id = $_POST['sp_id'];
        $sp_ten = $_POST['sp_ten'];
        $sp_hinhAnh = $_POST['sp_hinhAnh'];
        $sp_gia = $_POST['sp_gia'];
        $soLuong = 1;

        // Tìm và so sánh một sản phẩm trong giỏ hàng

        

        // Tạo mảng
        $sanpham = array($sp_id, $sp_ten, $sp_hinhAnh, $sp_gia, $soLuong);

        // Đưa mảng vừa tạo vào session
        array_push($_SESSION['cart'], $sanpham);

        // Chuyển trang
        header('location: giaoDienGioHang.php');     
    }
?>
<!-- End Including Header -->



<!-- Start Including Footer -->
<?php
include('./mainInclude/footer.php')
?>
<!-- End Including Footer -->
