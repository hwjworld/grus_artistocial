<?php

function getUserByEmailSql($email){
    return "select * from user where email='".$email."'";
}

function getUserByEmailAndPasswordSql($email, $password){
    //这里留一个SQL注入漏洞
    return "select * from user where email='".$email."' and password='".$password."'";
}

function getInsertUserSql()
{
    return "insert user(email,password,name,occupation,bio,arttype,picurl) value(?,?,?,?,?,?,?)";
}

function getDeletePortofolioPictures($userid){
    return "delete from userportfolio where userid=".$userid;
}

function getInsertUserPortofolioPictures(){
    return "insert into userportfolio (userid,artworkid ) SELECT ?,id as uid FROM artwork WHERE category=(select category from user where id=?) order by rand() limit 12";
}

function getUserPortofolioSql($userid){
    return "select * from artwork where id in (SELECT artworkId FROM userportfolio WHERE userid=" . $userid . ")";
}

function dataToModelUser($v){
    $user = new BusUser();
    $user->id = $v['id'];
    $user->email = $v['email'];
    $user->name = $v['name'];
    $user->occupation = $v['occupation'];
    $user->password = $v['password'];
    $user->bio = $v['bio'];
    $user->arttype = $v['arttype'];
    $user->picurl = $v['picurl'];
    $user->createtime = new DateTime($v['createtime']);
    return $user;
}

?>