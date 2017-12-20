<form action="" method="post">
  <input name="numbers" type="text">
  <input  type="submit"></input>
  </form>


<?php


$hours=[];
$minutes=[];
$hh='';
$mm='';
if (isset($_POST['numbers'])) {
    $number = (string)$_POST['numbers'];
        for ($i=0; $i <4 ; $i++) { 
            for ($j=0; $j <4 ; $j++) { 
                if ($i==$j) {
                    continue;
                } else {
                    $temp = $number[$i]. $number[$j];
                    if ((int)$temp > -1  && (int)$temp < 24) {
                        $hours[$i.$j] = $temp;
                    }
                    if ((int)$temp > -1  && (int)$temp < 60) {
                        $minutes[$i.$j] = $temp;
                    }
                }
        }
    }   

  

    if (empty($hours) || empty($minutes)) {
        echo "No hour available";
    } else {
        asort($hours);
        asort($minutes);
        $hours = array_reverse ($hours, true);
        $minutes = array_reverse ($minutes, true);
        echo "<pre>";
        PRINT_R($hours);
        echo "</pre>";
        echo "<pre>";
        print_r($minutes);
        echo "</pre>";
        foreach ($hours as $key1 => $value1) {
            $h1 = (int)($key1/10);
            $h2 = $key1%10;
            $_hour = array($h1,$h2);
            foreach ($minutes as $key2 => $value2) {
                $m1 = (int)($key2/10);
                $m2= $key2%10;
                if (!in_array($m1, $_hour) && !in_array($m2, $_hour)){
                    $hh = $hours[$key1];
                    $mm = $minutes[$key2];
                     break 2;
            }
    
        }   
    }
}

if (!empty($hh) && !empty($mm)) {
    echo $hh. ":". $mm; 
} else {
    echo "No hour available";
}

}
?>

        
