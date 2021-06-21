<?php 
require_once __DIR__."\\..\\object.php";

$fileJson = file_get_contents(__DIR__."\\..\\json\\isi_nilai.json");
$decode_fileJson = json_decode($fileJson);
$array_decode = (array)$decode_fileJson;
foreach($array_decode as $key => $value){
    $judul = $value;
    $objectList2 = new DaftarList2($key, $value);
    $fileJson = file_get_contents(__DIR__."\\..\\json\\List {$value}.json");
    $decode_fileJson = json_decode($fileJson);
    $array = (array)$decode_fileJson;
}
echo "Ingin mengubah no?".PHP_EOL;
$line = trim(fgets(STDIN));

foreach($array as $key => $value){
    $objectList2->list[$judul][] = $value;
    $k = count($objectList2->list[$judul]);
}
$die = $line >= $k ? false:true;
if($die == false){
    echo "Pilihan Salah!";
    die;
}
echo "Masukkan string baru untuk dirubah! : ".PHP_EOL;
$title = trim(fgets(STDIN));
foreach($objectList2->list[$judul] as $key => $value){
    if($line == $key){
        $objectList2->list[$judul][$key] = $title;
        // $k = count($objectList2->list[$judul]);
        echo "Berhasil!";
    }
}
$update = $objectList2->list[$judul];
$objek = (object)$update;
$Filejson = json_encode($objek,JSON_PRETTY_PRINT);
$tranfer = file_put_contents(__DIR__."\\..\\json\\List {$judul}.json",$Filejson);
// Akhir:
// echo "pilihan salah!";
?>