// HTML DOM
    function Tang(x){
        // Thay đổi số lượng trực tiếp với DOM HTML
        var cha = x.parentElement;
        var soLuongCu = cha.children[1];

        var soLuongMoi = parseInt(soLuongCu.innerText) + 1;
        soLuongCu.innerText = soLuongMoi;
        // alert(soLuongCu);

        // Gọi tới hàm cập nhật session

    }


    
    function Giam(x){
        // Thay đổi số lượng trực tiếp với DOM HTML
        var cha = x.parentElement;
        var soLuongCu = cha.children[1];

        if(parseInt(soLuongCu.innerText) > 1){
            var soLuongMoi = parseInt(soLuongCu.innerText) - 1;
            soLuongCu.innerText = soLuongMoi;
        }else{
            alert("Đặt hàng tối thiểu là 1");
        }
        // alert(soLuongCu);

        // Gọi tới hàm cập nhật session
        
    }

    // JQuery
    $(document).ready(function () {
        // Hiểm thị số lượng sản phẩm trong giỏ hàng
        var gioHang = $("#gioHang").children("tr");
        var soLuongSanPham = gioHang.length - 1;
        // alert(soLuongSanPham);
        var boxCart = $("#boxCart").children("span").eq(0);
        // alert(boxCart.length);
        boxCart.text(soLuongSanPham);
        
        // Xóa giỏ hàng class="xoaSanPham"
        $(".xoaSanPham").click(function (e) { 
            e.preventDefault();
            
            var tr = $(this).parent().parent();
            // alert(tr);
            var tenSanPham = tr.children("td").eq(2).text(); // Lấy tên sản phẩm để xóa csdl
            tr.remove();
            // alert(tenSanPham);
        });

        // Thay đổi số lượng khi xóa
        $(".soLuong").change(function (e) { 
            e.preventDefault();
            var soLuong = this.value;
            alert(soLuong);
        });

    });

