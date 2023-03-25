<?php

    // include_once("./dbconnection.php");
    // $conn;
    include('./connectdb.php');
    
     function taoDonHang($maDonHang, $tongDonHang, $pttt, $hoTen, $diaChi, $email, $sdt){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_order (madh, tongdonhang, pttt, name, address, email, tel)
                VALUE ('$maDonHang', '$tongDonHang', '$pttt', '$hoTen', '$diaChi', '$email', '$sdt')";
        // if($conn->query($sql)===true){
        //     $last_id = $conn->insert_id;
        // }
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return $last_id;

     }


    //$sanpham = array($sp_id, $sp_ten, $sp_hinhAnh, $sp_gia, $soLuong);
    function addtocart($idDonHang, $sp_id, $sp_ten, $sp_hinhAnh, $sp_gia, $soLuong){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_cart (id_order, id_sanPham, tenSanPham, img, donGia, soLuong)
                VALUE ('".$idDonHang."', '".$sp_id."', '".$sp_ten."', '".$sp_hinhAnh."', '".$sp_gia."', '".$soLuong."')";
        $conn->exec($sql);
        
     }
?>
