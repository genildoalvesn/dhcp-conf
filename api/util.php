<?php

function addIp($comment, $mac, $host, $ip, $setor) {
  $connection = ssh2_connect('localhost', 22);
  ssh2_auth_password($connection, 'vagrant', 'vagrant');

  $addIp = "host ${host} {hardware ethernet ${mac}; fixed-address ${ip};} # ${comment} (${setor})";
  $command = "echo \"${addIp}\" | sudo tee --append /etc/dhcp/dhcpd.conf";

  ssh2_exec($connection, $command);
  ssh2_exec($connection, 'sudo service isc-dhcp-server restart');
}

function getLeases() {
  $leasesArray = [];

  $dhcpdContent = file_get_contents('/etc/dhcp/dhcpd.conf');
  $regex = "/host (.*) {hardware ethernet (.*); fixed-address (.*);} # (.*) \((.*)\)/";
  preg_match_all($regex, $dhcpdContent, $matches);

  foreach ($matches[1] as $index => $host) {
    $fixedAddress = [
      'host' => $host,
      'ip' => $matches[2][$index],
      'mac' => $matches[3][$index],
      'comment' => $matches[4][$index],
      'setor' => $matches[5][$index],
      'type' => 'static'
    ];
    $leasesArray[] = $fixedAddress;
  }

  $leasesContent = file_get_contents('/var/lib/dhcp/dhcpd.leases');
  $regex = "/lease (.*) {(.|\n)*?hardware ethernet (.{2}:.{2}:.{2}:.{2}:.{2}:.{2})(.|\n)*?client-hostname \"(.*)\"/m";
  preg_match_all($regex, $leasesContent, $matches);

  $leases = [];
  foreach ($matches[1] as $index => $ip) {
    $lease = [
      'host' => $matches[5][$index],
      'ip' => $ip,
      'mac' => $matches[3][$index],
      'type' => 'lease'
    ];
    $leases[$ip] = $lease;
  }

  foreach ($leases as $lease) {
    $leasesArray[] = $lease;
  }

  return $leasesArray;
}
