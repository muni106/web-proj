checkMenuButton = false;

menuBtn = document.getElementById(".menu__btn");
menuBtn.addEventListener("click", moveAside);

function moveAside() {
  if (menuBtn.classList.contains("spanClosed")) {
    menuBtn.classList.remove("spanClosed");
  } else {
    menuBtn.classList.add('spanClosed');
  }
}
