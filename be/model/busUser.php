<?php

class BusUser{
    public int $id;
    public string $email;
    public string $password;
    public string $name = "anonymous user";
    public string $occupation = "hidden occupation";
    public string $bio = "i'm good";
    public string $arttype;
    public string $picurl;
    public DateTime $createtime;
}
?>