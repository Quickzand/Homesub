var accountPopup = document.getElementById("accountPopup");
accountPopup.className = "accountPopupDefault";
function toggleAccountPopup() {
  if (accountPopup.className == "accountPopupClose") {
    openAccountPopup();
  } else if (accountPopup.className == "accountPopupOpen") {
    closeAccountPopup();
  } else if (accountPopup.className == "accountPopupDefault") {
    openAccountPopup();
  }
}
function closeAccountPopup() {
  accountPopup.className = "accountPopupClose";
}
function openAccountPopup() {
  accountPopup.className = "accountPopupOpen";

}
