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
            $_SESSION['message'] = "User with that email doesnt exist!";
            header("location: error:php");
        }
        else{
            $user = $result->fetch_assoc();
            if(password_verify($_POST['password'],$user['password'])){
                $_SESSION['email']=$user['email'];
                $_SESSION['first_name']=$user['first_name'];
                $_SESSION['last_name']=$user['last_name'];
                $_SESSION['active']=$user['active'];
                $_SESSION['logged_in']= true;
                header("location: landingpage.php");
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

        $firstname= $this->mysqli->escape_string($_POST['firstname']);
        $lastname= $this->mysqli->escape_string($_POST['lastname']);
        $email= $this->mysqli->escape_string($_POST['email']);
        $password= $this->mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash= $this->mysqli->escape_string(md5(rand(0,1000)));

        $result = $this->mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
        if($result->num_rows >0){
                $_SESSION['message']="Korisnik vec postoji!";
                header("location: greska.php");
         }
         else{
             $sql= "INSERT INTO users (first_name, last_name, email, password, hash) "
             ."VALUES ('$first_name','$last_name','$email','$password','$hash')";
             
             if($this->mysqli->query($sql) ){
                $_SESSION['active']= 1;
                $_SESSION['logged_in']=true;
                $_SESSION['message']='You have successfully registerd!';

                header("location:success.php");
             }
             else{
                 $_SESSION['message']='Registracija neuspesna:(';
                 header("location: greska.php");
             }
         }

    }
}
?>