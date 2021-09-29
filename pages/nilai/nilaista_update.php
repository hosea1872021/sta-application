<?php
$nid = filter_input(INPUT_GET, 'nid');
if (isset($nid)) {
    $result = SelectedMasterData($nid);
}

$btnNilai1 = filter_input(INPUT_POST, 'btnNilai1');
if (isset($btnNilai1)) {
    $Nilai1 = filter_input(INPUT_POST, 'Nilai1');
    $Nilaitotal1 = ($Nilai1 * 20 / 100) + ($result['NilaiSTA2_DosenPembimbing'] * 40 / 100) + ($result['NilaiSTA3_DosenPembimbing'] * 40 / 100);
    $result1 = UpdateNilai1($nid, $Nilai1, $Nilaitotal1);
    $result111=UpdateTotal($nid,($Nilaitotal1+$result['NilaiTotal_Evaluator1'])/2);
    if ($result1 and $result111) {
        echo '<script>alert("Data Successfully Added") </script>';
        ?>
        <script>window.location.href = "/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid?>"</script>
        <?php
    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nu"</script>';
    }
}
?>
<?php
$btnNilai2 = filter_input(INPUT_POST, 'btnNilai2');
if (isset($btnNilai2)) {
    $Nilai2 = filter_input(INPUT_POST, 'Nilai2');
    $Nilaitotal2 =  ($result['NilaiSTA1_DosenPembimbing']* 20 / 100) + ($Nilai2 * 40 / 100) + ($result['NilaiSTA3_DosenPembimbing'] * 40 / 100);
    $result2 = UpdateNilai2($nid, $Nilai2, $Nilaitotal2);
    $result222=UpdateTotal($nid,($Nilaitotal2+$result['NilaiTotal_Evaluator1'])/2);
    if ($result2 and $result222) {
        echo '<script>alert("Data Successfully Added") </script>';
        ?>
        <script>window.location.href = "/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid?>"</script>
        <?php
    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nu"</script>';
    }
}
?>
<?php
$btnNilai3 = filter_input(INPUT_POST, 'btnNilai3');
if (isset($btnNilai3)) {
    $Nilai3 = filter_input(INPUT_POST, 'Nilai3');
    $Nilaitotal3 =  ($result['NilaiSTA1_DosenPembimbing']* 20 / 100) + ($result['NilaiSTA2_DosenPembimbing'] * 40 / 100) + ($Nilai3 * 40 / 100);
    $result3 = UpdateNilai3($nid, $Nilai3, $Nilaitotal3);
    $result333=UpdateTotal($nid,($Nilaitotal3+$result['NilaiTotal_Evaluator1'])/2);
    if ($result3 and $result333) {
        echo '<script>alert("Data Successfully Added") </script>';
        ?>
        <script>window.location.href = "/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid?>"</script>
        <?php
    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nu"</script>';
    }
}
?>

