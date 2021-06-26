<?php
  # TASK ONE
  function get_range($start, $end) {
    $total = 0;
    for($i = $start; $i<=$end; $i++){
      $total+=$i;
    }
    return $total;
  }

  echo get_range(1, 9);

  # TASK TWO
  function add_numbers($arr){
    $total = 0;
    for($i=0; $i<count($arr); $i++){
         $total+=$arr[$i];
    }
    return $total;
  }
  echo add_numbers(array(2,4,6));
  
?>