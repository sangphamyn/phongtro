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

$('.hot-motel-list, .post-img-list').flickity({
  // options
  cellAlign: 'left',
  contain: true,
  wrapAround: true
});

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

$('.addtoWishlist').click(function() {
  var b = this.getAttribute('value');
  var post_id = this.getAttribute('post-id');
  if(b == 'add') {
    $.ajax({
      type: "post",
      url: "/addtowishlist",
      data: {
        'post_id': post_id
      },
      success: function(response) {
          if(response != ''){
              console.log("thanh cong " + response);
              $('.author-phone')[0].innerHTML = `<svg viewBox="0 0 24 24" width="20px" class="mr-1" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.1007 13.359L15.5719 12.8272H15.5719L16.1007 13.359ZM16.5562 12.9062L17.085 13.438H17.085L16.5562 12.9062ZM18.9728 12.5894L18.6146 13.2483L18.9728 12.5894ZM20.8833 13.628L20.5251 14.2869L20.8833 13.628ZM21.4217 16.883L21.9505 17.4148L21.4217 16.883ZM20.0011 18.2954L19.4723 17.7636L20.0011 18.2954ZM18.6763 18.9651L18.7459 19.7119H18.7459L18.6763 18.9651ZM8.81536 14.7266L9.34418 14.1947L8.81536 14.7266ZM4.00289 5.74561L3.2541 5.78816L3.2541 5.78816L4.00289 5.74561ZM10.4775 7.19738L11.0063 7.72922H11.0063L10.4775 7.19738ZM10.6342 4.54348L11.2346 4.09401L10.6342 4.54348ZM9.37326 2.85908L8.77286 3.30855V3.30855L9.37326 2.85908ZM6.26145 2.57483L6.79027 3.10667H6.79027L6.26145 2.57483ZM4.69185 4.13552L4.16303 3.60368H4.16303L4.69185 4.13552ZM12.0631 11.4972L12.5919 10.9654L12.0631 11.4972ZM16.6295 13.8909L17.085 13.438L16.0273 12.3743L15.5719 12.8272L16.6295 13.8909ZM18.6146 13.2483L20.5251 14.2869L21.2415 12.9691L19.331 11.9305L18.6146 13.2483ZM20.8929 16.3511L19.4723 17.7636L20.5299 18.8273L21.9505 17.4148L20.8929 16.3511ZM18.6067 18.2184C17.1568 18.3535 13.4056 18.2331 9.34418 14.1947L8.28654 15.2584C12.7186 19.6653 16.9369 19.8805 18.7459 19.7119L18.6067 18.2184ZM9.34418 14.1947C5.4728 10.3453 4.83151 7.10765 4.75168 5.70305L3.2541 5.78816C3.35456 7.55599 4.14863 11.144 8.28654 15.2584L9.34418 14.1947ZM10.7195 8.01441L11.0063 7.72922L9.9487 6.66555L9.66189 6.95073L10.7195 8.01441ZM11.2346 4.09401L9.97365 2.40961L8.77286 3.30855L10.0338 4.99296L11.2346 4.09401ZM5.73263 2.04299L4.16303 3.60368L5.22067 4.66736L6.79027 3.10667L5.73263 2.04299ZM10.1907 7.48257C9.66189 6.95073 9.66117 6.95144 9.66045 6.95216C9.66021 6.9524 9.65949 6.95313 9.659 6.95362C9.65802 6.95461 9.65702 6.95561 9.65601 6.95664C9.65398 6.95871 9.65188 6.96086 9.64972 6.9631C9.64539 6.96759 9.64081 6.97245 9.63599 6.97769C9.62634 6.98816 9.61575 7.00014 9.60441 7.01367C9.58174 7.04072 9.55605 7.07403 9.52905 7.11388C9.47492 7.19377 9.41594 7.2994 9.36589 7.43224C9.26376 7.70329 9.20901 8.0606 9.27765 8.50305C9.41189 9.36833 10.0078 10.5113 11.5343 12.0291L12.5919 10.9654C11.1634 9.54499 10.8231 8.68059 10.7599 8.27309C10.7298 8.07916 10.761 7.98371 10.7696 7.96111C10.7748 7.94713 10.7773 7.9457 10.7709 7.95525C10.7677 7.95992 10.7624 7.96723 10.7541 7.97708C10.75 7.98201 10.7451 7.98759 10.7394 7.99381C10.7365 7.99692 10.7335 8.00019 10.7301 8.00362C10.7285 8.00534 10.7268 8.00709 10.725 8.00889C10.7241 8.00979 10.7232 8.0107 10.7223 8.01162C10.7219 8.01208 10.7212 8.01278 10.7209 8.01301C10.7202 8.01371 10.7195 8.01441 10.1907 7.48257ZM11.5343 12.0291C13.0613 13.5474 14.2096 14.1383 15.0763 14.2713C15.5192 14.3392 15.8763 14.285 16.1472 14.1841C16.28 14.1346 16.3858 14.0763 16.4658 14.0227C16.5058 13.9959 16.5392 13.9704 16.5663 13.9479C16.5799 13.9367 16.5919 13.9262 16.6024 13.9166C16.6077 13.9118 16.6126 13.9073 16.6171 13.903C16.6194 13.9008 16.6215 13.8987 16.6236 13.8967C16.6246 13.8957 16.6256 13.8947 16.6266 13.8937C16.6271 13.8932 16.6279 13.8925 16.6281 13.8923C16.6288 13.8916 16.6295 13.8909 16.1007 13.359C15.5719 12.8272 15.5726 12.8265 15.5733 12.8258C15.5735 12.8256 15.5742 12.8249 15.5747 12.8244C15.5756 12.8235 15.5765 12.8226 15.5774 12.8217C15.5793 12.82 15.581 12.8183 15.5827 12.8166C15.5862 12.8133 15.5895 12.8103 15.5926 12.8074C15.5988 12.8018 15.6044 12.7969 15.6094 12.7929C15.6192 12.7847 15.6265 12.7795 15.631 12.7764C15.6403 12.7702 15.6384 12.773 15.6236 12.7785C15.5991 12.7876 15.501 12.8189 15.3038 12.7886C14.8905 12.7253 14.02 12.3853 12.5919 10.9654L11.5343 12.0291ZM9.97365 2.40961C8.95434 1.04802 6.94996 0.83257 5.73263 2.04299L6.79027 3.10667C7.32195 2.578 8.26623 2.63181 8.77286 3.30855L9.97365 2.40961ZM4.75168 5.70305C4.73201 5.35694 4.89075 4.9954 5.22067 4.66736L4.16303 3.60368C3.62571 4.13795 3.20329 4.89425 3.2541 5.78816L4.75168 5.70305ZM19.4723 17.7636C19.1975 18.0369 18.9029 18.1908 18.6067 18.2184L18.7459 19.7119C19.4805 19.6434 20.0824 19.2723 20.5299 18.8273L19.4723 17.7636ZM11.0063 7.72922C11.9908 6.7503 12.064 5.2019 11.2346 4.09401L10.0338 4.99295C10.4373 5.53193 10.3773 6.23938 9.9487 6.66555L11.0063 7.72922ZM20.5251 14.2869C21.3429 14.7315 21.4703 15.7769 20.8929 16.3511L21.9505 17.4148C23.2908 16.0821 22.8775 13.8584 21.2415 12.9691L20.5251 14.2869ZM17.085 13.438C17.469 13.0562 18.0871 12.9616 18.6146 13.2483L19.331 11.9305C18.2474 11.3414 16.9026 11.5041 16.0273 12.3743L17.085 13.438Z" fill="#ffffff"></path> </g></svg>${response}`;
              $('.click-to-show').hide();
            }
            else {
            console.log("that bai");
          }
      }
    })
    this.setAttribute('value', 'remove');
    this.innerHTML = `Đã quan tâm <svg fill="#ffffff" style="margin-top: 3px; margin-left: 3px;" width="24px" height="24px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>`;
  } else {
    $.ajax({
      type: "post",
      url: "/removewishlist",
      data: {
        'post_id': post_id
      },
      success: function(response) {
          if(response == 'success'){
              console.log("thanh cong");
          }
            else {
            console.log("that bai");
          }
      }
    })
    this.setAttribute('value', 'add');
    this.innerHTML = `Quan tâm <svg style="margin-top: 3px; margin-left: 3px;" width="24px" height="24px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>`;
  }
})


/* Nap tien */
$('.btn-naptien').click(function() {
  $('.overlay').addClass('show');
  $('.box-naptien').addClass('show');
})
$('.overlay').click(function() {
  $('.overlay').removeClass('show');
  $('.box-naptien').removeClass('show');
})