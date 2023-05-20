<?php
class MUser extends Connection{
    private int $id;
    private string $name;
    private string $user;

    public function __construct(BDConfig $config, string $user = NULL, string $password = NULL){
        parent::__construct($config);
        $this->LogInUser($user, $password);
    }

    public static function withID(BDConfig $config, int $id){
        $instance = new self($config);
        $instance->SelectUserId($id);

        return $instance;
    }

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }

    public function setId(int $id): self { 
        $this->id = $id; 
        return $this; 
    }

    public function setName(string $name): self{
        $name = trim($name);
        if(strlen($name) > 50 || empty($name))
            throw new Exception("Le nom doit avoir entre 1 et 50 caractères.");
        $this->name = $name;
        return $this;
    }


    /**
     * Get the value of msg
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of msg
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }


/* 
                        Loaders
*/

private function LogInUser($user, $pass)
{
    $sql = "SELECT * FROM user WHERE user=:user AND pwd=:pass";

    $requete = $this->connect->prepare($sql);
    $requete->bindValue(":user", $user);
    $requete->bindValue(":pass", $pass);
    $requete->execute();

    $user = $requete->fetch();

    if($user == NULL) throw new Exception("Le compte n'existe pas ou le mot de passe est incorrect");

    $this->setId($user['id']);
    $this->setName($user['name']);
    $this->setUser($user['user']);
}

private function SelectUserId($id)
{
    $sql = "SELECT * FROM user WHERE id=:id";

    $requete = $this->connect->prepare($sql);
    $requete->bindValue(":id", $id);
    $requete->execute();

    $user = $requete->fetch();

    if($user == NULL) throw new Exception("Le compte n'existe pas");

    $this->setId($user['id']);
    $this->setName($user['name']);
    $this->setUser($user['user']);
}

    
}
?>