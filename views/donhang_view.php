<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Guitar shop</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
	<header>
        <h1>Guitar Shop</h1>
         <div class="giohang">
            <a href=".?action=view_cart"><img width="50px" src="../images/cart.png"><span id="countsp"></span></a> 
        </div>
	</header>
	<nav>
          	<ul id="main-menu">
                <li><a href="../controller/index.php">Trang chủ</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                <li><a href="#">Hỏi đáp</a></li>
                <li>
                		<form action="." method="post">
                			<input type="hidden" name="action" value="timkiem">
                			<input type="text" name="tim" id="tim">
                			<input type="submit" value="Search">
                		</form>
                </li>
            </ul>
	</nav>	
    <div  id="main">
        
        <div class="box24">
            <h2 class="indam">CHI TIẾT ĐƠN HÀNG</h2>
            <?php foreach ($don_hang as $item) :?>
                    <h4>Tên khách hàng: <?php echo $item['hoten'] ; ?></h4>
                    <h4> Địa chỉ nhận hàng: <?php echo $item['diachi'] ; ?></h4>
                    <h4>Số điện thoại: <?php echo $item['dienthoai'] ; ?></h4>
                    <h4>Email : <?php echo $item['email'] ; ?></h4>
            <?php endforeach; ?>  
            <table class="table">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($chitiet_dn as $item) :?>
                        <tr>
                            <td>
                                <img width="50px" height="50px" src="<?php echo $item['hinhanh']; ?>" alt="">
                            </td>
                            <td>
                                <?php echo $item['tensp']; ?>
                            </td>
                            <td>
                               <?php echo $item['soluong']; ?>
                            </td>
                            <td>
                                <?php echo $item['gia']; ?>
                            </td>
                            <td>
                                <?php echo $item['thanhtien']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <?php foreach ($don_hang as $item) :?>
                            <tr>
                                <td colspan="4"><span class="abc">Tổng đơn</span></td>
                                <td><?php echo $item['total'] ; ?></td>
                            </tr>
                        <?php endforeach; ?>  
                    </tfoot>
            </table>
        </div>
    </div>
    </div>
	<footer>
		<p>Copyright © 2021 - HOTB</p>
	</footer>
</body>
</html>