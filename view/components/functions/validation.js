const cpfFirstDigit = (cpf) => {
  let result = [];

  for (let i = 0; i < cpf.length - 2; i++) {
    result.push(parseInt(cpf[i]) * (i + 1));
  }

  result = result.reduce((a, b) => {
    return a + b;
  }, 0);

  result %= 11;

  return result;
};

const cpfSecondDigit = (cpf) => {
  let result = [];

  for (let i = 0; i < cpf.length - 1; i++) {
    result.push(parseInt(cpf[i]) * i);
  }

  result = result.reduce((a, b) => {
    return a + b;
  }, 0);

  result %= 11;
  return result;
};

const isCpfValid = (cpf) => {
  let output = true;

  if (
    cpf === "00000000000" ||
    cpf === "11111111111" ||
    cpf === "22222222222" ||
    cpf === "33333333333" ||
    cpf === "44444444444" ||
    cpf === "55555555555" ||
    cpf === "66666666666" ||
    cpf === "77777777777" ||
    cpf === "88888888888" ||
    cpf === "99999999999"
  ) {
    output = false;
  }

  return output;
};

const cpfValidator = (cpf) => {
  cpf = cpf.replaceAll(".", "");
  cpf = cpf.replaceAll("-", "");

  const first = cpfFirstDigit(cpf);
  const second = cpfSecondDigit(cpf);

  const valid = isCpfValid(cpf);

  cpf = cpf.split("");

  let output = false;

  if (
    parseInt(cpf[cpf.length - 2]) === first &&
    parseInt(cpf[cpf.length - 1]) === second &&
    valid
  ) {
    output = true;
  }

  return output;
};

const cepValidator = (cep) => {
  const regex = /^[0-9]{5}-[0-9]{3}$/;

  let output = false;

  if (cep.length > 0 && regex.test(cep)) {
    output = true;
  }

  return output;
};

const emailValidator = (email) => {
  const regex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;

  let output = false;

  if (email.length > 0 && regex.test(email)) {
    output = true;
  }

  return output;
};

const isCnpjValid = (cnpj) => {
  let output = true;

  if (
    cnpj === "00000000000000" ||
    cnpj === "11111111111111" ||
    cnpj === "22222222222222" ||
    cnpj === "33333333333333" ||
    cnpj === "44444444444444" ||
    cnpj === "55555555555555" ||
    cnpj === "66666666666666" ||
    cnpj === "77777777777777" ||
    cnpj === "88888888888888" ||
    cnpj === "99999999999999"
  ) {
    output = false;
  }

  return output;
};

const cnpjFirstDigit = (cnpj) => {
  let multiplyers = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  let array = [];

  for (let i = 0; i < cnpj.length - 2; i++) {
    array.push(cnpj[i] * multiplyers[i]);
  }

  let total = array.reduce((acc, b) => (acc += b), 0);
  total = total % 11;

  if (total < 2) {
    total = 0;
  } else {
    total = 11 - total;
  }

  return total;
}

const cnpjSecondDigit = (cnpj) => {
  let multiplyers = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  let array = [];

  for (let i = 0; i < cnpj.length - 1; i++) {
    array.push(cnpj[i] * multiplyers[i]);
  }

  let total = array.reduce((acc, b) => (acc += b), 0);

  total = total % 11;

  if (total < 2) {
    total = 0;
  } else {
    total = 11 - total;
  }

  return total;
}

const cnpjValidator = (cnpj) => {
  cnpj = cnpj.replaceAll(".", "");
  cnpj = cnpj.replaceAll("-", "");
  cnpj = cnpj.replaceAll("/", "");

  const firstDigit = cnpjFirstDigit(cnpj);
  const secondDigit = cnpjSecondDigit(cnpj);

  const valid = isCnpjValid(cnpj);

  cnpj = cnpj.split("");

  let output = false;

  if (
    parseInt(cnpj[cnpj.length - 2]) === firstDigit &&
    parseInt(cnpj[cnpj.length - 1]) === secondDigit &&
    valid
  ) {
    output = true;
  }

  return output;
};
