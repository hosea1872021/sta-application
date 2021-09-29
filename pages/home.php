<?php
echo "<h1>Selamat Datang," . $_SESSION['session_user'] . "</h1>";
?>

<div class="container-fluid">
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
        <th>Status</th>
        </thead>
        <tbody>
        <?php
        $result = fetchSidangSTAData();
        foreach ($result as $data) {
            if ($_SESSION['session_role'] =='koor' ) {
            ?>
            <tr>
                <td><?php echo $data['idMaster'] ?></td>
                <td><?php echo $data['NIK'] ?></td>
                <td><?php echo $data['Nama'] ?></td>
                <td><?php echo $data['idSMK'] ?></td>
                <td><?php echo $data['DosenPembimbingSTA'] ?></td>
                <td><?php echo $data['JudulSTA'] ?></td>
                <td><?php echo $data['Evaluator1'] ?></td>
                <td><?php echo $data['TanggalSTA'] ?></td>
                <td><?php echo $data['JamSTA'] ?></td>
                <td>
                    <?php
                    if ($data['NilaiTotal'] != Null) {
                        echo "Selesai";
                    }else{
                        echo "Dalam Proses";
                    }
                    ?>
                </td>
            </tr>
            <?php
            }else if ($_SESSION['session_role'] =='dosen'){
                $cek = $_SESSION['session_id'] . '-' . $_SESSION['session_user'];
                if($cek==$data['DosenPembimbingSTA'] or$cek==$data['Evaluator1']){
                    ?>
                    <tr>
                        <td><?php echo $data['idMaster'] ?></td>
                        <td><?php echo $data['NIK'] ?></td>
                        <td><?php echo $data['Nama'] ?></td>
                        <td><?php echo $data['idSMK'] ?></td>
                        <td><?php echo $data['DosenPembimbingSTA'] ?></td>
                        <td><?php echo $data['JudulSTA'] ?></td>
                        <td><?php echo $data['Evaluator1'] ?></td>
                        <td><?php echo $data['TanggalSTA'] ?></td>
                        <td><?php echo $data['JamSTA'] ?></td>
                        <td>
                            <?php
                            if ($data['NilaiTotal'] != Null) {
                                echo "Selesai";
                            }else{
                                echo "Dalam Proses";
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
            }else if($_SESSION['session_role'] =='mahasiswa'){
                if($_SESSION['session_id']==$data['NIK']){
                    ?>
                    <tr>
                        <td><?php echo $data['idMaster'] ?></td>
                        <td><?php echo $data['NIK'] ?></td>
                        <td><?php echo $data['Nama'] ?></td>
                        <td><?php echo $data['idSMK'] ?></td>
                        <td><?php echo $data['DosenPembimbingSTA'] ?></td>
                        <td><?php echo $data['JudulSTA'] ?></td>
                        <td><?php echo $data['Evaluator1'] ?></td>
                        <td><?php echo $data['TanggalSTA'] ?></td>
                        <td><?php echo $data['JamSTA'] ?></td>
                        <td>
                            <?php
                            if ($data['NilaiTotal'] != Null) {
                                echo "Selesai";
                            }else{
                                echo "Dalam Proses";
                            }
                            ?>
                        </td>
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
    //buat data table
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
