const card_frontBtn = document.getElementById('download-front');
const cardFront = document.getElementById('card-container');
card_frontBtn.addEventListener('click', function () {
  const canvas = document.createElement('canvas');
  canvas.width = cardFront.offsetWidth;
  canvas.height = cardFront.offsetHeight;
  const context = canvas.getContext('2d');
  context.drawSvg(cardFront.innerHTML, 0, 0, canvas.width, canvas.height);
  const link = document.createElement('a');
  link.href = canvas.toDataURL();
  link.download = 'card-front.png';
  link.click();
});

const card_backBtn = document.getElementById('download-back');
const cardBack = document.getElementById('card-container');
card_frontBtn.addEventListener('click', function () {
  const canvas = document.createElement('canvas');
  canvas.width = cardBack.offsetWidth;
  canvas.height = cardBack.offsetHeight;
  const context = canvas.getContext('2d');
  context.drawSvg(cardBack.innerHTML, 0, 0, canvas.width, canvas.height);
  const link = document.createElement('a');
  link.href = canvas.toDataURL();
  link.download = 'card-back.png';
  link.click();
});