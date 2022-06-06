@foreach ($featured as $item)
    <div>Regular price: {{ $item['regularPrice'] }}</div>
    <div>Final price: {{ $item['finalPrice'] }}</div>
@endforeach
