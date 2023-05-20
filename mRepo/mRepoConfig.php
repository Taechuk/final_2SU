<?php
class mRepoConfig{
    private string $BD;
    private string $address;
    private string $user;
    private string $pwd;
    private string $encode;
    private string $motor;

    public function __construct(string $BD, string $address, string $user, string $pwd, string $encode = 'utf8mb4', string $motor = 'mysql'){
        $this->BD = $BD;
        $this->address = $address;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->encode = $encode;
        $this->motor = $motor;
    }

    public function connectStr() : string{ return "$this->motor:dbname=$this->BD;host=$this->address;charset=$this->encode;"; }
    public function getBD() : string { return $this->BD; }
    public function getAddress() : string { return $this->address; }
    public function getUser() : string { return $this->user; }
    public function getPwd() : string { return $this->pwd; }
    public function getEncode() : string { return $this->encode; }
    public function getMotor() : string { return $this->motor; }
}
?>