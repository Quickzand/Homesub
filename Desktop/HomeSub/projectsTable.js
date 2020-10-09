let projectTable = document.getElementById("projectsList");
function addRow(name, date) {
  S = "<tr class='projectRow'> <td class='projectName' onClick='openProject(this)'> " + name + "</td> <td class='projectDate' onClick='openProject(this)'> " + date + "</td> <td> <div class='deleteProjectButton' onClick = 'removeRow(this)'> </div> </td> </tr>"
  projectTable.innerHTML += S;
}

function removeRow(x) {
  var projectName = x.parentNode.parentNode.cells[0].innerHTML;
  var deleteForm = document.getElementById("deleteProject");
  var formValue = document.getElementById("projectToDelete");
  formValue.value = projectName;
  deleteForm.submit();
  projectTable.deleteRow(x.parentNode.parentNode.rowIndex);
}

function openProject(x) {
  var projectName = x.parentNode.cells[0].innerHTML;
  var openForm = document.getElementById("openProject");
  var formValue = document.getElementById("pName");
  formValue.value = projectName;
  openForm.submit();
}
