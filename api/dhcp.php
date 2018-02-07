<?php

$action = $_GET['action'] ?? null;

if($action == 'leases') {
  $command = 'cat /var/lib/dhcp/dhcpd.leases';
  $leases = shell_exec($command);

  // algoritmo

  $json = [];
}
