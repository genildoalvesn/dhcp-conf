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

  config.vm.define "dhcpclient" do |dhcpclient|
    dhcpclient.vm.hostname = "dhcpclient"
    dhcpclient.vm.box = "ubuntu/trusty64"
    dhcpclient.vm.network "private_network", type: "dhcp", virtualbox__intnet: "RedeVagrant"
    dhcpclient.vm.provider "virtualbox" do |vb|
      vb.name = "dhcpclient"
    end
  end

end
