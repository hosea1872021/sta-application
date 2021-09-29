<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link type="text/css" href="berita_acara.css"/>-->
</head>
<body>
<div style="padding:35px">
    <table class="table table-hover" id="dev-table">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1 class="panel-title" align="right">Berita Acara Sidang Tugas Akhir</h1>
                            <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter"
                                  data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                            </div>
                        </div>
                        <thead>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Ruang</th>
                        </thead>
                        <tbody>
                        <?php
                        $result = fetchMasterData();
                        foreach ($result as $dataT1){
                        if ($_SESSION['session_id'] == $dataT1['NIK']) {
                        if ($_SESSION["session_role"] == 'mahasiswa') {
                        echo '<tr>';
                        echo '<td>';
                        if ($dataT1['TanggalSTA'] == NULL) {
                            echo 'belum tersedia';
                        } else {
                            echo $dataT1['TanggalSTA'] . '</td>';
                        }
                        '</td>';

                        echo '<td>';
                        if ($dataT1['JamSTA'] == NULL) {
                            echo 'belum tersedia';
                        } else {
                            echo $dataT1['JamSTA'] . '</td>';
                        }
                        '</td>';
                        echo '<td>';
                        if ($dataT1['Ruang'] == NULL) {
                            echo 'belum tersedia';
                        } else {
                            echo $dataT1['Ruang'] . '</td>';
                        }
                        '</td>';
                        echo '</tr>';
                        ?>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </table>

    <table>
        <thead>
        <th>Telah Dilaksanakan Judisium Mahasiswa</th>
        </thead>
        <tbody>
        <tr>
            <td>NRP</td>
            <td>: &ensp;</td>
            <td>
                <?php
                echo $dataT1['NIK'];
                ?>
            </td>
        </tr>
        <tr>
            <td>Nama Mahasiswa</td>
            <td>: &ensp;</td>
            <td>
                <?php
                echo $dataT1["Nama"];
                ?>
            </td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>: &ensp;</td>
            <td><?php
                echo $dataT1['JudulSTA'];
                ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>: &ensp;</td>
            <td> <?php
                if ($dataT1['NamaProdi'] == 'IF') {
                    echo 'Teknik Informatika';
                } else {
                    echo 'Sistem Informasi';
                }
                ?></td>
        </tr>
        </tbody>
    </table>
    </br>
    <table>
        <thead>
        <th>Hasil judisium memutuskan bahwa mahasiswa mendapatkan nilai sidang STA
            <?php
            if ($dataT1['NilaiTotal'] != null) {
                if ($dataT1['NilaiTotal'] > 79) {
                    echo $dataT1['NilaiTotal'];
//                    echo '<br>';
                    echo ' A.';
                } else if ($dataT1['NilaiTotal'] >= 72) {
                    echo $dataT1['NilaiTotal'];
//                    echo '<br>';
                    echo ' B+.';
                } else if ($dataT1['NilaiTotal'] > 66) {
                    echo $dataT1['NilaiTotal'];
//                    echo '<br>';
                    echo ' B.';
                } else if ($dataT1['NilaiTotal'] > 60) {
                    echo $dataT1['NilaiTotal'];
//                    echo '<br>';
                    echo ' C+.';
                } else if ($dataT1['NilaiTotal'] > 54) {
                    echo $dataT1['NilaiTotal'];
//                    echo '<br>';
                    echo ' C.';
                } else if ($dataT1['NilaiTotal'] > 40) {
                    echo $dataT1['NilaiTotal'];
//                    echo '<br>';
                    echo ' D.';
                } else {
                    echo $dataT1['NilaiTotal'];
//                    echo '<br>';
                    echo ' E.';
                }
            }

            ?>
        </th>
        </thead>
        <tbody>
        <tr>
            <!--            <td>--><?php
            //                if ($dataT1['nilaiTotalPembimbing'] == NULL) {
            //                    echo 'belum tersedia';
            //                } else if ((($dataT1['nilaiTotalPembimbing'] + $dataT1['nilaiTotalEvaluator']) / 2) >= 55) {
            //                    echo 'Lulus dan telah menyelesaikan, menyempurnakan laporan dan seluruh </br>
            //            berkas penyelesaian Tugas Akhir serta melaporkannya kepada Pembimbing</br>
            //            dan Penguji.';
            //                } else {
            //                    echo '<b>Tidak Lulus dengan alasan berikut :</b></br>';
            //                    echo '<b>Komentar Evaluator 1: </b> </br>';
            //                    echo $dataT1['komentarPembimbing'] . '</br></br>';
            //                    echo '<b>Komentar Evaluator 2: </b> </br>';
            //                    echo $dataT1['komentarEvaluator'] . '</br></br>';
            //                }
            //                ?>
            <!--            </td>-->
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    </br>

    <table class="table table-hover" id="dev-table">
        <thead>
        <th>No.</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Sebagai</th>
        <th>Tanda Tangan</th>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>
                <?php
                echo substr($dataT1['DosenPembimbingSTA'], 0, 6)
                ?>
            </td>
            <td>
                <?php
                echo substr($dataT1['DosenPembimbingSTA'], 7)
                ?>
            </td>
            <td> Evaluator 1 </td>
            <?php
            $ttd2 = SelectedUserData(substr($dataT1['DosenPembimbingSTA'], 0, 6));
            ?>
            <td> <?php
                if (isset($ttd2['TandaTangan'])== NULL) {
                    ?>
                    <img src="uploads/default.jpg"
                         height="150px" width="150px" alt="TandaTanganEvaluator2">
                    <?php
                } else {
                    ?>

                    <img src="uploads/<?php echo $ttd2['TandaTangan'] ?>" class="rounded" alt="TandaTangan"
                         height="150px" width="150px">
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <?php
                echo substr($dataT1['Evaluator1'], 0,6)
                ?>
            </td>
            <td>
                <?php
                echo substr($dataT1['Evaluator1'], 7)
                ?>
            </td>
            <td> Evaluator 2</td>
            <?php
            $ttd3 = SelectedUserData(substr($dataT1['Evaluator1'], 0, 6));
            ?>
            <td> <?php
                if (isset($ttd3['TandaTangan'])!=NULL) {
                    ?>
                    <img src="uploads/<?php echo $ttd3['TandaTangan'] ?>" class="rounded" alt="TandaTangan"
                         height="150px" width="150px">
                    <?php
                } else {
                    ?>
                    <img src="uploads/default1.jpg"
                         height="150px" width="150px" alt="TandaTanganEvaluator2">

                    <?php
                }
                ?>
            </td>

        </tr>
        </tbody>
    </table>
    </br>
    <!-- TABEL 3-->
    <table class="table table-hover" id="dev-table">
        <thead align="center">
        <th colspan="2">Mengetahui,</th>
        <th colspan="2">Ketua Sidang</th>
        <th colspan="2">Penanggung Jawab</th>
        </thead>
        <tbody>
        <tr>
            <td align="center" colspan="2">
                <?php
                $ttd4 = SelectedUserData(substr($dataT1['Koordinator'], 0, 6));
                ?>
                <?php
                if (isset($ttd4['TandaTangan'])!= NULL) {
                    ?>
                    <img src="uploads/<?php echo $ttd4['TandaTangan'] ?>" class="rounded" alt="TandaTangan"
                         height="150px" width="150px">

                    <?php
                } else {
                    ?>
                    <img src="uploads/default1.jpg"
                         height="150px" width="150px" alt="TandaTanganKoordinator">
                    <?php
                }
                ?>
                </br>
                Koordinator
            </td>
            <td align="center" colspan="2">
                <?php
                $ttd5 = SelectedUserData(substr($dataT1['KetuaProgramStudi'], 0, 6));
                ?>
                <?php
                if (isset($ttd5['TandaTangan'])!= NULL) {
                    ?>
                    <img src="uploads/<?php echo $ttd5['TandaTangan'] ?>" class="rounded" alt="TandaTangan"
                         height="150px" width="150px">
                    <?php
                } else {
                    ?>
                    <img src="uploads/default1.jpg"
                         height="150px" width="150px" alt="TandaTanganKetuaProgramStudi">
                    <?php
                }
                ?>
                </br>
                Ketua Program Studi
            </td>
            <td align="center" colspan="2">
                <?php
                $ttd6 = SelectedUserData(substr($dataT1['Dekan'], 0, 6));
                ?>
                <?php
                if (isset($ttd6['TandaTangan'])== NULL) {
                    ?>
                    <img src="uploads/<?php echo $ttd6['TandaTangan'] ?>" class="rounded" alt="TandaTangan"
                         height="150px" width="150px">
                    <?php
                } else {
                    ?>
                    <img src="uploads/default1.jpg"
                         height="150px" width="150px" alt="Dekan">
                    <?php
                }
                ?>
                </br>
                Dekan FIT
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <?php
                echo substr($dataT1['Koordinator'], 7);
                ?>
            </td>
            <td colspan="2" align="center">
                <?php
                echo substr($dataT1['KetuaProgramStudi'], 7);
                ?>
            </td>
            <td colspan="2" align="center">
                <?php
                echo substr($dataT1['Dekan'], 7);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">NIK :
                <?php
                echo substr($dataT1['Koordinator'], 0, 6);
                ?>
            </td>
            <td colspan="2" align="center">NIK :
                <?php
                echo substr($dataT1['KetuaProgramStudi'], 0, 6);
                ?>
            </td>
            <td colspan="2" align="center">NIK :
                <?php
                echo substr($dataT1['Dekan'], 0, 6);
                ?>
            </td>
        </tr>
        </tbody>
    </table>
    <?php
    }
    }
    ?>
</div>
<script>
    //buat data table
    // $(document).ready(function () {
    $ready(function () {
        $('table').DataTable();
    });
</script>
</body>
</html>