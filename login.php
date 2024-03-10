<?php
require('connect.php');

function chargerClass($classname) {
    require $classname . '.php';
}
spl_autoload_register("chargerClass");
session_start();
$conn = new PDO("mysql:host=localhost;dbname=bd_personnel", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
if (isset($_POST['cree'])) {
    $data = array(
        
        'email' => $_POST['email'],
        'password' => $_POST['password']
    );


}
class user {
   
    private $email;
    private $password;
 


    public function __construct(array $user)
    {
        $this->hydrate($user);
    }

    public function hydrate(array $user)
    {
        foreach ($user as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }


    public function getPassword() {
        return $this->password;
    }

    public function setPassword($value) {
        $this->password = $value;
    } 

}



class users {

    private $conn;

    public function __construct(PDO $conn) 
    { 
        $this->conn = $conn;
    }

    public function insererUser(User $cv) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO Users ( email, Password) 
                 VALUES ( :email, :Password");
            $stmt->bindValue(':email', $cv->getEmail());
            $stmt->bindValue(':Password', $cv->getPassword());
            $stmt->execute();

        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}

?>