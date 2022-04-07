<?php
class UserInterface{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $mysqli;


    public function __construct(){
    $this->host='localhost';
    $this->user='root';
    $this->pass='';
    $this->db='nalozi';
    $this->mysqli=new mysqli($this->host,$this->user,$this->pass,$this->db) or die($this->mysqli->error);
    }

    public function login(){
        $email=$this->mysqli->escape_string($_POST['email']);
        $result=$this->mysqli->query("SELECT * FROM users WHERE email='$email'");
        if($result->num_rows == 0){
            $_SESSION['message'] = "Korisnik sa ovom adresom ne postoji u bazi!";
            header("location: greska.php");
        }
        else{
            $user = $result->fetch_assoc();
            if($_POST['password']==$user['password']){
                $_SESSION['email']=$user['email'];
                $_SESSION['first_name']=$user['first_name'];
                $_SESSION['last_name']=$user['last_name'];
                $_SESSION['active']=$user['active'];
                $_SESSION['logged_in']= true;
                $_SESSION['id']=$user['id'];
                header("location: main.php");
            }
            else{
                $_SESSION['message']="Uneli ste pogresnu sifru, pokusajte ponovo!";
                header("location: greska.php");
            }
        }

    }
    public function register(){
        $_SESSION['email']=$_POST['email'];
        $_SESSION['first_name']=$_POST['firstname'];
        $_SESSION['last_name']=$_POST['lastname'];

        $first_name=    $this->mysqli->escape_string($_POST['firstname']);
        $last_name=     $this->mysqli->escape_string($_POST['lastname']);
        $email=         $this->mysqli->escape_string($_POST['email']);
        $password=      $this->mysqli->escape_string($_POST['password']);

        $result = $this->mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
        if($result->num_rows > 0){
                $_SESSION['message']="Korisnik vec postoji!";
                header("location: greska.php");
         }
         else{
             $sql= "INSERT INTO users (first_name, last_name, email, password) "
             ."VALUES ('$first_name','$last_name','$email','$password')";
             
             if($this->mysqli->query($sql) ){
                $_SESSION['id']=$user['id'];
                $_SESSION['active']= 1;
                $_SESSION['logged_in']=true;
                $_SESSION['message']='Uspesno ste se registrovali, hvala na poverenju :)';

                header("location:uspesno.php");
             }
             else{
                 $_SESSION['message']='Registracija neuspesna:(';
                 header("location: greska.php");
             }
         }

    }
    public function podeli(){
     
        $id = $_SESSION['id'];
        $first_name=$_SESSION['first_name'];  
        $last_name=$_SESSION['last_name'];
        $email=$_SESSION['email'];    
        $lokacija=$this->mysqli->escape_string($_POST['lokacija']);
        $datum=$this->mysqli->escape_string($_POST['datum']);
        $min=$this->mysqli->escape_string($_POST['min']);
        $max=$this->mysqli->escape_string($_POST['max']);
        $opis=$this->mysqli->escape_string($_POST['opis']);
    

        $result = $this->mysqli->query("SELECT * FROM users WHERE id='$id'") or die($mysqli->error());
        if($result->num_rows != 1){
                $_SESSION['message']="Morate se ulogovati da bi objavili avanture.!";
                header("location: greska.php");
         }
         else{
             $sql= "INSERT INTO avanture (user_id, first_name, lokacija, datum,min,max,opis) "
             ."VALUES ('$id','$first_name','$lokacija','$datum','$min','$max','$opis')";
             
             if($this->mysqli->query($sql) ){

                $_SESSION['message']='Uspesno ste se postavili avanturu, neko ce se ubrzo javiti :)';

                header("location:mojeavanture.php");
             }
             else{
                 $_SESSION['message']='Postavljanje neuspesno :(';
                 header("location: greska.php");
             }
         }

    }
}
?>