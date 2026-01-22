fetch('http://localhost:8000/exemploAPI.php')
  .then(response => response.json())
  
  .then(dados => {
    console.log(dados);
    document.body.innerHTML += `
      <p>Usuário: ${dados.nome}</p>
      <p>Perfil: ${dados.perfil}</p>
    `;
  })
  
  .catch(error => {
      document.body.innerHTML = `Erro: ${error.message}`;
    });