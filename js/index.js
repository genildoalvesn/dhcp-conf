const tbody = document.querySelector('table tbody')
const url = 'api/dhcp.php?action=list-ips'

fetch(url)
  .then(function(res){return res.json()})
  .then(function(ips){
    let trs = ''
    for (const ip of ips) {
      trs += `<tr data-id="${ip.ip}">
        <td>${ip.ip}</td>
        <td>${ip.mac}</td>
        <td>${ip.host}</td>
        <td>${ip.type}</td>
        <td><i class="fa fa-times" onclick="removeRow(this)"></i></td>
      </tr>`
    }
    tbody.innerHTML = trs
  })

  function removeRow(edit) {
    row = edit.parentElement.parentElement
    const url = `api/dhcp.php?action=rm-ip&ip=${row.dataset.id}`
    fetch(url)
      .then(function(res){row.remove()})
  }
