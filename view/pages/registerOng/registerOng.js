// Validations
const uf = document.getElementById("uf");
getUfs(uf);

uf.addEventListener("click", () => {
  if (uf.value === "none") {
    uf.classList.add("is-invalid");
  } else {
    uf.classList.remove("is-invalid");
  }
});

const cnpj = document.getElementById("cnpj");
cnpj.addEventListener("blur", () => {
  if (!cnpjValidator(cnpj.value)) {
    cnpj.classList.remove("is-valid");

    cnpj.classList.add("is-invalid");
  } else {
    cnpj.classList.remove("is-invalid");

    cnpj.classList.add("is-valid");
  }
});
cnpj.addEventListener("keyup", cnpjMask);

const street = document.getElementById("street");
const neighborhood = document.getElementById("neighborhood");
const city = document.getElementById("city");

const cep = document.getElementById("cep");
cep.addEventListener("blur", () => {
  if (!cepValidator(cep.value)) {
    cep.classList.remove("is-valid");

    cep.classList.add("is-invalid");
  } else {
    cep.classList.remove("is-invalid");

    cep.classList.add("is-valid");
  }

  getCep(cep.value, street, neighborhood, city, uf);
});
cep.addEventListener("keyup", cepMask);

const email = document.getElementById("email");
email.addEventListener("blur", () => {
  if (!emailValidator(email.value)) {
    email.classList.remove("is-valid");

    email.classList.add("is-invalid");
  } else {
    email.classList.remove("is-invalid");

    email.classList.add("is-valid");
  }
});

const contact = document.getElementById("contact");
contact.addEventListener("blur", () => {
  if (contact.value.length !== 15) {
    contact.classList.remove("is-valid");
    contact.classList.add("is-invalid");
  } else {
    contact.classList.remove("is-invalid");
    contact.classList.add("is-valid");
  }
});
contact.addEventListener("keyup", contactMask);

const passConfirm = document.getElementById("passConfirm");
const pass = document.getElementById("pass");
passConfirm.addEventListener("blur", () => {
  if (passConfirm.value !== pass.value) {
    passConfirm.classList.remove("is-valid");
    passConfirm.classList.add("is-invalid");
  } else {
    passConfirm.classList.remove("is-invalid");
    passConfirm.classList.add("is-valid");
  }
});

const image = document.getElementById("sendImg");

const labelImg = document.getElementById("img");

const loadImg = (evt) => {
  const img = document.createElement("img");

  img.src = URL.createObjectURL(evt.target.files[0]);
  img.classList.add("widthImg");

  labelImg.innerHTML = "";
  labelImg.appendChild(img);
};

image.addEventListener("change", (evt) => loadImg(evt));
const message = document.getElementById("message");
const nome = document.getElementById("name");

const formData = new FormData();

const submit = document.getElementById("send");
message.classList.add("hidden");

submit.addEventListener("click", async (evt) => {
  evt.preventDefault();

  const url = "../../../controller/RegisterOngs.php";

  formData.append("nome", nome.value);
  formData.append("cnpj", cnpj.value);
  formData.append("contato", contact.value);
  formData.append("cep", cep.value);
  formData.append("endereco", street.value);
  formData.append("bairro", neighborhood.value);
  formData.append("cidade", city.value);
  formData.append("uf", uf.value);
  formData.append("email", email.value);
  formData.append("senha", pass.value);
  formData.append("image", image.files[0]);
   const options = {
    method: "POST",
    body: formData,
  };
  if (
    cnpj.classList.contains("is-valid") &&
    contact.classList.contains("is-valid") &&
    cep.classList.contains("is-valid") &&
    uf.classList.contains("is-valid") &&
    email.classList.contains("is-valid") &&
    passConfirm.classList.contains("is-valid")
  ) {
    let req = await fetch(url, options);
    let res = await req.text();

    message.textContent = res;

    message.classList.remove("hidden");
    if (res !== "cadastrado com sucesso") {
      message.classList.remove("success");
      message.classList.add("error");
    } else {
      message.classList.remove("error");
      message.classList.add("success");

      setTimeout(() => {
        window.location.href = "../working/";
      }, 2000);
    }

    setTimeout(() => {
      message.style.animation = "fadeOut 0.5s";
    }, 5000);

    setTimeout(() => {
      message.classList.add("hidden");
      message.style.animation = "fadeIn 0.5s";
    }, 5500);
  } 
  else {
    message.textContent = "Há informações inconsistentes";

    message.classList.remove("hidden");
    message.classList.add("error");

    setTimeout(() => {
      message.style.animation = "fadeOut 0.5s";
    }, 5000);

    setTimeout(() => {
      message.classList.add("hidden");
      message.style.animation = "fadeIn 0.5s";
    }, 5500);
  }
}
);