<?php
$btnNilai4 = filter_input(INPUT_POST, 'btnNilai4');
if (isset($btnNilai4)) {
    $Nilai4 = filter_input(INPUT_POST, 'Nilai4');
    $Nilaitotal4 =  ($Nilai4* 20 / 100) + ($result['NilaiSTA2_Evaluator1'] * 40 / 100) + ($result['NilaiSTA3_Evaluator1'] * 40 / 100);
    $result4 = UpdateNilai4($nid, $Nilai4 ,$Nilaitotal4);
    $result444=UpdateTotal($nid,($result['NilaiTotal_DosenPembimbing']+$Nilaitotal4)/2);
    if ($result4 and $result444) {
        echo '<script>alert("Data Successfully Added") </script>';
        ?>
        <script>window.location.href = "/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid?>"</script>
        <?php
    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nu"</script>';
    }
}
?>
<?php
$btnNilai5 = filter_input(INPUT_POST, 'btnNilai5');
if (isset($btnNilai5)) {
    $Nilai5 = filter_input(INPUT_POST, 'Nilai5');
    $Nilaitotal5 =  ($result['NilaiSTA1_Evaluator1']* 20 / 100) + ( $Nilai5* 40 / 100) + ($result['NilaiSTA3_Evaluator1'] * 40 / 100);
    $result5 = UpdateNilai5($nid, $Nilai5 ,$Nilaitotal5);
    $result555=UpdateTotal($nid,($result['NilaiTotal_DosenPembimbing']+$Nilaitotal5)/2);
    if ($result5 and $result555) {
        echo '<script>alert("Data Successfully Added") </script>';
        ?>
        <script>window.location.href = "/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid?>"</script>
        <?php
    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nu"</script>';
    }
}
?>
<?php
$btnNilai6 = filter_input(INPUT_POST, 'btnNilai6');
if (isset($btnNilai6)) {
    $Nilai6 = filter_input(INPUT_POST, 'Nilai6');
    $Nilaitotal6 =  ($result['NilaiSTA1_Evaluator1']* 20 / 100) + ($result['NilaiSTA2_Evaluator1'] * 40 / 100) + ($Nilai6 * 40 / 100);
    $result6 = UpdateNilai6($nid, $Nilai6 ,$Nilaitotal6);
    $result666=UpdateTotal($nid,($result['NilaiTotal_DosenPembimbing']+$Nilaitotal6)/2);
    if ($result6 and $result666) {
        echo '<script>alert("Data Successfully Added") </script>';
        ?>
        <script>window.location.href = "/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid?>"</script>
        <?php
    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nu"</script>';
    }
}
?>
<?php
$btnKomen1 = filter_input(INPUT_POST, 'btnKomen1');
if (isset($btnKomen1)) {
    $Komen1 = filter_input(INPUT_POST, 'Komen1');
    $result7 = UpdateKomentar1($nid,$Komen1);
    if ($result7) {
        echo '<script>alert("Data Successfully Added") </script>';
        ?>
        <script>window.location.href = "/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid?>"</script>
        <?php
    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nu"</script>';
    }
}
?>
<?php
$btnKomen2 = filter_input(INPUT_POST, 'btnKomen2');
if (isset($btnKomen2)) {
    $Komen2 = filter_input(INPUT_POST, 'Komen2');
    $result8 = UpdateKomentar2($nid,$Komen2);
    if ($result8) {
        echo '<script>alert("Data Successfully Added") </script>';
        ?>
        <script>window.location.href = "/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid?>"</script>
        <?php
    } else {
        echo '<script>alert("Data Fail Added ") </script>';
        echo '<script>window.location.href="/Proyek_KP/index.php?menu=nu"</script>';
    }
}
?>

<br>
<div class="container-fluid">
    <div class="mb-3">
        <label for="nik" class="col-form-label">NIK:</label>
        <h4>
            <?php
            echo $result['user_NIK']
            ?>
        </h4>
    </div>
    <div class="mb-3">
        <label for="nama" class="col-form-label">Nama:</label>
        <h4>
            <?php
            $user=SelectedUserData($result['user_NIK']);
            echo $user['Nama']
            ?>
        </h4>
    </div>
    <div class="mb-3">
        <label for="evaluator1" class="col-form-label">Evaluator 1:</label>
        <h4>
            <?php
            echo $result['DosenPembimbingSTA']
            ?>
        </h4>
    </div>
    <table border="1px" class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kriteria Penilaian</th>
            <th scope="col">Bobot</th>
            <th scope="col">Nilai</th>
            <th scope="col">Edit Nilai</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td><h5>Presentasi</h5>
                <p>Sistematika materi presentasi; slide presentasi; teknik penyampaian
                    presentasi;sikap pada saat presentasi </p></td>
            <td>20%</td>
            <td>
                <?php echo $result['NilaiSTA1_DosenPembimbing'] ?>
            </td>
            <td>
                <button class="btn btn-warning btnnilai1 " style="margin: 3px"
                        data-nilaista1dosenpembimbingsta="<?php echo $result["NilaiSTA1_DosenPembimbing"] ?>"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        svg>
                </button>
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
            <td>
                <?php echo $result['NilaiSTA2_DosenPembimbing'] ?>
            </td>
            <td>
                <button class="btn btn-warning btnnilai2" style="margin: 3px"
                        data-nilaista2dosenpembimbingsta="<?php echo $result["NilaiSTA2_DosenPembimbing"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        svg>
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td><h5>Kualitas Tanya Jawab</h5>
                <p>Analisis; perancangan; proses pengerjaan dan metodologi </p></td>
            <td>40%</td>
            <td>
                <?php echo $result['NilaiSTA3_DosenPembimbing'] ?>
            </td>
            <td>
                <button class="btn btn-warning btnnilai3" style="margin: 3px"
                        data-nilaista3dosenpembimbingsta="<?php echo $result["NilaiSTA3_DosenPembimbing"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        svg>
                </button>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <label for="nilaitotalev1" class="col-form-label">Nilai Total:</label>
                <h4>
                    <?php
                    echo $result['NilaiTotal_DosenPembimbing']
                    ?>
                </h4>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div class="mb-3">
                    <label for="Komentar1" class="col-form-label">Komentar:</label>
                    <p>
                        <?php
                        echo $result['Komentar_DosenPembimbing']
                        ?>
                    </p>
                </div>
            </td>
            <td>
                <button class="btn btn-warning btnkomen1" style="margin: 3px"
                        data-komentardosenpembimbingsta="<?php echo $result["Komentar_DosenPembimbing"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        svg>
                </button>
            </td>
        </tr>
        </tbody>

    </table>
