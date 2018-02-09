<?php

$action = $_GET['action'] ?? null;
$connection = ssh2_connect('localhost', 22);
ssh2_auth_password($connection, 'vagrant', 'vagrant');

if ($action == 'leases') {
  $command = 'cat /var/lib/dhcp/dhcpd.leases';
  $leases = shell_exec($command);

  // algoritmo

  $json = [];
} elseif ($action == 'add-ip') {
  $comment = $_GET['comment'] ?? null;
  $mac = $_GET['mac'] ?? null;
  $host = $_GET['host'] ?? null;
  $ip = $_GET['ip'] ?? null;
  $setor = $_GET['setor'] ?? null;

  $addIp = "host ${host} {hardware ethernet ${mac}; fixed-address ${ip};} # ${comment} (${setor})";
  $command = "echo \"${addIp}\" | sudo tee --append /etc/dhcp/dhcpd.conf";

  ssh2_exec($connection, $command);
  ssh2_exec($connection, 'sudo service isc-dhcp-server restart');

  $json = json_encode(['status' => 'host not found']);

  header('Content-type: application/json; charset=UTF-8');
  echo $json;
}
