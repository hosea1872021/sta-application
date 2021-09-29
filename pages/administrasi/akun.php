<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" href="admin.css"/>
    <script>
        function deleteUserData(NIK) {
            let confimation = window.confirm("Are you sure want to delete?")
            if (confimation) {
                window.location = "?menu=akun&cmd=del&nik=" + NIK;
            }
        }
    </script>

</head>
<br>
<body>
<?php
//code for add akun
$btnSaveDataAkunMahasiswa = filter_input(INPUT_POST, 'btnSaveDataAkunMahasiswa');
if (isset($btnSaveDataAkunMahasiswa)) {
    $NIK = filter_input(INPUT_POST, 'NIK');
    $Role = filter_input(INPUT_POST, 'Role');
    $Username = filter_input(INPUT_POST, 'Username');
    $Password = filter_input(INPUT_POST, 'Password');
    $Nama = filter_input(INPUT_POST, 'Nama');
    $Email = filter_input(INPUT_POST, 'Email');
    $result1 = fetchUserData();
    foreach ($result1 as $data1) {
        if($NIK==$data1['NIK']){
            echo '<script>alert("Data Has Been Used") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';
        }
    }
    $result = AddAkun($NIK, $Role, $Username, $Password, $Nama, $Email);
    if ($result) {
        echo '<script>alert("Data Successfully Added") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';

    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';
    }
}

//Code For update mahasiswa
$updatemahasiswa = filter_input(INPUT_POST, 'btnUpdateDataAkunMahasiswa');
if (isset($updatemahasiswa)) {
    $NIKMahasiswaUpdate = filter_input(INPUT_POST, 'NIKMahasiswaUpdate');
    $RoleMahasiswa = filter_input(INPUT_POST, 'RoleMahasiswa');
    $UsernameMahasiswaUpdate = filter_input(INPUT_POST, 'UsernameMahasiswaUpdate');
    $PasswordMahasiswaUpdate = filter_input(INPUT_POST, 'PasswordMahasiswaUpdate');
    $NamaMahasiswaUpdate = filter_input(INPUT_POST, 'NamaMahasiswaUpdate');
    $EmailMahasiswaUpdate = filter_input(INPUT_POST, 'EmailMahasiswaUpdate');
    $resultmahasiswa = UpdateAkun($NIKMahasiswaUpdate, $RoleMahasiswa, $UsernameMahasiswaUpdate, $PasswordMahasiswaUpdate, $NamaMahasiswaUpdate, $EmailMahasiswaUpdate);
    if ($resultmahasiswa) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';

    } else {
        echo '<script>alert("Data Fail Updated ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';
    }
}

//Code For update dosen
$updatedosen = filter_input(INPUT_POST, 'btnUpdateDataAkunDosen');
if (isset($updatedosen)) {
    $NIKDosenUpdate = filter_input(INPUT_POST, 'NIKDosenUpdate');
    $RoleDosen = filter_input(INPUT_POST, 'RoleDosen');
    $UsernameDosenUpdate = filter_input(INPUT_POST, 'UsernameDosenUpdate');
    $PasswordDosenUpdate = filter_input(INPUT_POST, 'PasswordDosenUpdate');
    $NamaDosenUpdate = filter_input(INPUT_POST, 'NamaDosenUpdate');
    $EmailDosenUpdate = filter_input(INPUT_POST, 'EmailDosenUpdate');
    $resultdosen = UpdateAkun($NIKDosenUpdate, $RoleDosen, $UsernameDosenUpdate, $PasswordDosenUpdate, $NamaDosenUpdate, $EmailDosenUpdate);
    if ($resultdosen) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';

    } else {
        echo '<script>alert("Data Fail Updated ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';
    }
}

//Code For update koor
$updatekoor = filter_input(INPUT_POST, 'btnUpdateDataAkunKoor');
if (isset($updatekoor)) {
    $NIKKoorUpdate = filter_input(INPUT_POST, 'NIKKoorUpdate');
    $RoleKoor = filter_input(INPUT_POST, 'RoleKoor');
    $UsernameKoorUpdate = filter_input(INPUT_POST, 'UsernameKoorUpdate');
    $PasswordKoorUpdate = filter_input(INPUT_POST, 'PasswordKoorUpdate');
    $NamaKoorUpdate = filter_input(INPUT_POST, 'NamaKoorUpdate');
    $EmailKoorUpdate = filter_input(INPUT_POST, 'EmailKoorUpdate');
    $resultkoor = UpdateAkun($NIKKoorUpdate, $RoleKoor, $UsernameKoorUpdate, $PasswordKoorUpdate, $NamaKoorUpdate, $EmailKoorUpdate);
    if ($resultkoor) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';

    } else {
        echo '<script>alert("Data Fail Updated ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';
    }
}
$command = filter_input(INPUT_GET, 'cmd');
if (isset($command) && $command == 'del') {
    $nik = filter_input(INPUT_GET, 'nik');
    if (isset($nik)) {
        $delete = DeleteUserData($nik);
        if ($delete) {
            echo '<script>alert("Data Successfully Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';
        } else {
            echo '<script>alert("Data Fail Deleted") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=akun" </script>';
        }
    }
}
?>