</div>

<div class="container-fluid">
    <div class="mb-3">
        <label for="evaluator2" class="col-form-label">Evaluator2:</label>
        <h4>
            <?php
            echo $result['Evaluator1']
            ?>
        </h4>

    </div>
    <table class="table" border="1px">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kriteria Penialian</th>
            <th scope="col">Bobot</th>
            <th scope="col">Nilai</th>
            <th scope="col">Edit Nilai</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td><h5>Presentasi</h5>
                <p>Sistematika materi presentasi; slide presentasi; teknik penyampaian
                    presentasi;sikap pada saat presentasi </p></td>
            <td>20%</td>
            <td>
                <?php echo $result['NilaiSTA1_Evaluator1'] ?>
            </td>
            <td>
                <button class="btn btn-warning btnnilai4 " style="margin: 3px"
                        data-nilaista1evaluator="<?php echo $result["NilaiSTA1_Evaluator1"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        svg>
                </button>
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
            <td>
                <?php echo $result['NilaiSTA2_Evaluator1'] ?>
            </td>
            <td>
                <button class="btn btn-warning btnnilai5" style="margin: 3px"
                        data-nilaista2evaluator="<?php echo $result["NilaiSTA2_Evaluator1"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        svg>
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td><h5>Kualitas Tanya Jawab</h5>
                <p>Analisis; perancangan; proses pengerjaan dan metodologi </p></td>
            <td>40%</td>
            <td>
                <?php echo $result['NilaiSTA3_Evaluator1'] ?>
            </td>
            <td>
                <button class="btn btn-warning btnnilai6" style="margin: 3px"
                        data-nilaista3evaluator="<?php echo $result["NilaiSTA3_Evaluator1"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        svg>
                </button>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <label for="nilaitotalev2" class="col-form-label">Nilai Total:</label>
                <h4>
                    <?php
                    echo $result['NilaiTotal_Evaluator1']
                    ?>
                </h4>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div class="mb-3">
                    <label for="Komentar2" class="col-form-label">Komentar:</label>
                    <p>
                        <?php
                        echo $result["Komentar_Evaluator1"]
                        ?>
                    </p>
                </div>
            </td>
            <td>
                <button class="btn btn-warning btnkomen2" style="margin: 3px"
                        data-komentarevaluator="<?php echo $result["Komentar_Evaluator1"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        svg>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('.btnnilai1').on('click', function () {
            $('#modalnilai1').modal('show');
            var NilaiSTA1Evaluator1 = $(this).data('nilaista1dosenpembimbingsta');
            $('#Nilai1').val(NilaiSTA1Evaluator1);
        });
    });
    $(document).ready(function () {
        $('.btnnilai2').on('click', function () {
            $('#modalnilai2').modal('show');
            var NilaiSTA2Evaluator1 = $(this).data('nilaista2dosenpembimbingsta');
            $('#Nilai2').val(NilaiSTA2Evaluator1);
        });
    });
    $(document).ready(function () {
        $('.btnnilai3').on('click', function () {
            $('#modalnilai3').modal('show');
            var NilaiSTA3Evaluator1 = $(this).data('nilaista3dosenpembimbingsta');
            $('#Nilai3').val(NilaiSTA3Evaluator1);
        });
    });
    $(document).ready(function () {
        $('.btnnilai4').on('click', function () {
            $('#modalnilai4').modal('show');
            var NilaiSTA1Evaluator2 = $(this).data('nilaista1evaluator');
            $('#Nilai4').val(NilaiSTA1Evaluator2);
        });
    });
    $(document).ready(function () {
        $('.btnnilai5').on('click', function () {
            $('#modalnilai5').modal('show');
            var NilaiSTA2Evaluator2 = $(this).data('nilaista2evaluator');
            $('#Nilai5').val(NilaiSTA2Evaluator2);
        });
    });
    $(document).ready(function () {
        $('.btnnilai6').on('click', function () {
            $('#modalnilai6').modal('show');
            var NilaiSTA3Evaluator2 = $(this).data('nilaista3evaluator');
            $('#Nilai6').val(NilaiSTA3Evaluator2);
        });
    });
    $(document).ready(function () {
        $('.btnkomen1').on('click', function () {
            $('#modalkomen1').modal('show');
            var KomentarSTADosenPembimbing = $(this).data('komentardosenpembimbingsta');
            $('#Komen1').val(KomentarSTADosenPembimbing);
        });
    });
    $(document).ready(function () {
        $('.btnkomen2').on('click', function () {
            $('#modalkomen2').modal('show');
            var KomentarSTAEvaluator1 = $(this).data('komentarevaluator');
            $('#Komen2').val(KomentarSTAEvaluator1);
        });
    });
