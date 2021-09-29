<?php

function UpdateHistoryKPData($id_master,$smk,$judul,$status,$dosen)
{
    $cek = 0;
    $link = creatConnection();
    $insertquery = 'update master set SMK_idSMK=?,JudulKP = ?,StatusKP = ?,DosenPembimbingKP= ? where idMaster = ?';
    $stmt = $link->prepare($insertquery);
    $stmt->bindParam(1, $smk);
    $stmt->bindParam(2, $judul);
    $stmt->bindParam(3, $status);
    $stmt->bindParam(4, $dosen);
    $stmt->bindParam(5, $id_master);
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

function InsertHistoryKPData($nik,$smk,$judul,$status,$dosen)
{
    $cek = 0;
    $link = creatConnection();
    $insertquery = 'insert into master (user_NIK,SMK_idSMK,JudulKP,StatusKP,DosenPembimbingKP) values (?,?,?,?,?)';
    $stmt = $link->prepare($insertquery);
    $stmt->bindParam(1, $nik);
    $stmt->bindParam(2, $smk);
    $stmt->bindParam(3, $judul);
    $stmt->bindParam(4, $status);
    $stmt->bindParam(5, $dosen);
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


function deleteHistoryKPData($id_master)
{
    $cek = 0;
    $link = creatConnection();
    $deletequery = 'delete from master where idMaster=?';
    $stmt = $link->prepare($deletequery);
    $stmt->bindParam(1, $id_master);
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

function fetchHistoryKPDataByNIK(){
    $nik = $_SESSION["session_id"];
    $link=creatConnection();
    $query = 'Select * From master WHERE user_NIK=\'' . $nik  . '\'';
    $result= $link->query($query);
    $result = $result->fetchAll(\PDO::FETCH_ASSOC);
    closeConnection($link);
    return $result;
}