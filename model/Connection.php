<?php
class Connection{
    protected BDConfig $config;
    protected ?PDO $connect; // le ? permet de mettre à NULL la variable.

    public function __construct(BDConfig $config){
        $this->config = $config;
        $this->connect = new PDO(
            $this->config->connectStr(),
            $this->config->getUser(),
            $this->config->getPwd(),
            array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_FOUND_ROWS => true 
            )
        );
    }

    public function getConfig() : BDConfig{ return $this->config; }
    
    function __destruct(){ $this->connect = null; }
}
?>