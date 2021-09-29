<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" href="admin.css"/>
    <script>

        function deleteSemester(idSemester) {
            let confimation = window.confirm("Are you sure want to delete?")
            if (confimation) {
                window.location = "?menu=administrasi&cmdsemester=delsemester&sid=" + idSemester;
            }
        }

        function deleteMataKuliah(idMataKuliah) {
            let confimation = window.confirm("Are you sure want to delete?")
            if (confimation) {
                window.location = "?menu=administrasi&cmdmatakuliah=delmatakuliah&mid=" + idMataKuliah;
            }
        }

        function deleteSMK(idSMK) {
            let confimation = window.confirm("Are you sure want to delete?")
            if (confimation) {
                window.location = "?menu=administrasi&cmdSMK=delSMK&smkid=" + idSMK;
            }
        }
    </script>

</head>
<body>
<?php
//semester
//Code For Update
$updatedatasemester = filter_input(INPUT_POST, 'btnUpdateDataSemester');
if (isset($updatedatasemester)) {
    $sid = filter_input(INPUT_POST, 'updated_idsemester');
    $namasemesterupdate = filter_input(INPUT_POST, 'NamaSemesterUpdate');
    $inisialprodiupdate = filter_input(INPUT_POST, 'InisialProdiUpdate');
    $namaprodiupdate = filter_input(INPUT_POST, 'NamaProdiUpdate');
    $resultupdatesemester = UpdateSemesterData($sid, $namasemesterupdate, $inisialprodiupdate, $namaprodiupdate);
    if ($resultupdatesemester) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    } else {
        echo '<script>alert("Data Fail Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }

}
$commandsemester = filter_input(INPUT_GET, 'cmdsemester');
if (isset($commandsemester) && $commandsemester == 'delsemester') {
    $sid = filter_input(INPUT_GET, 'sid');
    if (isset($sid)) {
        $result3 = fetchSMKData();
        foreach ($result3 as $data3) {
            if($sid==$data3['Semester_idSemester']){
                echo '<script>alert("Data In Used") </script>';
                echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
            }
        }
        $deletesemester = DeleteSemesterData($sid);
        if ($deletesemester) {
            echo '<script>alert("Data Successfully Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        } else {
            echo '<script>alert("Data Fail Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        }
    }
}
//Code For Input
$savedatasemester = filter_input(INPUT_POST, 'btnSaveDataSemester');
if (isset($savedatasemester)) {
    $idsemester = filter_input(INPUT_POST, 'idSemester');
    $namasemester = filter_input(INPUT_POST, 'NamaSemester');
    $inisialprodi = filter_input(INPUT_POST, 'InisialProdi');
    $namaprodi = filter_input(INPUT_POST, 'NamaProdi');
    $result1 = fetchSemesterData();
    foreach ($result1 as $data1) {
        if($idsemester==$data1['idSemester']){
            echo '<script>alert("Data Has Been Used") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        }
    }
    if(substr($idsemester,0,2)!=$inisialprodi){
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else if(substr($idsemester,0,2)=='IF' and $namaprodi!='Teknik Informatika') {
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else if(substr($idsemester,0,2)=='SI' and $namaprodi!='Sistem Informasi'){
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else{
        $resultsemester = addSemesterData($idsemester, $namasemester, $inisialprodi, $namaprodi);
        if ($resultsemester) {
            echo '<script>alert("Data Successfully Added") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        } else {
            echo '<script>alert("Data Fail Added ") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        }
    }
}

//MataKuliah
//Code For Update
$updatedatamatakuliah = filter_input(INPUT_POST, 'btnUpdateDataMataKuliah');
if (isset($updatedatamatakuliah)) {
    $mid1 = filter_input(INPUT_POST, 'updated_idmatakuliah');
    $namamatakuliahupdate = filter_input(INPUT_POST, 'NamaMataKuliahUpdate');
    $resultupdatematakuliah = UpdateMataKuliahData($mid1, $namamatakuliahupdate);
    if ($resultupdatematakuliah) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    } else {
        echo '<script>alert("Data Fail Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }
}
//delete
$commandmatakuliah = filter_input(INPUT_GET, 'cmdmatakuliah');
if (isset($commandmatakuliah) && $commandmatakuliah == 'delmatakuliah') {
    $mid = filter_input(INPUT_GET, 'mid');
    if (isset($mid)) {
        $result2 = fetchSMKData();
        foreach ($result2 as $data2) {
            if($mid==$data2['MataKuliah_idMataKuliah']){
                echo '<script>alert("Data In Used") </script>';
                echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
            }
        }
        $deletematakuliah = DeleteMataKuliahData($mid);
        if ($deletematakuliah) {
            echo '<script>alert("Data Successfully Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        } else {
            echo '<script>alert("Data Fail Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        }
    }
}
//input
$savedatamatakuliah = filter_input(INPUT_POST, 'btnSaveDataMataKuliah');
if (isset($savedatamatakuliah)) {
    $idmatakuliah = filter_input(INPUT_POST, 'idMataKuliah');
    $namamatakuliah = filter_input(INPUT_POST, 'NamaMataKuliah');
    $result2 = fetchMataKuliahData();
    foreach ($result2 as $data2) {
        if($idmatakuliah==$data2['idMataKuliah']){
            echo '<script>alert("Data Has Been Used") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        }
    }
    $resultmatakuliah = addMataKuliahData($idmatakuliah, $namamatakuliah);
    if ($resultmatakuliah) {
        echo '<script>alert("Data Successfully Added") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';

    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }
}

//SMK
//delete
$commandSMK = filter_input(INPUT_GET, 'cmdSMK');
if (isset($commandSMK) && $commandSMK == 'delSMK') {
    $smkid = filter_input(INPUT_GET, 'smkid');
    if (isset($smkid)) {
        $result4 = fetchSidangSTAData();
        foreach ($result4 as $data4) {
            if($smkid==$data4['idSMK']){
                echo '<script>alert("Data Has Been Used") </script>';
                echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
            }
        }
        $deleteSMK = DeleteSMKData($smkid);
        if ($deleteSMK) {
            echo '<script>alert("Data Successfully Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        } else {
            echo '<script>alert("Data Fail Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        }
    }
}
//input
$savedatasmk = filter_input(INPUT_POST, 'btnSaveDataSMK');
if (isset($savedatasmk)) {
    $idsmk = filter_input(INPUT_POST, 'idSMK');
    $smkidsemester = substr($idsmk, 0, 10);
    $smkidmatakuliah = substr($idsmk, 11);
    $dekan=filter_input(INPUT_POST,'dekan');
    $kaprodi=filter_input(INPUT_POST,'kaprodi');
    $koordinator=filter_input(INPUT_POST,'koordinator');
    if($dekan==$kaprodi or $dekan==$koordinator or $kaprodi==$koordinator){
        echo '<script>alert("Repeated Data Has Detected") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else if(substr($idsmk,0,2)=='IF' and substr($dekan,0,2)!=72){
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else if(substr($idsmk,0,2)=='IF' and substr($kaprodi,0,2)!=72){
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else if(substr($idsmk,0,2)=='IF' and substr($koordinator,0,2)!=72){
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else if(substr($idsmk,0,2)=='SI' and substr($dekan,0,2)!=73){
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else if(substr($idsmk,0,2)=='SI' and substr($kaprodi,0,2)!=73){
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else if(substr($idsmk,0,2)=='SI' and substr($koordinator,0,2)!=73){
        echo '<script>alert("There is an invalid data") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
    }else{
        $resultsmk = addSMKData($idsmk, $smkidsemester, $smkidmatakuliah, $dekan, $kaprodi, $koordinator);
        if ($resultsmk) {
            echo '<script>alert("Data Successfully Added") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        }else {
            echo '<script>alert("Data Fail Added ") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=administrasi" </script>';
        }
    }
}

?>
<div class="container-fluid">
    <h1>Administration </h1>
    <div class="row">
        <!--        Table Semester      -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Semester</h3>
                            <div style="padding:35px">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalSemester" data-bs-whatever="@getbootstrap">
                                    Tambah Semester
                                </button>
                                <div class="modal fade" id="exampleModalSemester" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Semester</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Id Semester:</label>
                                                        <small> Contoh penulisan "IF-GNP2021" </small>
                                                        <input type="text" class="form-control" name="idSemester"
                                                               required/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="NamaSemester" class="col-form-label">Nama
                                                            Semester:</label>
                                                        <input type="text" class="form-control" id="NamaSemester"
                                                               name="NamaSemester" required/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="InisialProdi" class="col-form-label">Inisial Nama
                                                            Prodi:</label>
                                                        <select id='InisialProdi' name="InisialProdi"
                                                                class="form-control form-select" required>
                                                            <option selected disabled value>--Pilih Inisial Prodi--</option>
                                                            <option value="IF">IF</option>
                                                            <option value="SI">SI</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="NamaProdi" class="col-form-label">Nama
                                                            Prodi:</label>
                                                        <select id='NamaProdi' name="NamaProdi" class="form-control form-select"
                                                                required>
                                                            <option selected disabled value>--Pilih Nama Prodi--</option>
                                                            <option value="Teknik Informatika">Teknik Informatika
                                                            </option>
                                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <input type="submit" name='btnSaveDataSemester'
                                                               value='Save Data' class="btn btn-primary"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter"
                                  data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                            </div>
                        </div>
                        <table class="table table-hover" id="dev-table">
                            <thead>
                            <th>Id Semester</th>
                            <th>Nama Semester</th>
                            <th>Inisial Prodi</th>
                            <th>Nama Prodi</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            $result = fetchSemesterData();
                            foreach ($result as $data) {
                                echo '<tr>';
                                echo '<td>' . $data['idSemester'] . '</td>';
                                echo '<td>' . $data['NamaSemester'] . '</td>';
                                echo '<td>' . $data['InisialProdi'] . '</td>';
                                echo '<td>' . $data['NamaProdi'] . '</td>';
                                echo '<td>
                                <button  class="btn btn-warning  btnupdatesemester" style="margin: 3px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>svg>
                                </button>
                                <button onclick="deleteSemester(\'' . $data['idSemester'] . '\')" class="btn btn-danger" style="margin: 3px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg></button></td>';
                                echo '</tr>';
                            }
                            $link = null;
                            ?>
                        </table>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('.btnupdatesemester').on('click', function () {
                                $('#exampleModalUpdateSemester').modal('show');
                                $tr = $(this).closest('tr');
                                var data = $tr.children("td").map(function () {
                                    return $(this).text();
                                }).get();
                                console.log(data);
                                $('#idsemester').val(data[0]);
                                $('#NamaSemesterUpdate').val(data[1]);
                                $('#InisialProdiUpdate').val(data[2]);
                                $('#NamaProdiUpdate').val(data[3]);
                            });
                        });
                    </script>
                </div>
            </div>
        </div>

        <!--        Modal Update-->
        <div class="modal fade" id="exampleModalUpdateSemester" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Semester</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <input type="text" class="form-control" name="updated_idsemester" id="idsemester" readonly>
                            <div class="mb-3">
                                <label for="NamaSemesterUpdate" class="col-form-label">Nama Semester:</label>
                                <input type="text" class="form-control" name="NamaSemesterUpdate"
                                       id="NamaSemesterUpdate"/>
                            </div>
                            <div class="mb-3">
                                <label for="InisialProdiUpdate" class="col-form-label">Inisial Nama Prodi:</label>
                                <input id='InisialProdiUpdate' name="InisialProdiUpdate" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="NamaProdiUpdate" class="col-form-label">Nama Prodi:</label>
                                <input id='NamaProdiUpdate' name="NamaProdiUpdate" class="form-control" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        onclick="window.location.href='/Proyek_KP/index.php?menu=administrasi'">
                                    Close
                                </button>
                                <input type="submit" name='btnUpdateDataSemester' id='btnUpdateDataSemester'
                                       value='Update Data' class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--        end table semester              -->
        <!--        Table Mata Kuliah                -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mata Kuliah</h3>
                            <div style="padding:35px">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalMataKuliah" data-bs-whatever="@getbootstrap">
                                    Tambah Mata Kuliah
                                </button>
                                <div class="modal fade" id="exampleModalMataKuliah" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mata Kuliah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="mb-3">
                                                        <label for="idMataKuliah" class="col-form-label">Id Mata
                                                            Kuliah:</label>
                                                        <input type="text" class="form-control" id="idMataKuliah"
                                                               name="idMataKuliah" required/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="NamaMataKuliah" class="col-form-label">Nama Mata
                                                            Kuliah:</label>
                                                        <input type="text" class="form-control" id="NamaMataKuliah"
                                                               name="NamaMataKuliah" required/>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <input type="submit" name='btnSaveDataMataKuliah'
                                                               value='Save Data' class="btn btn-primary"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter"
                                  data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                            </div>
                        </div>
                        <table class="table table-hover" id="task-table">
                            <thead>
                            <th>Id Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            $result = fetchMataKuliahData();
                            foreach ($result as $data) {
                                echo '<tr>';
                                echo '<td>' . $data['idMataKuliah'] . '</td>';
                                echo '<td>' . $data['NamaMataKuliah'] . '</td>';
                                echo '<td>
                                <button  class="btn btn-warning btnupdatematakuliah">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>svg>
                                </button>
                                <button onclick="deleteMataKuliah(\'' . $data['idMataKuliah'] . '\')" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg></button>
                                </td>';
                                echo '</tr>';
                            }
                            $link = null;
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('.btnupdatematakuliah').on('click', function () {
                                $('#exampleModalUpdateMataKuliah').modal('show');
                                $tr = $(this).closest('tr');
                                var data = $tr.children("td").map(function () {
                                    return $(this).text();
                                }).get();
                                console.log(data);
                                $('#idmatakuliah').val(data[0]);
                                $('#NamaMataKuliahUpdate').val(data[1]);
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <!--Modal Update Mata Kuliah-->
        <div class="modal fade" id="exampleModalUpdateMataKuliah" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Mata Kuliah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <input type="text" class="form-control" name="updated_idmatakuliah" id="idmatakuliah"
                                   readonly>
                            <div class="mb-3">
                                <label for="NamaMataKuliahUpdate" class="col-form-label">Nama Mata Kuliah:</label>
                                <input type="text" class="form-control" name="NamaMataKuliahUpdate"
                                       id="NamaMataKuliahUpdate"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        onclick="window.location.href='/Proyek_KP/index.php?menu=administrasi'">
                                    Close
                                </button>
                                <input type="submit" name='btnUpdateDataMataKuliah' id='btnUpdateDataMataKuliah'
                                       value='Update Data' class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--    end table mata kuliah       -->
    </div>
    <!--    end row     -->
</div>
<!--end container-fluid-->
</br>
</br>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Periode Mata Kuliah</h3>
                    <div style="padding:35px">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModalPeriodeSemester" data-bs-whatever="@getbootstrap">
                            Tambah Periode Mata Kuliah
                        </button>
                        <div class="modal fade" id="exampleModalPeriodeSemester" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Periode Mata Kuliah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label for="idSMK" class="col-form-label">Periode Mata
                                                    Kuliah:</label>
                                                <select id='idSMK' name="idSMK" class="form-control form-select" required>
                                                    <option selected disabled value>--Pilih Periode Mata Kuliah--</option>
                                                    <?php
                                                    $SMK = PilihSMKData();
                                                    $result = fetchSMKData();
                                                    $array = array();
                                                    $array1 = array();
                                                    foreach ($result as $test) {
                                                        array_push($array, $test['idSMK']);
                                                    }
                                                    foreach ($SMK as $test) {
                                                        array_push($array1, $test['idSemester'] . '-' . $test['idMataKuliah']);
                                                    }
                                                    for ($x = 0; $x < count($array); $x++) {
                                                        for ($y = 0; $y < count($array1); $y++) {
                                                            if ($array[$x] == $array1[$y]) {
                                                                array_splice($array1, $y, 1);
                                                            }
                                                        }
                                                    }
                                                    for ($y = 0; $y < count($array1); $y++) {
                                                        echo '<option value="' . $array1[$y] . '">' . $array1[$y] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="dekan" class="col-form-label">Dekan:</label>
                                                <select id='dekan' name="dekan" class="form-control form-select" required>
                                                    <option selected disabled value>--Pilih Dekan--</option>
                                                    <?php
                                                    $ev = fetchUserDosenData();
                                                    foreach ($ev as $cek) {
                                                        echo '<option value="' . $cek['NIK'] . '-' . $cek['Nama'] . '">' . $cek['NIK'] . '-' . $cek['Nama'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kaprodi" class="col-form-label">Ketua Program Studi:</label>
                                                <select id='kaprodi' name="kaprodi" class="form-control form-select" required>
                                                    <option selected disabled value>--Pilih Ketua Program Studi--</option>
                                                    <?php
                                                    $ev = fetchUserDosenData();
                                                    foreach ($ev as $cek) {
                                                        echo '<option value="' . $cek['NIK'] . '-' . $cek['Nama'] . '">' . $cek['NIK'] . '-' . $cek['Nama'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="koordinator" class="col-form-label">Koordinator:</label>
                                                <select id='koordinator' name="koordinator" class="form-control form-select" required>
                                                    <option selected disabled value>--Pilih Koordinator--</option>
                                                    <?php
                                                    $ev = fetchUserDosenData();
                                                    foreach ($ev as $cek) {
                                                        echo '<option value="' . $cek['NIK'] . '-' . $cek['Nama'] . '">' . $cek['NIK'] . '-' . $cek['Nama'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <input type="submit" name='btnSaveDataSMK' class="btn btn-primary"
                                                       value="Save Data"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Table border="1px">
                    <thead>
                    <th>Id SMK</th>
                    <th>Semester</th>
                    <th>Prodi</th>
                    <th>Mata Kuliah</th>
                    <th>Dekan</th>
                    <th>Ketua Program Studi</th>
                    <th>Koordinator</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
                    $result = fetchSMKData();
                    foreach ($result as $data) {
                        echo '<tr>';
                        echo '<td>' . $data['idSMK'] . '</td>';
                        echo '<td>' . $data['NamaSemester'] . '</td>';
                        echo '<td>' . $data['NamaProdi'] . '</td>';
                        echo '<td>' . $data['NamaMataKuliah'] . '</td>';
                        echo '<td>' . $data['Dekan'] . '</td>';
                        echo '<td>' . $data['KetuaProgramStudi'] . '</td>';
                        echo '<td>' . $data['Koordinator'] . '</td>';
                        echo '<td>
                        <button onclick="deleteSMK(\'' . $data['idSMK'] . '\')" class="btn btn-danger"><path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg></button></td>';
                        echo '</tr>';
                    }
                    $link = null;
                    ?>
                    </tbody>
                </Table>
            </div>
        </div>
    </div>
</div>
<script>
    //buat data table
    $(document).ready(function () {
        $('table').DataTable();
    });
</script>
</body>
</html>
