<div class="container">

    <h1>{{ $subject }}</h1>

    <p><strong>Name: </strong>{{ $name }}</p>
    <p><strong>Email: </strong>{{ $email }}</p>
    <p><strong>Phone: </strong>{{ $phone }}</p>
    <p><strong>Company: </strong>{{ $company }}</p>
    <p><strong>Message: </strong>{{ $notes }}</p>
    @if($product_name != null)
    <p><strong>Product Name: </strong>{{ $product_name }}</p>
    @endif
    @if($url != null)
    <p><strong>Product Link: </strong>{{ $url }}</p>
    @endif
    @if($model != null)
    <p><strong>Model of Machine: </strong>{{ $model }}</p>
    @endif
    @if($shipping_address != null)
    <p><strong>Shipping Address: </strong>{{ $shipping_address }}</p>
    @endif


</div>