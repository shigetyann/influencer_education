import './bootstrap';


document.addEventListener('DOMContentLoaded', function() {
  let timesIndex = 0;
 
  window.add = function() {
     let tbl = document.getElementById("tbl");
     let tr = document.createElement("tr");
 
     // 日時の入力フィールドを作成
     let createInput = function(name, placeholder) {
       let td = document.createElement("td");
       let input = document.createElement("input");
       input.type = "text";
       input.name = `times[${timesIndex}][${name}]`;
       input.placeholder = placeholder;
       td.appendChild(input);
       return td;
     };
 
     // 日時の入力フィールドを追加
     tr.appendChild(createInput('delivery_from_date', '年月日'));
     tr.appendChild(createInput('delivery_from_time', '日時'));
     let td3 = document.createElement("td");
     td3.textContent = "～";
     tr.appendChild(td3);
     tr.appendChild(createInput('delivery_to_date', '年月日'));
     tr.appendChild(createInput('delivery_to_time', '日時'));
 
     // 削除ボタンを追加
     let td6 = document.createElement("td");
     let subtructButton = document.createElement("button");
     subtructButton.className = "subtruct del";
     subtructButton.type = "button";
     subtructButton.value = "ー";
     subtructButton.innerHTML = "ー";
     subtructButton.onclick = function() {
       tbl.deleteRow(tr.rowIndex);
     };
     td6.appendChild(subtructButton);
     tr.appendChild(td6);
 
     tbl.appendChild(tr);
     timesIndex++; // インデックスを増やす
  }
 });
 


$(document).ready(function() {
  // クリックイベントを関数に
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
 
