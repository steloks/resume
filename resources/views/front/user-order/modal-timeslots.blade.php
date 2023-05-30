@foreach($timeslots as $timeslot)
    <div class="col-12 timeslot-class">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="timeslot" id="timeslot{{$timeslot->id}}"
                   value="{{$timeslot->id}}">
            <label class="form-check-label" for="timeslot{{$timeslot->id}}">
                {{\Illuminate\Support\Carbon::createFromTimeString($timeslot->start_at)->format('H:i') .' - '.\Illuminate\Support\Carbon::createFromTimeString($timeslot->end_at)->format('H:i') }}
            </label>
        </div>
    </div>
@endforeach
