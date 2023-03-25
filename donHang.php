<?php
    include('./connectdb.php');
     function taoDonHang($maDonHang, $tongDonHang, $pttt, $hoTen, $diaChi, $email, $sdt){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_order (madh, tongdonhang, pttt, name, address, email, tel)
                VALUE ('$maDonHang', '$tongDonHang', '$pttt', '$hoTen', '$diaChi', '$email', '$sdt')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return $last_id;

     }
    function addtocart($idDonHang, $sp_id, $sp_ten, $sp_hinhAnh, $sp_gia, $soLuong){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_cart (id_order, id_sanPham, tenSanPham, img, donGia, soLuong)
                VALUE ('".$idDonHang."', '".$sp_id."', '".$sp_ten."', '".$sp_hinhAnh."', '".$sp_gia."', '".$soLuong."')";
        $conn->exec($sql); 
     }

     function getShowCart($idDonHang){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE id_order = $idDonHang");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
     }

     function getOderInfor($idDonHang){ 
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE id = $idDonHang");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
     }
?>
