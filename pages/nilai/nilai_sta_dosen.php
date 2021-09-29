<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<?php
$cek = $_SESSION['session_id'] . '-' . $_SESSION['session_user'];
$savedata = filter_input(INPUT_POST, 'btnSaveDataNilai');
if (isset($savedata)) {
    $ev1 = filter_input(INPUT_POST, 'ev1');
    $ev2 = filter_input(INPUT_POST, 'ev2');
    $idcoba = filter_input(INPUT_POST, 'idcoba');
    $NamaCoba = filter_input(INPUT_POST, 'NamaCoba');
    $angka1 = filter_input(INPUT_POST, 'angka1');
    $angka2 = filter_input(INPUT_POST, 'angka2');
    $angka3 = filter_input(INPUT_POST, 'angka3');
    $hasilakhir = ($angka1 * 20 / 100) + ($angka2 * 40 / 100) + ($angka3 * 40 / 100);
    $messagetext = filter_input(INPUT_POST, 'messagetext');
    if ($cek == $ev1) {
        $result = UpdateNilaiEv1STA($idcoba, $angka1, $angka2, $angka3, $hasilakhir, $messagetext);
        if ($result) {
            echo '<script>alert("Data Successfully Added") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=sta_dosen" </script>';

        } else {
            echo '<script>alert("Data Fail Added ") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=sta_dosen" </script>';
        }
    } else if ($cek = $ev2) {
        $result = UpdateNilaiEv2STA($idcoba, $angka1, $angka2, $angka3, $hasilakhir, $messagetext);
        if ($result) {
            echo '<script>alert("Data Successfully Added") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=sta_dosen" </script>';

        } else {
            echo '<script>alert("Data Fail Added ") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=sta_dosen" </script>';
        }
    }
}
?>

<script type='text/javascript'>
    function hasilakhir() {
        var angka1 = document.getElementById('angka1').value;
        var angka2 = document.getElementById('angka2').value;
        var angka3 = document.getElementById('angka3').value;

        var kata;
        var pred;
        var hitung = (parseInt(angka1) * 20 / 100) + (parseInt(angka2) * 40 / 100) + (parseInt(angka3) * 40 / 100);
        if (hitung >= 80) {
            kata = "Selamat kamu mendapat nilai " + hitung;
            pred = 'A';
        } else if (hitung < 80) {
            kata = 'Selamat kamu mendapat nilai ' + hitung;
            pred = 'B';
        } else if (hitung < 70) {
            kata = 'Selamat kamu mendapat nilai ' + hitung;
            pred = 'C';
        } else {
            kata = 'Kamu mendapat nilai ' + hitung;
            pred = 'D';
        }

        document.getElementById('hasilakhir').innerHTML = kata;
    }

    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }

    $("#angka1").oninput(function () {
        if ($('#angka1').val() < 0 || $('#angka1').val() > 100) {
            $('#errorMsg').show();
        } else {
            $('#errorMsg').hide();
        }
    });
    $("#angka2").oninput(function () {
        if ($('#angka2').val() < 0 || $('#angka2').val() > 100) {
            $('#errorMsg').show();
        } else {
            $('#errorMsg').hide();
        }
    });
    $("#angka3").oninput(function () {
        if ($('#angka3').val() < 0 || $('#angka3').val() > 100) {
            $('#errorMsg').show();
        } else {
            $('#errorMsg').hide();
        }
    });
