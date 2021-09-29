<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
        function deleteSidangSTA(idMaster) {
            let confimation = window.confirm("Are you sure want to delete?")
            if (confimation) {
                window.location = "?menu=sidang_sta&cmdsidangsta=delsidangsta&sid=" + idMaster;
            }
        }
    </script>

</head>

<body>
<?php

$cmdsidangsta = filter_input(INPUT_GET, 'cmdsidangsta');
if (isset($cmdsidangsta) && $cmdsidangsta == 'delsidangsta') {
    $sid = filter_input(INPUT_GET, 'sid');
    if (isset($sid)) {
        $deletesidangsta = DeleteSidangSTA($sid);
        if ($deletesidangsta) {
            echo '<script>alert("Data Successfully Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=sidang_sta" </script>';
        } else {
            echo '<script>alert("Data Fail Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=sidabg_sta" </script>';
        }
    }
}


//Code For Input
$savedatasidangsta = filter_input(INPUT_POST, 'btnSaveDataSidangSTA');
if (isset($savedatasidangsta)) {
    $nik_sta = filter_input(INPUT_POST, 'nik_sta');
    $smk_sta = filter_input(INPUT_POST, 'smk_sta');
    $dosenpembimbing_sta = filter_input(INPUT_POST, 'dosenpembimbing_sta');
    $judul_sta = filter_input(INPUT_POST, 'judul_sta');
    $tanggal_sta = filter_input(INPUT_POST, 'tanggal_sta');
    $jam_sta = filter_input(INPUT_POST, 'jam_sta');
    $ruang_sta = filter_input(INPUT_POST, 'ruang_sta');

    if (substr($nik_sta, 2, 2) == 72 and substr($smk_sta, 0, 2) != 'IF') {
        echo '<script>alert("Student and Semester Period is not same") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=sidang_sta" </script>';
    } else if (substr($nik_sta, 2, 2) == 73 and substr($smk_sta, 0, 2) != 'SI') {
        echo '<script>alert("Student and Semester Period is not same") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=sidang_sta" </script>';
    } else {

        $resultsidangsta12 = addSidangSTA($nik_sta, $smk_sta, $judul_sta, $dosenpembimbing_sta, $tanggal_sta, $jam_sta, $ruang_sta);
        if ($resultsidangsta12) {
            echo '<script>alert("Data Successfully Added") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=sidang_sta" </script>';

        } else {
            echo '<script>alert("Data Fail Added ") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=sidang_sta" </script>';
        }
    }

}

//Code For update
$updatesidangsta = filter_input(INPUT_POST, 'btnUpdateSidangSTA');
if (isset($updatesidangsta)) {
    $updated_id = filter_input(INPUT_POST, 'updated_id');
    $smk_sta2 = filter_input(INPUT_POST, 'smk_sta2');
    $dosenpembimbing_sta2 = filter_input(INPUT_POST, 'dosenpembimbing_sta2');
    $judul_sta2 = filter_input(INPUT_POST, 'judul_sta2');
    $tanggal_sta2 = filter_input(INPUT_POST, 'tanggal_sta2');
    $jam_sta2 = filter_input(INPUT_POST, 'jam_sta2');
    $ruang_sta2 = filter_input(INPUT_POST, 'ruang_sta2');
    $resultsidangsta = UpdateSidangSTA($updated_id, $smk_sta2, $judul_sta2, $dosenpembimbing_sta2, $tanggal_sta2, $jam_sta2, $ruang_sta2);
    if ($resultsidangsta) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=sidang_sta" </script>';

    } else {
        echo '<script>alert("Data Fail Updated ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=sidang_sta" </script>';
    }
}

