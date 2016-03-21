<?php
$dataDay = Date('d-m-y');
//$dataTime = Date('h:i:s');
//$dataSum  = $dataDay . " " . $dataTime;
$link = 'posts/';
$linkFull = $link . $dataDay;

while($a !== "exit" . PHP_EOL){
   echo 'пишем текст в ' . $dataDay . PHP_EOL;
   $a = readline();
      if($a=='exit'){
         exit();
      } else{
         file_put_contents($linkFull, $a, FILE_APPEND);
         echo 'текст сохранен ' . $dataDay . PHP_EOL;
      }
}
exit();