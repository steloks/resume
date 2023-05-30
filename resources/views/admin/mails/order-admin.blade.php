<div>
    Order placed №{{$order->id}}.
    Order date:{{$order->created_at}},
    Client: {{$order->name.' '.$order->last_name}}
    Address: {{$order->user_address.', '.$order->user_postcode}}
    Status: Ordered.
    Total cost:{{$order->total_amount}}
</div>
<div>
    <table class="invoice-table-b w-100 fz-1d2 m-auto">
        <tr class="fw-600">
            <td>
                {{ __("Menu No.") }}
            </td>
            <td>
                {{ __("Menu name") }}
            </td>
            <td>
                {{ __("Pet") }}
            </td>
            <td>
                {{ __("TimeSlot") }}
            </td>
            <td>
                {{ __("Price £") }}
            </td>
        </tr>
        @foreach($order->recipes as $recipe)
            <tr>
                <td>{{$order->id .'-'.$recipe->id}}</td>
                <td>{{$recipe->recipe->name}}</td>
                <td>{{$recipe->pet->name}}</td>
                <td>{{parseTimeslot($recipe->timeslot->start_at).'-'. parseTimeslot($recipe->timeslot->end_at)}}</td>
                <td>{{parseNumber($recipe->price)}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" class="bg-white text-right">{{ __("Cost £") }}</td>
            <td class="bg-white fw-600">{{($order->total_amount - $order->vat - $order->delivery_price)}}</td>
        </tr>
        <tr>
            <td colspan="2" class="bg-white text-right">{{ __("Delivery £") }}</td>
            <td class="bg-white fw-600">{{ parseNumber($order->delivery_price)}}£</td>
        </tr>
        <tr>
            <td colspan="2" class="bg-white text-right">{{ __("VAT") }}</td>
            <td class="bg-white fw-600">{{parseNumber($order->vat)}}£</td>
        </tr>
        <tr>
            <td colspan="2" class="bg-white text-right">{{ __("Total cost £") }}</td>
            <td class="bg-white fw-600 fw-600">{{parseNumber($order->total_amount)}}£</td>
        </tr>
    </table>
</div>

