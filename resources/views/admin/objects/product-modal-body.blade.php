<h2 class="text-center mb-3">Add</h2>
<form class="row" method="POST" action="{{route('admin.objects.addProductData')}}">
    @csrf
    <table>
        <thead>
        <tr>
            <th>{{ __('Batch number') }}</th>
            <th>{{ __('Purchased quantity') }}</th>
            <th>{{ __('Prepared quantity ') }}</th>
            <th>{{ __('Residual quantity') }}</th>
            <th>{{ __('Delivery price') }}</th>
            <th>{{ __('Date of purchase') }}</th>
            <th>{{ __('Expiration date') }}</th>
            <th>{{ __('Discarded') }}</th>
            <th>{{ __('Date of discarded') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{isset($productData) ? $productData->batch : ''}}</td>
            <td><input type="number" step="0.01" name="amount"
                       value="{{isset($productData) ? $productData->amount : ''}}" placeholder="Amount in grams"></td>
            <td>{{isset($productData) ? $productData->used_amount : ''}}</td>
            <td>{{isset($productData) ? $productData->left_amount : ''}}</td>
            <td><input type="number" step="0.01" name="price" value="{{isset($productData) ? $productData->price : ''}}"
                       placeholder="Price for 1000gr"></td>
            <td>{{isset($productData) ? parseDate($productData->created_at) : ''}}</td>
            <td>{{isset($productData) ? parseDate($productData->expire_date) : ''}}</td>
            <td><input type="checkbox" value="1"
                       name="is_wasted" {{(isset($productData) && $productData->is_wasted == 1) ? 'checked' : ''}}></td>
            <td>{{isset($productData) ? parseDate($productData->waste_date) : ''}}</td>
        </tr>
        </tbody>
    </table>
    @if(isset($productData))
        <input type="hidden" value="{{$productData->id}}" name="productDataId">
        <input type="hidden" value="{{$productData->product_id}}" name="productId">
        <input type="hidden" value="{{$productData->object_id}}" name="objectId">
    @else
        <input type="hidden" value="{{isset($product) ? $product->id : ''}}" name="productId">
        <input type="hidden" value="{{isset($object) ? $object->id : ''}}" name="objectId">
    @endif
    <button type="submit" class="btn btn-dark text-uppercase">Add Batch</button>
</form>
