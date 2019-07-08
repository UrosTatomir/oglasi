<?php
require_once '../config/db.php';

class DAO{
private $db;

private $GETALLOGLASI="SELECT * FROM oglasi ORDER BY id_oglasa DESC";

private $GETALLGRADOVI="SELECT *FROM  gradovi ORDER BY id_mesta ASC";

private $GETALLKATEGORIJE="SELECT * FROM kategorije ORDER BY id_kategorije ASC";

private $GETFILTEROGLASI="SELECT * FROM oglasi WHERE (mesto=? AND kategorija=?) AND cena < ?";

private $GETALLUSERS="SELECT * FROM korisnici";

private $REGISTER="INSERT INTO korisnici(name,surname,email,phone,username,password,admin) VALUES(?,?,?,?,?,?,?)";

private $LOGIN ="SELECT * FROM korisnici WHERE username = ? AND password = ?";

private $INSERTOGLAS="INSERT INTO oglasi(naziv,kategorija,opis,cena,mesto,telefon,slika) VALUES(?,?,?,?,?,?,?)"; 

private $GETOGLASVIEW = "SELECT * FROM oglasi WHERE id_oglasa=?";

private $GETFILTEROGLASIMESTOKATEGORIJA="SELECT * FROM oglasi WHERE mesto=? AND kategorija=? ORDER BY id_oglasa DESC";

private $GETFILTEROGLASIMESTOCENA="SELECT * FROM oglasi WHERE mesto=? AND cena < ? ORDER BY id_oglasa DESC";

private $GETFILTEROGLASIKATEGORIJACENA="SELECT * FROM oglasi WHERE kategorija=? AND cena < ? ORDER BY id_oglasa DESC";

private $GETFILTEROGLASIMESTO= "SELECT * FROM oglasi WHERE mesto = ? ORDER BY id_oglasa DESC";

private $GETFILTEROGLASIKATEGORIJA= "SELECT * FROM oglasi WHERE kategorija = ? ORDER BY id_oglasa DESC";

private $GETFILTEROGLASICENA= "SELECT * FROM oglasi WHERE cena < ? ORDER BY id_oglasa DESC";

private $DELETEOGLASA="DELETE FROM oglasi WHERE id_oglasa=?";

private $GETIMAGEBYID="SELECT slika FROM oglasi WHERE id_oglasa=?";

public function __construct(){
    $this->db=DB::createInstance();
}
public function getAllOglasi(){
  
        $statement=$this->db->prepare($this->GETALLOGLASI);
        $statement->execute();
        $result= $statement->fetchAll();
        return $result;
 }
public function getAllGradovi(){
  
        $statement=$this->db->prepare($this->GETALLGRADOVI);
        $statement->execute();
        $result= $statement->fetchAll();
        return $result;
 }
public function getAllKategorije(){
  
        $statement=$this->db->prepare($this->GETALLKATEGORIJE);
        $statement->execute();
        $result= $statement->fetchAll();
        return $result;
 }
public function getFilterOglasi($mesto,$kategorija,$cena){
        $statement=$this->db->prepare($this->GETFILTEROGLASI);
        $statement->bindValue(1,$mesto);
        $statement->bindValue(2,$kategorija);
        $statement->bindValue(3,$cena);
        $statement->execute();
        $result=$statement->fetchAll() ;
        return $result;
    }
public function getAllUsers(){
        $statement=$this->db->prepare($this->GETALLUSERS);
        $statement->execute();
        $result= $statement->fetchAll();
        return $result;
    }
public function register($name,$surname ,$email,$phone,$username,$password,$admin){
        $statement = $this->db->prepare($this->REGISTER);
        $statement->bindValue(1,$name);
        $statement->bindValue(2,$surname);
        $statement->bindValue(3,$email);
        $statement->bindValue(4, $phone);
        $statement->bindValue(5,$username);
        $statement->bindValue(6,$password);
        $statement->bindValue(7,$admin);
        $statement->execute();  
    }
public function login($username,$password){
        $statement=$this->db->prepare($this->LOGIN);
        $statement->bindValue(1,$username);
        $statement->bindValue(2,$password);
        $statement->execute();
        $result=$statement->fetch() ;
        return $result;
    }
public function insertOglas($naziv, $kategorija, $opis, $cena, $mesto, $telefon, $slika){
        $statement = $this->db->prepare($this->INSERTOGLAS);
        $statement->bindValue(1,$naziv);
        $statement->bindValue(2,$kategorija);
        $statement->bindValue(3,$opis);
        $statement->bindValue(4,$cena);
        $statement->bindValue(5,$mesto);
        $statement->bindValue(6,$telefon);
        $statement->bindValue(7,$slika);
        $statement->execute();  
    }
public function getOglasView($id_oglasa){
        $statement = $this->db->prepare($this->GETOGLASVIEW);
        $statement->bindValue(1,$id_oglasa);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
public function getFilterOglasiMestoKategorija($mesto,$kategorija){
        $statement=$this->db->prepare($this->GETFILTEROGLASIMESTOKATEGORIJA);
        $statement->bindValue(1,$mesto);
        $statement->bindValue(2,$kategorija);
        $statement->execute();
        $result=$statement->fetchAll() ;
        return $result;
    }
public function getFilterOglasiMestoCena($mesto,$cena){
        $statement=$this->db->prepare($this->GETFILTEROGLASIMESTOCENA);
        $statement->bindValue(1,$mesto);
        $statement->bindValue(2,$cena);
        $statement->execute();
        $result=$statement->fetchAll() ;
        return $result;
    }
public function getFilterOglasiKategorijaCena($kategorija,$cena){
        $statement=$this->db->prepare($this->GETFILTEROGLASIKATEGORIJACENA);
        $statement->bindValue(1,$kategorija);
        $statement->bindValue(2,$cena);
        $statement->execute();
        $result=$statement->fetchAll() ;
        return $result;
    }
public function getFilterOglasiMesto($mesto){
        $statement=$this->db->prepare($this->GETFILTEROGLASIMESTO);
        $statement->bindValue(1,$mesto);
        $statement->execute();
        $result=$statement->fetchAll() ;
        return $result;
    }
public function getFilterOglasiKategorija($kategorija){
        $statement=$this->db->prepare($this->GETFILTEROGLASIKATEGORIJA);
        $statement->bindValue(1,$kategorija);
        $statement->execute();
        $result=$statement->fetchAll() ;
        return $result;
    }
public function getFilterOglasiCena($cena){
        $statement=$this->db->prepare($this->GETFILTEROGLASICENA);
        $statement->bindValue(1,$cena);
        $statement->execute();
        $result=$statement->fetchAll() ;
        return $result;
    }
public function deleteO($id_oglasa){
        $statement=$this->db->prepare($this->DELETEOGLASA);
        $statement->bindValue(1,$id_oglasa);
        $statement->execute();
        
    }
public function getImageById($id_oglasa){
        $statement = $this->db->prepare($this->GETIMAGEBYID);
        $statement->bindValue(1,$id_oglasa);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

}



?>