</script>

<div class="modal fade" id="modalnilai1" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="updated_idmaster" id="updated_idmaster" readonly>
                    <div class="mb-3">
                        <label for="Nilai1" class="col-form-label">Nilai :</label>
                        <input type="number" maxlength="3"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control" name="Nilai1" id="Nilai1"
                               min="0" max="100"/>
                        <span id="errorMsg"
                              style="display:none;">you can give score only 0 to 100 </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid ?>'">
                            Close
                        </button>
                        <input type="submit" name='btnNilai1' id='btnNilai1'
                               value='Update Nilai' class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalnilai2" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="updated_idmaster" id="updated_idmaster" readonly>
                    <div class="mb-3">
                        <label for="Nilai2" class="col-form-label">Nilai :</label>
                        <input type="number" maxlength="3"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control" name="Nilai2" id="Nilai2"
                               min="0" max="100"/>
                        <span id="errorMsg"
                              style="display:none;">you can give score only 0 to 100 </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid ?>'">
                            Close
                        </button>
                        <input type="submit" name='btnNilai2' id='btnNilai2'
                               value='Update Nilai' class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalnilai3" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="updated_idmaster" id="updated_idmaster" readonly>
                    <div class="mb-3">
                        <label for="Nilai3" class="col-form-label">Nilai :</label>
                        <input type="number" maxlength="3"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control" name="Nilai3" id="Nilai3"
                               min="0" max="100"/>
                        <span id="errorMsg"
                              style="display:none;">you can give score only 0 to 100 </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid ?>'">
                            Close
                        </button>
                        <input type="submit" name='btnNilai3' id='btnNilai3'
                               value='Update Nilai' class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalnilai4" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="updated_idmaster" id="updated_idmaster" readonly>
                    <div class="mb-3">
                        <label for="Nilai4" class="col-form-label">Nilai :</label>
                        <input type="number" maxlength="3"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control" name="Nilai4" id="Nilai4"
                               min="0" max="100"/>
                        <span id="errorMsg"
                              style="display:none;">you can give score only 0 to 100 </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid ?>'">
                            Close
                        </button>
                        <input type="submit" name='btnNilai4' id='btnNilai4'
                               value='Update Nilai' class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalnilai5" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="updated_idmaster" id="updated_idmaster" readonly>
                    <div class="mb-3">
                        <label for="Nilai5" class="col-form-label">Nilai :</label>
                        <input type="number" maxlength="3"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control" name="Nilai5" id="Nilai5"
                               min="0" max="100"/>
                        <span id="errorMsg"
                              style="display:none;">you can give score only 0 to 100 </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid ?>'">
                            Close
                        </button>
                        <input type="submit" name='btnNilai5' id='btnNilai5'
                               value='Update Nilai' class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalnilai6" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="updated_idmaster" id="updated_idmaster" readonly>
                    <div class="mb-3">
                        <label for="Nilai6" class="col-form-label">Nilai :</label>
                        <input type="number" maxlength="3"
                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                               class="form-control" name="Nilai6" id="Nilai6"
                               min="0" max="100"/>
                        <span id="errorMsg"
                              style="display:none;">you can give score only 0 to 100 </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid ?>'">
                            Close
                        </button>
                        <input type="submit" name='btnNilai6' id='btnNilai6'
                               value='Update Nilai' class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalkomen1" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="updated_idmaster" id="updated_idmaster" readonly>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="Komen1" class="col-form-label">Komentar Evaluator 1:</label>
                            <textarea type="text" class="form-control" id="Komen1"
                                      name="Komen1"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid ?>'">
                            Close
                        </button>
                        <input type="submit" name='btnKomen1' id='btnKomen1'
                               value='Update Komentar' class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalkomen2" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" name="updated_idmaster" id="updated_idmaster" readonly>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="Komen1" class="col-form-label">Komentar Evaluator 2:</label>
                            <textarea type="text" class="form-control" id="Komen2"
                                      name="Komen2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="window.location.href='/Proyek_KP/index.php?menu=nu&nid=<?php echo $nid ?>'">
                            Close
                        </button>
                        <input type="submit" name='btnKomen2' id='btnKomen2'
                               value='Update Komentar' class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>