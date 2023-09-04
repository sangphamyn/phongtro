var trigger = document.getElementById('trigger');
var dropdown = document.getElementById('menu');
loadOption('.custom-select-district');
loadOption('.custom-select-xa');
if(trigger) {
  trigger.addEventListener('click', function(e) {
    e.stopPropagation();
    if(dropdown.classList.contains('trigger-dropdown-show'))
      dropdown.classList.remove('trigger-dropdown-show');
    else 
      dropdown.classList.add('trigger-dropdown-show');
  })
  document.addEventListener('click', function(e) {
    if(!e.target.classList.contains('trigger-dropdown') && !e.target.classList.contains('trigger') && !e.target.classList.contains('user'))
        dropdown.classList.remove('trigger-dropdown-show');
  })
}
  

var districts_box = document.querySelectorAll('.select-items div');
for(var a of districts_box) {
    a.addEventListener('click', function() {
        var b = this.getAttribute('value')
        $.ajax({
            type: "get",
            url: "/xa",
            data: {
                'search': b
            },
            success: function(response) {
                if(response != ''){
                    var xa_box = document.getElementById('xa');
                    xa_box.parentElement.querySelectorAll('.select-selected, .select-items').forEach(item => item.remove());
                    xa_box.innerHTML = '<option>Chọn xã/phường</option>';
                    xa_box.insertAdjacentHTML('beforeend', response);
                    loadOption('.custom-select-xa');
                }
                else {
                   console.log("deo thanh cong");
                   var xa_box = document.getElementById('xa');
                    xa_box.parentElement.querySelectorAll('.select-selected, .select-items').forEach(item => item.remove());
                    xa_box.innerHTML = '<option>Chọn xã/phường</option>';
                }
            }
        })
    })
}
async function logMovies(a) {
    const response = await fetch("/xa", {
        method: "POST", // or 'PUT'
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({sang: "42"}),
      });
    const movies = await response.json();
    console.log(movies);
  }

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function loadOption(selector) {
    var arrow_svg = `<svg viewBox="0 0 32 32" width="30px" stroke="#ffffff" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="icomoon-ignore"> </g> <path d="M15.233 19.175l0.754 0.754 6.035-6.035-0.754-0.754-5.281 5.281-5.256-5.256-0.754 0.754 3.013 3.013z" fill="#ffffff"> </path> </g></svg>`;
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.querySelectorAll(selector);
    l = x.length;
    for (i = 0; i < l; i++) {
      selElmnt = x[i].getElementsByTagName("select")[0];
      ll = selElmnt.length;
      /*for each element, create a new DIV that will act as the selected item:*/
      a = document.createElement("DIV");
      a.setAttribute("class", "select-selected flex justify-between items-center");
      a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML + arrow_svg;
      x[i].appendChild(a);
      /*for each element, create a new DIV that will contain the option list:*/
      b = document.createElement("DIV");
      b.setAttribute("class", "select-items select-hide");
      for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.setAttribute('value', selElmnt.options[j].value);
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
              if (s.options[i].innerHTML == this.innerHTML) {
                s.selectedIndex = i;
                h.innerHTML = this.innerHTML + arrow_svg;
                y = this.parentNode.getElementsByClassName("same-as-selected");
                yl = y.length;
                for (k = 0; k < yl; k++) {
                  y[k].removeAttribute("class");
                }
                this.setAttribute("class", "same-as-selected");
                break;
              }
            }
            h.click();
        });
        b.appendChild(c);
      }
      x[i].appendChild(b);
      a.addEventListener("click", function(e) {
          /*when the select box is clicked, close any other select boxes,
          and open/close the current select box:*/
          e.stopPropagation();
          closeAllSelect(this);
          this.nextSibling.classList.toggle("select-hide");
          this.classList.toggle("select-arrow-active");
          if(!e.target.classList.contains('search-filter') && !e.target.classList.contains('input-group') && !e.target.classList.contains('dropdown-show') && !e.target.classList.contains('input-price') && !e.target.classList.contains('ba')  && !e.target.classList.contains('checkbox')  && !e.target.classList.contains('check-mark')) {
            document.querySelectorAll('.dropdown-show').forEach(e => e.classList.remove('dropdown-show'));
        }
        });
    }
    function closeAllSelect(elmnt) {
      /*a function that will close all select boxes in the document,
      except the current select box:*/
      var x, y, i, xl, yl, arrNo = [];
      x = document.getElementsByClassName("select-items");
      y = document.getElementsByClassName("select-selected");
      xl = x.length;
      yl = y.length;
      for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
          arrNo.push(i)
        } else {
          y[i].classList.remove("select-arrow-active");
        }
      }
      for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
          x[i].classList.add("select-hide");
        }
      }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
}

 // Upload Image
 $('#avatar_upload').change(function() {
  const form = new FormData();
  form.append('file', $(this)[0].files[0]);
  $.ajax({
      processData: false,
      contentType: false,
      type: 'POST',
      dataType: 'JSON',
      data: form,
      url: '/profile/upload/services',
      success: function(result) {
          if(result.error == false) {
              $('#image_show').html('<img src="'+ result.url +'" alt=""  class="inline w-[100px] h-[100px] rounded-full object-cover mx-auto"><span class="absolute top-1 left-[100px]"><svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.15" d="M8 16H12L18 10L14 6L8 12V16Z" fill="#000000"></path> <path d="M14 6L8 12V16H12L18 10M14 6L17 3L21 7L18 10M14 6L18 10M10 4L4 4L4 20L20 20V14" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></span>');
              $('#avatar').val(result.url);
          } else {
              console.log('File type is not valid');
          }
      }
  })
})

