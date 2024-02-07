checkMenuButton = false;

let menuBtn = document.getElementById('menu__btn');
let spanning = document.getElementById('spanning');
let menuBox = document.getElementById('menu__box');

function moveAside() {
  if (spanning.classList.contains('spanClosed')) {
    spanning.classList.remove('spanClosed');
    menuBox.classList.remove('menu__box__open');
  } else {
    spanning.classList.add('spanClosed');
    menuBox.classList.add('menu__box__open');
  }
}


menuBtn.addEventListener('click', moveAside);


