<div class="box pad">
    <img src="{{ $img }}">
    <div class="content">
        <h3>{{ $name }}</h3>
        <h2>Price: {{ $price }}</h2>
        <p class="unit" style="color: #082142;">Quantity: {{ $quantity }}</p>
        <form action="/update-cart" method="GET">
            <input type="number" id="Quantity" name="quantity" oninput="handleQuantityChange()" value="{{ $quantity }}">
            <input type="number" id="ProductID" hidden name="productID" value="{{ $productID }}"><br><br>
            <input type="submit" id="cartBtn" style="background: #082142;" class="codeBtn btn btn-primary" value="{{ $quantity === 0 ? 'Delete Item' : 'Update Cart' }}">
        </form>
    </div>
</div>

<script>
    function handleQuantityChange() {
        const quantityInput = document.getElementById('Quantity');
        const cartButton = document.getElementById('cartBtn');
        if (quantityInput.value < 0) {
            quantityInput.value = 0;
        }

        if (quantityInput.value == 0) {
            cartButton.value = 'Delete Item';
        } else {
            cartButton.value = 'Update Cart';
        }
    }
</script>