$('#file-ip-1').change(function() {
  var form = new FormData();
  for(var i = 0; i < $(this)[0].files.length; i++) {
    form.append('file[]', $(this)[0].files[i]);
  }
  $.ajax({
      processData: false,
      contentType: false,
      type: 'POST',
      dataType: 'JSON',
      data: form,
      url: '/profile/upload/services',
      success: function(result) {
          if(result.error == false) {
              var url_list = result.url.split('@sang@');
              for(var i = 0; i < url_list.length; i++) {
                if(url_list[i] != '') {
                  $('#preview').append('<img src="' + url_list[i] + '">');
                  $('#preview').append(`<input type="hidden" name="images[]" value="${url_list[i]}">`);
                }
              }
          } else {
              alert('File type is not valid');
          }
      }
  })
})

// Show filter dropdown
var dropdown_btn = document.querySelectorAll('.search-filter');
dropdown_btn.forEach(function(item) {
    item.addEventListener('click', function(e) {
      e.stopPropagation();
      document.querySelectorAll('.select-items').forEach(e => e.classList.add('select-hide'));
      if(e.target == this || e.target == this.querySelector('svg') || e.target == this.querySelector('path') ) {
        var dropdown = item.querySelector('.dropdown');
        if(dropdown.classList.contains('dropdown-show')) {
          document.querySelectorAll('.dropdown-show').forEach(e => e.classList.remove('dropdown-show'));
        }
        else {
          document.querySelectorAll('.dropdown-show').forEach(e => e.classList.remove('dropdown-show'));
          dropdown.classList.add('dropdown-show');
        }
      }
    })
})
document.addEventListener('click', function(e) {
  if(!e.target.classList.contains('search-filter') && !e.target.classList.contains('input-group') && !e.target.classList.contains('dropdown-show') && !e.target.classList.contains('input-price') && !e.target.classList.contains('ba')  && !e.target.classList.contains('checkbox')  && !e.target.classList.contains('check-mark')) {
      document.querySelectorAll('.dropdown-show').forEach(e => e.classList.remove('dropdown-show'));
  }
})

$('.hot-motel-list').flickity({
  // options
  cellAlign: 'left',
  contain: true,
  wrapAround: true
});