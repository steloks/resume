<div class="input-group-prepend">
    <span class="input-group-text">Courier:</span>
</div>
<select class="form-control" id="courierId" name="courierId">
    @if(empty($couriers))
        <option value="{{null}}">{{__('No assigned couriers')}}</option>
    @else
    @foreach($couriers as $courier)
        <option value="{{$courier->id}}">{{$courier->name}}</option>
    @endforeach
    @endif
</select>

