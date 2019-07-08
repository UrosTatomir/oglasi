<?php 
require_once '../model/DAO.php';
class Controller{

public function filterOglasa(){
$mesto=isset($_GET['mesto'])?$_GET['mesto']:"";
$kategorija=isset($_GET['kategorija'])?$_GET['kategorija']:"";
$cena=isset($_GET['cena'])?$_GET['cena']:"";


  if(!empty($mesto)&&!empty($kategorija)&&!empty($cena)){ //prvi krug filtera svi ukljuceni
            $dao = new DAO();
            $oglasi_filter = $dao->getFilterOglasi($mesto, $kategorija, $cena);
            if (empty($oglasi_filter)) {

                //  $msg="Nema trazenih oglasa u arhivi pokusajte ponovo";
                session_start();
                unset($_SESSION['oglasi']);
                header('Location:index.php?msg=Nema trazenih oglasa u arhivi pokusajte ponovo');
                //   include 'index.php';

            } else {
                session_start();
                $_SESSION['oglasi'] = $oglasi_filter;
                header('Location:index.php');
                //   include 'index.php';
            }

  }elseif(!empty($mesto) && !empty($kategorija) && empty($cena)){
         $dao=new DAO();
         $oglasi_filter=$dao->getfilterOglasiMestoKategorija($mesto,$kategorija);
            if (empty($oglasi_filter)) {

                //  $msg="Nema trazenih oglasa u arhivi pokusajte ponovo";
                session_start();
                unset($_SESSION['oglasi']);
                header('Location:index.php?msg=Nema trazenih oglasa u arhivi pokusajte ponovo');
                //   include 'index.php';

            } else {
                session_start();
                $_SESSION['oglasi'] = $oglasi_filter;
                header('Location:index.php');
                //   include 'index.php';
            }
      
  }elseif(!empty($mesto) && empty($kategorija) && !empty($cena)){
         $dao=new DAO();
         $oglasi_filter=$dao->getFilterOglasiMestoCena($mesto,$cena);
            if (empty($oglasi_filter)) {

                //  $msg="Nema trazenih oglasa u arhivi pokusajte ponovo";
                session_start();
                unset($_SESSION['oglasi']);
                header('Location:index.php?msg=Nema trazenih oglasa u arhivi pokusajte ponovo');
                //   include 'index.php';

            } else {
                session_start();
                $_SESSION['oglasi'] = $oglasi_filter;
                header('Location:index.php');
                //   include 'index.php';
            }
  }elseif(empty($mesto) && !empty($kategorija) && !empty($cena)){
         $dao=new DAO();
         $oglasi_filter=$dao->getFilterOglasiKategorijaCena($kategorija,$cena);
            if (empty($oglasi_filter)) {

                //  $msg="Nema trazenih oglasa u arhivi pokusajte ponovo";
                session_start();
                unset($_SESSION['oglasi']);
                header('Location:index.php?msg=Nema trazenih oglasa u arhivi pokusajte ponovo');
                //   include 'index.php';

            } else {
                session_start();
                $_SESSION['oglasi'] = $oglasi_filter;
                header('Location:index.php');
                //   include 'index.php';
            }
  }elseif(!empty($mesto) && empty($kategorija) && empty($cena)){
         $dao=new DAO();
         $oglasi_filter=$dao->getFilterOglasiMesto($mesto);
            if (empty($oglasi_filter)) {
 
                //  $msg="Nema trazenih og lasa u arhivi pokusajte ponovo";
                session_start();
                unset($_SESSION['oglasi']);
                header('Location:index.php?msg=Nema trazenih oglasa u arhivi pokusajte ponovo');
                //   include 'index.php';

            } else {
                session_start();
                $_SESSION['oglasi'] = $oglasi_filter;
                header('Location:index.php');
                //   include 'index.php';
            }
  }elseif(!empty($mesto) && empty($kategorija) && empty($cena)){
         $dao=new DAO();
         $oglasi_filter=$dao->getFilterOglasiMesto($mesto);
            if (empty($oglasi_filter)) {

                //  $msg="Nema trazenih oglasa u arhivi pokusajte ponovo";
                session_start();
                unset($_SESSION['oglasi']);
                header('Location:index.php?msg=Nema trazenih oglasa u arhivi pokusajte ponovo');
                //   include 'index.php';

            } else {
                session_start();
                $_SESSION['oglasi'] = $oglasi_filter;
                header('Location:index.php');
                //   include 'index.php';
            }
  }elseif(empty($mesto) && !empty($kategorija) && empty($cena)){
         $dao=new DAO();
         $oglasi_filter=$dao->getFilterOglasiKategorija($kategorija);
            if (empty($oglasi_filter)) {

                //  $msg="Nema trazenih oglasa u arhivi pokusajte ponovo";
                session_start();
                unset($_SESSION['oglasi']);
                header('Location:index.php?msg=Nema trazenih oglasa u arhivi pokusajte ponovo');
                //   include 'index.php';

            } else {
                session_start();
                $_SESSION['oglasi'] = $oglasi_filter;
                header('Location:index.php');
                //   include 'index.php';
            }
  }elseif(empty($mesto) && empty($kategorija) && !empty($cena)){
         $dao=new DAO();
         $oglasi_filter=$dao->getFilterOglasiCena($cena);
            if (empty($oglasi_filter)) {

                //  $msg="Nema trazenih oglasa u arhivi pokusajte ponovo";
                session_start();
                unset($_SESSION['oglasi']);
                header('Location:index.php?msg=Nema trazenih oglasa u arhivi pokusajte ponovo');
                //   include 'index.php';

            } else {
                session_start();
                $_SESSION['oglasi'] = $oglasi_filter;
                header('Location:index.php');
                //   include 'index.php';
            }
  }else{
            session_start();
            unset($_SESSION['oglasi']);
            header('Location:index.php?msg=Prikazani su svi oglasi ');
  } 

     
}
public function login(){

     $username=isset($_POST['username'])?$_POST['username']:"";
     $password=isset( $_POST['password'])?$_POST['password']:"";

     if(!empty($username) && !empty($password)){
         $dao= new DAO();
         $user=$dao->login($username,$password);
         if($user){
        
         session_start();
         $_SESSION['user']=$user;
         header('Location:index.php');
        

         }else{
             $msg= "Netacan username ili password";
             include 'login.php';
         }

     }else{
       $msg= "Morate uneti username i password";
       include 'login.php';
     }

 }
 public function registration(){
   $name=isset($_POST['name'])?$_POST['name']:"";
   $surname=isset($_POST['surname'])?$_POST['surname']:"";
   $email=isset($_POST['email'])?$_POST['email']:"";
   $phone=isset($_POST['phone'])?$_POST['phone']:"";
   $username=isset($_POST['username'])?$_POST['username']:"";
   $password=isset($_POST['password'])?$_POST['password']:"";
   $confirmpassword=isset($_POST['confirmpassword'])?$_POST['confirmpassword']:"";

   $errors=array();

   if(empty($name)){
       $errors['name']= "Morate uneti vase ime";
   }
   if(empty($surname)){
       $errors['surname']= "Morate uneti vase prezime";
   }
   if(empty($email)){
       $errors['email']= "Morate uneti vas email";

   }else{

     if(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
         $errors['email']= "Morate uneti validan email";
     }else{
         $dao=new DAO();
         $mail=$dao->getAllUsers();
         foreach($mail as $m){
             if($m['email']==$email){
              $errors['email']= "Uneti email vec postoji, molimo vas unesite drugi email";
             }
         }
     }
   }
   if(empty($phone)){
       $errors['phone']= "Morate uneti vas  telefon";
   }
   if(empty($username)){
      
       $errors['username']="Unesite  username";
   }else{
       $dao=new DAO();
       $usernm=$dao->getAllUsers();
       foreach($usernm as $us){
        
         if($us['username']==$username){
           $errors['username']= "Uneti username vec postoji,molimo vas drugi username";
         }
       }
   }
   if(empty($password)){
       $errors['password']="Unesite password";
   }
   if(empty($confirmpassword)){

       $errors['confirmpassword']= "Potvrdite password";

   }else{ 
       if ($password !== $confirmpassword){

                $errors['confirmpassword'] = "Uneseni password nije isti";
            }
        }
    $admin=0;
   if(count($errors)==0){
     
       $dao=new DAO();
       
       $dao->register($name,$surname,$email,$phone,$username,$password,$admin);
       $msg= "Uspesno ste se registrovali,molimo vas prijavite se";
       include 'login.php';
   }else{

      $msg= "Morate ispravno popuniti formu ";
      $register=1;
      include 'login.php';
   }

 }
 public function showRegister(){
     $register=1;
     include 'login.php';
 }
  public function logout(){
     session_start();
     unset($_SESSION['user']);
    //  session_destroy();
     header('Location:index.php');
    
 }
 public function refreshIndex(){
     session_start();
      unset($_SESSION['oglasi']);
     header('Location:index.php?msg=Prikazani su svi oglasi');
 }
 public function showDodajOglas(){
     session_start();
     if(isset($_SESSION['user'])){
         header('Location:dodaj_oglas.php');
     }else{
         include 'login.php';
     }
 }
 public function dodajOglas(){
 
    $naziv=isset($_POST['naziv'])?$_POST['naziv']:"";
    $kategorija=isset($_POST['kategorija'])?$_POST['kategorija']:"";
    $opis=isset($_POST['opis'])?$_POST['opis']:"";
    $cena=isset($_POST['cena'])?$_POST['cena']:"";
    $mesto=isset($_POST['mesto'])?$_POST['mesto']:"";
    $telefon=isset($_POST['telefon'])?$_POST['telefon']:"";
    $upload_img=isset($_POST['upload_img'])?$_POST['upload_img']:"";

    $errors=array();

    if(empty($naziv)){
        $errors['naziv']= "Unesite naziv oglasa";
    }
    if(empty($kategorija)){
        $errors['kategorija']= "Odaberite kategoriju";
    }
    if(empty($opis)){
        $errors['opis']= "Unesite opis oglasa";
    }
    if(empty($cena)){
        $errors['cena']="Unesite cenu ";
    }else{
        if(is_numeric($cena)){
            if($cena<0){
                $errors['cena']= "Cena mora biti veca od 0";
            }
        }else{
            $errors['cena']= "Cena mora biti numericka vrednost";
        }
    }
    if(empty($mesto)){
        $errors['mesto']= "Odaberite grad";
    }
    if(empty($telefon)){
        $errors['telefon']= "Unesite kontakt telefon";
    }
    
//upload image
    $uploaddir ='C:/xampp/htdocs/oglasi/images/';
    
    if(isset($_FILES['upload_img']['name'])){ //Mora da se postavi uslov zbog toga sto se prilikom postavljanja forme ne ucitava odmah slika 
    //  var_dump($_FILES);
        $uploadfile = $uploaddir . basename($_FILES['upload_img']['name']);
        $upload_img = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
 
       if(isset($uploadfile)){
         $check = getimagesize($_FILES["upload_img"]['tmp_name']);

            if($check !== false){ 
                echo "File is an image - " . $check["mime"] . ".";            
            }else{
              $errors['upload_img']="Ovaj file nije slika.";
            }
       } 
        if (file_exists($uploadfile)) {  
        $errors['upload_img'] ="Izabrani file vec postoji." ;
        }
        if ($_FILES['upload_img']["size"] > 1000000) { 
        $errors['upload_img']="Max. velicina slike je 1.5 MB";
        }    
    }
    
if(count($errors)==0){  
    if(isset($uploadfile)){
    if($upload_img !='jpg' && $upload_img !='png' && $upload_img !='jpeg' && $upload_img !='gif' ) {
     
       $errors['upload_img'] ="Slika mora bit u formatima .jpg,.jpeg,.png,.gif";
    }
    
        if(move_uploaded_file($_FILES ["upload_img"]['tmp_name'],$uploadfile)) {

        echo "The file ". basename( $_FILES['upload_img']['name']). " has been uploaded.";

        }else{
        $errors['upload_img'] = "Sorry, there was an error uploading your file.";
        }
    }
    if(isset($_FILES['upload_img']['name'])){
          $img=(array_column($_FILES,'name'));
                    
        }
        $dao= new DAO();
        $dao->insertOglas($naziv,$kategorija,$opis,$cena,$mesto,$telefon,$img[0]);
        
        session_start();
        unset($_SESSION['oglasi']);
        
        header('Location:index.php?msg=Vas oglas uspesno je postavljen');
}else{
        $msg= "Molimo vas da ispravno  popunite formu";
        include 'dodaj_oglas.php';
    }

}//end dodaj oglas
 public function showDetails(){
  $id_oglasa=isset($_GET['id_oglasa'])?$_GET['id_oglasa']:"";
  $dao= new DAO();
  $all_details=$dao-> getOglasView($id_oglasa);

  include 'view_details.php';  
 }
public function deleteOglasa(){
 $id_oglasa=isset($_GET['id_oglasa'])?$_GET['id_oglasa']:"";

 $dao= new DAO();
 $image_name=$dao->getImageById($id_oglasa);
   //var_dump($image_name);     
   $image = implode(",", $image_name); 
   //var_dump($image);
   //path putanja do slike
   $path="../images/".$image;

   
  if(file_exists($path)){
     unlink($image);
     //var_dump(fajl obrisan);
   //include 'index.php';
    }else{
        //var_dump(nije obrisan fajl);
        //include 'index.php';
    }
     $dao->deleteO($id_oglasa);
     header('Location:index.php?msg=Fajl je obrisan');

}
    public function dinamickiUpit(){
        $conditions = [];  //kreiranje praznog niza za upit
        $parameters = [];  //kreiranje praznog niza za vrednosti

        if (!empty($_GET['mesto'])){ //provera da li je prazno 'mesto'
            $mesto = $_GET['mesto'];  //kupi se mesto
            $conditions[] = 'mesto =?'; //deo SQL upita za mesto
            $parameters[] = $mesto;  // dodavanje vrednosti mesta u niz za vrednosti
        }

        if (!empty($_GET['kategorija'])) {  //provera da li je prazna 'kategorija'

            $kategorija = $_GET['kategorija'];  //kupi se kategorija
            $in  = str_repeat('?,', count($_GET['kategorija']) - 1) . '?';  //kreira se promenljiva in
            //koja ce imati onoliko ? koliko je pokupljeno iz formulara
            //npr. ?,?,? za tri izabrane opcije!!
            $conditions[] = "id_kategorije IN ($in)"; //deo SQL upita za kategoriju
            foreach ($kategorija as $kat) {
                $parameters[] = $kat; //svaka vrednost iz niza kategorija se posebno ubacije u niz vrednosti
            }
        }
        if (!empty($_GET['min'])) { //provera da li je prazan minimum
            $minimum = $_GET['min'];  //kupi se minimum
            $conditions[] = 'cena >= ?';  //upit za minimum
            $parameters[] = $minimum; // dodavanje vrednosti minimuma u niz za vrednosti
        }
        if (!empty($_GET['max'])) { //provera da li je prazan maximum
            $maximum = $_GET['max'];  //kupi se maximum
            $conditions[] = 'cena <= ?';  //upit za maximum
            $parameters[] = $maximum;  // dodavanje vrednosti maximuma u niz za vrednosti
        }
    }

}//end class Controller


?>