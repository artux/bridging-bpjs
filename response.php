<?php
include("vendor/autoload.php");

$vclaim_conf = [
    'cons_id' => '',
    'secret_key' => '',
    'base_url' => '',
    'service_name' => ''
];



$peserta = new \Nsulistiyawan\Bpjs\VClaim\Peserta($vclaim_conf);
$data = $peserta->getByNoKartu($_REQUEST['q'],date('Y-m-d'));
// print_r($data);
if($data==null){
    $status = 0;
    $data = null;
}
else{
    $status = 1;

}

echo json_encode(['status'=>$status,'data'=>$data]);


?>
s