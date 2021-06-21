<?php
// namespace Data; 
class Daftar{
    var $list = ['1'=>"Daftar Makanan",
                 '2'=>"Daftar Buku",
                 '3'=>"Daftar Anime"];
}
class DaftarList2{
    var $list = [];
    var $aksi = [
        "Tambah"=>"Tambah Daftar",
        "Hapus"=>"Hapus Daftar",
        "Update"=>"Rubah Daftar",
        "Keluar"=>"Keluar dari menu"
    ];
    
    public function __construct(public string $no = "", public string $value = ""){
        $this->list = [$no => $value];
    }
    public function __set(string $nameList, mixed $stringValue)
    {
        $this->list[$nameList] = $stringValue;
    }
    public function __get($name){
        $this->list[$name];
        return $this;
    }
}
