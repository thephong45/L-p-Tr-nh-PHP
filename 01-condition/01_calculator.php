<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Conditon Trung CM</title>
<link type="text/css" href="style.css" rel="stylesheet">
</head>
<body>
<?php 
    $n1 = "";
    $n2 = "";
    $calculator = "";
    if(isset($_POST['number1']) && isset($_POST['number2']) &&  isset($_POST['calculator'])){
        $n1 = $_POST['number1'];
        $n2 =$_POST['number2'];
        $calculator = $_POST['calculator'];
        
        
        $flag =  true;
        if(is_numeric($n1)&&is_numeric($n2)){
            switch ($calculator) {
                case "+":
                    $result = $n1 + $n2;
                    break;
                case "-":
                    $result = $n1 - $n2;
                    break;
                case "*":
                case "x":
                    $result = $n1 * $n2;
                    break;
                    
                case "/":
                case ":":
                    $result = $n1 / $n2;
                    break;
                case "%":
                    $result = $n1 % $n2;
                    break;
                    
                default:
                    $result = $n1 + $n2;
                    $calculator = '+';
                    break;
            }

        }
        else {
            $result =  "Giá trị các số không thõa";
            $flag = false;
        }
        
        
    }
    

?>
	<div class="content">
		<h1>Mô phỏng máy tính </h1>
		<form action="#" method="post" name="main-form">
			<div class="row">
				<span>Số thứ nhất: </span>
				<input type="text" name="number1" value="<?php echo $n1;?>">
			</div>
			<div class="row">
				<span>Phép toán: </span>
				<input type="text" name="calculator" value="<?php echo $calculator; ?>">
			</div>
			<div class="row">
				<span>Số thứ hai: </span>
				<input type="text" name="number2" value="<?php echo  $n2;?>">
			</div>
			<div class="row">
				<input type="submit" name="submit" value="Xem kết quả">
				
			</div>
			<div class="row">
				<p><?php 
				    if($flag){
				        echo "Ket qua:" .$n1 ." ".$calculator." ". $n2 ." = ". $result;
				        
				    }
				    else {
				        echo $result;
				    }
				
				?>
				
				
				</p>
				
			</div>
		
		
		
		
		
			
		
		</form>
	</div>

</body>
</html>
