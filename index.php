<?php
session_start();
include_once 'util/db_util.php';
include_once 'Function/user_function.php';
include_once 'Function/admin.php';
include_once 'Function/history_kp.php';
include_once 'Function/berita_acara.php';
include_once 'Function/sidang.php';
if (!isset($_SESSION['my_session'])) {
    $_SESSION['my_session'] = false;
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--CDN Datatable-->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.24/af-2.3.5/b-1.7.0/r-2.2.7/sb-1.0.1/datatables.min.css"/>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.24/af-2.3.5/b-1.7.0/r-2.2.7/sb-1.0.1/datatables.min.js"></script>

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Style/style.css">
    <title>Sistem STA</title>
    <link rel="icon" href="uploads/logofakultas1.png" type="image/x-icon">
</head>
<body>

<?php
if ($_SESSION['my_session']) { ?>
    <nav class="navbar navbar-expand-lg navbar-light" style='background-color:#d3ff7a'>
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="images/logofakultas.png" height="30" width="" alt=""
                                                          class="d-inline-block align-top"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?menu=home">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            History
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="?menu=history_kp">KP</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Nilai
                        </a>
                        <?php
                        if ($_SESSION['session_role'] == 'koor') {
                            ?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?menu=nilai_sta">STA</a></li>
                            </ul>
                            <?php
                        } else if ($_SESSION['session_role'] == 'mahasiswa') {
                            ?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?menu=sta_mahasiswa">STA</a></li>
                            </ul>
                            <?php
                        } else if ($_SESSION['session_role'] == 'dosen') {
                            ?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?menu=sta_dosen">STA</a></li>
                            </ul>
                            <?php
                        }
                        ?>

                    </li>
                    <li class="nav-item">
                        <?php
                        if ($_SESSION['session_role'] == 'koor'){ ?>
                            <a class="nav-link" href="?menu=berita_acara_admin" tabindex="-1" aria-disabled="true">Berita
                                Acara</a>
                            <?php
                        }

                        else if ($_SESSION['session_role'] == 'mahasiswa'){ ?>
                            <a class="nav-link" href="?menu=berita_acara" tabindex="-1" aria-disabled="true">Berita
                                Acara</a>
                            <?php
                        }

                        else if ($_SESSION['session_role'] == 'dosen'){ ?>
                            <a class="nav-link" href="?menu=berita_acara_dosen" tabindex="-1" aria-disabled="true">Berita
                                Acara</a>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                    if ($_SESSION['session_role'] == 'koor') {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Administrasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?menu=administrasi">Pengaturan Semester</a></li>
                                <li><a class="dropdown-item" href="?menu=akun">Akun</a></li>
                                <li><a class="dropdown-item" href="?menu=sidang_sta">Sidang STA</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="pengguna" style="padding-right:10px;">
                    <button type="button" class="btn btn-success" onclick="window.location.href='?menu=profile'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor"
                             class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        <?php
                        echo $_SESSION['session_user'];
                        ?>
                    </button>
                </div>
                <div class="keluar">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='?menu=logout'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor"
                             class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div>
        <?php
        $data = filter_input(INPUT_GET, "menu");
        switch ($data) {
            case 'history_kp':
                include_once 'pages/history/history_kp.php';
                break;

            case 'nilai_sta':
                include_once 'pages/nilai/nilai_sta.php';
                break;
            case 'nu':
                include_once 'pages/nilai/nilaista_update.php';
                break;
            case 'berita_acara':
                include_once 'pages/berita_acara/berita_acara.php';
                break;
            case 'berita_acara_admin':
                include_once 'pages/berita_acara/berita_acara_admin.php';
                break;
            case 'berita_acara_dosen':
                include_once 'pages/berita_acara/berita_acara_dosen.php';
                break;
            case 'profile':
                include_once 'pages/profile/profile_page.php';
                break;
            case 'sidang_sta':
                include_once 'pages/administrasi/sidang_sta.php';
                break;
            case 'administrasi':
                include_once 'pages/administrasi/administrasi.php';
                break;
            case 'akun':
                include_once 'pages/administrasi/akun.php';
                break;
            case 'sta_dosen':
                include_once 'pages/nilai/nilai_sta_dosen.php';
                break;
            case 'sta_mahasiswa':
                include_once 'pages/nilai/nilai_sta_mahasiswa.php';
                break;
            case 'home';
                include_once 'pages/home.php';
                break;
            case 'logout';
                session_unset();
                session_destroy();
                echo '<script>window.location.href="/Proyek_KP/index.php?menu=logout" </script>';
                break;
            default;
                include_once 'pages/home.php';
        }
        ?>
    </div>
    <?php
} else {
    include_once 'pages/login/login_page.php';
}
?>
</body>
</html>
