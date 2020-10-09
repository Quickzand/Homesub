var table = document.getElementById("directoryTable");

function addEntry(fName, fType) {
  if (isValidName(fName)) {
    if (fType == "folder") {
      table.innerHTML += "<tr class='entryRow'><td class='iconCell'><div class='folderIcon'> </div></td> <td class='entryName' onClick='entryClick(this)' colspan='999'>" + fName + "</tr></td>";
    } else {
      table.innerHTML += "<tr class='entryRow'><td class='iconCell'><div class='fileIcon'> </div></td> <td class='entryName' onClick='entryClick(this)'>" + fName + "</td> <td class='editCell'> <div class='editButton' onClick='editFile(this)'>  </div> </td> </tr>";
    }
  }
}

function isValidName(fName) {
  return !(fName == "." || fName == ".." || fName == ".DS_Store");
}

function entryClick(fNameElement) {
  document.getElementById("directory").value += fNameElement.innerHTML + "/";
  document.getElementById("directoryChange").submit();
}

function goUpDirectory() {
  var directoryElement = document.getElementById("directory");
  var currentDirectory = directoryElement.value;
  currentDirectory = currentDirectory.substring(0, currentDirectory.length - 1);
  currentDirectory = currentDirectory.substring(0, currentDirectory.lastIndexOf('/') + 1);
  directoryElement.value = currentDirectory;
  document.getElementById("directoryChange").submit();
}


function editFile(button) {
  var fName = button.parentNode.parentNode.cells[1].innerHTML;
  var fPathForm = document.getElementById("fPath");
  var directoryElement = document.getElementById("directory");
  var currentDirectory = directoryElement.value;
  var filePath =  fPathForm.value  + fName;
  fPathForm.value = filePath;
  var editFileForm = document.getElementById("editFile");
  editFileForm.submit();
}
