@extends('layouts.app')

@section('content')
<h1>Products</h1>
<form id="basket-form">
    @csrf
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <input type="number" name="quantity[{{ $product->code }}]" min="0" value="0" class="form-control mb-2" placeholder="Quantity">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary mt-3">Add to Basket</button>
</form>
<hr>
<h2>Basket Total: $<span id="basket-total">0.00</span></h2>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#basket-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.post('/basket/add', formData, function(response) {
                $('#basket-total').text(response.total);
            });
        });
    });
</script>
@endpush
