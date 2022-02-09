@extends('layouts.frontend')

@section('content')
    <div class="container book-date-wrap">
        <div class="row">
            <div class="col-lg-6 book-date-right">
                <form method="post" action="{{ route('frontend.groups.store') }}">
                    @csrf
                    <p class="book-date-title">اختر الدورة:</p>
                    <div class="custom-select book-date" style="width:250px;">
                        <select name="group_id" id="group_id" required> 
                            @foreach (\App\Models\Group::get() as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                                @if($loop->first) 
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <p class="book-date-title">اختر التخصص:</p>
                    <div class="custom-select book-date" style="width:250px;">
                        <select name="specialization_id" id="specialization_id" required> 
                            @foreach (\App\Models\Specialization::get() as $specialization)
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @if($loop->first) 
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="form-submit-btn shadow-none blue-btn">تم</button>
                </form> 
            </div>
            <div class="col-lg-6 book-date-left">
                <img class="book-course-img" src="{{ asset('frontend/new/img/online-learning.png') }}">
            </div>
        </div>
    </div> 
@endsection

@section('scripts')
<script>
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
      selElmnt = x[i].getElementsByTagName("select")[0];
      ll = selElmnt.length;
      /*for each element, create a new DIV that will act as the selected item:*/
      a = document.createElement("DIV");
      a.setAttribute("class", "select-selected");
      a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
      x[i].appendChild(a);
      /*for each element, create a new DIV that will contain the option list:*/
      b = document.createElement("DIV");
      b.setAttribute("class", "select-items select-hide");
      for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
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
                h.innerHTML = this.innerHTML;
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
    </script>
@endsection