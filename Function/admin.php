<?php
//semester
function fetchSemesterData()
{
    $link = creatConnection();
    $query = 'Select * From Semester';
    $result = $link->query($query);
    closeConnection($link);
    return $result;
}

function SelectedSemesterData($sid)
{
    $link = creatConnection();
    $query = "SELECT * FROM Semester WHERE idSemester = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $sid);
    $stmt->execute();
    $result = $stmt->fetch();
    closeConnection($link);
    return $result;
}

function addSemesterData($idsemester, $namasemester, $inisialprodi, $namaprodi)
{
    $cek = 0;
    $link = creatConnection();
    $insertquery = 'Insert into Semester(idSemester,NamaSemester,InisialProdi,NamaProdi) values (?,?,?,?)';
    $stmt = $link->prepare($insertquery);
    $stmt->bindParam(1, $idsemester);
    $stmt->bindParam(2, $namasemester);
    $stmt->bindParam(3, $inisialprodi);
    $stmt->bindParam(4, $namaprodi);
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

function DeleteSemesterData($sid)
{
    $cek = 0;
    $link = creatConnection();
    $deletequery = 'Delete From Semester Where idSemester=?';
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

function UpdateSemesterData($sid,$namasemester, $inisialprodi, $namaprodi){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE Semester SET NamaSemester=?, InisialProdi=?, NamaProdi=? WHERE idSemester = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $namasemester);
    $stmt->bindParam(2, $inisialprodi);
    $stmt->bindParam(3, $namaprodi);
    $stmt->bindParam(4, $sid);
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

//Matakuliah
function fetchMataKuliahData()
{
    $link = creatConnection();
    $query = 'Select * From MataKuliah';
    $result = $link->query($query);
    closeConnection($link);
    return $result;
}
function SelectedMataKuliahData($mid)
{
    $link = creatConnection();
    $query = "SELECT * FROM MataKuliah WHERE idMataKuliah = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $mid);
    $stmt->execute();
    $result = $stmt->fetch();
    closeConnection($link);
    return $result;
}
function UpdateMataKuliahData($mid,$namamatakuliah){
    $cek = 0;
    $link = creatConnection();
    $query = "UPDATE MataKuliah SET NamaMataKuliah = ? WHERE idMataKuliah = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $namamatakuliah);
    $stmt->bindParam(2, $mid);
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

function addMataKuliahData($idmatakuliah, $namamatakuliah)
{
    $cek = 0;
    $link = creatConnection();
    $insertquery = 'Insert into MataKuliah(idMataKuliah,NamaMataKuliah) values (?,?)';
    $stmt = $link->prepare($insertquery);
    $stmt->bindParam(1, $idmatakuliah);
    $stmt->bindParam(2, $namamatakuliah);
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

function DeleteMataKuliahData($mid)
{
    $cek = 0;
    $link = creatConnection();
    $deletequery = 'Delete From MataKuliah Where idMataKuliah=?';
    $stmt = $link->prepare($deletequery);
    $stmt->bindParam(1, $mid);
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

//smk
function fetchSMKData()
{
    $link = creatConnection();
    $query = 'Select * From SMK x join Semester s ON x.Semester_idSemester=s.idSemester join MataKuliah m ON x.MataKuliah_idMataKuliah=m.idMataKuliah';
    $result = $link->query($query);
    closeConnection($link);
    return $result;
}

function fetchSMKSTAData()
{
    $link = creatConnection();
    $query = 'Select * From SMK x join Semester s ON x.Semester_idSemester=s.idSemester join MataKuliah m ON x.MataKuliah_idMataKuliah=m.idMataKuliah 
                WHERE x.MataKuliah_idMataKuliah="STA"';
    $result = $link->query($query);
    closeConnection($link);
    return $result;
}

function addSMKData($idsmk, $smkidsemester, $smkidmatakuliah,$kaprodi,$dekan,$koordinator)
{
    $cek = 0;
    $link = creatConnection();
    $insertquery = 'Insert into SMK(idSMK,Semester_idSemester,MataKuliah_idMataKuliah,Dekan,KetuaProgramStudi,Koordinator) values (?,?,?,?,?,?)';
    $stmt = $link->prepare($insertquery);
    $stmt->bindParam(1, $idsmk);
    $stmt->bindParam(2, $smkidsemester);
    $stmt->bindParam(3, $smkidmatakuliah);
    $stmt->bindParam(4, $kaprodi);
    $stmt->bindParam(5, $dekan);
    $stmt->bindParam(6, $koordinator);
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

function DeleteSMKData($smkid)
{
    $cek = 0;
    $link = creatConnection();
    $deletequery = 'Delete From SMK Where idSMK=?';
    $stmt = $link->prepare($deletequery);
    $stmt->bindParam(1, $smkid);
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

function PilihSMKData()
{
    $link = creatConnection();
    $query = 'Select * From Semester , MataKuliah  ';
    $result = $link->query($query);
    closeConnection($link);
    return $result;
}