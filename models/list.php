<?php 
    function get_list_danhmuc() {
        global $db;
        $query = "SELECT * FROM danhmuc ORDER BY madanhmuc";
        $list = $db->query($query);
        $list = $list->fetchAll();
        return $list;
    }
	function get_sanpham_dm($madanhmuc) {
        global $db;
        $query = "SELECT * FROM sanpham WHERE madanhmuc = '$madanhmuc' ORDER BY masp";
        $product = $db->query($query);
        $product = $product->fetchAll();
        return $product;
	}
    function get_sanpham_chitiet($masp) {
        global $db;
        $query = "SELECT * FROM sanpham WHERE masp = '$masp'";
        $product = $db->query($query);
        $product = $product->fetchAll();
        return $product;
    }
    function search_sp($input) {
        global $db;
        $query = "SELECT * FROM sanpham WHERE tensp LIKE '%$input%'";
        $list = $db->query($query);
        $list = $list->fetchAll();
        return $list;
    }
    function add_cart($masp,$hinhanh,$tensp,$gia,$soluong) {

        if ($soluong < 1) return;
        if (isset($_SESSION['cart_guitar_1'][$masp])) {
        $soluong += $_SESSION['cart_guitar_1'][$masp]['soluong'];
        update_item($masp, $soluong);
        return;
        }
        // add item
        $total = $gia * $soluong;
        $item = array(
            'hinhanh' => $hinhanh,
            'tensp' => $tensp,
            'gia' => $gia,
            'soluong'  => $soluong,
            'total'=> $total
        );
        $_SESSION['cart_guitar_1'][$masp] = $item;
    }

    function update_item ($masp, $soluong)  {
    $soluong = (int)$soluong;
    if (isset($_SESSION['cart_guitar_1'][$masp])) {
        if ($soluong <= 0) {
            unset($_SESSION['cart_guitar_1'][$masp]);
        }
        else {
            $_SESSION['cart_guitar_1'][$masp]['soluong'] = $soluong;
            $total = $_SESSION['cart_guitar_1'][$masp]['gia'] * $_SESSION['cart_guitar_1'][$masp]['soluong'];
            $_SESSION['cart_guitar_1'][$masp]['total'] = $total;
            }
        }
    }
    function get_subtotal() {
        $subtotal  = 0;
        foreach ($_SESSION['cart_guitar_1'] as $item) {
            $subtotal += $item['total'];
        }
        return $subtotal;
    }
    function add_database($hoten, $diachi, $dienthoai, $email, $ghichu, $a) {
         global $db;
         $query = "INSERT INTO donhang VALUES ('','$hoten', '$diachi', '$dienthoai', '$email','$ghichu','$a')" ;
         $db->exec($query);
         $last_id = $db->lastInsertId();
         return $last_id;
    }
    function add_donhangchitiet($last_id,$tensp,$gia,$soluong,$thanhtien) {
        global $db;
        $query = "INSERT INTO chitiet_donhang VALUES ('$last_id','$tensp','$gia','$soluong','$thanhtien')" ;
         $db->exec($query);
    }
	function show_don_hang($last_id) {
         global $db;
        $query = "SELECT * FROM donhang WHERE iddonhang = '$last_id' ";
        $list = $db->query($query);
        $list = $list->fetchAll();
        return $list;
    }

    function show_chitiet($last_id) {
         global $db;
        $query = "SELECT * FROM chitiet_donhang JOIN sanpham ON chitiet_donhang.masp = sanpham.masp WHERE iddonhang = '$last_id' ";
        $list = $db->query($query);
        $list = $list->fetchAll();
        return $list;
    }

 ?>