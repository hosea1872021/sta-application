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
                        <tbody>
                        <Table border="1px" id="Table" >
                            <thead>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Semester Matakuliah</th>
                            <th>Dosen Pembimbing</th>
                            <th>JudulSTA</th>
                            <th>Tanggal Sidang</th>
                            <th>Jam Sidang</th>
                            <th>Keterangan</th>
                            </thead>
                            <tbody>
                            <?php
                            $cek = $_SESSION['session_id'] . '-' . $_SESSION['session_user'];
                            $result = fetchMasterData();
                            foreach ($result as $dataA1){
                            if ($cek == $dataA1['DosenPembimbingSTA'] or $dataA1['Evaluator1']) {
                                if ($cek == $dataA1['DosenPembimbingSTA']) {
                                echo '<tr>';
                                echo '<td>' . $dataA1['idMaster'] . '</td>';
                                echo '<td>' . $dataA1['NIK'] . '</td>';
                                echo '<td>' . $dataA1['Nama'] . '</td>';
                                echo '<td>' . $dataA1['idSMK'] . '</td>';
                                echo '<td>' . $dataA1['DosenPembimbingSTA'] . '</td>';
                                echo '<td>' . $dataA1['JudulSTA'] . '</td>';
                                echo '<td>' . $dataA1['TanggalSTA'] . '</td>';
                                echo '<td>' . $dataA1['JamSTA'] . '</td>';
                                echo '<td>' ;
                                if($dataA1['NilaiTotal'] == null){
                                    echo 'belum tersedia';
                                }
                                else if ((($dataA1['NilaiTotal'])) >= 55) {
                                    echo 'Lulus';
                                }
                                else{
                                    echo 'tidak lulus';
                                }
                                '</td>';
                                ?>
                                <?php

                                echo '</tr>';
                            }
                            $link = null;
                            }}
                            ?>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </Table>
    </tbody>

</div>
<script>
    //buat data table
    $(document).ready(function () {
        $('#Table').DataTable();
    });
</script>
</body>
</html>