<?php
require_once('util.php');

$action = $_GET['action'] ?? null;
$json = '';

if ($action == 'add-ip') {
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

} elseif ($action == 'rm-ip') {
  $ip = $_GET['ip'] ?? null;

  if ($ip) {
    rmIp($ip);
    $json = json_encode(['status' => 'host removido com sucesso']);
  } else {
    $json = json_encode(['status' => 'parametros invalidos']);
  }

} elseif ($action == 'list-ips') {
  if ($action) {
    $json = json_encode(getLeases());
  } else {
    $json = json_encode(['status' => 'parametros invalidos']);
  }
}

header('Content-type: application/json; charset=UTF-8');
echo $json;
