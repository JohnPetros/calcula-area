// ABRIR/FECHAR MODAL
const openModal = () =>
  document.getElementById("modal").classList.add("active");

const closeModal = () => {
  document.getElementById("modal").classList.remove("active");
};
document.getElementById("button").addEventListener("click", openModal);
document.getElementById("modalClose").addEventListener("click", closeModal);
//

// ALTERAR NOME DA FIGURA GEOMÉTRICA DINAMICAMENTE NO BOTÃO
const getShapeName = (event) => {
  let shapeName;
  shapeName = event.target.dataset.shapename;
  document.getElementById("geometric-shape-name").textContent = shapeName;
};
const radios = document.querySelectorAll(".radio");
radios.forEach((radios) => radios.addEventListener("click", getShapeName));
//