<div class="container-fluid">
    <div class="panel-heading">
        <h3 class="panel-title">Administrasi Akun</h3>
        <div style="padding:35px">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModalTambahAkun"
                    data-bs-whatever="@getbootstrap">Tambah Akun
            </button>
            <div class="modal fade" id="exampleModalTambahAkun" tabindex="-1"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="NIK" class="col-form-label">NIK:</label>
                                    <input type="text" class="form-control" name="NIK" id="NIK" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Role" class="col-form-label">Role:</label>
                                    <select id='Role' name="Role" class="form-control form-select" >
                                        <option selected disabled value>--Pilih Role--</option>
                                        <option value="koor">Koor</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Username" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" name="Username" id="Username" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="Password" class="col-form-label">Password:</label>
                                    <input type="password" class="form-control" name="Password" id="Password" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="Nama" class="col-form-label">Nama:</label>
                                    <input type="text" class="form-control" name="Nama" id="Nama" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="Email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" name="Email" id="Email" required/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            onclick="window.location.href='/Proyek_KP/index.php?menu=akun'">
                                        Close
                                    </button>
                                    <input type="submit" name='btnSaveDataAkunMahasiswa' id='btnSaveDataAkunMahasiswa' value='Save Data' class="btn btn-primary"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Akun Koor</h3>
                    <Table border="1px">
                        <thead>
                        <th>NIK</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                        $result = fetchUserKoorData();
                        foreach ($result as $data) {
                            echo '<tr>';
                            echo '<td>' . $data['NIK'] . '</td>';
                            echo '<td>' . $data['Username'] . '</td>';
                            echo '<td>' . $data['Password'] . '</td>';
                            echo '<td>' . $data['Nama'] . '</td>';
                            echo '<td>' . $data['Email'] . '</td>';
                            echo '<td>' . $data['Role'] . '</td>';
                            echo '<td>
                            <button  class="btn btn-warning  btnupdateakunkoor" style="margin: 3px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>svg>
                            </button>
                            <button onclick="deleteUserData(\'' . $data['NIK'] . '\')" class="btn btn-danger"><path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
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
                <script>
                    $(document).ready(function () {
                        $('.btnupdateakunkoor').on('click', function () {
                            $('#exampleModalUpdateAkunKoor').modal('show');
                            $tr = $(this).closest('tr');
                            var data = $tr.children("td").map(function () {
                                return $(this).text();
                            }).get();
                            console.log(data);
                            $('#NIKKoorUpdate').val(data[0]);
                            $('#UsernameKoorUpdate').val(data[1]);
                            $('#PasswordKoorUpdate').val(data[2]);
                            $('#NamaKoorUpdate').val(data[3]);
                            $('#EmailKoorUpdate').val(data[4]);
                            $('#RoleKoor').val(data[5]);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <!--    Modal Update Akun Dosen-->
    <div class="modal fade" id="exampleModalUpdateAkunKoor" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Akun Koor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="NIKKoorUpdate" id="NIKKoorUpdate" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="RoleKoor" id="RoleKoor" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="UsernameKoorUpdate" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" name="UsernameKoorUpdate" id="UsernameKoorUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="PasswordKoorUpdate" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" name="PasswordKoorUpdate"
                                   id="PasswordKoorUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="NamaKoorUpdate" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" name="NamaKoorUpdate" id="NamaKoorUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="EmailKoorUpdate" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="EmailKoorUpdate" id="EmailKoorUpdate"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="window.location.href='/Proyek_KP/index.php?menu=akun'">
                                Close
                            </button>
                            <input type="submit" name='btnUpdateDataAkunKoor' id='btnUpdateDataAkunKoor'
                                   value='Update Data' class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--    end modal-->
</div>


<br>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Akun Dosen</h3>
                    <Table border="1px">
                        <thead>
                        <th>NIK</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                        $result = fetchUserDosenData();
                        foreach ($result as $data) {
                            echo '<tr>';
                            echo '<td>' . $data['NIK'] . '</td>';
                            echo '<td>' . $data['Username'] . '</td>';
                            echo '<td>' . $data['Password'] . '</td>';
                            echo '<td>' . $data['Nama'] . '</td>';
                            echo '<td>' . $data['Email'] . '</td>';
                            echo '<td>' . $data['Role'] . '</td>';
                            echo '<td>
                            <button  class="btn btn-warning  btnupdateakundosen" style="margin: 3px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>svg>
                            </button>
                            <button onclick="deleteUserData(\'' . $data['NIK'] . '\')" class="btn btn-danger"><path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
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
                <script>
                    $(document).ready(function () {
                        $('.btnupdateakundosen').on('click', function () {
                            $('#exampleModalUpdateAkunDosen').modal('show');
                            $tr = $(this).closest('tr');
                            var data = $tr.children("td").map(function () {
                                return $(this).text();
                            }).get();
                            console.log(data);
                            $('#NIKDosenUpdate').val(data[0]);
                            $('#UsernameDosenUpdate').val(data[1]);
                            $('#PasswordDosenUpdate').val(data[2]);
                            $('#NamaDosenUpdate').val(data[3]);
                            $('#EmailDosenUpdate').val(data[4]);
                            $('#RoleDosen').val(data[5]);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <!--    Modal Update Akun Dosen-->
    <div class="modal fade" id="exampleModalUpdateAkunDosen" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Akun Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="NIKDosenUpdate" id="NIKDosenUpdate" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="RoleDosen" id="RoleDosen" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="UsernameDosenUpdate" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" name="UsernameDosenUpdate"
                                   id="UsernameDosenUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="PasswordDosenUpdate" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" name="PasswordDosenUpdate"
                                   id="PasswordDosenUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="NamaDosenUpdate" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" name="NamaDosenUpdate" id="NamaDosenUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="EmailDosenUpdate" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="EmailDosenUpdate" id="EmailDosenUpdate"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="window.location.href='/Proyek_KP/index.php?menu=akun'">
                                Close
                            </button>
                            <input type="submit" name='btnUpdateDataAkunDosen' id='btnUpdateDataAkunDosen'
                                   value='Update Data' class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--    end modal-->
</div>

<br>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Akun Mahasiswa</h3>
                    <Table border="1px">
                        <thead>
                        <th>NIK</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                        $result = fetchUserMahasiswaData();
                        foreach ($result as $data) {
                            echo '<tr>';
                            echo '<td>' . $data['NIK'] . '</td>';
                            echo '<td>' . $data['Username'] . '</td>';
                            echo '<td>' . $data['Password'] . '</td>';
                            echo '<td>' . $data['Nama'] . '</td>';
                            echo '<td>' . $data['Email'] . '</td>';
                            echo '<td>' . $data['Role'] . '</td>';
                            echo '<td>
                            <button  class="btn btn-warning  btnupdateakunmahasiswa" style="margin: 3px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>svg>
                            </button>
                            <button onclick="deleteUserData(\'' . $data['NIK'] . '\')" class="btn btn-danger"><path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
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
                <script>
                    $(document).ready(function () {
                        $('.btnupdateakunmahasiswa').on('click', function () {
                            $('#exampleModalUpdateAkunMahasiswa').modal('show');
                            $tr = $(this).closest('tr');
                            var data = $tr.children("td").map(function () {
                                return $(this).text();
                            }).get();
                            console.log(data);
                            $('#NIKMahasiswaUpdate').val(data[0]);
                            $('#UsernameMahasiswaUpdate').val(data[1]);
                            $('#PasswordMahasiswaUpdate').val(data[2]);
                            $('#NamaMahasiswaUpdate').val(data[3]);
                            $('#EmailMahasiswaUpdate').val(data[4]);
                            $('#RoleMahasiswa').val(data[5]);
                        });
                    });
                </script>
            </div>
        </div>

    </div>
    <!--    Modal Update Akun Mahasiswa-->
    <div class="modal fade" id="exampleModalUpdateAkunMahasiswa" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Akun Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="NIKMahasiswaUpdate" id="NIKMahasiswaUpdate"
                                   readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="RoleMahasiswa" id="RoleMahasiswa" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="UsernameMahasiswaUpdate" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" name="UsernameMahasiswaUpdate"
                                   id="UsernameMahasiswaUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="PasswordMahasiswaUpdate" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" name="PasswordMahasiswaUpdate"
                                   id="PasswordMahasiswaUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="NamaMahasiswaUpdate" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" name="NamaMahasiswaUpdate"
                                   id="NamaMahasiswaUpdate"/>
                        </div>
                        <div class="mb-3">
                            <label for="EmailMahasiswaUpdate" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="EmailMahasiswaUpdate"
                                   id="EmailMahasiswaUpdate"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="window.location.href='/Proyek_KP/index.php?menu=akun'">
                                Close
                            </button>
                            <input type="submit" name='btnUpdateDataAkunMahasiswa' id='btnUpdateDataAkunMahasiswa'
                                   value='Update Data' class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--    end modal-->
</div>
<script>
    //buat data table
    $(document).ready(function () {
        $('table').DataTable();
    });
</script>
</body>
</html>