<?php 
/**
* Lorem ipsum generator
**/


$string = json_decode(file_get_contents('includes/words.json'), true);
function get_lipsum($count){
    global $string;
    $flag = 1;$litext='';
        for($wc=0; $wc<$count+1; $wc++){

            $str=$string[rand(1, 366)];
            
            if($flag){$litext.=$str; $flag=0;}else{$litext.=strtolower($str);}
            if(!rand(0, 10)){$litext.='.';$flag=1;}
            $litext.=' ';
}
    return trim($litext);
}
function lipsum($count){
    echo get_lipsum($count);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lorem Ipsum Generator</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="lipsum" autocomplete="off" placeholder="Type in some numbers seperated by commas">
        <input type="submit" value="Go Generate Lorem">
    </form>
    <section class= "gen-text">
<?php
    
if(isset($_POST['lipsum']) && !empty($_POST['lipsum'])){
     $str = str_replace(' ','', $_POST['lipsum']);
     $str = explode(',', $str);
     foreach($str as $s){
         echo '<p>'.lipsum($s).'</p>';
     }

}
?>
    </section>
</body>
</html>