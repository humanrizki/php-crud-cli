<?php

require_once __DIR__."\\object.php";
error_reporting(1);
$fileJson = file_get_contents(__DIR__.'\\json\\isi_nilai.json');
$decode = json_decode($fileJson);
$decodes;
foreach($decode as $key => $value){
    if(file_get_contents(__DIR__."\\json\\$value.json")){
        $Jsonfile = file_get_contents(__DIR__."\\json\\$value.json");
        $decodes = json_decode($Jsonfile);
        unset($decode);
    }
}
$array = (array)$decodes;
$temp;
$objectList2;
foreach($array as $key => $value){
    $temp = $value;
    $objectList2 = new DaftarList2($key, $value);
    error_reporting(1);
    $fileJsonnya = file_get_contents(__DIR__."\\json\\List {$temp}.json");
    $dcdfile = json_decode($fileJsonnya);
    $dcdarr = (array)$dcdfile;
    $objectList2->list[$temp] = $dcdarr;
}
// echo PHP_EOL;
echo "Anda berada di $temp : ".PHP_EOL;
$dash = '-';
$no = 30;
for($i = 0; $i <= $no; $i++){
    echo $dash;
}
$dash . PHP_EOL;
if(empty($objectList2->list[$temp])){
    echo "\nBelum Ada List!\n";
    echo PHP_EOL; 
    for($i = 0; $i <= $no; $i++){
        echo $dash;
    }
    foreach($objectList2->aksi as $key=>$value){
        echo "\n$key : $value\n";
    }
} else {
    foreach($objectList2->list[$temp] as $key => $value){
        if(strlen($value)<=23){
            echo "\n$key : $value";
        } elseif(strlen($value) >= 23){
            $v = substr($value,0,23)."...";
            echo "\n$key : $v" ;
        }
        // $lengthValue = strlen($value);
        // var_dump($lengthValue);
    }
    echo PHP_EOL; 
    for($i = 0; $i <= $no; $i++){
        echo $dash;
    }
    foreach($objectList2->aksi as $key=>$value){
        echo "\n$key : $value\n";
    }
}
for($i = 0; $i <= $no; $i++){
    echo $dash;
}
echo PHP_EOL;
print("Pilih : ").PHP_EOL;
$line = trim(fgets(STDIN));
function pilih(){
    echo "Anda salah pilih!, pilihan tidak berada dimenu!".PHP_EOL;
    system("php .\\pilih.php");
}
$result = match($line){
    "tambah"=>require_once __DIR__."\\aksi\\tambah.php",
    "update"=>require_once __DIR__."\\aksi\\update.php",
    "hapus"=>require_once __DIR__."\\aksi\\hapus.php",
    "keluar"=> empty("") ? false : true,
    default=>pilih()
};
echo $result;
?>
