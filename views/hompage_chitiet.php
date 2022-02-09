
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
                <li><a href="">blog</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                <li><a href="#">Hỏi đáp</a></li>
            </ul>
	</nav>	
	<main>	
		 <div class="boxphai">  
            	<ul id="danhmuc">
	                <?php foreach ($danhmuc as $dm) :?>
	                    <li class="list-group-item">
	                        <a href=".?categoryID=<?php echo $dm['madanhmuc'] ; ?>"> <?php echo $dm['tendanhmuc']; ?></a>
	                    </li>
	                <?php endforeach; ?>
            	</ul>       
        </div>
		<div class="boxtrai">
            <?php foreach ($sanphamchitiet as $dm) :?>
            	<div id="khoi3">
            		<a href=""><img width="400px" height="400px" src="<?php echo $dm['hinhanh'] ; ?>" alt=""></a>
            	</div>
            	
          		<div id="khoi2">

            		<p>Mô tả sản phẩm: <?php echo $dm['mota'] ; ?></p>
            		<p>Tên sản phẩm: <?php echo $dm['tensp'] ; ?></p>
            		<p>Giá :<?php echo $dm['gia'] ; ?></p>
	 				<form action="." method="post">
	                	<input type="hidden" name="action" value="add_cart">
	                	<input type="hidden" name="masp" id="masp" value="<?php echo $dm['masp'] ; ?>">
	                	<input type="hidden" name="hinhanh" id="hinhanh" value="<?php echo $dm['hinhanh'] ; ?>">
	                	<input type="hidden" name="tensp" id="tensp" value="<?php echo $dm['tensp'] ; ?>">
	                	<input type="hidden" name="gia" id="gia" value="<?php echo $dm['gia'] ; ?>"> 

	                	Số lượng: <select name="soluong">
							<?php for ($i=1; $i <= 10 ; $i++) : ?>
								<option value="<?php echo $i;  ?>">
									<?php echo $i; ?>
								</option>
							<?php endfor; ?>
						</select> <br>
	                	<input type="submit" value="Thêm vào giỏ hàng">
	                </form>
            	</div>
	        <?php endforeach; ?>
        </div>
       
	</main>
	<footer>
		<p>Copyright © 2021 - HOTB</p>
	</footer>
</body>
</html>