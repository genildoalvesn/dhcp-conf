# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  config.vm.define "dhcpserver" do |dhcpserver|
    dhcpserver.vm.hostname = "dhcpserver"
    dhcpserver.vm.box = "ubuntu/trusty64"
    dhcpserver.vm.network "forwarded_port", guest: 80, host: 8080
    dhcpserver.vm.network "private_network", ip: "192.168.1.2", virtualbox__intnet: "RedeVagrant"
    dhcpserver.vm.synced_folder ".", "/var/www/html"
    dhcpserver.vm.provider "virtualbox" do |vb|
      vb.name = "dhcpserver"
    end
    dhcpserver.vm.provision "shell", path: "scripts/server-install.sh"
  end

  config.vm.define "dhcpclient1" do |dhcpclient1|
    dhcpclient1.vm.hostname = "dhcpclient1"
    dhcpclient1.vm.box = "ubuntu/trusty64"
    dhcpclient1.vm.network "private_network", type: "dhcp", mac: "0800278B80A3", virtualbox__intnet: "RedeVagrant"
    dhcpclient1.vm.provider "virtualbox" do |vb|
      vb.name = "dhcpclient1"
    end
  end

  config.vm.define "dhcpclient2" do |dhcpclient2|
    dhcpclient2.vm.hostname = "dhcpclient2"
    dhcpclient2.vm.box = "ubuntu/trusty64"
    dhcpclient2.vm.network "private_network", type: "dhcp", mac: "0800278B80A4", virtualbox__intnet: "RedeVagrant"
    dhcpclient2.vm.provider "virtualbox" do |vb|
      vb.name = "dhcpclient2"
    end
  end
end
