<?php
function fetchUserData(){
    $link=creatConnection();
    $query = 'Select * From user';
    $result= $link->query($query);
    closeConnection($link);
    return $result;
}
function SelectedUserData($nid)
{
    $link = creatConnection();
    $query = "SELECT * FROM user WHERE NIK = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nid);
    $stmt->execute();
    $result = $stmt->fetch();
    closeConnection($link);
    return $result;
}
function fetchUserProfileData()
{
    $link=creatConnection();
    $query = 'Select * From user ';
    $result= $link->query($query);
    closeConnection($link);
    return $result;
}

function fetchUserMahasiswaData(){
    $link=creatConnection();
    $query = 'Select * From user WHERE Role="mahasiswa"';
    $result= $link->query($query);
    closeConnection($link);
    return $result;
}

function fetchUserDosenData(){
    $link=creatConnection();
    $query = 'Select * From user WHERE Role="dosen"';
    $result= $link->query($query);
    closeConnection($link);
    return $result;
}

function fetchUserKoorData(){
    $link=creatConnection();
    $query = 'Select * From user WHERE Role="koor"';
    $result= $link->query($query);
    closeConnection($link);
    return $result;
}

function fetchUserByID($id){
    $link=creatConnection();
    $query = 'Select * From user WHERE NIK = \'' . $_SESSION['session_id'] . '\'';
    $result= $link->query($query);
    closeConnection($link);
    return $result;
}

function login($username,$password)
{
    $link = creatConnection();
    $query = "Select * from user where Username=? and Password=?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $link->beginTransaction();
    $stmt->execute();
    $result = $stmt->fetch();
    closeConnection($link);
    return $result;
}


function uploadTandaTangan($uid,$tandatangan = null){
    $cek = 0;
    $link = creatConnection();
    $query = 'Update user SET TandaTangan=? Where NIK=?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $tandatangan);
    $stmt->bindParam(2, $uid);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
        $cek = 1;
    } else {
        $link->rollBack();
    }
    closeConnection($link);
    return $cek;
}
function DeleteUserData($nik)
{
    $cek = 0;
    $link = creatConnection();
    $deletequery = 'Delete From user Where NIK=?';
    $stmt = $link->prepare($deletequery);
    $stmt->bindParam(1, $nik);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
        $cek = 1;
    } else {
        $link->rollBack();
    }
    closeConnection($link);
    return $cek;
}
function AddAkun ($NIK,$Role,$Username, $Password,$Nama,$Email)
{
    $cek = 0;
    $link = creatConnection();
    $insertquery = 'Insert into user(NIK,Role,Username,Password,Nama,Email) values (?,?,?,?,?,?)';
    $stmt = $link->prepare($insertquery);
    $stmt->bindParam(1, $NIK);
    $stmt->bindParam(2, $Role);
    $stmt->bindParam(3, $Username);
    $stmt->bindParam(4, $Password);
    $stmt->bindParam(5, $Nama);
    $stmt->bindParam(6, $Email);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
        $cek = 1;
    } else {
        $link->rollBack();
    }
    closeConnection($link);
    return $cek;
}

function UpdateAkun($NIK,$Role,$Username, $Password,$Nama,$Email){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE user SET Role=?,Username=?,Password=?,Nama=?,Email=? WHERE NIK = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $Role);
    $stmt->bindParam(2, $Username);
    $stmt->bindParam(3, $Password);
    $stmt->bindParam(4, $Nama);
    $stmt->bindParam(5, $Email);
    $stmt->bindParam(6, $NIK);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
        $cek = 1;
    } else {
        $link->rollBack();
    }
    closeConnection($link);
    return $cek;
}

function UpdateUserData($NIK,$Role, $Password,$Nama,$Email,$NomorTelepon,$Website,$Github,$Facebook,$Twitter,$Instagram){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE user SET Role=?,Password=?,Nama=?,Email=?,NomorTelepon=?
    , Website=?, Github=? , Facebook=?,Twitter=?,Instagram=? WHERE NIK = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $Role);
    $stmt->bindParam(2, $Password);
    $stmt->bindParam(3, $Nama);
    $stmt->bindParam(4, $Email);
    $stmt->bindParam(5, $NomorTelepon);
    $stmt->bindParam(6, $Website);
    $stmt->bindParam(7, $Github);
    $stmt->bindParam(8, $Facebook);
    $stmt->bindParam(9, $Twitter);
    $stmt->bindParam(10, $Instagram);
    $stmt->bindParam(11, $NIK);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
        $cek = 1;
    } else {
        $link->rollBack();
    }
    closeConnection($link);
    return $cek;
}

function UpdateTandaTangan($NIK,$TandaTangan=null){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE user SET TandaTangan=? WHERE NIK = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $TandaTangan);
    $stmt->bindParam(2, $NIK);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
        $cek = 1;
    } else {
        $link->rollBack();
    }
    closeConnection($link);
    return $cek;
}
function uploadFoto($uid,$foto = null){
    $cek = 0;
    $link = creatConnection();
    $query = 'Update user SET Foto=? Where NIK=?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $foto);
    $stmt->bindParam(2, $uid);
    $link->beginTransaction();
    if ($stmt->execute()) {
        $link->commit();
        $cek = 1;
    } else {
        $link->rollBack();
    }
    closeConnection($link);
    return $cek;
}