<div style="background-color: #f8f9fa; font-family: 'Montserrat', sans-serif;" class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div style="border: none;" class="card">

                <div style="padding: 2rem;">
                    <a href="https://gamebrio.store" style="display: inline-block;">
                        <img src="https://i.ibb.co/zxg4qdN/logo.png" width="300" alt="GameBrio Logo">
                    </a>
                </div>

                <div style="padding: 5%;" class="invoice">
                    <h3>Your order Confirmed!</h3>
                    <span style="font-weight: bold; display: block; margin-top: 4%;">Hello,
                        {{ auth()->user()->name }}</span>
                    <span>Your order has been confirmed</span>
                    <div style="border-top: 1px solid #dee2e6; margin-top: 3%; margin-bottom: 3%;" class="payment">
                        <table style="width: 100%; border-collapse: collapse;" class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="padding: 2%;">
                                        <div style="padding: 2%;">
                                            <span style="display: block; color: #6c757d;">Order Date</span>
                                            <span>{{ $order->created_at }}</span>
                                        </div>
                                    </td>
                                    <td style="padding: 2%;">
                                        <div style="padding: 2%;">
                                            <span style="display: block; color: #6c757d;">Order No</span>
                                            <span>{{ $order->order_id }}</span>
                                        </div>
                                    </td>
                                    <td style="padding: 2%;">
                                        <div style="padding: 2%;">
                                            <span style="display: block; color: #6c757d;">Payment</span>
                                            <span><img
                                                    src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png"
                                                    width="20" /></span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product">
                        <table style="width: 100%; border-collapse: collapse;" class="table table-borderless">
                            <tbody>
                                @foreach ($order->products as $product)
                                    <tr>
                                        <td width="20%">
                                            <img src="https://gamebrio.store/products/images/{{ $product->pivot->image }}"
                                                width="90">
                                        </td>
                                        <td width="60%">
                                            <span style="font-weight: bold;">{{ $product->pivot->name }}</span>
                                            <div class="product-qty">
                                                <span
                                                    style="display: block;">Quantity:{{ $product->pivot->quantity }}</span>
                                            </div>
                                            <span>Get Your Accounts Or Keys:</span>
                                            @foreach ($accounts[$product->id] as $account)
                                                <li>{{ $account }}</li>
                                            @endforeach
                                        </td>
                                        <td width="20%">
                                            <div style="text-align: right;">
                                                <span style="font-weight: bold;">${{ $product->pivot->price }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table style="width: 100%; border-collapse: collapse;" class="table table-borderless">
                                <tbody class="totals">
                                    <tr style="border-top: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6;">
                                        <td style="padding: 2%;">
                                            <div style="text-align: left;">
                                                <span style="color: #6c757d;">Subtotal</span>
                                            </div>
                                        </td>
                                        <td style="padding: 2%;">
                                            <div style="text-align: right;">
                                                <span>${{ $order->products->sum(function ($product) {
                                                    return $product->pivot->quantity * $product->pivot->price;
                                                }) }}</span>
                                            </div>
                                        </td>
                                    </tr>


                                    @if (session()->has('discountAmount'))
                                        <tr style="border-top: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6;">
                                            <td style="padding: 2%;">
                                                <div style="padding: 2%;">
                                                    <span style="display: block; color: #6c757d;">Discount</span>
                                                </div>
                                            </td>

                                            <td style="padding: 2%;">
                                                <div style="text-align: right;">
                                                    <span>${{ session('discountAmount') }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr style="border-top: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6;">
                                        <td style="padding: 2%;">
                                            <div style="text-align: left;">
                                                <span style="font-weight: bold;">Subtotal</span>
                                            </div>
                                        </td>
                                        <td style="padding: 2%;">
                                            <div style="text-align: right;">
                                                <span
                                                    style="font-weight: bold;">${{ $order->products->sum(function ($product) {
                                                        return $product->pivot->quantity * $product->pivot->price - session('discountAmount');
                                                    }) }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- ... (other total-related rows) ... -->
                                    <tr style="border-top: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6;">
                                        <td style="padding: 2%; text-align: center;" colspan="2">
                                            <a href="https://gamebrio.store/my-orders" class="btn btn-primary">Go to My
                                                Orders</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="background-color: #eeeeeea8;" class="d-flex justify-content-between footer p-3">
                    <span style="font-size: 12px;">Need Help? visit our <a href="https://gamebrio.store/contact">help
                            center</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
