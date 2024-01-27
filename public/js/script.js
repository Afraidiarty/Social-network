/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
function addVisibleWithDelay(element, textElement, delay, topValue) {
  var timeout;
  element.addEventListener('mouseenter', function () {
    console.log('Mouse entered the element');
    timeout = setTimeout(function () {
      textElement.classList.add('visible');
      textElement.style.top = topValue;
    }, delay);
  });
  element.addEventListener('mouseleave', function () {
    console.log('Mouse left the element');
    clearTimeout(timeout);
    textElement.classList.remove('visible');
    textElement.style.top = '';
  });
}
var myElement1 = document.getElementById('myElement1');
var myText1 = document.getElementById('myText1');
addVisibleWithDelay(myElement1, myText1, 50, '');
var myElement2 = document.getElementById('myElement2');
var myText2 = document.getElementById('myText2');
addVisibleWithDelay(myElement2, myText2, 50, '25%');
var myElement3 = document.getElementById('myElement3');
var myText3 = document.getElementById('myText3');
addVisibleWithDelay(myElement3, myText3, 50, '35%');
var myElement4 = document.getElementById('myElement4');
var myText4 = document.getElementById('myText4');
addVisibleWithDelay(myElement4, myText4, 50, '45%');
var myElement5 = document.getElementById('myElement5');
var myText5 = document.getElementById('myText5');
addVisibleWithDelay(myElement5, myText5, 50, '54%');
var myElement6 = document.getElementById('myElement6');
var myText6 = document.getElementById('myText6');
addVisibleWithDelay(myElement6, myText6, 50, '63%');
var myElement7 = document.getElementById('myElement7');
var myText7 = document.getElementById('myText7');
addVisibleWithDelay(myElement7, myText7, 50, '73%');
var myElement8 = document.getElementById('myElement8');
var myText8 = document.getElementById('myText8');
addVisibleWithDelay(myElement8, myText8, 50, '83%');
var myElement9 = document.getElementById('myElement9');
var myText9 = document.getElementById('myText9');
addVisibleWithDelay(myElement9, myText9, 50, '92%');
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
btn.onclick = function () {
  modal.style.display = "block";
};
function closeModal() {
  modal.style.display = "none";
}
window.onclick = function (event) {
  if (event.target == modal) {
    closeModal();
  }
};
document.addEventListener('DOMContentLoaded', function () {
  var divElement = document.getElementById('th-bp-whats-new');

  // Установка начального текста из атрибута data-placeholder
  divElement.innerText = divElement.getAttribute('data-placeholder');

  // Обработчик события для очистки начального текста при фокусировке
  divElement.addEventListener('focus', function () {
    if (divElement.innerText === divElement.getAttribute('data-placeholder')) {
      divElement.innerText = '';
    }
  });

  // Обработчик события для восстановления начального текста, если поле остается пустым
  divElement.addEventListener('blur', function () {
    if (divElement.innerText === '') {
      divElement.innerText = divElement.getAttribute('data-placeholder');
    }
  });
});
document.getElementById('th-bp-whats-new').addEventListener('input', function () {
  document.getElementById('messagePost').value = this.innerHTML;
});
/******/ })()
;