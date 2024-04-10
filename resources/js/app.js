import './bootstrap';


document.addEventListener('DOMContentLoaded', function() {
  // Define the add function in the global scope
  window.add = function() {
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
    let addButton = document.createElement("button");
    addButton.className = "add";
    addButton.type = "button";
    addButton.value = "✛";
    addButton.innerHTML = "✛";
    addButton.onclick = function() {
      add(); // Call add function recursively to add another row
    };

    let subtructButton = document.createElement("button");
    subtructButton.className = "subtruct del";
    subtructButton.type = "button";
    subtructButton.value = "ー";
    subtructButton.innerHTML = "ー";
    subtructButton.onclick = function() {
      tbl.deleteRow(tr.rowIndex);
    };
    td6.appendChild(subtructButton);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);

    tbl.appendChild(tr);
  }
});


function del(button) {
  let tbl = document.getElementById("tbl");
  let tr = button.closest("tr");
  tbl.deleteRow(tr.rowIndex);
}



$(document).ready(function() {
  // クリックイベントを関数にまとめる
  function bindGradeLinkClick() {
      $('.grade-link').click(function() {
          const currentUrl = window.location.href;
          const gradeId = $(this).data('grade-id');
          const lastIndex = currentUrl.lastIndexOf('/');
          const baseUrl = currentUrl.substring(0, lastIndex);
          const newUrl = baseUrl + '/' + gradeId;
          console.log("Requesting URL:", newUrl);
          $.ajax({
              url: newUrl,
              type: "GET",
              success: function(response) {
                  console.log("Response:", response);
                  $('#grade-container').html(response);
                  // 成功時に再度クリックイベントをバインド
                  bindGradeLinkClick();
              },
              error: function(xhr) {
                  console.log(xhr.responseText);
              }
          });
      });
  }
  
  // 最初にページが読み込まれたときに初期のクリックイベントをバインド
  bindGradeLinkClick();
}); 
 
