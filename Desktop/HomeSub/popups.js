var darken = document.getElementById("bodyDarken");
var popups = document.getElementsByClassName("popup");
darken.style.display = 'none';
for (index = 0; index < popups.length; index++) {
    popups[index].style.display = 'none';
}

function openPopup(popupToOpen) {
  darken.style.display = 'block';
  popupToOpen.style.display = 'block';
}

function closePopup() {
  darken.style.display = 'none';
  for (index = 0; index < popups.length; index++) {
      popups[index].style.display = 'none';
  }
}
