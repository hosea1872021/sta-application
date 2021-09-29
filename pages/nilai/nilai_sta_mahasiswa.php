<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<!--Table-->
<div class="container-fluid">
    <h1 class="modal-title" >Sidang STA</h1>
    <Table border="1px" id="myTable">
        <thead>
        <th>Kode Sidang</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Semester Mata Kuliah</th>
        <th>Dosen Pembimbing</th>
        <th>Judul STA</th>
        <th>Evaluator</th>
        <th>Tanggal Sidang</th>
        <th>Jam Sidang</th>
        <th>Ruang Sidang</th>
        <th>Nilai Akhir</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
        $result = fetchSidangSTAData();
        foreach ($result as $data) {
            if ($_SESSION['session_id'] == $data['NIK']) {
                ?>
                <tr>
                    <td><?php echo $data['idMaster'] ?></td>
                    <td><?php echo $data['NIK']?></td>
                    <td><?php echo $data['Nama']?></td>
                    <td><?php echo $data['idSMK']?></td>
                    <td><?php echo $data['DosenPembimbingSTA']?></td>
                    <td><?php echo $data['JudulSTA']?></td>
                    <td><?php echo $data['Evaluator1']?></td>
                    <td><?php echo $data['TanggalSTA']?></td>
                    <td><?php echo $data['JamSTA']?></td>
                    <td><?php echo $data['Ruang']?></td>
                    <td><?php echo $data['NilaiTotal']?></td>
                    <td>
                        <button type="button" class="btn btn-primary detailbtnmhs"
                                data-id="<?php echo $data['NIK'] ?>"
                                data-nama="<?php echo $data[" Nama"] ?>"
                                data-idsmk="<?php echo $data["idSMK"] ?>"
                                data-judulsta="<?php echo $data["JudulSTA"] ?>"
                                data-evaluator2="<?php echo $data["Evaluator1"] ?>"
                                data-tanggalsta="<?php echo $data["TanggalSTA"] ?>"
                                data-jamsta="<?php echo $data["JamSTA"] ?>"
                                data-komentarevaluator="<?php echo $data["Komentar_Evaluator1"] ?>"
                                data-nilaista1evaluator="<?php echo $data["NilaiSTA1_Evaluator1"] ?>"
                                data-nilaista2evaluator="<?php echo $data["NilaiSTA2_Evaluator1"] ?>"
                                data-nilaista3evaluator="<?php echo $data["NilaiSTA3_Evaluator1"] ?>"
                                data-nilaitotalevaluator="<?php echo $data["NilaiTotal_Evaluator1"] ?>"
                                data-komentardosenpembimbingsta="<?php echo $data["Komentar_DosenPembimbing"]?>"
                                data-nilaista1dosenpembimbingsta="<?php echo $data["NilaiSTA1_DosenPembimbing"] ?>"
                                data-nilaista2dosenpembimbingsta="<?php echo $data["NilaiSTA2_DosenPembimbing"] ?>"
                                data-nilaista3dosenpembimbingsta="<?php echo $data["NilaiSTA3_DosenPembimbing"] ?>"
                                data-nilaitotaldosenpembimbingsta="<?php echo $data["NilaiTotal_DosenPembimbing"] ?>"
                                data-dosenpembimbingsta="<?php echo $data["DosenPembimbingSTA"] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                        </button>
                    </td>
                </tr>
                <?php
            }
        }
        $link = null;
        ?>
        </tbody>
    </Table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hasil  Sidang STA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="evaluator1" class="col-form-label">Evaluator 1:</label>
                            <input type="text" class="form-control" name="evaluator1" id="evaluator1" readonly/>
                        </div>
                        <div class="mb-3">
                            <label for="nilaitotaldosenpembimbing" class="col-form-label">Nilai
                                Total Evaluator 1:</label>
                            <input type="text" class="form-control" name="nilaitotaldosenpembimbing"
                                   id="nilaitotaldosenpembimbing" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="messagedosenpembimbing" class="col-form-label">Komentar Evaluator 1:</label>
                            <textarea class="form-control" id="messagedosenpembimbing"
                                      name="messagedosenpembimbing" readonly> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="evaluator2" class="col-form-label">Evaluator 2:</label>
                            <input type="text" class="form-control" name="evaluator2" id="evaluator2" readonly/>
                        </div>
                        <div class="mb-3">
                            <label for="nilaitotalevaluator" class="col-form-label">Nilai Total Evaluator 2:</label>
                            <input type="text" class="form-control" name="nilaitotalevaluator"
                                   id="nilaitotalevaluator" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="messageevaluator" class="col-form-label">Komentar Evaluator 2:</label>
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
</div>

<!--End Table-->

<script>
    //buat data table
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
    $(document).ready(function () {
        $('.detailbtnmhs').on('click', function () {
            $('#exampleModal').modal('show');
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
            var KomentarEvaluator = $(this).data('komentarevaluator');
            var NilaiTotalEvaluator2 = $(this).data('nilaitotalevaluator');
            var NilaiSTA1Evaluator2 = $(this).data('nilaista1evaluator');
            var NilaiSTA2Evaluator2 = $(this).data('nilaista2evaluator');
            var NilaiSTA3Evaluator2 = $(this).data('nilaista3evaluator');
            var Evaluator2 = $(this).data('evaluator2');
            $('#id').val(NIK);
            $('#nama').val(Nama);
            $('#evaluator1').val(DosenPembimbingSTA);
            $('#nilaitotaldosenpembimbing').val(NilaiTotalEvaluator1);
            $('#nilai1dosenpembimbing').val(NilaiSTA1Evaluator1);
            $('#nilai2dosenpembimbing').val(NilaiSTA2Evaluator1);
            $('#nilai3dosenpembimbing').val(NilaiSTA3Evaluator1);
            $('#messagedosenpembimbing').val(KomentarEvaluator1);
            $('#evaluator2').val(Evaluator2);
            $('#nilaitotalevaluator').val(NilaiTotalEvaluator2);
            $('#nilai1evaluator').val(NilaiSTA1Evaluator2);
            $('#nilai2evaluator').val(NilaiSTA2Evaluator2);
            $('#nilai3evaluator').val(NilaiSTA3Evaluator2);
            $('#messageevaluator').val(KomentarEvaluator);
        });
    });
</script>
</body>
</html>