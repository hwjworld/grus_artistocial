<?php

require_once(__DIR__."/../tools/database.php");
require_once(__DIR__."/../dbmodel/db_user.php");
require_once(__DIR__."/../model/busUser.php");

class User{

    private $db;

    function __construct()
    {
        $this->db = new Db();
    }

    public function getUserByEmail($email){
        $v = $this->db->query(getUserByEmailSql($email));
        if(count($v)>0){
            return dataToModelUser($v[0]);
        }
        return null;
    }

    public function getUserByValidEmailAndPwd($email, $password){
        $v = $this->db->query(getUserByEmailAndPasswordSql($email, $password));
        if(count($v)>0){
            return dataToModelUser($v[0]);
        }
        return null;
    }

    public function saveUser(BusUser $user)
    {
        $result = $this->db->preparedStatment(getInsertUserSql(), str_repeat('s', 7), [
            $user->email,
            $user->password,
            $user->name,
            $user->occupation,
            $user->bio,
            $user->arttype,
            $user->picurl
        ]);
        if ($result) {
            echo "insert user from db successful";
        } else {
            echo "insert user from db fail";
        }
        return $result;
    }

    private function setPortofolioToUser($userid){
        //delete portofolio right now
        $this->db->query(getDeletePortofolioPictures($userid));
        //set new portfolio to user ,12 pictures
        $result = $this->db->preparedStatment(getInsertUserPortofolioPictures(), 'ii', [
            $userid, $userid
        ]);
        if ($result) {
            echo "insert user portofolio to db successful";
        } else {
            echo "insert user portofolio fail";
        }
        return $result;
    }

    public function getUserPortofolio($userid){
        $portofolio = array();
        $portofolio_result = $this->db->query(getUserPortofolioSql($userid));
        // var_dump($genes_result);
        foreach($portofolio_result as $k=>$v){
            array_push($portofolio, dataToModelArtwork($v));
        }
        return $portofolio;
        
    }
}
?>