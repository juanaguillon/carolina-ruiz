<?php
/* Template Name: Checkout Confirm */
get_header();
printcode($_POST);

if (isset($_REQUEST['sign'])) {
  $signature = $_REQUEST['sign'];
} else {
  $signature = $_REQUEST['firma'];
}

if (isset($_REQUEST['merchant_id'])) {
  $merchantId = $_REQUEST['merchant_id'];
} else {
  $merchantId = $_REQUEST['usuario_id'];
}
if (isset($_REQUEST['reference_sale'])) {
  $referenceCode = $_REQUEST['reference_sale'];
} else {
  $referenceCode = $_REQUEST['ref_venta'];
}
if (isset($_REQUEST['value'])) {
  $value = $_REQUEST['value'];
} else {
  $value = $_REQUEST['valor'];
}
if (isset($_REQUEST['currency'])) {
  $currency = $_REQUEST['currency'];
} else {
  $currency = $_REQUEST['moneda'];
}
if (isset($_REQUEST['state_pol'])) {
  $transactionState = $_REQUEST['state_pol'];
} else {
  $transactionState = $_REQUEST['estado_pol'];
}

$split = explode('.', $value);
$decimals = $split[1];
if ($decimals % 10 == 0) {
  $value = number_format($value, 1, '.', '');
}

$payu = new WC_Payu_Latam;
$api_key = $payu->get_api_key();
$signature_local = $api_key . '~' . $merchantId . '~' . $referenceCode . '~' . $value . '~' . $currency . '~' . $transactionState;
$signature_md5 = md5($signature_local);

if (isset($_REQUEST['response_code_pol'])) {
  $polResponseCode = $_REQUEST['response_code_pol'];
} else {
  $polResponseCode = $_REQUEST['codigo_respuesta_pol'];
}

if (strtoupper($signature) == strtoupper($signature_md5)) {
  $order = new WC_Order($referenceCode);

  $fallida = "Transacción fallida";
  $rechazada = "Transacción rechazada";
  $pendiente = "Transacción Pendiente";
  
  if ( caror_is_language("en")){
    $fallida = "Transaction failed";
    $rechazada = "Transaction rejected";
    $pendiente = "Transaction pending";
  }
  
  if ($transactionState == 6 && $polResponseCode == 5) {
    $order->update_status('failed',  $fallida );
  } else if ($transactionState == 6 && $polResponseCode == 4) {
    $order->update_status('refunded', $rechazada);
  } else if ($transactionState == 12 && $polResponseCode == 9994) {
    $order->update_status('pending', $pendiente);
  } else if ($transactionState == 4 && $polResponseCode == 1) {
    $order->payment_complete();
  } else {
    $order->update_status('failed',$fallida);
  }
}
get_footer()
