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

  $leasesContent = file_get_contents('/var/lib/dhcp/dhcpd.leases');
  $dhcpdContent = file_get_contents('/etc/dhcp/dhcpd.conf');

  echo $leasesContent;
  echo $dhcpdContent;

  return $leasesArray;
}
