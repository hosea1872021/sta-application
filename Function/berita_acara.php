<?php
function fetchMasterData()
{
    $link = creatConnection();
    $query = 'SELECT m.idMaster,m.user_NIK AS NIK, m.Ruang,m.NilaiTotal, m.JudulSTA AS JudulSTA, m.NilaiTotal_DosenPembimbing AS nilaiTotalPembimbing, m.NilaiTotal_Evaluator1 AS nilaiTotalEvaluator,  m.TanggalSTA, m.JamSTA, m.Komentar_DosenPembimbing AS komentarPembimbing,m.Evaluator1, m.DosenPembimbingSTA, m.Komentar_Evaluator1 AS komentarEvaluator,  LEFT(SMK_idSMK, 2) AS NamaProdi,
                    u.Nama ,u.TandaTangan,  u.Foto, 
                    x.KetuaProgramStudi, x.Dekan, x.Koordinator, x.idSMK
                    FROM Master m JOIN user u ON m.user_NIK=u.NIK JOIN SMK x ON m.SMK_idSMK=x.idSMK 
                    WHERE x.MataKuliah_idMataKuliah ="STA"';
    $result = $link->query($query);
    closeConnection($link);
    return $result;
}

function fetchMasterData1($mid){
    $link=creatConnection();
    $query = 'SELECT m.JudulSTA AS JudulSTA, m.NilaiTotal_DosenPembimbing AS nilaiTotalPembimbing, m.NilaiTotal_Evaluator1 AS nilaiTotalEvaluator,  m.TanggalSTA, m.JamSTA, m.Komentar_DosenPembimbing AS komentarPembimbing, m.Komentar_Evaluator1 AS komentarEvaluator,  LEFT(SMK_idSMK, 2) AS NamaProdi FROM Master m JOIN user u ON m.user_NIK=u.NIK JOIN SMK x ON m.SMK_idSMK=x.idSMK  WHERE x.MataKuliah_idMataKuliah ="STA" AND m.idMaster=?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $mid);
    $stmt->execute();
    $result = $stmt->fetch();
    closeConnection($link);
    return $result;
}

