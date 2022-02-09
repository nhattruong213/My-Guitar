<?php 
	$lifetime = 60*60*24*14;
	session_set_cookie_params($lifetime, '/');
	session_start();
		//
	$errors = array();
	if (empty($_SESSION['cart_guitar_1'])) {
	 	$_SESSION['cart_guitar_1'] = array() ;
	 } 
	require_once('../models/list.php');
	require_once('../models/database.php');
	if (isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
       	unset($_SESSION['cart_guitar_1'][$id]);
       	header("Location:?action=view_cart");
    }

	if (isset($_POST['action'])) {
		$action = $_POST['action'] ;
	}
	else if (isset($_GET['action'])) {
		$action = $_GET['action'] ;
	}
	else {
		$action = 'view_page';
	}

	switch ($action) {
		case 'view_page':
			if (isset($_GET['categoryID'])) {
	            $categoryID = $_GET['categoryID'];
	        } else {
	            $categoryID = 'dm01';
	        }

			$danhmuc = get_list_danhmuc();
			$sanphams = get_sanpham_dm($categoryID);
			include ('../views/homepage.php');
			break;
		case 'chitiet':
			if (isset($_POST['masp'])) {
	            $masp = $_POST['masp'];
	        } else {
	            $masp = 'sp01';
	        }
	        $danhmuc = get_list_danhmuc();
	        $sanphamchitiet = get_sanpham_chitiet($masp);
			include ('../views/hompage_chitiet.php');
			break;
		case 'timkiem':
			$input = $_POST['tim'];
			$danhmuc = get_list_danhmuc();
	    	$new_list =	search_sp($input);
	    	include ('../views/search.php');
	    	break;
	    case 'add_cart':
	    	$danhmuc = get_list_danhmuc();
	    	$masp = $_POST['masp'];
	    	$hinhanh = $_POST['hinhanh'];
	    	$tensp = $_POST['tensp'];
	    	$gia = $_POST['gia'];	
	    	$soluong = $_POST['soluong'];
	    	add_cart($masp,$hinhanh,$tensp,$gia,$soluong);
	    	$a = get_subtotal();
	    	include ('../views/cart_view.php');
	    	break;
	     case 'update':
	    	$new_qty_list = $_POST['newsoluong'];
			foreach ($new_qty_list as $key => $qty) {
				if ($_SESSION['cart_guitar_1'][$key]['soluong'] != $qty) {
					update_item($key, $qty);
				}
			}
			$a = get_subtotal();
			include ('../views/cart_view.php');
			break;
	    case 'view_cart':
	    	$a = get_subtotal();
	    	include ('../views/cart_view.php');
	    	break;
	 
	    case 'empty_cart':
	   		$a = get_subtotal();
			$_SESSION['cart_guitar_1'] = array();
			include ('../views/cart_view.php');
			break;
		case 'add_data':
			//ad don hang
			$a = get_subtotal();
			$hoten = $_POST['hoten'];
			$diachi = $_POST['diachi'];
			$dienthoai = $_POST['sdt'];
			$email = $_POST['email'];
			$ghichu = $_POST['ghichu'];
			if (empty($_SESSION['cart_guitar_1'])) {
				$errors[] = 'Giỏ hàng bạn chưa có gì';
				include ('../views/cart_view.php');
			}elseif ($hoten =='') {
				$errors[] = 'Không được để trống họ tên';
				include ('../views/cart_view.php');
			} elseif ($diachi =='') {
				$errors[] = 'Không được để trống địa chỉ';
				include ('../views/cart_view.php');
			}elseif ($dienthoai =='') {
				$errors[] = 'Không được để trống điện thoại';
				include ('../views/cart_view.php');
			}elseif ($email =='') {
				$errors[] = 'Không được để trống email';
				include ('../views/cart_view.php');
			}else {
				//ad_donhang
				
				$last_id = add_database($hoten, $diachi, $dienthoai, $email, $ghichu, $a);

				// ad_donchitiet
				foreach ($_SESSION['cart_guitar_1'] as $key => $item) {
					$masp = $key;
					$gia = $item['gia'];
					$soluong = $item['soluong'];
					$thanhtien = $item['total'];
					add_donhangchitiet($last_id,$masp,$gia,$soluong,$thanhtien);
				}
				$_SESSION['cart_guitar_1'] = array();
				$don_hang=show_don_hang($last_id);
				$chitiet_dn = show_chitiet($last_id);
				include ('../views/donhang_view.php');
			}	
			break;
	}

 ?>