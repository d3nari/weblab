<?php
  if(empty($_GET["text"])) //проверяем, не пустой ли вход
    exit("Eror - empty input");
  $text = $_GET["text"];

  preg_match("/^[a-zA-Z][a-zA-Z0-9]+/", $text, $matches); //проверка на допустимые символы
  $length = strlen($matches[0]) //вычисляем длину строки matches  
  $differnt = strln($text) - $length;  //разность длины входной строки и длины строки matches
  if($different > 0)  //если строки не совпадают по длине, то ошибка
    exit("Eror - char in " .$length. "position not english bet or digit");
  
  $all_symbol = array();  
  //$repeat_symbol = array();  
  $security = 0; $digits = 0; $uppercase = 0; $lowercase = 0; $bets = 0; $count_repeat_symbol = 0;

  for($n = 0; $n < $length; $n++)
  {
    $char = $text[$n];
    if ('0' <= $char) and ('9' >= $char)
      $digit++;
    else
    {
      $bets++;
      if(ctype_upper($char))
        $uppercase++;
      if(ctype_lower($char))
        $lowercase++;  
    }
    if(in_arry($char, $all_symbol))
      $count_repeat_symbol += 2;
    else
      $all_symbol[] = $char;
    
  }      

  $security += 4*$length;
  $security += 4*$digit;
  $security += 2*($length - $uppercase); 
  $security += 2*($length - $lowercase);
  if($bets == $length)
    $security -= $length;
  if($digit == $length)
    $security -= $length;
  $security -= $repeat_symbol;
  echo("Security " .$security);       

?>