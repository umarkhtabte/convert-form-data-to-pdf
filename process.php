<?php
    // Enable error reporting for debugging
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
  $path = (getenv("MPDF_ROOT")) ? getenv("MPDF_ROOT") : __DIR__;
//   var_dump($path);die;
  require_once $path . "/vendor/autoload.php";
  // $pdfcontent = '<table class="form-data"><thead><tr> </tr></thead><tbody>';
  // foreach($_POST as $key =>$value){
  //     $pdfcontent .= "<tr><td>" . ucwords(str_replace("_", " ",$key)) . "</td>:<td>" . $value . "</td></tr>";
  // }
  // $pdfcontent .= "</tbody></table>";

$pdfcontent = '
<!DOCTYPE html>
<html>
<head>
    <style>
        .form-data {
            width: 100%;
            border-collapse: collapse;
        }
        .form-data th, .form-data td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        .form-data th {
            background-color: #f2f2f2;
        }
        .form-data tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .form-data tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <table class="form-data">
        <thead>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>';
        
foreach($_POST as $key => $value) {
    $pdfcontent .= "<tr><td>" . ucwords(str_replace("_", " ", $key)) . "</td><td>" . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . "</td></tr>";
}

$pdfcontent .= '
        </tbody>
    </table>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML(mb_convert_encoding($pdfcontent, 'UTF-8', 'auto'));
$mpdf->Output('formdata.pdf', 'D');


  $mpdf = new \Mpdf\Mpdf();
  // $mpdf->WriteHTML(utf8_encode($pdfcontent));
  $mpdf->WriteHTML(mb_convert_encoding($pdfcontent, 'UTF-8', 'auto'));
  $mpdf->Output('formdata.pdf', 'D');
?>