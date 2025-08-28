function scrollToSection(sectionId) {
  const element = document.getElementById(sectionId);
  if (element || element != "carouselExampleIndicators") {
    const offsetTop = element.offsetTop - 50;
    window.scrollTo({
      top: offsetTop,
      behavior: "smooth",
    });
  } else {
    console.error(`Elemento con ID '${sectionId}' no encontrado.`);
  }
}

document.querySelectorAll(".nav-style").forEach((link) => {
  link.addEventListener("click", function (event) {
    event.preventDefault();
    const sectionId = link.getAttribute("data-target");
    scrollToSection(sectionId);
  });
});

/*
  Admin Navbar Managment
*/

let adminApp = document.getElementById("admin-app");

function closeSection(app) {
  let section = document.getElementById(app);

  section.classList.remove("d-block");
  section.classList.add("d-none");

  adminApp.classList.remove("d-none");
  adminApp.classList.add("d-block");
}

function showSection(app) {
  let section = document.getElementById(app);
  adminApp.classList.remove("d-block");
  adminApp.classList.add("d-none");

  section.classList.add("d-block");
  section.classList.remove("d-none");
}

/*
  Admin Subsection Managment
*/

function openSubsection(app, subApp) {
  let section = document.getElementById(app);
  section.classList.remove("d-block");
  section.classList.add("d-none");

  let subSection = document.getElementById(subApp);
  subSection.classList.add("d-block");
  subSection.classList.remove("d-none");
}

function closeSubsection(app, subApp) {
  let subSection = document.getElementById(subApp);
  subSection.classList.remove("d-block");
  subSection.classList.add("d-none");

  let section = document.getElementById(app);
  section.classList.remove("d-none");
  section.classList.add("d-block");
}

/*
  Show Messages
*/

/*
  DataTables
*/

let userTable = new DataTable(".userTable", {
  searchable: true,
  fixedHeight: false,
  perPage: 10,
  perPageSelect: [10, 50, 100],
  labels: {
    placeholder: "Buscar usuarios",
    perPage: "Mostrar {select} usuarios por página",
    noRows: "No hay ningún usuario con esas características",
    info: "Mostrando {start} hasta {end} de {rows} usuarios (Página {page} de {pages})",
  },
});

let messageTable = new DataTable(".messageTable", {
  searchable: true,
  fixedHeight: false,
  perPage: 10,
  perPageSelect: [10, 50, 100],
  labels: {
    placeholder: "Buscar nombres",
    perPage: "Mostrar {select} mensajes por página",
    noRows: "No hay ningún mensaje con esas características",
    info: "Mostrando {start} hasta {end} de {rows} mensajes (Página {page} de {pages})",
  },
});
