const fs = require("fs");

function storeBloodTest() {
  var fso = new ActiveXObject("Scripting.FileSystemObject");
  var s = fso.CreateTextFile(
    "C:\\Users\\tusha\\Documents\\GitHub\\Revitalize\\bloodtests.txt",
    true
  );
  var data =
    document.getElementById("glucoseInput").value +
    "," +
    document.getElementById("sodiumInput").value +
    "," +
    document.getElementById("potassiumInput").value +
    "," +
    document.getElementById("chlorideInput").value +
    "," +
    document.getElementById("carbonDioxideInput").value +
    "," +
    document.getElementById("creatinineInput").value +
    "," +
    document.getElementById("uricAcidInput").value +
    "," +
    document.getElementById("calciumInput").value +
    "," +
    document.getElementById("magnesiumInput").value +
    "," +
    document.getElementById("cholesterolInput").value +
    "," +
    document.getElementById("triglyceridesInput").value +
    "," +
    document.getElementById("bloodCellsInput").value;

  s.WriteLine(data);
  s.Close();
}
