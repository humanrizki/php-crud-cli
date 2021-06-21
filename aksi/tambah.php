<?php 
require_once __DIR__."\\..\\object.php";
$fileJson = file_get_contents(__DIR__."\\..\\json\\isi_nilai.json");
$decode = json_decode($fileJson);
$decodes;
echo "Ingin menambah list baru? Masukkan nama list baru dibawah ini! : ".PHP_EOL;
foreach($decode as $key => $value){
    if(file_get_contents(__DIR__."\\..\\json\\$value.json")){
        $Jsonfile = file_get_contents(__DIR__."\\..\\json\\$value.json");
        $decodes = json_decode($Jsonfile);
        unset($decode);
    } else {
        system('php ..\\view.php');
    }   
}
$array = (array)$decodes;
foreach($array as $key => $value){
   define("JUDUL",$value);
   $judul = $value;
   $objectList2 = new DaftarList2($key, $value);
   $jsonFile = file_get_contents(__DIR__."\\..\\json\\List {$value}.json");
   $dcd = json_decode($jsonFile);
}
foreach($dcd as $key => $value){
    $objectList2->list[$judul][] = $value;
}
$line = trim(fgets(STDIN));
$objectList2->list[$judul][] = $line;
$objek = (object)$objectList2->list[$judul];
echo "berhasil ditambahkan!\n\r";
$Filejson = json_encode($objek,JSON_PRETTY_PRINT);
$tranfer = file_put_contents(__DIR__."\\..\\json\\List {$judul}.json",$Filejson);
system("php ".__DIR__."\\..\\pilih.php");
?>