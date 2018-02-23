# DHCP-CONF

## Descrição

https://help.ubuntu.com/community/isc-dhcp-server

## Seriços

- [Adicionar IP](#adiconar-ip)
- [Listar Emprestimos](#listar-emprestimo)
- [Remover MAC](#remover-mac)

### Adicionar Host

Tem como proposta inicial, disponibilizar IPs estáticos a partir de um cadastro em formulário referenciado pelo número MAC do dispositivo, atrelando-o a um número IP.

```
GET /api/dhcp.php?action=add-ip&comment=:comment&mac=:mac&ip=:ip&host=:host
```

Parametros:

| Name | Tipo | Descrição |
|-|-|-|
| :comment | String | Nome do Usuário |
| :mac | String | Número MAC do dispotivo |
| :ip | String | Número IP do dispotivo |
| :host | String | Identificação do dispotivo na LAN |

Exemplo:

```
GET /api/dhcp.php?action=add-ip&comment=thiago&mac=08:00:27:8B:80:A3&host=DISP001&ip=192.168.1.10&setor=primario
```

Em caso de sucesso:

```js
{
  "status": "Dispositivo Cadastrado com Sucesso"
}
```

Em caso de erro:

```js
{
  "status": "MAC ou IP não válido"
}
```

Este serviço é baseado no seguinte commando:

```
$ echo "host DISP001 {hardware ethernet 08:00:27:8B:80:A3; fixed-address 192.168.1.10;} # thiago (primario)" | sudo tee --append /etc/dhcp/dhcpd.conf
$ sudo service isc-dhcp-server restart
```

Para validar a execução deste serviço no exemplo acima, acesse o arquivo `/etc/dhcp/dhcpd.conf` e verifique se foi adicionada a linha `host DISP001 {hardware ethernet 08:00:27:8B:80:A3; fixed-address 192.168.1.10;} # thiago (primario)`, ou execute o seguinte comando:

```
$ cat /etc/dhcp/dhcpd.conf | grep "host DISP001 {hardware ethernet 08:00:27:8B:80:A3; fixed-address 192.168.1.10;} # thiago (primario)"
```

### Listar Emprestimos

...

```
GET /api/dhcp.php?action=leases
```

Exemplo:

```
GET /api/dhcp.php?action=leases
```

Em caso de sucesso:

```js
[
    {
      "ip": "192.168.1.10",
      "mac": "08:00:27:2c:50:59",
      "host": "dhcpclient"
    }
]
```

Em caso de erro:

```js
{
  "status": "Error ao obter o(s) endereço(s) IP"
}
```

Este serviço é baseado no seguinte commando:

```
$ sed -n '/^palavra/p' /var/lib/dhcp/dhcpd.leases
```

Para validar a execução deste serviço do exemplo acima, acesse o arquivo `/var/lib/dhcp/dhcpd.leases` e verifique se coincide com o JSON gerado quando em caso de sucesso.

## Remover Host

Remover o Host atraves do número MAC do dispositivo.

```
GET /api/dhcp.php?action=remov-ip&comment=:comment&mac=:mac&ip=:ip&host=:host
```

Parametros:

| Name | Tipo | Descrição |
|-|-|-|
| :name | String | Nome do Usuário |
| :mac | String | Número MAC do dispotivo |

Exemplo:

```
GET /api/dhcp.php?action=remov-ip&comment=thiago&mac=08:00:27:8B:80:A3&host=DISP001&ip=192.168.1.10&setor=primario
```

Em caso de sucesso:

```js
{
  "status": "Dispositivo Removido com Sucesso"
}
```

Em caso de erro:

```js
{
  "status": "MAC ou nome do usuario inválido"
}
```

Este serviço é baseado no seguinte commando:

```
$ sed -n '/^mac/d' arquivo.txt/etc/dhcp/dhcpd.conf & sed -n '/^nome/d' arquivo.txt/etc/dhcp/dhcpd.conf
$ sudo service isc-dhcp-server restart

```

Para validar a execução deste serviço do exemplo acima, acesse o arquivo `/etc/dhcp/dhcpd.conf`
e verifique se o MAC foi removido com seguinte comando:

```
$ cat /etc/dhcp/dhcpd.conf

```
