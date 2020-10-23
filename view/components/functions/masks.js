const cpfMask = () => {
  if (cpf.value.length === 3 || cpf.value.length === 7) {
    cpf.value += ".";
  } else if (cpf.value.length === 11) {
    cpf.value += "-";
  }

  return cpf.value;
};

const cepMask = () => {
  if (cep.value.length === 5) {
    cep.value += "-";
  }

  return cep.value;
};

const contactMask = () => {
  if (contact.value.length === 2) {
    const ddd = "(" + contact.value.substring(0, 2) + ")";
    contact.value = ddd;
  }

  if (contact.value.length === 4) {
    contact.value += " 9";
  } else if (contact.value.length === 10) {
    contact.value += "-";
  }

  return contact.value;
};

const cnpjMask = () => {
  if (cnpj.value.length === 2 || cnpj.value.length === 6) {
    cnpj.value += ".";
  } else if (cnpj.value.length === 10) {
    cnpj.value += "/";
  } else if (cnpj.value.length === 15) {
    cnpj.value += "-";
  }

  return cnpj.value;
};
