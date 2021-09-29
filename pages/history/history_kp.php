<?php
    $host ="localhost";
    $username = "root";
    $password = "";

    $connect1 = new mysqli($host, $username, $password);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="history.css"/>
    <script>

        function addModal(){
            $('#exampleModalUpdateSidangKP').modal('show');
            $("#submit_btn").prop("name","btnInsertSidangSTA");
        }
        
        function openUpdateModal(update_id,dosen,judul,status,id_smk){
            $("#submit_btn").prop("name","btnUpdateSidangSTA");
            $('#exampleModalUpdateSidangKP').modal('show');
            $("#idcoba").val(update_id);
            $("#dosenpembimbing_kp").val(dosen);
            $("#judul_kp").val(judul);
            $("#status_kp").val(status);
            $("#SMK_idSMK").val(id_smk);
        }

        
        function deleteHistoryKP(id_master) {
            let confimation = window.confirm("Are you sure want to delete?")
            if (confimation) {
                window.location = "?menu=history_kp&cmdhistoryKP=delHistoryKP&id_master=" + id_master;
            }
        }
    </script>
    <style>
        <?php include("history.css")?>
    </style>
</head>

<body>
    <?php


$cmdhistorykp = filter_input(INPUT_GET, 'cmdhistoryKP');
if (isset($cmdhistorykp) && $cmdhistorykp == 'delHistoryKP' ) {
    $id_master = filter_input(INPUT_GET, 'id_master');
    $result = deleteHistoryKPData($id_master);
    if ($result) {
        echo '<script>alert("Data Successfully Deleted") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=history_kp" </script>';

    } else {
        echo '<script>alert("Data Fail Updated ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=history_kp" </script>';
    }
}

$btnInsertSidangSTA = filter_input(INPUT_POST, 'btnInsertSidangSTA');
if (isset($btnInsertSidangSTA)) {
    $nik = $_SESSION["session_id"];
    $smk = filter_input(INPUT_POST, 'SMK_idSMK');
    $judul = filter_input(INPUT_POST, 'judul_kp');
    $dosen = filter_input(INPUT_POST, 'dosenpembimbing_kp');
    $status = filter_input(INPUT_POST, 'status_kp');
    $result = InsertHistoryKPData($nik,$smk, $judul, $status, $dosen);
    if ($result) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=history_kp" </script>';

    } else {
        echo '<script>alert("Data Fail Updated ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=history_kp" </script>';
    }
}

$btnUpdateSidangSTA = filter_input(INPUT_POST, 'btnUpdateSidangSTA');
if (isset($btnUpdateSidangSTA)) {
    $id_master = filter_input(INPUT_POST, 'updated_id');
    $smk = filter_input(INPUT_POST, 'SMK_idSMK');
    $judul = filter_input(INPUT_POST, 'judul_kp');
    $dosen = filter_input(INPUT_POST, 'dosenpembimbing_kp');
    $status = filter_input(INPUT_POST, 'status_kp');
    $result = UpdateHistoryKPData($id_master,$smk, $judul, $status, $dosen);
    if ($result) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=history_kp" </script>';

    } else {
        echo '<script>alert("Data Fail Updated ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=history_kp" </script>';
    }
}

$result = fetchUserByID($_SESSION["session_id"]);
foreach ($result as $data) {
    //var_dump($data);
}

?>
    
<div class="container-fluid">
    <div class="panel-heading">
        <h3 class="panel-title">Status Kerja Praktek </h3>
        <h3 class="panel-title" style="padding-top:16px">Nama : <?php echo $data["Nama"]?></h3>
        <h3 class="panel-title">NIK    : <?php echo $data["NIK"]?></h3>
        <button type="button" class="btn btn-primary" style="margin:16px 0px" data-bs-toggle="modal" onclick="addModal();"
                data-bs-target="#exampleModalUpdateSidangKP" data-bs-whatever="@getbootstrap">
            Input
        </button>
        <button type="button" class="btn btn-primary" style="margin:16px 0px">
            <a style="color:white !important;text-decoration:none !important" href="/Proyek_KP/pages/history/print_history.php?signed=1">Print dengan Tanda Tangan</a>
        </button>
        <button type="button" class="btn btn-primary" style="margin:16px 0px">
            <a style="color:white !important;text-decoration:none !important" href="/Proyek_KP/pages/history/print_history.php">Print tanpa Tanda Tangan</a>
        </button>
    </div>
    <Table border="1px" >
        <thead>
        <th>Semester Mata Kuliah</th>
        <th>Dosen Pembimbing</th>
        <th>Judul KP</th>
        <th>Status</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
        $result = fetchHistoryKPDataByNIK();
        foreach ($result as $data) {
                echo '<tr>';
                $smk = fetchSMKData();
                foreach($smk as $data_smk){
                    if($data_smk["idSMK"]==$data["SMK_idSMK"]){
                        echo '<td>' . $data_smk['Semester_idSemester'] . ' - ' . $data_smk['MataKuliah_idMataKuliah'] . '</td>';
                    }
                }
                echo '<td>' . $data['DosenPembimbingKP'] . '</td>';
                echo '<td>' . $data['JudulKP'] . '</td>';
                echo '<td>' . ucwords($data['StatusKP']) . '</td>';
                echo '<td>
                    <button onclick="openUpdateModal(\''. $data["idMaster"] . '\',\''. $data["DosenPembimbingKP"] . '\',\''. $data["JudulKP"] . '\',\'' . $data["StatusKP"] . '\',\'' . $data["SMK_idSMK"] . '\')" class="btn btn-warning btnupdate" style="margin: 3px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>svg>
                    </button>
                    
                    <button onclick="deleteHistoryKP(\'' . $data['idMaster'] . '\')" class="btn btn-danger"><path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg></button>
                    </td>';
                echo '</tr>';
            
                $link = null;
            }
            ?>
        </tbody>
    </Table>
</div>


<div class="modal fade" id="exampleModalUpdateSidangKP" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sidang KP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <input id="idcoba" type="hidden" name="updated_id">
                        <label for="updated_id" class="col-form-label">Semester:</label>
                        <select id='SMK_idSMK' name="SMK_idSMK" class="form-control">
                        <?php
                            $SMK = fetchSMKData();
                            foreach ($SMK as $data) {
                                echo '<option value="' .$data['idSMK'] .'">' .$data['Semester_idSemester'].'-'.$data['MataKuliah_idMataKuliah'].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul_kp" class="col-form-label">Judul KP:</label>
                        <input type="text" class="form-control" id="judul_kp" name="judul_kp"/>
                    </div>
                    <div class="mb-3">
                        <label for="dosenpembimbing_kp" class="col-form-label">Dosen Pembimbing:</label>
                        <select id='dosenpembimbing_kp' name="dosenpembimbing_kp" class="form-control">
                            <?php
                            $dosen = fetchUserDosenData();
                            foreach ($dosen as $data) {
                                echo '<option value="' .$data['NIK'].'-'.$data['Nama'].'">' .$data['NIK'].'-'.$data['Nama'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_kp" class="col-form-label">Status:</label>
                        <select id='status_kp' name="status_kp" class="form-control">
                            <option value="lulus">Lulus</option>
                            <option value="tidak lulus">Tidak lulus</option>
                            <option value="perpanjang">Perpanjang</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <input type="submit" id="submit_btn" name='btnUpdateSidangSTA' class="btn btn-primary" value="Update Data"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    //buat data table
    $(document).ready(function () {
        $('Table').DataTable();
    });
</script>
</body>