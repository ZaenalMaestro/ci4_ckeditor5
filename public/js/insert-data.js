const xhr = new XMLHttpRequest()

xhr.addEventListener('load', () => {
   if (xhr.status == 200) {
      const response = JSON.parse(xhr.responseText)
      alert(response.pesan)
   }else alert('data gagal disimpan!')
})

function insert(data) {
   xhr.open('POST', '/insert')
   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
   xhr.send(`judul=${data.judul}&konten=${data.konten}`)
}
