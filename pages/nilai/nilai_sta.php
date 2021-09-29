<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
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
    }

    function updateNilai(id) {
        window.location = "?menu=nu&nid=" + id;
    }
</script>
<?php
$btnEdit = filter_input(INPUT_POST, 'btnEdit');
if (isset($btnEdit)) {
    $idcoba = filter_input(INPUT_POST, 'idcoba');
    $evaluator2 = filter_input(INPUT_POST, 'evaluator2');
    $DosenPembimbing = filter_input(INPUT_POST, 'DosenPembimbing');
    if ($DosenPembimbing != $evaluator2) {
        $result = UpdateEvaluatorSTA($idcoba, $evaluator2);
        if ($result) {
            echo '<script>alert("Data Successfully Added") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=nilai_sta" </script>';
        } else {
            echo '<script>alert("Data Fail Added ") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=nilai_sta" </script>';
        }
    } else {
        echo '<script>alert("Data Has Been Used") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nilai_sta" </script>';
    }
}

$btnSaveDataNilai = filter_input(INPUT_POST, 'btnSaveDataNilai');
if (isset($btnSaveDataNilai)) {
    $idcoba2 = filter_input(INPUT_POST, 'idcoba2');
    $nilai1ev1 = filter_input(INPUT_POST, 'nilai1ev1');
    $nilai2ev1 = filter_input(INPUT_POST, 'nilai2ev1');
    $nilai3ev1 = filter_input(INPUT_POST, 'nilai3ev1');
    $messageev1 = filter_input(INPUT_POST, 'messageev1');
    $nilaitotalev1 = ($nilai1ev1 * 20 / 100) + ($nilai2ev1 * 40 / 100) + ($nilai3ev1 * 40 / 100);
    $nilai1ev2 = filter_input(INPUT_POST, 'nilai1ev2');
    $nilai2ev2 = filter_input(INPUT_POST, 'nilai2ev2');
    $nilai3ev2 = filter_input(INPUT_POST, 'nilai3ev2');
    $messageev2 = filter_input(INPUT_POST, 'messageev2');
    $nilaitotalev2 = ($nilai1ev2 * 20 / 100) + ($nilai2ev2 * 40 / 100) + ($nilai3ev2 * 40 / 100);
    $result = UpdateNilaiKoorSTA($idcoba2, $nilai1ev1, $nilai2ev1, $nilai3ev1, $messageev1, $nilaitotalev1
        , $nilai1ev2, $nilai2ev2, $nilai3ev2, $messageev2, $nilaitotalev2);
    if ($result) {
        echo '<script>alert("Data Successfully Updated") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nilai_sta" </script>';

    } else {
        echo '<script>alert("Data Fail Updated ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nilai_sta" </script>';
    }
}
$btnHitung = filter_input(INPUT_POST, 'btnHitung');
if (isset($btnHitung)) {
    $idcoba12 = filter_input(INPUT_POST, 'idcoba12');
    $nilaitotal11 = filter_input(INPUT_POST, 'nilaitotal11');
    $nilaitotal22 = filter_input(INPUT_POST, 'nilaitotal22');
    $nilaitotal33 = filter_input(INPUT_POST, 'nilaitotal33');
    if ($nilaitotal11 == null or $nilaitotal22 == null) {
        echo '<script>alert("There is an empty data. Please cek score again!") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nilai_sta" </script>';
    } else {
        $result10 = UpdateTotal($idcoba12, ($nilaitotal11 + $nilaitotal22) / 2);
        if ($result10) {
            echo '<script>alert("Data Successfully Updated") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=nilai_sta" </script>';

        } else {
            echo '<script>alert("Data Fail Updated ") </script>';
            echo '<script>window.location.href="/Proyek_KP/index.php?menu=nilai_sta" </script>';
        }
    }
}

