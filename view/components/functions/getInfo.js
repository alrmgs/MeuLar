const getUfs = (uf) => {
  fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados")
    .then((res) => res.json())
    .then((res) => {
      return res.sort((a, b) => (a.sigla > b.sigla ? 1 : -1));
    })
    .then((states) => {
      states.map((state) => {
        const initials = document.createElement("option");

        initials.textContent = state.sigla;
        initials.value = state.sigla;

        uf.appendChild(initials);
      });
    });
};

async function getCep(value, street, neighborhood, city, uf) {
  let url = `https://viacep.com.br/ws/${value}/json/`;

  const response = await fetch(url);
  const json = await response.json();

  fillAddress(json, value, street, neighborhood, city, uf);
}

const fillAddress = (json, cep, street, neighborhood, city, uf) => {
  if (json.hasOwnProperty("erro")) {
    cep.classList.remove("is-valid");
    cep.classList.add("is-invalid");
  } else {
    street.value = json.logradouro;
    street.classList.add("is-valid");

    neighborhood.value = json.bairro;
    neighborhood.classList.add("is-valid");

    city.value = json.localidade;
    city.classList.add("is-valid");

    uf.value = json.uf;
    uf.classList.add("is-valid");
  }
};
