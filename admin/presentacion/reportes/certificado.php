<?php
if(isset($_GET['id'])){  
  
  require_once('../../persistencia/vendor/autoload.php');

  require_once '../../persistencia/Mysql.php';
  require_once '../../persistencia/clases/CertificadoDAO.php';
  $id = $_GET['id'];
  $r = mysqli_fetch_assoc((new CertificadoDAO()) -> findById($id));
  $mpdf = new \Mpdf\Mpdf(['en-GB-x','A4','','',0,0,0,0,0,0]);
  $html = '
  <html>
    <head>
      <title>CERTIFICADO</title>
    </head>
    <body>
    <div class="img"></div>
    <style>
      body{
        width: 100%; height: 100vh;
      }
      .img{
        width: 100%; height: 100%;
        background: url(../fotos/certificados/'.$r['certificado_foto'].');
        background-size: cover;
        background-repeat: no-repeat;
      }
    </style>
      
      
    </body>
  </html>
  ';
  //$html = utf8_encode($html);
  $mpdf->AddPage('L');
  $mpdf->WriteHTML($html);
  $mpdf->Output('Reporte_Modelo_Curso.pdf','I'); exit;
}
?>