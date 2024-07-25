<?php
    // Enable error reporting for debugging
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
  $path = (getenv("MPDF_ROOT")) ? getenv("MPDF_ROOT") : __DIR__;
//   var_dump($path);die;
  require_once $path . "/vendor/autoload.php";
  $pdfcontent = '<table class="form-data"><thead><tr> </tr></thead><tbody>';
  foreach($_POST as $key =>$value){
      $pdfcontent .= "<tr><td>" . ucwords(str_replace("_", " ",$key)) . "</td>:<td>" . $value . "</td></tr>";
  }
  $pdfcontent .= "</tbody></table>";
  $mpdf = new \Mpdf\Mpdf();
  // $mpdf->WriteHTML(utf8_encode($pdfcontent));
  $mpdf->WriteHTML(mb_convert_encoding($pdfcontent, 'UTF-8', 'auto'));
  $mpdf->Output('formdata.pdf', 'D');
?>