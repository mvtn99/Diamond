@component('mail::message')
# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->billing_email }}

**Order Name:** {{ $order->billing_name }}

**Order Total:** ${{ priceFormat($order->billing_total) }}

**Items Ordered**

@foreach ($order->products as $product)
Name: {{ $product->name }} <br>
Price: ${{ priceFormat($product->price)}} <br>
Quantity: {{ $product->pivot->quantity }} <br>
<hr>
@endforeach

You can get further details about your order by logging into your account.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