</script>
<body>
<!--Form-->
<br>
<!--Table-->
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Penilaian Sidang STA</h3>
                        <Table border="1px" id="myTable">
                            <thead>
                            <th>Kode Sidang</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Semester Mata Kuliah</th>
                            <th>Judul STA</th>
                            <th>Evaluator 1</th>
                            <th>Evaluator 2</th>
                            <th>Tanggal Sidang</th>
                            <th>Jam Sidang</th>
                            <th>Ruang Sidang</th>
                            <th>Nilai</th>
                            </thead>
                            <tbody>
                            <?php
                            $cek = $_SESSION['session_id'] . '-' . $_SESSION['session_user'];
                            $result = fetchSidangSTAData();
                            foreach ($result as $data) {
                                if ($cek == $data['DosenPembimbingSTA'] or $data['Evaluator1']) {
                                    if ($cek == $data['DosenPembimbingSTA']) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['idMaster'] ?></td>
                                            <td><?php echo $data['NIK'] ?></td>
                                            <td><?php echo $data['Nama'] ?></td>
                                            <td><?php echo $data['idSMK'] ?></td>
                                            <td><?php echo $data['JudulSTA'] ?></td>
                                            <td><?php echo $data['DosenPembimbingSTA'] ?></td>
                                            <td><?php echo $data['Evaluator1'] ?></td>
                                            <td><?php echo $data['TanggalSTA'] ?></td>
                                            <td><?php echo $data['JamSTA'] ?></td>
                                            <td><?php echo $data['Ruang'] ?></td>
                                            <?php
                                            if ($data['NilaiTotal_DosenPembimbing'] == null) {
                                                ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary nilaibtn"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            data-bs-whatever="@getbootstrap">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor"
                                                             class="bi bi-file-earmark-bar-graph-fill"
                                                             viewBox="0 0 16 16">
                                                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                                <?php
                                            } else {
                                                ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary detailbtnev1"
                                                            data-id="<?php echo $data['NIK'] ?>"
                                                            data-nama="<?php echo $data["Nama"] ?>"
                                                            data-idsmk="<?php echo $data["idSMK"] ?>"
                                                            data-judulsta="<?php echo $data["JudulSTA"] ?>"
                                                            data-dosenpembimbingsta="<?php echo $data["DosenPembimbingSTA"] ?>"
                                                            data-tanggalsta="<?php echo $data["TanggalSTA"] ?>"
                                                            data-jamsta="<?php echo $data["JamSTA"] ?>"
                                                            data-komentardosenpembimbingsta="<?php echo $data["Komentar_DosenPembimbing"] ?>"
                                                            data-nilaista1dosenpembimbingsta="<?php echo $data["NilaiSTA1_DosenPembimbing"] ?>"
                                                            data-nilaista2dosenpembimbingsta="<?php echo $data["NilaiSTA2_DosenPembimbing"] ?>"
                                                            data-nilaista3dosenpembimbingsta="<?php echo $data["NilaiSTA3_DosenPembimbing"] ?>"
                                                            data-nilaitotaldosenpembimbingsta="<?php echo $data["NilaiTotal_DosenPembimbing"] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-eye-fill"
                                                             viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                        </svg>
                                                    </button>
                                                </td>

                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    } else if ($cek == $data['Evaluator1']) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['idMaster'] ?></td>
                                            <td><?php echo $data['NIK'] ?></td>
                                            <td><?php echo $data['Nama'] ?></td>
                                            <td><?php echo $data['idSMK'] ?></td>
                                            <td><?php echo $data['JudulSTA'] ?></td>
                                            <td><?php echo $data['DosenPembimbingSTA'] ?></td>
                                            <td><?php echo $data['Evaluator1'] ?></td>
                                            <td><?php echo $data['TanggalSTA'] ?></td>
                                            <td><?php echo $data['JamSTA'] ?></td>
                                            <td><?php echo $data['Ruang'] ?></td>
                                            <?php
                                            if ($data['NilaiTotal_Evaluator1'] == null) {
                                                ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary nilaibtn"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            data-bs-whatever="@getbootstrap">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor"
                                                             class="bi bi-file-earmark-bar-graph-fill"
                                                             viewBox="0 0 16 16">
                                                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                                <?php
                                            } else {
                                                ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary detailbtnev2"
                                                            data-id="<?php echo $data['NIK'] ?>"
                                                            data-nama="<?php echo $data["Nama"] ?>"
                                                            data-idsmk="<?php echo $data["idSMK"] ?>"
                                                            data-judulsta="<?php echo $data["JudulSTA"] ?>"
                                                            data-evaluator2="<?php echo $data["Evaluator1"] ?>"
                                                            data-tanggalsta="<?php echo $data["TanggalSTA"] ?>"
                                                            data-jamsta="<?php echo $data["JamSTA"] ?>"
                                                            data-komentarevaluator="<?php echo $data["Komentar_Evaluator1"] ?>"
                                                            data-nilaista1evaluator="<?php echo $data["NilaiSTA1_Evaluator1"] ?>"
                                                            data-nilaista2evaluator="<?php echo $data["NilaiSTA2_Evaluator1"] ?>"
                                                            data-nilaista3evaluator="<?php echo $data["NilaiSTA3_Evaluator1"] ?>"
                                                            data-nilaitotalevaluator="<?php echo $data["NilaiTotal_Evaluator1"] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-eye-fill"
                                                             viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            $link = null;
                            ?>
                            </tbody>
                        </Table>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('.nilaibtn').on('click', function () {
                                $('#exampleModal').modal('show');
                                $tr = $(this).closest('tr');
                                var data = $tr.children("td").map(function () {
                                    return $(this).text();
                                }).get();
                                console.log(data);
                                $('#idcoba').val(data[0]);
                                $('#nik').val(data[1]);
                                $('#NamaCoba').val(data[2]);
                                $('#judulSTA1').val(data[4]);
                                $('#ev1').val(data[5]);
                                $('#ev2').val(data[6]);
                            });
                        });

                        $(document).ready(function () {
                            $('.detailbtnev2').on('click', function () {
                                $('#exampledetailevaluator').modal('show');
                                var NIK = $(this).data('id');
                                var Nama = $(this).data('nama');
                                var IdSMK = $(this).data('idsmk');
                                var JudulSTA = $(this).data('judulsta');
                                var Evaluator2 = $(this).data('evaluator2');
                                var JamSTA = $(this).data('jamsta');
                                var KomentarEvaluator = $(this).data('komentarevaluator');
                                var NilaiTotalEvaluator2 = $(this).data('nilaitotalevaluator');
                                var NilaiSTA1Evaluator2 = $(this).data('nilaista1evaluator');
                                var NilaiSTA2Evaluator2 = $(this).data('nilaista2evaluator');
                                var NilaiSTA3Evaluator2 = $(this).data('nilaista3evaluator');
                                $('#id').val(NIK);
                                $('#nama').val(Nama);
                                $('#evaluator2').val(Evaluator2);
                                $('#nilaitotalevaluator').val(NilaiTotalEvaluator2);
                                $('#nilai1evaluator').val(NilaiSTA1Evaluator2);
                                $('#nilai2evaluator').val(NilaiSTA2Evaluator2);
                                $('#nilai3evaluator').val(NilaiSTA3Evaluator2);
                                $('#messageevaluator').val(KomentarEvaluator);
                                $('#judulsta2').val(JudulSTA);
                            });
                        });
                        $(document).ready(function () {
                            $('.detailbtnev1').on('click', function () {
                                $('#exampledetaildosenpembimbing').modal('show');
                                var NIK = $(this).data('id');
                                var Nama = $(this).data('nama');
                                var IdSMK = $(this).data('idsmk');
                                var JudulSTA = $(this).data('judulsta');
                                var DosenPembimbingSTA = $(this).data('dosenpembimbingsta');
                                var JamSTA = $(this).data('jamsta');
                                var KomentarEvaluator1 = $(this).data('komentardosenpembimbingsta');
                                var NilaiTotalEvaluator1 = $(this).data('nilaitotaldosenpembimbingsta');
                                var NilaiSTA1Evaluator1 = $(this).data('nilaista1dosenpembimbingsta');
                                var NilaiSTA2Evaluator1 = $(this).data('nilaista2dosenpembimbingsta');
                                var NilaiSTA3Evaluator1 = $(this).data('nilaista3dosenpembimbingsta');
                                $('#id2').val(NIK);
                                $('#nama2').val(Nama);
                                $('#evaluator1').val(DosenPembimbingSTA);
                                $('#nilaitotaldosenpembimbing').val(NilaiTotalEvaluator1);
                                $('#nilai1dosenpembimbing').val(NilaiSTA1Evaluator1);
                                $('#nilai2dosenpembimbing').val(NilaiSTA2Evaluator1);
                                $('#nilai3dosenpembimbing').val(NilaiSTA3Evaluator1);
                                $('#messagedosenpembimbing').val(KomentarEvaluator1);
                                $('#judulsta').val(JudulSTA);
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampledetailevaluator" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Sidang STA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">NIK
                            :</label>
                        <input type="text" class="form-control" name="id" id="id" readonly/>
                    </div>
                    <div class="mb-3">

                        <label for="nama" class="col-form-label">Nama
                            :</label>
                        <input type="text" class="form-control" name="nama" id="nama" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="evaluator2" class="col-form-label">Evaluator:</label>
                        <input type="text" class="form-control" name="evaluator2" id="evaluator2" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="judulsta2" class="col-form-label">Judul STA:</label>
                        <input type="text" class="form-control" name="judulsta2" id="judulsta2" readonly/>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kriteria Penilaian</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><h5>Presentasi</h5>
                                <p>Sistematika materi presentasi; slide presentasi; teknik penyampaian
                                    presentasi;sikap pada saat presentasi </p></td>
                            <td>20%</td>
                            <td><input type="text" class="form-control" name="nilai1evaluator"
                                       id="nilai1evaluator" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><h5>Laporan</h5>
                                <p>Isi latar belakang, rumusan masalah, tujuan, batasan masalah;
                                    pengumpulan data
                                    dan/ atau studi literatur(keanekaragaman sumber teori dan
                                    referensi);
                                    ketajaman dan kedalaman analisis; tata bahasa dan tata tulis</p>
                            </td>
                            <td>40%</td>
                            <td><input type="text" class="form-control" name="nilai2evaluator"
                                       id="nilai2evaluator" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><h5>Kualitas Tanya Jawab</h5>
                                <p>Analisis; perancangan; proses pengerjaan dan metodologi </p></td>
                            <td>40%</td>
                            <td>
                                <input type="text" class="form-control" name="nilai3evaluator"
                                       id="nilai3evaluator" readonly>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <label for="nilaitotalevaluator" class="col-form-label">Nilai Total</label>
                        <input type="text" class="form-control" name="nilaitotalevaluator" id="nilaitotalevaluator"
                               readonly>
                    </div>
                    <div class="mb-3">
                        <label for="messageevaluator" class="col-form-label">Komentar</label>
                        <textarea type="text" class="form-control" id="messageevaluator"
                                  name="messageevaluator" readonly></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Form-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penilaian Sidang STA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idcoba" class="col-form-label">Kode Sidang:</label>
                        <input type="text" class="form-control" name="idcoba" id="idcoba" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="col-form-label">NIK:</label>
                        <input type="text" class="form-control" name="nik" id="nik" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="NamaCoba" class="col-form-label">Nama
                            :</label>
                        <input type="text" class="form-control" name="NamaCoba" id="NamaCoba" readonly/>
                    </div>
                    <input type="hidden" class="form-control" name="ev1" id="ev1"/>
                    <input type="hidden" class="form-control" name="ev2" id="ev2"/>
                    <div class="mb-3">
                        <label for="judulSTA1" class="col-form-label">Judul STA
                            :</label>
                        <input type="text" class="form-control" name="judulSTA1" id="judulSTA1" readonly/>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kriteria Penilaian</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Nilai</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><h5>Presentasi</h5>
                                <p>Sistematika materi presentasi; slide presentasi; teknik penyampaian
                                    presentasi;sikap pada saat presentasi </p></td>
                            <td>20%</td>
                            <td colspan="3"><input type="number" maxlength="3"
                                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                   class="form-control" name="angka1" id="angka1"
                                                   min="0" max="100">
                            </td>
                            <span id="errorMsg"
                                  style="display:none;">you can give score only 0 to 100 </span>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><h5>Laporan</h5>
                                <p>Isi latar belakang, rumusan masalah, tujuan, batasan masalah;
                                    pengumpulan data
                                    dan/ atau studi literatur(keanekaragaman sumber teori dan
                                    referensi);
                                    ketajaman dan kedalaman analisis; tata bahasa dan tata tulis</p>
                            </td>
                            <td>40%</td>
                            <td colspan="3"><input type="number" maxlength="3"
                                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                   class="form-control" name="angka2" id="angka2"
                                                   min="0" max="100">
                            </td>
                            <span id="errorMsg"
                                  style="display:none;">you can give score only 0 to 100 </span>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><h5>Kualitas Tanya Jawab</h5>
                                <p>Analisis; perancangan; proses pengerjaan dan metodologi </p></td>
                            <td>40%</td>
                            <td colspan="3"><input type="number" maxlength="3"
                                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                   class="form-control" name='angka3' id="angka3"
                                                   min="0" max="100">
                            </td>
                            <span id="errorMsg"
                                  style="display:none;">you can give score only 0 to 100 </span>
                        </tr>
                        <tr>
                            <td colspan="4" align="right"><input type='button' class="btn btn-primary"
                                                                 value='cek hasil'
                                                                 onclick='hasilakhir()'></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <label for="nilai-akhir" class="col-form-label">Nilai Akhir</label>
                        <h3 id="hasilakhir"></h3>
                        <!--                        <input type="hidden" name="hasilakhir" id="hasilakhir">-->
                    </div>
                    <div class="mb-3">
                        <label for="messagetext" class="col-form-label">Komentar</label>
                        <textarea type="text" class="form-control" id="messagetext" name="messagetext"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                    </button>
                    <input type="reset" class="btn btn-secondary" name="ResetForm" id="ResetForm"
                           value="Reset"/>
                    <input type="submit" name="btnSaveDataNilai" class="btn btn-primary"
                           value="Save Data"/>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Form-->
<div class="modal fade" id="exampledetaildosenpembimbing" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian Sidang STA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id2" class="col-form-label">NIK
                            :</label>
                        <input type="text" class="form-control" name="id2" id="id2" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="nama2" class="col-form-label">Nama
                            :</label>
                        <input type="text" class="form-control" name="nama2" id="nama2" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="evaluator1" class="col-form-label">Evaluator 1:</label>
                        <input type="text" class="form-control" name="evaluator1" id="evaluator1" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="judulsta" class="col-form-label">Judul STA:</label>
                        <input type="text" class="form-control" name="judulsta" id="judulsta" readonly/>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kriteria Penilaian</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><h5>Presentasi</h5>
                                <p>Sistematika materi presentasi; slide presentasi; teknik penyampaian
                                    presentasi;sikap pada saat presentasi </p></td>
                            <td>20%</td>
                            <td><input type="text" class="form-control" name="nilai1dosenpembimbing"
                                       id="nilai1dosenpembimbing" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><h5>Laporan</h5>
                                <p>Isi latar belakang, rumusan masalah, tujuan, batasan masalah;
                                    pengumpulan data
                                    dan/ atau studi literatur(keanekaragaman sumber teori dan
                                    referensi);
                                    ketajaman dan kedalaman analisis; tata bahasa dan tata tulis</p>
                            </td>
                            <td>40%</td>
                            <td><input type="text" class="form-control" name="nilai2dosenpembimbing"
                                       id="nilai2dosenpembimbing" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><h5>Kualitas Tanya Jawab</h5>
                                <p>Analisis; perancangan; proses pengerjaan dan metodologi </p></td>
                            <td>40%</td>
                            <td>
                                <input type="text" class="form-control" name="nilai3dosenpembimbing"
                                       id="nilai3dosenpembimbing" readonly>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <label for="nilaitotaldosenpembimbing" class="col-form-label">Nilai Total</label>
                        <input type="text" class="form-control" name="nilaitotaldosenpembimbing"
                               id="nilaitotaldosenpembimbing" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="messagedosenpembimbing" class="col-form-label">Komentar</label>
                        <textarea class="form-control" id="messagedosenpembimbing"
                                  name="messagedosenpembimbing" readonly> </textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Form-->
<script>
    //buat data table
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
<!--End Table-->

</body>
</html>
