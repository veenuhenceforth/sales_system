@foreach ($basket->getProducts() as $item)
    <div>
        {{ $item['product']->name }} - ${{ number_format($item['product']->price, 2) }} x {{ $item['quantity'] }}
    </div>
@endforeach
