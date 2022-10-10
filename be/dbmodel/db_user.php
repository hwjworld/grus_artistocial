<?php

function getUserByEmailSql($email){
    return "select * from user where email='".$email."'";
}

function getInsertUserSql()
{
    return "insert user(email,password,name,occupation,bio,arttype,picurl) value(?,?,?,?,?,?,?)";
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
    $user->createtime = $v['createtime'];
    return $user;
}

?>