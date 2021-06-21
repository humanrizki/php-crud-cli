<?php 
require_once __DIR__."\\..\\object.php";
$file_json = file_get_contents(__DIR__."\\..\\json\\isi_nilai.json");
$file_json_decode = json_decode($file_json);
foreach($file_json_decode as $key => $value){
    $objectList2 = new DaftarList2($key, $value);
    $judul = $value;
   $temps = [$key=>$value];
   $objectList2 = new DaftarList2($key, $value);
   $jsonFile = file_get_contents(__DIR__."\\..\\json\\List {$value}.json");
   $dcd = json_decode($jsonFile);
}
$array = (array)$dcd;
foreach($array as $key =>$value){
    $objectList2->list[$judul][] = $value;
    $k = count($objectList2->list[$judul]);
}
echo "Ingin menghapus no?".PHP_EOL;
$line = trim(fgets(STDIN));
$die = $line >= $k ? false:true;
if($die == false){
    echo "Pilihan Salah!";
    die;
}
foreach($objectList2->list[$judul] as $key => $value){
    if($line==$key){
        unset($objectList2->list[$judul][$key]);
        echo "List berhasil dihapus!\n";
    } else {
        $arr[] = $value;
    }
    unset($objectList2->list[$judul]);
    error_reporting(1);
    $objectList2->list[$judul] = $arr;
}
echo $result.PHP_EOL;

$hapus = $objectList2->list[$judul];
$objek = (object)$hapus;
$Filejson = json_encode($objek,JSON_PRETTY_PRINT);
$tranfer = file_put_contents(__DIR__."\\..\\json\\List {$judul}.json",$Filejson);
// system('cls');
// shell_exec('cls');
system("php ".__DIR__."\\..\\pilih.php");
?>