?>
<body>
<br>
<!--Table-->
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title">Penilaian STA</h1>
                    <Table border="1px" id="myTable">
                        <thead>
                        <th>Kode Sidang</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Semester Mata Kuliah</th>
                        <th>JudulSTA</th>
                        <th>Evaluator1</th>
                        <th>Evaluator2</th>
                        <th>Tanggal Sidang</th>
                        <th>Jam Sidang</th>
                        <th>Ruang Sidang</th>
                        <th>Edit Evaluator2</th>
                        <th>Nilai</th>
                        <th>Nilai Akhir</th>
                        </thead>
                        <tbody>
                        <?php
                        $result = fetchSidangSTAData();
                        foreach ($result

                                 as $data) {
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
                                <td>
                                    <button class="btn btn-warning btnedit" style="margin: 3px"
                                            data-id="\'' . $data['idMaster'] . '\'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                            svg>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary editnilaibtn" style="margin: 3px"
                                            onclick="updateNilai(<?php echo $data['idMaster'] ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-file-earmark-bar-graph-fill"
                                             viewBox="0 0 16 16">
                                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-primary detailbtn" style="margin: 3px"
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
                                            data-nilaitotaldosenpembimbingsta="<?php echo $data["NilaiTotal_DosenPembimbing"] ?>"
                                            data-komentarevaluator="<?php echo $data["Komentar_Evaluator1"] ?>"
                                            data-nilaista1evaluator="<?php echo $data["NilaiSTA1_Evaluator1"] ?>"
                                            data-nilaista2evaluator="<?php echo $data["NilaiSTA2_Evaluator1"] ?>"
                                            data-nilaista3evaluator="<?php echo $data["NilaiSTA3_Evaluator1"] ?>"
                                            data-nilaitotalevaluator="<?php echo $data["NilaiTotal_Evaluator1"] ?>"
                                            data-evaluator2="<?php echo $data["Evaluator1"] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                    </button>
                                </td>
                                <td>
                                    <?php
                                    if ($data['NilaiTotal'] == null and $data["NilaiTotal_DosenPembimbing"] == 0 or
                                        $data["NilaiTotal_DosenPembimbing"] == null and $data["NilaiTotal_Evaluator1"] == 0
                                        or $data["NilaiTotal_Evaluator1"] == null) {
                                        ?>
                                        <button type="button" class="btn btn-primary btnhitung" style="margin: 3px"
                                                data-id2="<?php echo $data['NIK'] ?>"
                                                data-nama1="<?php echo $data["Nama"] ?>"
                                                data-nilaitotal1="<?php echo $data["NilaiTotal_DosenPembimbing"] ?>"
                                                data-nilaitotal2="<?php echo $data["NilaiTotal_Evaluator1"] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-calculator-fill" viewBox="0 0 16 16">
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z"/>
                                            </svg>
                                        </button>
                                        <?php
                                    } else if ($data["NilaiTotal_DosenPembimbing"] != null
                                        or $data["NilaiTotal_Evaluator1"] != null) {
                                        if ($data['NilaiTotal'] == null) {
                                            ?>
                                            <button type="button" class="btn btn-primary btnhitung"
                                                    style="margin: 3px"
                                                    data-id2="<?php echo $data['NIK'] ?>"
                                                    data-nama1="<?php echo $data["Nama"] ?>"
                                                    data-nilaitotal1="<?php echo $data["NilaiTotal_DosenPembimbing"] ?>"
                                                    data-nilaitotal2="<?php echo $data["NilaiTotal_Evaluator1"] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-calculator-fill"
                                                     viewBox="0 0 16 16">
                                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z"/>
                                                </svg>
                                            </button>
                                            <?php
                                        } else {
                                            if ($data['NilaiTotal'] == ($data["NilaiTotal_Evaluator1"] + $data["NilaiTotal_DosenPembimbing"]) / 2) {
                                                if ($data['NilaiTotal'] > 79) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'A';
                                                } else if ($data['NilaiTotal'] >= 72) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'B+';
                                                } else if ($data['NilaiTotal'] > 66) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'B';
                                                } else if ($data['NilaiTotal'] > 60) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'C+';
                                                } else if ($data['NilaiTotal'] > 54) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'C';
                                                } else if ($data['NilaiTotal'] > 40) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'D';
                                                } else {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'E';
                                                }
                                            }else if ($data['NilaiTotal'] != ($data["NilaiTotal_Evaluator1"] + $data["NilaiTotal_DosenPembimbing"]) / 2) {
                                                if ($data['NilaiTotal'] > 79) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'A';
                                                } else if ($data['NilaiTotal'] >= 72) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'B+';
                                                } else if ($data['NilaiTotal'] > 66) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'B';
                                                } else if ($data['NilaiTotal'] > 60) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'C+';
                                                } else if ($data['NilaiTotal'] > 54) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'C';
                                                } else if ($data['NilaiTotal'] > 40) {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'D';
                                                } else {
                                                    echo $data['NilaiTotal'];
                                                    echo '<br>';
                                                    echo 'E';
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
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
        $(document).ready(function () {
            $('.btnhitung').on('click', function () {
                $('#examplehitung').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#idcoba12').val(data[0]);
                var NIK1 = $(this).data('id2');
                var Nama1 = $(this).data('nama1');
                var NilaiTotal1 = $(this).data('nilaitotal1');
                var NilaiTotal2 = $(this).data('nilaitotal2');
                $('#nilaitotal11').val(NilaiTotal1);
                $('#id12').val(NIK1);
                $('#nama12').val(Nama1);
                $('#nilaitotal22').val(NilaiTotal2);
                $('#nilaitotal33').val((NilaiTotal2 + NilaiTotal1) / 2);

            });
        });
        $(document).ready(function () {
            $('.btnedit').on('click', function () {
                $('#exampleEditModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#idcoba').val(data[0]);
                $('#nik1').val(data[1]);
                $('#NamaCoba').val(data[2]);
                $('#DosenPembimbing').val(data[5]);
                $('#Evaluator').val(data[6]);
            });
        });
        $(document).ready(function () {
            $('.detailbtn').on('click', function () {
                $('#exampledetail').modal('show');
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
                var KomentarEvaluator1 = $(this).data('komentardosenpembimbingsta');
                var NilaiTotalEvaluator1 = $(this).data('nilaitotaldosenpembimbingsta');
                var NilaiSTA1Evaluator1 = $(this).data('nilaista1dosenpembimbingsta');
                var NilaiSTA2Evaluator1 = $(this).data('nilaista2dosenpembimbingsta');
                var NilaiSTA3Evaluator1 = $(this).data('nilaista3dosenpembimbingsta');
                var DosenPembimbingSTA = $(this).data('dosenpembimbingsta');
                $('#evaluator1').val(DosenPembimbingSTA);
                $('#nilaitotaldosenpembimbing').val(NilaiTotalEvaluator1);
                $('#nilai1dosenpembimbing').val(NilaiSTA1Evaluator1);
                $('#nilai2dosenpembimbing').val(NilaiSTA2Evaluator1);
                $('#nilai3dosenpembimbing').val(NilaiSTA3Evaluator1);
                $('#messagedosenpembimbing').val(KomentarEvaluator1);
                $('#id').val(NIK);
                $('#nama').val(Nama);
                $('#ev2').val(Evaluator2);
                $('#nilaitotalevaluator').val(NilaiTotalEvaluator2);
                $('#nilai1evaluator').val(NilaiSTA1Evaluator2);
                $('#nilai2evaluator').val(NilaiSTA2Evaluator2);
                $('#nilai3evaluator').val(NilaiSTA3Evaluator2);
                $('#messageevaluator').val(KomentarEvaluator);
                $('#judulsta2').val(JudulSTA);
            });
        });

    </script>
</div>

<div class="modal fade" id="exampledetail" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <label for="judulsta2" class="col-form-label">Judul STA:</label>
                        <input type="text" class="form-control" name="judulsta2" id="judulsta2" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="evaluator1" class="col-form-label">Evaluator 1:</label>
                        <input type="text" class="form-control" name="evaluator1" id="evaluator1" readonly/>
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
                    <div class="mb-3">
                        <label for="ev2" class="col-form-label">Evaluator2:</label>
                        <input type="text" class="form-control" name="ev2" id="ev2" readonly/>
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
<div class="modal fade" id="exampleEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Evaluator 2 Sidang STA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idcoba" class="col-form-label">Kode Sidang:</label>
                        <input type="text" class="form-control" name="idcoba" id="idcoba" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="nik1" class="col-form-label">NIK:</label>
                        <input type="text" class="form-control" name="nik1" id="nik1" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="NamaCoba" class="col-form-label">Nama
                            :</label>
                        <input type="text" class="form-control" name="NamaCoba" id="NamaCoba" readonly/>
                    </div>
                    <input type="hidden" id="DosenPembimbing" name="DosenPembimbing">
                    <div class="mb-3">
                        <label for="evaluator2" class="col-form-label">Pilih Evaluator 2
                            :</label>
                        <select id='evaluator2' name="evaluator2" class="form-control form-select">
                            <?php
                            $ev = fetchUserDosenData();
                            foreach ($ev as $cek) {
                                echo '<option value="' . $cek['NIK'] . '-' . $cek['Nama'] . '">' . $cek['NIK'] . '-' . $cek['Nama'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name='btnEdit' class="btn btn-primary" value="Save Data"/>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Form-->
<div class="modal fade" id="examplehitung" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hitung Nilai Akhir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">

                    <input type="hidden" name="idcoba12" id="idcoba12" readonly/>
                    <input type="hidden" name="nilaitotal11" id="nilaitotal11" readonly/>
                    <input type="hidden" name="nilaitotal22" id="nilaitotal22" readonly/>
                    <div class="mb-3">
                        <label for="id12" class="col-form-label">NIK:</label>
                        <input type="text" class="form-control" name="id12" id="id12" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="nama12" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" name="nama12" id="nama12" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="nilaitotal33" class="col-form-label">Nilai Total:</label>
                        <input type="text" class="form-control" name="nilaitotal33" id="nilaitotal33"
                               readonly/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name='btnHitung' class="btn btn-primary" value="Hitung"/>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    //buat data table
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
<!--End Table-->

</body>
</html>
