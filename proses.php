<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
<?php
class Motor {
    public $nama,
            $waktu,
            $diskon,
            $jenis;
    protected $pajak;
    private $HondaVario125, 
            $HondaScoopy, 
            $HondaBeat, 
            $HondaPCX160;
    protected $listMember = ['Jake', 'Jey', 'Taeyong', 'Lucas', 'Kai'];
    public function __construct (){
        $this->pajak = 10000;
    }

    public function setHarga ($jenis1, $jenis2, $jenis3, $jenis4) {
        $this->HondaVario125 = $jenis1;
        $this->HondaScoopy = $jenis2;
        $this->HondaBeat = $jenis3;
        $this->HondaPCX160 = $jenis4;
    }

    public function getHarga () {
        $data["HondaVario125"] = $this->HondaVario125;
        $data["HondaSCoopy"] = $this->HondaScoopy;
        $data["HondaBeat"] = $this->HondaBeat;
        $data["HondaPCX160"] = $this->HondaPCX160;
        return $data;
    }
}
class Rental extends Motor {
    public function setMember() {
        $member = in_array($this->nama, $this->listMember) ? "Member" : "Non Member";
        return $member;
    }

    public function getDiskon(){
        $diskon = ($this->setMember() == "Member") ? "5" : "0";
        return $diskon;
    }

    public function TotalBayar(){
        $dataHarga = $this->getHarga();
        $hargaRental = $this->waktu * $dataHarga[$this->jenis];
        $hargaPPN = $this->pajak;
        $hargaBayar = $hargaRental + $hargaPPN;
        $diskonMember = $hargaBayar * 0.05;
        if($this->setMember() == "Member") {
            $TotalBayar = $hargaBayar - $diskonMember;
        } else {
            $TotalBayar = $hargaBayar;
        }
        return $TotalBayar;
    }


    public function cetakPembelian(){
        echo "<center>";
        echo $this->nama . " anda berstatus sebagai " . $this->setMember() . " di Sim-Jaeyun | Rental Motor, maka anda mendapatkan diskon sebesar " . $this->getDiskon() . "%" . "<br>";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari" . "<br>";
        echo "Harga rental perharinya: Rp. " . number_format($this->getHarga()[$this->jenis], 0, '', '.') . "<br>";
        echo "<br>";
        echo "Besar yang harus dibayar adalah Rp" . number_format($this->TotalBayar(), 0, '', '.');
        echo "</center>";
    }
}
?>
</body>
</html>