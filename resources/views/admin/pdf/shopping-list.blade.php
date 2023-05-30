<table>
    <thead>
    <th>Product Name</th>
    <th>Required Quantity</th>
    </thead>
    <tbody>
    @foreach($data as $d)
        <tr>
            <td>{{$d->product->name}}</td>
            <td>{{parseNumber($d->amount)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
