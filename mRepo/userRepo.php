<?php
class userRepo extends mRepo{
    public function selectAll(): array
    {
        $requete = $this->connect->prepare("SELECT * FROM user");
        $requete->execute();

        $users = array();
        while ($record = $requete->fetch()){
            $user = new user($record['user'], $record['pwd'], $record['name'], $record['id']);
            $users[] = $user;
        }

        return $users;
    }

    public function selectFromId(int $id): ?user
    {
        $requete = $this->connect->prepare("SELECT * FROM user WHERE id=:id");
        $requete->bindValue(":id", $id);
        $requete->execute();

        $user = null;
        if ($record = $requete->fetch()){
            $user = new user($record['user'], $record['pwd'], $record['name'], $record['id']);
        }

        return $user;
    }

    public function selectLogin(string $user, string $password): ?user
    {
        $requete = $this->connect->prepare("SELECT * FROM user user=:user AND pwd=:pwd");
        $requete->bindValue(":user", $user);
        $requete->bindValue(":pwd", $password);
        $requete->execute();

        $user = null;
        if ($record = $requete->fetch()){
            $user = new user($record['user'], $record['pwd'], $record['name'], $record['id']);
        }

        return $user;
    }

    public function selectFromName(string $name): ?user
    {
        $requete = $this->connect->prepare("SELECT * FROM user WHERE user=:user");
        $requete->bindValue(":user", $name);
        $requete->execute();

        $user = null;
        if ($record = $requete->fetch()){
            $user = new user($record['user'], $record['pwd'], $record['name'], $record['id']);
        }

        return $user;
    }
}
?>