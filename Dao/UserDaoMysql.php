<?php
require_once ("models/Users.php");
include_once("config/url.php");

class UserDaoMysql  implements UsersDAO
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Users $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO contacts (name,email,observation) VALUES (:name,:email,:observation)");
        $sql->bindValue(":name",$u->getName());
        $sql->bindValue(":email",$u->getEmail());
        $sql->bindValue(":observation",$u->getObservation());
        $sql->execute();

        $u->setID($this->pdo->lastInsertId());
        return $u;
    
    }
    public function findAll()
    {

        $array = [];
        $sql = $this->pdo->query('SELECT * FROM contacts');
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $u = new Users();
                $u->setID($item['id']);
                $u->setName($item['name']);
                $u->setEmail($item['email']);
                $u->setObservation($item['observation']);

                $array[] = $u;
            }
        }
        return $array;
    }
    public function findbyId($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM contacts WHERE id =:id");
        $sql->bindValue(':id',$id);
        $sql->execute();


        if ($sql->rowcount() > 0) {
            $data = $sql->fetch();

            $u = new Users();
            $u->setid($data['id']);
            $u->setName($data['name']);
            $u->setEmail($data['email']);
            $u->setObservation($data['observation']);

            return $u;
        }else{
            return false;
        }

    }
    public function findbyEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM contacts WHERE email =:email");
        $sql->bindValue(':email',$email);
        $sql->execute();


        if ($sql->rowcount() > 0) {
            $data = $sql->fetch();

            $u = new Users();
            $u->setid($data['id']);
            $u->setName($data['name']);
            $u->setEmail($data['email']);

            return $u;
        }else{
            return false;
        }


    }
    public function update(Users $u)
    {
        $sql = $this->pdo->prepare("UPDATE contacts SET name = :name,email = :email,observation = :observation WHERE id =:id");
        $sql->bindValue(':name',$u->getName());
        $sql->bindValue(':email',$u->getEmail());
        $sql->bindValue(':observation',$u->getObservation());
        $sql->bindValue(':id',$u->getID());
        $sql->execute();

        return true;
    }
    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM contacts WHERE id =:id");
        $sql->bindValue(':id',$id);
        $sql->execute();
    }
}
