<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Conditon Trung CM</title>
<link type="text/css" href="style.css" rel="stylesheet">
</head>
<body>
<?php 
    $day = "";
    $mon = "";
    $image = "";
    $name = "";
    $time = "";
    $result ="";
    if(isset($_POST['day']) && isset($_POST['month'])){
        $day = $_POST['day'];
        $mon = $_POST['month'];
        
        $flag = true;
        if(is_numeric($day) && is_numeric($mon)){
            switch ($mon) {
                case 1:
                    if($day <= 19){$image = "capricorn"; $name = "Ma Kết"; $time = "22/12 – 19/01";}
                    if($day >= 20){$image = "aquarius"; $name = "Bảo Bình"; $time = "20/01 – 18/02";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                case 2:
                    if($day <= 19){$image = "aquarius"; $name = "Bảo Bình"; $time = "20/01 – 19/02";}
                    if($day >= 20){$image = "pisces"; $name = "Song Ngư"; $time = "20/02 – 21/03";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                case 3:
                    if($day <= 21){$image = "pisces"; $name = "Song Ngư"; $time = "20/02 – 21/03";}
                    if($day >= 22){$image = "aries"; $name = "Bạch Dương"; $time = "22/03 – 20/04";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                case 4:
                    if($day <= 20){$image = "aries"; $name = "Bạch Dương"; $time = "22/03 – 20/04";}
                    if($day >= 21){$image = "taurus"; $name = "Kim Ngưu"; $time = "21/04 – 21/05";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                case 5:
                    if($day <= 21){$image = "taurus"; $name = "Kim Ngưu"; $time = "21/04 – 21/05";}
                    if($day >= 22){$image = "gemini"; $name = "Song Tử"; $time = "22/05 – 22/06";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                case 6:
                    if($day <= 22){$image = "gemini"; $name = "Song Tử"; $time = "22/05 – 22/06";}
                    if($day >= 23){$image = "cancer"; $name = "Cự Giải"; $time = "23/06 – 23/07";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                case 7:
                    if($day <= 23){$image = "cancer"; $name = "Cự Giải"; $time = "23/06 – 23/07";}
                    if($day >= 24){$image = "leo"; $name = "Sư Tử"; $time = "24/07 – 23/08";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                    
                case 8:
                    if($day <= 23){$image = "leo"; $name = "Sư Tử"; $time = "24/07 – 23/08";}
                    if($day >= 24){$image = "virgo"; $name = "Xử Nữ"; $time = "24/08 – 23/09";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                    
                case 9:
                    if($day <= 23){$image = "virgo"; $name = "Xử Nữ"; $time = "24/08 – 23/09";}
                    if($day >= 24){$image = "libra"; $name = "Thiên Xứ"; $time = "24/09 – 23/10";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                    
                case 10:
                    if($day <= 23){$image = "libra"; $name = "Thiên Xứ"; $time = "24/09 – 23/10";}
                    if($day >= 24){$image = "scorpio"; $name = "Hổ Cáp"; $time = "24/10 – 22/11";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                case 11:
                    if($day <= 22){$image = "scorpio"; $name = "Hổ Cáp"; $time = "24/10 – 22/11";}
                    if($day >= 23){$image = "sagittarius"; $name = "Nhân Mã"; $time = "23/11 – 21/12";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                case 12:
                    if($day <= 21){$image = "sagittarius"; $name = "Nhân Mã"; $time = "23/11 – 21/12";}
                    if($day >= 22){$image = "capricorn"; $name = "Ma Kết"; $time = "22/12 – 19/01";}
                    if($day<1 || $day>31){
                        $flag = false;
                    }
                    break;
                default:
                    $flag = false;
                    break;
            }
            
            
            if($flag){
                $result = '<div class="result">
			             <img alt="'. $image .'" src="images/'. $image .'.jpg">
			             <p>'.$name. '<span> ( '. ucfirst($image).' : '. $time.' )</span></p>
                    
		              </div>';
                
                
            }
            else {
                $result = "Du lieu không hợp lệ";
            }
            
            
        }
        else {
            $flag = false;
            $result = "Du lieu không hợp lệ";
        }
        
    }
    

?>


	<div class="content">
		<h1>Bạn Thuộc Chòm Sao Gì ??? </h1>
		<form action="#" method="post" name="main-form">
			<div class="row">
				<span>Nhập ngày sinh: </span>
				<input type="text" name="day" value="<?php echo $day;?>">
			</div>
			<div class="row">
				<span>Nhập tháng sinh: </span>
				<input type="text" name="month" value="<?php echo $mon; ?>">
			</div>
			<div class="row">
				<input type="submit" name="submit" value="Xem chòm sao">
				
			</div>
			

		</form>
		
		
		
			<?php  
		  
		  echo $result;
		  ?>
	</div>

</body>
</html>
