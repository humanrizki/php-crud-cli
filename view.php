<?php 
// session_start();
require_once __DIR__."\\object.php";
// use Data\Daftar;
// use Data\IteratorAggregate;
echo "PLEASE SELECT ONE TO CHOOSE LIST".PHP_EOL;
$dash = '-';
$no = 30;
for($i = 0; $i <= $no; $i++){
    echo $dash;
}
$dash . PHP_EOL;
$objectList = new Daftar();
foreach($objectList->list as $key =>$value){
    // echo "\n{$key} : {$value}";
    if($objectList->list[$key] != end($objectList->list)){
        echo "\n{$key} : {$value}";
    } else{
        echo "\n{$key} : {$value}\n";
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
    system("php .\\view.php");
}
switch($line){
    case '1':
        foreach($objectList->list as $key=>$value){
            if($line == $key){
                // $values = $value;
                $isi_value = [$key=>$value];
                if(!file_exists(__DIR__."\\json\\$value.json") or !file_exists(__DIR__."\\json\\isi_nilai.json")){
                    $jsonFile = json_encode($isi_value, JSON_PRETTY_PRINT);
                    $buatFile = file_put_contents(__DIR__."\\json\\{$value}.json",$jsonFile);
                    $buatFile = file_put_contents(__DIR__."\\json\\isi_nilai.json",$jsonFile);
            } else {
                $isi_value = [$key=>$value];
                $jsonFile = json_encode($isi_value, JSON_PRETTY_PRINT);
                $buatFile = file_put_contents(__DIR__."\\json\\isi_nilai.json",$jsonFile);
            }
            }   
        }  
        $popen = popen('cls','w');
        // var_dump(Daftar::$lists);
        pclose($popen);
        system('php '.__DIR__.'\\pilih.php');
        break;
    case '2':
        $isi_value;
        foreach($objectList->list as $key=>$value){
            if($line == $key){
                if(!file_exists(__DIR__."\\json\\$value.json") or !file_exists(__DIR__."\\json\\isi_nilai.json")){
                $isi_value = [$key=>$value];
                $jsonFile = json_encode($isi_value, JSON_PRETTY_PRINT);
                $buatFile = file_put_contents(__DIR__."\\json\\{$value}.json",$jsonFile);
                $buatFile = file_put_contents(__DIR__."\\json\\isi_nilai.json",$jsonFile);
            } else {
                $isi_value = [$key=>$value];
                $jsonFile = json_encode($isi_value, JSON_PRETTY_PRINT);
                $buatFile = file_put_contents(__DIR__."\\json\\isi_nilai.json",$jsonFile);
            }
        }
        }  
        $popen = popen('cls','w');
        // var_dump(Daftar::$lists);
        pclose($popen);
        system('php '.__DIR__.'\\pilih.php');
        break;
    case '3':
        $isi_value;
        foreach($objectList->list as $key=>$value){
            if($line == $key){
                if(!file_exists(__DIR__."\\json\\$value.json") or !file_exists(__DIR__."\\json\\isi_nilai.json")){
                $isi_value = [$key=>$value];
                $jsonFile = json_encode($isi_value, JSON_PRETTY_PRINT);
                $buatFile = file_put_contents(__DIR__."\\json\\{$value}.json",$jsonFile);
                $buatFile = file_put_contents(__DIR__."\\json\\isi_nilai.json",$jsonFile);
            } else {
                $isi_value = [$key=>$value];
                $jsonFile = json_encode($isi_value, JSON_PRETTY_PRINT);
                $buatFile = file_put_contents(__DIR__."\\json\\isi_nilai.json",$jsonFile);
            }
        }
        }  
        $popen = popen('cls','w');
        // var_dump(Daftar::$lists);
        pclose($popen);
        system('php '.__DIR__.'\\pilih.php');
        break;
    case 'keluar':
        break;
    default :
        pilih();
    
}
 
?>