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
                        $result = fetchMasterData();
                        foreach ($result as $dataA1){
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
                        ?>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </Table>
</tbody>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">STA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="idMaster" class="col-form-label">idMaster:</label>
                            <input type="text" class="form-control" name="idMaster" id="idMaster" readonly/>
                        </div>
                        <div class="mb-3">
                            <label for="Nama" class="col-form-label">Nama
                                Total</label>
                            <input type="text" class="form-control" name="Nama"
                                   id="Nama" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="idSMK" class="col-form-label">idSMK</label>
                            <textarea class="form-control" id="idSMK"
                                      name="idSMK" readonly> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="DosenPembimbingSTA" class="col-form-label">Dosen Pembimbing STA:</label>
                            <input type="text" class="form-control" name="DosenPembimbingSTA" id="dosenpembimbingsta" readonly/>
                        </div>
                        <div class="mb-3">
                            <label for="judulsta" class="col-form-label">Judul STA</label>
                            <textarea class="form-control" name="judulsta"
                                      id="judulsta" readonly></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanggalsta" class="col-form-label">Tanggal STA</label>
                            <textarea type="text" class="form-control" id="tanggalsta"
                                      name="tanggalsta" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jamsta" class="col-form-label">Jam STA</label>
                            <textarea type="text" class="form-control" id="jamsta"
                                      name="jamsta" readonly></textarea>
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

</div>
<script>
    //buat data table
    $(document).ready(function () {
        $('#Table').DataTable();
    });
</script>
</body>
</html>