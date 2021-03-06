let pagina = location.pathname.replace("/proyectoHotspot/", "");

if (pagina == "telefono.php") {
  const consultaInicial = async () => {
    let consulta = await fetch("backTelefono.php?inicialQuery=yes");
    console.log(consulta);
    if (consulta.status == 500) {
      location.href = "http://18.216.92.56/proyectoHotSpot/calificacion.php";
    }
  };
  consultaInicial();
}

(function () {
  document.addEventListener("DOMContentLoaded", () => {
    // funcion quitar el modal
    if (document.querySelector("#closeModal")) {
      document.querySelector("#closeModal").addEventListener("click", (e) => {
        e.preventDefault();

        $("#staticBackdrop").modal("hide");
      });
    }

    // funcion para mostrar el modal
    const showModal = (content, result) => {
      if (result == "error") {
        document.querySelector("#modalContent").classList.add("border");
        document.querySelector("#modalContent").classList.add("border-danger");
      } else {
        document.querySelector("#modalContent").classList.add("border");
        document.querySelector("#modalContent").classList.add("border-success");
      }
      document.querySelector("#modalInfo").innerHTML = `<p>${content}</p>`;
      $("#staticBackdrop").modal("show");
    };

    // seccion telefono
    const sendInfoPhone = async (data, phone) => {
      let sendPhone = await fetch("backTelefono.php", {
        method: "POST",
        body: data,
      });

      if (sendPhone.ok) {
        let responsePhone = await sendPhone.json();

        location.href = `http://192.168.25.190/proyectoHotspot/calificacion.php?phone=${phone}`;
      } else {
        let responseError = await sendPhone.json();
        if (responseError.code == 404) {
          location.href = `http://192.168.25.190/proyectoHotspot/datos.php?phone=${phone}`;
        } else {
          showModal(responseError.msg, "error");
        }
      }
    };

    if (document.querySelector("#phoneForm")) {
      document.querySelector("#phoneForm").addEventListener("submit", (e) => {
        e.preventDefault();

        let telefonoFormPhone = document.querySelector("#inputTelefono").value;

        const expresion = /^3[\d]{9}$/;

        if (!expresion.test(telefonoFormPhone)) {
          showModal("El numero es incorrecto, por favor validar", "error");
        } else {
          const formDataPhone = new FormData();
          formDataPhone.set("inputTelefono", telefonoFormPhone);
          sendInfoPhone(formDataPhone, telefonoFormPhone);
        }
      });
    }

    // seccion datos
    const sendInfoData = async (data) => {
      let sendData = await fetch("backDatos.php", {
        method: "POST",
        body: data,
      });

      if (sendData.ok) {
        let responseData = await sendData.json();

        location.href = responseData.link;
      } else {
        let responseData = await sendData.json();

        showModal(responseData.msg, "error");
      }
    };

    if (document.querySelector("#dataForm")) {
      document.querySelector("#inputDatatyc").addEventListener("click", () => {
        if (
          document.querySelector("#inputDatatyc").getAttribute("value") == "off"
        ) {
          document.querySelector("#inputDatatyc").setAttribute("value", "on");
        } else {
          document.querySelector("#inputDatatyc").setAttribute("value", "off");
        }
      });

      document.querySelector("#dataForm").addEventListener("submit", (e) => {
        e.preventDefault();

        let nameFormData = document.querySelector("#inputDataName").value;
        let ageFormData = document.querySelector("#inputDataAge").value;
        let sexFormData = document.querySelector("#inputDataSex").value;
        let emailFormData = document.querySelector("#inputDataEmail").value;
        let tycFormData = document.querySelector("#inputDatatyc").value;
        let phoneFormData = document.querySelector("#inputDataPhone").value;
        let lastNameFormData = document.querySelector("#inputDataLastName")
          .value;

        const expresionPhone = /^3[\d]{9}$/;
        const expresionEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        const expresionString = /^[a-z\d\-_\s]+$/i;

        if (
          !expresionPhone.test(phoneFormData) ||
          !expresionEmail.test(emailFormData) ||
          !expresionString.test(nameFormData) ||
          !expresionString.test(lastNameFormData) ||
          tycFormData == "off" ||
          !ageFormData.length ||
          !sexFormData.length
        ) {
          showModal("Por favor validar la informacion", "error");
        } else {
          const sendInfoDataForm = new FormData();
          sendInfoDataForm.set("nameFormData", nameFormData);
          sendInfoDataForm.set("ageFormData", ageFormData);
          sendInfoDataForm.set("sexFormData", sexFormData);
          sendInfoDataForm.set("emailFormData", emailFormData);
          sendInfoDataForm.set("tycFormData", tycFormData);
          sendInfoDataForm.set("phoneFormData", phoneFormData);
          sendInfoDataForm.set("lastNameFormData", lastNameFormData);

          sendInfoData(sendInfoDataForm);
        }
      });
    }

    // seccion calificacion

    const sendInfoSurvie = async (data) => {
      let sendPhone = await fetch("backCalificacion.php", {
        method: "POST",
        body: data,
      });

      if (sendPhone.ok) {
        let responsePhone = await sendPhone.json();

        location.href = responsePhone.link;
      } else {
        let responseError = await sendPhone.json();
        showModal(responseError.msg, "error");
      }
    };

    if (document.querySelector("#survieForm")) {
      let valorSurvie;

      document.querySelector("#inputsSurvie").addEventListener("click", (e) => {
        if (e.target.hasAttribute("value")) {
          valorSurvie = e.target.getAttribute("value");
        }
      });

      document.querySelector("#survieForm").addEventListener("submit", (e) => {
        e.preventDefault();

        let messageFormSurvie = document.querySelector("#messageSurvie").value;
        let phoneFormSurvie = document.querySelector("#phoneFormSurvie").value;
        let survieFormSurvie = valorSurvie;

        const expresionString = /^[a-z\d\-_\s]+$/i;

        if (!expresionString.test(messageFormSurvie)) {
          showModal("Todos los campos deben ser rellenados", "error");
        } else {
          const formDataSurvie = new FormData();
          formDataSurvie.set("messageFormSurvie", messageFormSurvie);
          formDataSurvie.set("phoneFormSurvie", phoneFormSurvie);
          formDataSurvie.set("survieFormSurvie", survieFormSurvie);

          sendInfoSurvie(formDataSurvie);
        }
      });
    }
  });
})();
