<?php
function fetchSidangSTAData(){
    $link=creatConnection();
    $query = 'Select * From Master m join user u ON m.user_NIK=u.NIK join SMK x ON m.SMK_idSMK=x.idSMK  WHERE x.MataKuliah_idMataKuliah ="STA"
            ';
    $result= $link->query($query);
    closeConnection($link);
    return $result;
}
function fetchMasterSTA(){
    $link=creatConnection();
    $query = 'Select * From Master';
    $result= $link->query($query);
    closeConnection($link);
    return $result;
}

function SelectedMasterData($nid)
{
    $link = creatConnection();
    $query = "SELECT * FROM Master WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nid);
    $stmt->execute();
    $result = $stmt->fetch();
    closeConnection($link);
    return $result;
}


function addSidangSTA($nik_sta,$smk_sta,$judul_sta, $dosenpembimbing_sta,$tanggal_sta,$jam_sta,$ruang_sta)
{
    $cek = 0;
    $link = creatConnection();
    $insertquery = 'Insert into Master(user_NIK,SMK_idSMK,JudulSTA,DosenPembimbingSTA,TanggalSTA,JamSTA,Ruang) values (?,?,?,?,?,?,?)';
    $stmt = $link->prepare($insertquery);
    $stmt->bindParam(1, $nik_sta);
    $stmt->bindParam(2, $smk_sta);
    $stmt->bindParam(3, $judul_sta);
    $stmt->bindParam(4, $dosenpembimbing_sta);
    $stmt->bindParam(5, $tanggal_sta);
    $stmt->bindParam(6, $jam_sta);
    $stmt->bindParam(7, $ruang_sta);
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
function UpdateSidangSTA($updated_id,$smk_sta2,$judul_sta2, $dosenpembimbing_sta2,$tanggal_sta2,$jam_sta2,$ruang_sta2){
$cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET SMK_idSMK=?,JudulSTA=?,DosenPembimbingSTA=?,TanggalSTA=?,JamSTA=?,Ruang=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $smk_sta2);
    $stmt->bindParam(2, $judul_sta2);
    $stmt->bindParam(3, $dosenpembimbing_sta2);
    $stmt->bindParam(4, $tanggal_sta2);
    $stmt->bindParam(5, $jam_sta2);
    $stmt->bindParam(6, $ruang_sta2);
    $stmt->bindParam(7, $updated_id);
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

function DeleteSidangSTA($sid)
{
    $cek = 0;
    $link = creatConnection();
    $deletequery = 'Delete From Master Where idMaster=?';
    $stmt = $link->prepare($deletequery);
    $stmt->bindParam(1, $sid);
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

function UpdateEvaluatorSTA($id,$evaluator1){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET Evaluator1=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $evaluator1);
    $stmt->bindParam(2, $id);
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

function UpdateNilaiEv1STA($idcoba,$angka1,$angka2, $angka3,$nilaitotal,$komentar){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA1_DosenPembimbing=?,NilaiSTA2_DosenPembimbing=?,NilaiSTA3_DosenPembimbing=?,NilaiTotal_DosenPembimbing=?,Komentar_DosenPembimbing=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $angka1);
    $stmt->bindParam(2, $angka2);
    $stmt->bindParam(3, $angka3);
    $stmt->bindParam(4, $nilaitotal);
    $stmt->bindParam(5, $komentar);
    $stmt->bindParam(6, $idcoba);
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
function UpdateNilaiEv2STA($idcoba,$angka1,$angka2, $angka3,$nilaitotal,$komentar){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA1_Evaluator1=?,NilaiSTA2_Evaluator1=?,NilaiSTA3_Evaluator1=?,NilaiTotal_Evaluator1=?,Komentar_Evaluator1=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $angka1);
    $stmt->bindParam(2, $angka2);
    $stmt->bindParam(3, $angka3);
    $stmt->bindParam(4, $nilaitotal);
    $stmt->bindParam(5, $komentar);
    $stmt->bindParam(6, $idcoba);
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
function UpdateNilaiKoorSTA($id, $nilai1ev1, $nilai2ev1, $nilai3ev1, $messageev1, $nilaitotalev1
    ,$nilai1ev2,$nilai2ev2,$nilai3ev2,$messageev2,$nilaitotalev2){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA1_DosenPembimbing=?,NilaiSTA2_DosenPembimbing=?,NilaiSTA3_DosenPembimbing=?,NilaiTotal_DosenPembimbing=?,Komentar_DosenPembimbing=?,
NilaiSTA1_Evaluator1=?,NilaiSTA2_Evaluator1=?,NilaiSTA3_Evaluator1=?,NilaiTotal_Evaluator1=?,Komentar_Evaluator1=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nilai1ev1);
    $stmt->bindParam(2, $nilai2ev1);
    $stmt->bindParam(3, $nilai3ev1);
    $stmt->bindParam(4, $nilaitotalev1);
    $stmt->bindParam(5, $messageev1);
    $stmt->bindParam(6, $nilai1ev2);
    $stmt->bindParam(7, $nilai2ev2);
    $stmt->bindParam(8, $nilai3ev2);
    $stmt->bindParam(9, $nilaitotalev2);
    $stmt->bindParam(10, $messageev2);
    $stmt->bindParam(11, $id);
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
function UpdateTotal($id,$nilaitotal){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiTotal=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nilaitotal);
    $stmt->bindParam(2, $id);
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
function UpdateNilai1($id,$nilai1,$nilaitotal1){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA1_DosenPembimbing=?,NilaiTotal_DosenPembimbing=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nilai1);
    $stmt->bindParam(2, $nilaitotal1);
    $stmt->bindParam(3, $id);
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
function UpdateNilai2($id,$nilai2,$nilaitotal2){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA2_DosenPembimbing=?,NilaiTotal_DosenPembimbing=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nilai2);
    $stmt->bindParam(2, $nilaitotal2);
    $stmt->bindParam(3, $id);
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
function UpdateNilai3($id,$nilai3,$nilaitotal3){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA3_DosenPembimbing=?,NilaiTotal_DosenPembimbing=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nilai3);
    $stmt->bindParam(2, $nilaitotal3);
    $stmt->bindParam(3, $id);
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
function UpdateNilai4($id,$nilai4,$nilaitotal4){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA1_Evaluator1=?,NilaiTotal_Evaluator1=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nilai4);
    $stmt->bindParam(2, $nilaitotal4);
    $stmt->bindParam(3, $id);
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
function UpdateNilai5($id,$nilai5,$nilaitotal5){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA2_Evaluator1=?,NilaiTotal_Evaluator1=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nilai5);
    $stmt->bindParam(2, $nilaitotal5);
    $stmt->bindParam(3, $id);
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
function UpdateNilai6($id,$nilai6,$nilaitotal6){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET NilaiSTA3_Evaluator1=?,NilaiTotal_Evaluator1=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nilai6);
    $stmt->bindParam(2, $nilaitotal6);
    $stmt->bindParam(3, $id);
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
function UpdateKomentar1($id,$komen1){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET Komentar_DosenPembimbing=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $komen1);
    $stmt->bindParam(2, $id);
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
function UpdateKomentar2($id,$komen2){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Master SET Komentar_Evaluator1=? WHERE idMaster = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $komen2);
    $stmt->bindParam(2, $id);
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





