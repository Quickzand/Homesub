var editor = CodeMirror.fromTextArea(document.getElementById("editor"),
{
  mode:"htmlmixed",
  value:"tesT",
  htmlMode:true,
  lineNumbers:true,
  viewportMargin:Infinity,
  autoCloseTags:true,
  autoCloseBrackets:true,
  matchTags:true,
  matchBrackets:true,
  theme:"material-darker",
  foldGutter:true,
  gutters:["CodeMirror-foldgutter"],
  hint:true
});

function goBack() {
  document.getElementById("goBack").submit();
}

function saveFile() {
  document.getElementById("data").value = editor.getValue("\n")
  document.getElementById("saveFile").submit();
}
