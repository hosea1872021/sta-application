<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link type="text/css" href="profile.css"/>
</head>
<body>

<?php
$savedatauser = filter_input(INPUT_POST, 'btnSaveDataUser');
if (isset($savedatauser)) {
    $id = filter_input(INPUT_POST, 'id');
    $nama = filter_input(INPUT_POST, 'nama');
    $role = filter_input(INPUT_POST, 'role');
    $password = filter_input(INPUT_POST, 'password');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $nomortelepon = filter_input(INPUT_POST, 'nomortelepon');
    $website = filter_input(INPUT_POST, 'website');
    $github = filter_input(INPUT_POST, 'github');
    $facebook = filter_input(INPUT_POST, 'facebook');
    $instagram = filter_input(INPUT_POST, 'instagram');
    $twitter = filter_input(INPUT_POST, 'twitter');
    $result = UpdateUserData($id,$role,$password,$nama,$email,$nomortelepon,$website,$github,$facebook,$twitter,$instagram);
    if ($result) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=profile" </script>';
    } else {
        echo '<script>alert("Data Fail Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=profile" </script>';
    }

}

$btnUploadTandaTangan = filter_input(INPUT_POST, 'btnUploadTandaTangan');
if($btnUploadTandaTangan){
    $nik=filter_input(INPUT_POST, 'id2');
    if(isset($_FILES['TandaTangan']['name'])){
        $targetDirectory = 'uploads/';
        $fileExtension = pathinfo($_FILES['TandaTangan']['name'],PATHINFO_EXTENSION);
        $newFileName = 'FileTandaTangan'.'-'.$nik. '.' . $fileExtension;
        $targetFile = $targetDirectory . $newFileName;
        if($_FILES['TandaTangan']['size']>1024*2048) {
            echo '<script>alert("Upload error. File size exceed 2MB") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=profile" </script>';
        } else {
            move_uploaded_file($_FILES['TandaTangan']['tmp_name'], $targetFile);
        }
    }
    $uploadttd=UpdateTandaTangan($nik,$newFileName);
    if ($uploadttd) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=profile" </script>';
    } else {
        echo '<script>alert("Data Fail Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=profile" </script>';
    }
}

$btnUploadFoto = filter_input(INPUT_POST, 'btnUploadFoto');
if($btnUploadFoto){
    $nik1=filter_input(INPUT_POST, 'id22');
    if(isset($_FILES['Foto']['name'])){
        $targetDirectory = 'uploads/';
        $fileExtension = pathinfo($_FILES['Foto']['name'],PATHINFO_EXTENSION);
        $newFileName = $nik1. '.' . $fileExtension;
        $targetFile = $targetDirectory . $newFileName;
        if($_FILES['Foto']['size']>1024*2048) {
            echo '<script>alert("Upload error. File size exceed 2MB") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=profile" </script>';
        } else {
            move_uploaded_file($_FILES['Foto']['tmp_name'], $targetFile);
        }
    }
    $uploadfoto=uploadFoto($nik1,$newFileName);
    if ($uploadfoto) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=profile" </script>';
    } else {
        echo '<script>alert("Data Fail Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=profile" </script>';
    }
}

