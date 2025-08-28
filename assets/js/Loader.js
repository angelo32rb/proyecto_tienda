class Loader {
  // Al inicializar la clase, se hará una cuenta atrás para desactivar el loader.
  constructor() {
    setTimeout(() => {
      this.#deactivateLoadingPage();
      this.#showLayout();
    }, 3000);
  }

  // Función privada que añade la clase d-none de bootstrap 5.
  #deactivateLoadingPage() {
    let figures = document.getElementById("figures");
    figures.classList.add("d-none");
  }

  // Función privada que añade quita la clase d-none del layout, y lo hace visible con d-block
  #showLayout() {
    let layout = document.getElementById("layout");
    layout.classList.remove("d-none");
    layout.classList.add("d-block");
  }
}

new Loader();
