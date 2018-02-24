const submit = document.querySelector('#submit')
const host = document.querySelector('#host')
const setor = document.querySelector('#setor')
const mac = document.querySelector('#mac')
const ip = document.querySelector('#ip')
const comment = document.querySelector('#comment')

submit.addEventListener('click', function(event) {
  event.preventDefault()

  const url = `/api/dhcp.php?action=add-ip&comment=${comment.value}&mac=${mac.value}&host=${host.value}&ip=${ip.value}&setor=${setor.value}`

  fetch(url)
    .then(function(res){ location.href = 'index.php'})
})
