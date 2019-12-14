const text = ['Hallo', 'Guten Tag', 'Einen schönen Tag', 'Schön, dass du hier bist'];
let count = 0;
let index = 0;
let currentText = '';
let letter = '';

(function type() {

  if (count === text.length) {
    count = 0;
  }
  currentText = text[count];
  letter = currentText.slice(0, ++index);

  document.querySelector('.typing').textContent = currentText;
  if (letter.length === currentText.length) {
    count++;
    index = 0;
  }
  setTimeout(type, 500);
})();