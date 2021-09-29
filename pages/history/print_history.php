<?php
session_start();
error_reporting(0);
include_once '../../util/db_util.php';
include_once '../../Function/user_function.php';
include_once '../../Function/history_kp.php';
include_once '../../Function/admin.php';
require_once '../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$user = fetchUserByID($_SESSION["session_id"]);

foreach($user as $datauser){}

$result = fetchHistoryKPDataByNIK();
foreach ($result as $dataKP) {};
$tabledata = "";
for($i=1;$i<=7;$i++){
    $tabledata .= '<tr>
                    <td style="padding:4px 4px;border:1px solid;">' . $i . '</td>
                    <td style="padding:4px 4px;border:1px solid;"> ';
    if(isset($result[$i-1])){
        $smk = fetchSMKData();
        foreach($smk as $data_smk){
            if($data_smk["idSMK"]==$result[$i-1]["SMK_idSMK"]){
                $tabledata .=  $data_smk['Semester_idSemester'] . '-' . $data_smk['MataKuliah_idMataKuliah'] ;
            }
        }
    } 
    $tabledata .='</td>
                    <td style="padding:4px 4px;border:1px solid;">' . (isset($result[$i-1])?$result[$i-1]["JudulKP"]:"") . '</td>
                    <td style="padding:4px 4px;border:1px solid;">' . (isset($result[$i-1])?$result[$i-1]["DosenPembimbingKP"]:"") . '</td>
                    <td style="padding:4px 4px;border:1px solid;text-align:center">' . (isset($result[$i-1])?($result[$i-1]["StatusKP"]=="lulus"?"<span style='font-family: DejaVu Sans, sans-serif;'>✔</span>":""):"") . '</td>
                    <td style="padding:4px 4px;border:1px solid;text-align:center">' . (isset($result[$i-1])?($result[$i-1]["StatusKP"]=="tidak lulus"?"<span style='font-family: DejaVu Sans, sans-serif;'>✔</span>":""):"") . '</td>
                    <td style="padding:4px 4px;border:1px solid;text-align:center">' . (isset($result[$i-1])?($result[$i-1]["StatusKP"]=="perpanjang"?"<span style='font-family: DejaVu Sans, sans-serif;'>✔</span>":""):"") . '</td>
                    <td style="padding:4px 4px;border:1px solid;text-align:center"">';
    
    $dosen = fetchUserDosenData();
    if(isset($result[$i-1])){
        if(isset($_GET["signed"])){
            $dosen_id = explode("-",$result[$i-1]["DosenPembimbingKP"]);
            foreach($dosen as $data_dosen){
                if($data_dosen["NIK"] == $dosen_id[0]){
                    $path = '../../uploads/' . $data_dosen["TandaTangan"];
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    if($data){
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        $tabledata .='<img style="height:18.4px" src="' . $base64 . '">';
                    }
                }
            }
        }
    }
    $tabledata .='</td>
                </tr>';
    // if(isset($result[$i-1])){
    //    echo "eyo ada datanya"; 
    // }
}
// exit();
//     echo '<tr>';
//     $smk = fetchSMKData();
//     foreach($smk as $data_smk){
//         if($data_smk["idSMK"]==$dataKP["SMK_idSMK"]){
//             echo '<td>' . $data_smk['Semester_idSemester'] . ' - ' . $data_smk['MataKuliah_idMataKuliah'] . '</td>';
//         }
//     }
// }

$template = '
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<table style="width:100%">
    <tr>
        <td style="text-align:center"><b>FORM HISTORY<br/> 
        PENYELESAIAN KP/TA<br/>
        FAKULTAS TEKNOLOGI INFORMASI<br/>
        UNIVERSITAS KRISTEN MARANATHA<br/></b></td>
    </tr>
    <tr>
        <td><br/>Nama :  ' . ucwords($datauser["Nama"]) . '</td>
    </tr>
    <tr>
        <td>NIK : ' . $datauser["NIK"] . '
        <br/> *) Beri tanda centang pada salah satu pilihan
        </td>
    </tr>
</table>
<br/>
<table style="width:100%;
  border: 1px solid black;
  border-collapse: collapse;
  ">
    <tr>
        <th style="background-color:black;color:white;padding:4px 4px;">No</th>
        <th style="background-color:black;color:white;padding:4px 4px;">Semester dan Tahun Akademik</th>
        <th style="background-color:black;color:white;padding:4px 4px;">Judul</th>
        <th style="background-color:black;color:white;padding:4px 4px;">Pembimbing</th>
        <th style="background-color:black;color:white;padding:4px 4px;">Lulus</th>
        <th style="background-color:black;color:white;padding:4px 4px;">Tidak Lulus</th>
        <th style="background-color:black;color:white;padding:4px 4px;">Diperpanjang</th>
        <th style="background-color:black;color:white;padding:4px 4px;">Tanda Tangan Pembimbing</th>
    </tr>
    <tr>
        <td colspan="8" style="text-align:center"><b>KERJA PRAKTEK</b></td>
    </tr>
    ' . $tabledata . '
    
</table>
<br/>
Ket: <br/>
1. <b>Semester dan tahun akademik</b> diisi semester dan tahun akademik, misal : Ganjil 2018/2019<br/>
2. Isi sesuai bagian history apakah untuk KP/TA<br/>
<br/><br/>
Mahasiswa,
<br/>
<br/>
<br/>
( ' . ucwords($datauser["Nama"]) . ' )<br/>
NIK: ' . $datauser["NIK"] . '
</body>
</html>';
 echo $template;
 exit();
$dompdf->loadHtml($template);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>
