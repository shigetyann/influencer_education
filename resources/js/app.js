import './bootstrap';


function add() {
  let tbl = document.getElementById("tbl");
  let tr = document.createElement("tr");

  let td1 = document.createElement("td");
  let input1 = document.createElement("input");
  input1.type = "text";
  input1.name = "delivery_from";
  input1.placeholder = "年月日";
  td1.appendChild(input1);

  let td2 = document.createElement("td");
  let input2 = document.createElement("input");
  input2.type = "text";
  input2.name = "delivery_from";
  input2.placeholder = "日時";
  td2.appendChild(input2);

  let td3 = document.createElement("td");
  td3.textContent = "～";

  let td4 = document.createElement("td");
  let input3 = document.createElement("input");
  input3.type = "text";
  input3.name = "delivery_to";
  input3.placeholder = "年月日";
  td4.appendChild(input3);

  let td5 = document.createElement("td");
  let input4 = document.createElement("input");
  input4.type = "text";
  input4.name = "delivery_to";
  input4.placeholder = "日時";
  td5.appendChild(input4);

  let td6 = document.createElement("td");
  let button = document.createElement("button");
  button.className = "subtruct del";
  button.type = "button";
  button.value = "ー";
  button.innerHTML = "ー";
  button.onclick = function() {
      tbl.deleteRow(tr.rowIndex);
  };
  td6.appendChild(button);

  tr.appendChild(td1);
  tr.appendChild(td2);
  tr.appendChild(td3);
  tr.appendChild(td4);
  tr.appendChild(td5);
  tr.appendChild(td6);

  tbl.appendChild(tr);
}

function del(button) {
  let tbl = document.getElementById("tbl");
  let tr = button.closest("tr");
  tbl.deleteRow(tr.rowIndex);
}


$(document).ready(function() {
  $('.grade-link').click(function() {
       var id = $(this).data('grade-id');
       $.ajax({
           url: "/curriculums.list/" + id,
           type: "GET",
           success: function(response) {
               $('#curriculums-container').html(response);
           },
           error: function(xhr) {
               console.log(xhr.responseText);
           }
       });
  });
 });
 