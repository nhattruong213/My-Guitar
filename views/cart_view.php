
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
    <div id="main">

        <div class="box1">  
            <h3>Nhập thông tin đặt hàng</h3>
            <?php foreach ($errors as $value) : ?>
               <p class="red"> <?php echo $value; ?> </p>
            <?php endforeach; ?>
            <form action="." method="post">
                <input type="hidden" name="action" value="add_data">
                <input class="b1" type="text" name="hoten" placeholder="Họ Tên"> <br>
                <input class="b1" type="text" name="diachi" placeholder="Địa chỉ nhận hàng"> <br>
                <input class="b1" type="text" name="sdt" placeholder="Số điện thoại"> <br>
                <input class="b1" type="text" name="email" placeholder="Email"> <br>
                <input class="b1" type="text" name="ghichu" placeholder="Ghi chú">
                <input class="sub" type="submit" value="Đặt Hàng">
            </form>
            
        </div>
        <div class="box2">
            <?php if (count($_SESSION['cart_guitar_1']) == 0) : ?>
                <h3>Giỏ hàng rỗng</h3>
            <?php else: ?>
            <form action="." method="post">
                <input type="hidden" name="action" value="update">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã SP</th>
                            <th>Hình ảnh</th>
                            <th>Tên sp</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($_SESSION['cart_guitar_1'] as $key => $item) :?>
                        <tr>
                            <td>
                                <?php echo $key; ?>
                            </td>
                            <td>
                                <img width="50px" height="50px" src="<?php echo $item['hinhanh']; ?>" alt="">
                            </td>
                            <td>
                                <?php echo $item['tensp']; ?>
                            </td>
                            <td>
                                $<?php  echo $item['gia']; ?>
                            </td>
                            <td>
                                <input type="number" min ="0" name="newsoluong[<?php echo $key; ?>]" 
                                value = "<?php echo $item['soluong']; ?>">
                            </td>
                            <td>
                                <?php  echo $item['total']; ?>
                            </td>
                            <td>
                                <a href=".?xoa=<?php echo $key; ?>"><img width="40px" src="../images/xóa.jfif" alt=""></a>
                            </td>
                          
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr >
                            <td class="center" colspan="5"> <b>Subtotal</b> </td>
                            <td><?php  echo $a; ?></td>
                        </tr>
                        
                    </tfoot>
                </table>
                 <input class="right" type="submit" value="Update Cart">
          </form>
        <?php endif; ?>
                <p class="left"><a href=".?action=view_page">Tiếp tục đặt hàng</p>
                <p class="left"><a href=".?action=empty_cart">Xóa tất cả trong giỏ hàng</a></p>
        </div>
    </div>
      
     <footer>
        <p>Copyright © 2021 - HOTB</p>
    </footer>
   
</body>
   
</html>
