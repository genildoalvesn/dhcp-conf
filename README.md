# DHCP-CONF

## Descrição

https://help.ubuntu.com/community/isc-dhcp-server

## Seriços

- [Adiconar IP](#adiconar-ip)
- [Listar Emprestimos](#listar-emprestimo)
- Remover MAC

### Adicionar IP

A proposta inicial é disponibilizar IP estático a partir de um cadastro em formulário referenciado pelo número MAC do dispositivo atrelando-o a um número IP.

```
GET /api/dhcp.php?action=add-ip&name=:name&mac=:mac
```

Parametros:

| Name | Tipo | Descrição |
|-|-|-|
| :name | String | Nome do Usuário |
| :mac | String | Número MAC do dispotivo |

Exemplo:

```
GET /api/dhcp.php?action=add-ip&name=thiago&mac=07:03:15:c4:18:d8
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

Este serviço é baseado no seguinte commando

```
$ sed thiago 07:03:15:c4:18:d8 /var/lib/dhcp3/dhcpd.conf
```

Para validar a execução deste serviço no exemplo acima, acesse o arquivo `/var/lib/dhcp3/dhcpd.conf` e verifique se foi adicionada a linha `xpto thiago mac`.

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
$ cat /var/lib/dhcp/dhcpd.leases
```

Para validar a execução deste serviço do exemplo acima, acesse o arquivo `/var/lib/dhcp/dhcpd.leases` e verifique se coincide com o JSON gerado quando em caso de sucesso.
