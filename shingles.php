<?php
$genom1= file_get_contents('genom1.txt');
$genom2= file_get_contents('genom2.txt');

$genom1 = str_replace("\n",'',$genom1);
$genom2 = str_replace("\n",'',$genom2);

//to char array
$charG1 = str_split($genom1);
$charG2 = str_split($genom2);
$shingle1 = [];
$shingle2 = [];
$shingleSize=9;

for ($i = 0; $i <count($charG1)-$shingleSize;$i++) {
//    array_push($shingle1,$charG1[$i].$charG1[$i+1]);
//    array_push($shingle1,substr($genom1,$i,$shingleSize));
    array_push($shingle1,substr($genom1,$i,$shingleSize));
}
for ($i = 0; $i <count($charG2)-$shingleSize;$i++) {
//    array_push($shingle2,$charG2[$i].$charG2[$i+1]);
//    array_push($shingle2,substr($genom2,$i,$shingleSize));
    array_push($shingle2,substr($genom2,$i,$shingleSize));
}
//getting unique set of shingles
$shingle1 = array_unique($shingle1);
$shingle2 = array_unique($shingle2);


$myPDO = new PDO('pgsql:host=localhost;dbname=tasks', 'suhd', 'qwaszxboc');
foreach ($shingle1 as $shingle) {
    $sql='INSERT INTO test.shingle9(shingle,genom_id) VALUES(:shingle,:genom_id)';
    $statement=$myPDO->prepare($sql);
    $statement->bindValue(':shingle', $shingle);
    $statement->bindValue(':genom_id',1);
    $statement->execute();
}
foreach ($shingle2 as $shingle) {
    $sql='INSERT INTO test.shingle9(shingle,genom_id) VALUES(:shingle,:genom_id)';
    $statement=$myPDO->prepare($sql);
    $statement->bindValue(':shingle', $shingle);
    $statement->bindValue(':genom_id',2);
    $statement->execute();
}