?>
<br>
<div class="container-fluid">
    <div class="panel-heading">
        <h1 class="panel-title">Sidang STA</h1>
        <div style="padding:35px">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModalSidangSTA"
                    data-bs-whatever="@getbootstrap">Tambah Sidang STA
            </button>
            <div class="modal fade" id="exampleModalSidangSTA" tabindex="-1"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Sidang STA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="nik_sta" class="col-form-label">Mahasiswa:</label>
                                    <select id='nik_sta' name="nik_sta" class="form-control form-select" required>
                                        <option selected disabled value>--Pilih Mahasiswa Sidang STA--</option>
                                        <?php
                                        $nik = fetchUserMahasiswaData();
                                        foreach ($nik as $data) {
                                            echo '<option value="' . $data['NIK'] . '">' . $data['NIK'] . '-' . $data['Nama'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="smk_sta" class="col-form-label">Periode Mata Kuliah:</label>
                                    <select id='smk_sta' name="smk_sta" class="form-control form-select" required>
                                        <option selected disabled value>--Pilih Periode MataKuliah--</option>
                                        <?php
                                        $smk = fetchSMKSTAData();
                                        foreach ($smk as $data) {
                                            echo '<option value="' . $data['idSMK'] . '">' . $data['idSMK'] . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="judul_sta" class="col-form-label">Judul STA:</label>
                                    <input type="text" class="form-control" id="judul_sta" name="judul_sta" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="dosenpembimbing_sta" class="col-form-label">Dosen Pembimbing:</label>
                                    <select id='dosenpembimbing_sta' name="dosenpembimbing_sta"
                                            class="form-control form-select"
                                            required>
                                        <option selected disabled value>--Pilih Dosen Pembimbing STA--</option>
                                        <?php
                                        $dosen = fetchUserDosenData();
                                        foreach ($dosen as $data) {
                                            echo '<option value="' . $data['NIK'] . '-' . $data['Nama'] . '">' . $data['NIK'] . '-' . $data['Nama'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_sta" class="col-form-label">Tanggal Sidang:</label>
                                    <input type="date" class="form-control" id="tanggal_sta" name="tanggal_sta"/>
                                </div>
                                <div class="mb-3">
                                    <label for="jam_sta" class="col-form-label">Jam Sidang:</label>
                                    <input type="time" class="form-control" id="jam_sta" name="jam_sta"/>
                                </div>
                                <div class="mb-3">
                                    <label for="ruang_sta" class="col-form-label">Ruang Sidang:</label>
                                    <input type="text" class="form-control" id="ruang_sta" name="ruang_sta"/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <input type="submit" name='btnSaveDataSidangSTA' class="btn btn-primary"
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
        <th>Kode Sidang</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Semester Mata Kuliah</th>
        <th>Dosen Pembimbing / Evaluator 1</th>
        <th>Judul STA</th>
        <th>Evaluator 2</th>
        <th>Tanggal Sidang</th>
        <th>Jam Sidang</th>
        <th>Ruang Sidang</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
        $result = fetchSidangSTAData();
        foreach ($result as $data) {
            echo '<tr>';
            echo '<td>' . $data['idMaster'] . '</td>';
            echo '<td>' . $data['NIK'] . '</td>';
            echo '<td>' . $data['Nama'] . '</td>';
            echo '<td>' . $data['idSMK'] . '</td>';
            echo '<td>' . $data['DosenPembimbingSTA'] . '</td>';
            echo '<td>' . $data['JudulSTA'] . '</td>';
            echo '<td>' . $data['Evaluator1'] . '</td>';
            echo '<td>' . $data['TanggalSTA'] . '</td>';
            echo '<td>' . $data['JamSTA'] . '</td>';
            echo '<td>' . $data['Ruang'] . '</td>';
            echo '<td>
                <button class="btn btn-warning btnupdate" style="margin: 3px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>svg>
                </button>
                <button onclick="deleteSidangSTA(\'' . $data['idMaster'] . '\')"class="btn btn-danger" style="margin: 3px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
                </button></td>';
            echo '</tr>';
        }
        $link = null;
        ?>
        </tbody>
    </Table>
</div>


<div class="modal fade" id="exampleModalUpdateSidangSTA" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sidang STA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="updated_id" id="idcoba" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="smk_sta2" class="col-form-label">Periode Mata Kuliah:</label>
                        <select id='smk_sta2' name="smk_sta2" class="form-control form-select">
                            <?php
                            $smk = fetchSMKSTAData();
                            foreach ($smk as $data) {
                                echo '<option value="' . $data['idSMK'] . '">' . $data['idSMK'] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul_sta2" class="col-form-label">Judul STA:</label>
                        <input type="text" class="form-control" id="judul_sta2" name="judul_sta2"/>
                    </div>
                    <div class="mb-3">
                        <label for="dosenpembimbing_sta2" class="col-form-label">Dosen Pembimbing:</label>
                        <select id='dosenpembimbing_sta2' name="dosenpembimbing_sta2" class="form-control form-select">
                            <?php
                            $dosen = fetchUserDosenData();
                            foreach ($dosen as $data) {
                                echo '<option value="' . $data['NIK'] . '-' . $data['Nama'] . '">' . $data['NIK'] . '-' . $data['Nama'] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_sta2" class="col-form-label">Tanggal Sidang:</label>
                        <input type="date" class="form-control" id="tanggal_sta2" name="tanggal_sta2"/>
                    </div>
                    <div class="mb-3">
                        <label for="jam_sta2" class="col-form-label">Jam Sidang:</label>
                        <input type="time" class="form-control" id="jam_sta2" name="jam_sta2"/>
                    </div>
                    <div class="mb-3">
                        <label for="ruang_sta2" class="col-form-label">Ruang Sidang:</label>
                        <input type="text" class="form-control" id="ruang_sta2" name="ruang_sta2"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <input type="submit" name='btnUpdateSidangSTA' class="btn btn-primary" value="Update Data"/>
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
<script>
    $(document).ready(function () {
        $('.btnupdate').on('click', function () {

            $('#exampleModalUpdateSidangSTA').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#idcoba').val(data[0]);
            $('#smk_sta2').val(data[3]);
            $('#dosenpembimbing_sta2').val(data[4]);
            $('#judul_sta2').val(data[5]);
            $('#tanggal_sta2').val(data[7]);
            $('#jam_sta2').val(data[8]);
            $('#ruang_sta2').val(data[9]);
        });
    });
</script>


</body>
</html>