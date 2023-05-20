<?php
class MRun extends Connection{
    private int $id;
    private string $game;
    private string $category;
    private string $time;
    private string $user;
    private bool $emulator;

    public function __construct(BDConfig $config, int $id){
        parent::__construct($config);
        $this->SelectRunId($id);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of game
     */ 
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set the value of game
     *
     * @return  self
     */ 
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the value of time
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of emulator
     */ 
    public function getEmulator()
    {
        return $this->emulator;
    }

    /**
     * Set the value of emulator
     *
     * @return  self
     */ 
    public function setEmulator($emulator)
    {
        $this->emulator = $emulator;

        return $this;
    }


/* 
                        Loaders
*/

private function SelectRunId($id)
{
    $sql = "SELECT * FROM run WHERE id=:id";

    $requete = $this->connect->prepare($sql);
    $requete->bindValue(":id", $id);
    $requete->execute();

    $run = $requete->fetch();

    if($run == NULL) throw new Exception("La run n'existe pas");

    $this->setId($run['id']);
    $this->setTime($run['hours'].":".$run['minutes'].':'.$run['seconds']);
    $this->setEmulator((bool)$run['emulator']);

    $this->setUser($this->SelectUser($run['userid'])['name']);

    $category = $this->SelectCategory((int)$run['categoryid']);
    $this->setCategory($category('name'));

    $game = $this->SelectGame((int)$category['gameid']);
    $this->setGame($game['name']);
}

private function SelectUser($id)
{
    $sql = "SELECT * FROM user WHERE id=:id";

    $requete = $this->connect->prepare($sql);
    $requete->bindValue(":id", $id);
    $requete->execute();

    $user = $requete->fetch();
    return $user;
}

private function SelectCategory($id){

    $sql = "SELECT * FROM category WHERE id=:id";

    $requete = $this->connect->prepare($sql);
    $requete->bindValue(":id", $id);
    $requete->execute();

    $category = $requete->fetch();
    return $category;
}

private function SelectGame($id){
    $sql = "SELECT * FROM game WHERE id=:id";

    $requete = $this->connect->prepare($sql);
    $requete->bindValue(":id", $id);
    $requete->execute();

    $game = $requete->fetch();
    return $game;
}

}


?>