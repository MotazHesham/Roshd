<h3 class="text-center">{{$date}}</h3>
@if($range)
    <ul>
        @foreach($range as $time)
            @If(!in_array(date("h:i a",$time),$reservations))
                <li class="start-time" onclick="start_time(this)" data-time="{{date("h:i a",$time)}}">
                    {{ date("h:i a",$time) }}
                </li>
            @else 
                <li class="start-time" style="background: #ddd">
                    {{ date("h:i a",$time) }}
                </li>
            @endif
        @endforeach 
    </ul>
@else
    <div class="alert alert-warning"> لا يوجد مواعيد لهذا اليوم</div>
@endif
