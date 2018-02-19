<?php
require_once('util.php');

$action = $_GET['action'] ?? null;
$json = '';

if ($action == 'leases') {
  $json = json_encode(getLeases());
} elseif ($action == 'add-ip') {
  $comment = $_GET['comment'] ?? null;
  $mac = $_GET['mac'] ?? null;
  $host = $_GET['host'] ?? null;
  $ip = $_GET['ip'] ?? null;
  $setor = $_GET['setor'] ?? null;

  if ($action && $comment && $mac && $host && $ip && $setor) {
    addIp($comment, $mac, $host, $ip, $setor);
    $json = json_encode(['status' => 'host adicionado com sucesso']);
  } else {
    $json = json_encode(['status' => 'parametros invalidos']);
  }
} elseif ($ation == 'list-ips') {
  if ($action) {
    $json = json_encode(getLeases());
  } else {
    $json = json_encode(['status' => 'parametros invalidos']);
  }
}

// header('Content-type: application/json; charset=UTF-8');
// echo $json;
