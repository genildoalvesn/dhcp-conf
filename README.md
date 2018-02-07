# DHCP-CONF

## Descrição

https://help.ubuntu.com/community/isc-dhcp-server

## Seriços

- [Adiconar IP](#adiconar-ip)
- [Listar  Emprestimos](#listar-emprestimo)
- Remover maquinas

### Adicionar IP

Proposta inicial e disponibilizar ip a partir de um cadastro no formulario referenciado pelo mac.

```
GET /api/dhcp.php?action=add-ip&name=:name&mac=:mac
```

Parametros:

| Name | Tipo | Descrição |
|-|-|-|
| :name | String | Nome da ... |
| :mac | String | Um mac... |

Exemplo:

```
GET /api/dhcp.php?action=add-ip&name=thiago&mac=07:03:15:c4:18:d8
```

Em caso de sucesso:

```js
{
  "status": "Computad..."
}
```

Em caso de erro:

```js
{
  "status": "Param errados..."
}
```

Este serviço é baseado no seguinte commando

```
$ sed thiago 07:03:15:c4:18:d8 /var/lib/dhcp3/dhcpd.conf
```

Para validar a execução deste serviço no exemplo acima, vá ate o `/var/lib/dhcp3/dhcpd.conf` e verifique se foi adicionado a linha `xpto thiago mac`.

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
  "status": "Error ao obter os endereços"
}
```

Este serviço é baseado no seguinte commando:

```
$ cat /var/lib/dhcp/dhcpd.leases
```

Para validar a execução deste serviço no exemplo acima, vá ate o arquivo `/var/lib/dhcp/dhcpd.leases` e verifique se foi coincide com o JSON gerado em caso de sucesso.