$result = fetchUserData();
foreach ($result as $data) {
    if ($data['NIK'] == $_SESSION['session_id']) {
        ?>
        <div class="container-fluid">
            <div class="main-body">
                <br>
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <?php
                                    if($data['Foto']==null){
                                        ?>
                                        <img src="uploads/Profile.png" alt="User"
                                             class="rounded-circle" width="150">
                                        <?php
                                    }else{
                                        ?>
                                        <img src="uploads/<?php echo $data['Foto']?>" alt="User"
                                             class="rounded-circle" width="150">
                                        <?php
                                    }
                                    ?>
                                    <div class="mt-3">
                                        <h4><?php echo $data['Nama'] ?></h4>
                                        <p class="text-secondary mb-1" ><?php echo $data['NIK'] ?></p>
                                        <p class="text-muted font-size-sm">
                                            <?php IF (substr($data['NIK'],2,2)==72){
                                                echo 'Teknik Informatika';
                                            }else if (substr($data['NIK'],2,2)==73){
                                                echo 'Sistem Informasi';
                                            }else{
                                                echo "";
                                            }?></p>
                                        <button  class="btn btn-primary btnedit" id='select'
                                                 data-id="<?php echo $data['NIK'] ?>"
                                                 data-nama="<?php echo $data['Nama'] ?>"
                                                 data-email="<?php echo $data['Email'] ?>"
                                                 data-nomortelepon="<?php echo $data['NomorTelepon'] ?>"
                                                 data-twitter="<?php echo $data['Twitter'] ?>"
                                                 data-facebook="<?php echo $data['Facebook'] ?>"
                                                 data-website="<?php echo $data['Website'] ?>"
                                                 data-github="<?php echo $data['Github'] ?>"
                                                 data-role="<?php echo $data['Role'] ?>"
                                                 data-password="<?php echo $data['Password'] ?>"
                                                 data-instagram="<?php echo $data['Instagram'] ?>">
                                            Perbaharui
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-globe mr-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>
                                        Website
                                    </h6>
                                    <span class="text-secondary" ><?php echo $data['Website'] ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-github mr-2 icon-inline">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                        Github
                                    </h6>
                                    <span class="text-secondary" ><?php echo $data['Github'] ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                        </svg>
                                        Twitter
                                    </h6>
                                    <span class="text-secondary" ><?php echo $data['Twitter'] ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>
                                        Instagram
                                    </h6>
                                    <span class="text-secondary" ><?php echo $data['Instagram'] ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                        </svg>
                                        Facebook
                                    </h6>
                                    <span class="text-secondary"><?php echo $data['Facebook'] ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" >
                                        <?php echo $data['Nama'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" >
                                        <?php echo $data['Email'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $data['NomorTelepon'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Jurusan</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php IF (substr($data['NIK'],2,2)==72){
                                            echo 'Teknik Informatika';
                                        }else if (substr($data['NIK'],2,2)==73){
                                            echo 'Sistem Informasi';
                                        }else{
                                            echo "";
                                        }?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Role</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" >
                                        <?php echo $data['Role'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                    class="material-icons text-info mr-2">Upload Scan Tanda Tangan</i>
                                        </h6>
                                        <div>
                                            <button type="button" class="btn btn-primary btnUploadTandaTangan"
                                                    data-id="<?php echo $data['NIK'] ?>"
                                                    data-ttd="<?php echo $data['TandaTangan'] ?>">Upload
                                            </button>
                                            <?php echo $data['TandaTangan']?>
                                            <div class="text-center">
                                                <?php
                                                if($data['TandaTangan']==null){
                                                    ?>
                                                    <img src="uploads/default1.jpg" alt="User"
                                                         class="rounded" width="200px" height="200px">
                                                    <?php
                                                }else{
                                                    ?>
                                                    <img src="uploads/<?php echo $data['TandaTangan']?>" class="rounded" alt="TandaTangan" height="200px" width="200px">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="modal fade" id="exampleModalUploadTandaTangan" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <div class="mb-3">
                                                                    <input type="hidden" id="id2" name="id2">
                                                                    <input type="file" class="form-control"
                                                                           name="TandaTangan" id="TandaTangan"
                                                                           accept="image/jpeg,image/png"/>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <input type="submit" name='btnUploadTandaTangan'
                                                                           value='Upload' class="btn btn-primary"/>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                    class="material-icons text-info mr-2">Upload Scan Foto Profile</i>
                                        </h6>
                                        <div>
                                            <button type="button" class="btn btn-primary btnUploadFotoProfile"
                                                    data-id21="<?php echo $data['NIK'] ?>"
                                                    data-foto="<?php echo $data['Foto'] ?>">Upload
                                            </button>
                                            <?php echo $data['Foto'] ?>
                                            <div class="text-center">
                                                <?php
                                                if($data['Foto']==null){
                                                    ?>
                                                    <img src="uploads/Profile.png" alt="User"
                                                         class="rounded" width="200px" height="200px">
                                                    <?php
                                                }else{
                                                    ?>
                                                    <img src="uploads/<?php echo $data['Foto']?>" class="rounded" alt="User" height="200px" width="200px">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="modal fade" id="exampleModalUploadFoto" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <div class="mb-3">
                                                                    <input type="hidden" id="id22" name="id22">
                                                                    <input type="file" class="form-control"
                                                                           name="Foto" id="Foto"
                                                                           accept="image/jpeg,image/png"/>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <input type="submit" name='btnUploadFoto'
                                                                           value='Upload' class="btn btn-primary"/>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1"
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
                                    <label for="id" class="col-form-label">NIK:</label>
                                    <input type="text" class="form-control" id="id"
                                           name="id"  readonly/>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="col-form-label">Nama :</label>
                                    <input type="text" class="form-control" id="nama"
                                           name="nama" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="col-form-label">Email :</label>
                                    <input type="text" class="form-control" id="role"
                                           name="role" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="col-form-label">Password :</label>
                                    <input type="password" class="form-control" id="password"
                                           name="password" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="col-form-label">Email :</label>
                                    <input type="text" class="form-control" id="email"
                                           name="email"/>
                                </div>
                                <div class="mb-3">
                                    <label for="nomortelepon" class="col-form-label">Nomor Telepon :</label>
                                    <input type="text" class="form-control" id="nomortelepon"
                                           name="nomortelepon" />
                                </div>
                                <div class="mb-3">
                                    <label for="website" class="col-form-label">Website :</label>
                                    <input type="text" class="form-control" id="website"
                                           name="website" />
                                </div><div class="mb-3">
                                    <label for="github" class="col-form-label">Github :</label>
                                    <input type="text" class="form-control" id="github"
                                           name="github" />
                                </div>
                                <div class="mb-3">
                                    <label for="facebook" class="col-form-label">Facebook :</label>
                                    <input type="text" class="form-control" id="facebook"
                                           name="facebook" />
                                </div>
                                <div class="mb-3">
                                    <label for="instagram" class="col-form-label">Instagram :</label>
                                    <input type="text" class="form-control" id="instagram"
                                           name="instagram" />
                                </div>
                                <div class="mb-3">
                                    <label for="twitter" class="col-form-label">Twitter :</label>
                                    <input type="text" class="form-control" id="twitter"
                                           name="twitter" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <input type="submit" name='btnSaveDataUser'
                                           value='Save Data' class="btn btn-primary"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
$link = null;

?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.btnUploadTandaTangan').on('click',function () {
            $('#exampleModalUploadTandaTangan').modal('show');
            var NIK=$(this).data('id');
            var ttd=$(this).data('ttd');
            $('#id2').val(NIK);
            $('#TandaTangan').val(ttd);
        });
    });
    $(document).ready(function () {
        $('.btnUploadFotoProfile').on('click',function () {
            $('#exampleModalUploadFoto').modal('show');
            var idu=$(this).data('id21');
            var foto=$(this).data('foto');
            $('#id22').val(idu);
            $('#Foto').val(foto);
        });
    });

    $(document).ready(function () {
        $('.btnedit').on('click',function () {
            $('#exampleModal').modal('show');
            var NIK=$(this).data('id');
            var Nama=$(this).data('nama');
            var Email=$(this).data('email');
            var NomorTelepon=$(this).data('nomortelepon');
            var Role=$(this).data('role');
            var Website=$(this).data('website');
            var Twitter=$(this).data('twitter');
            var Facebook=$(this).data('facebook');
            var Instagram=$(this).data('instagram');
            var Github=$(this).data('github');
            var Password=$(this).data('password');
            $('#id').val(NIK);
            $('#nama').val(Nama);
            $('#email').val(Email);
            $('#nomortelepon').val(NomorTelepon);
            $('#role').val(Role);
            $('#website').val(Website);
            $('#github').val(Github);
            $('#facebook').val(Facebook);
            $('#twitter').val(Twitter);
            $('#instagram').val(Instagram);
            $('#password').val(Password);
        });
    });
</script>
</body>
</html>
