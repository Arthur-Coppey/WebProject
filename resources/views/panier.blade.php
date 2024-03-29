<title>BDE CESI Bordeaux : Panier</title>

@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')


@endsection('navbar')
@section('main')

@guest
@if (Route::has('register'))

    @include('layouts/partials/_notconnected')

@endif
{{-- connecter --}}
@else

<table class="list-articles" width="60%">
    @php
        $currentID = Auth::user()->id;
        $nbrFor = (App\Basket::where('user_id', $currentID)->get());

    @endphp


<thead class="categories-panier">
    <th scope="col" class="txt-cate cate-photo">Photo</th>
    <th scope="col" class="txt-cate on-right">Nom</th>
    <th scope="col" class="txt-cate on-right">Prix Unitaire</th>
    <th scope="col" class="txt-cate on-right">Nombre d'articles</th>
    <th scope="col" class="txt-cate on-right">Prix total</th>
</thead>

    @foreach($nbrFor as $k=>$value)

        <tbody>
            <tr class="article">
                <td class="icon-article-cell">
                    <img class="article-icon" src="{{App\Product::find($value->product_id)->pictures->first()->URI ?? ''}}">
                </td>
                <td class="nom-article on-right">
                    <a class="text-articles-panier text-nom">
                        @php
                            $currentID = Auth::user()->id;
                            $product_id = $value->product_id;
                            $product_name = (App\Product::where('id', $product_id)->first()->label);
                            echo $product_name;
                        @endphp
                    </a>
                </td>
                <td class="prix-unitaire on-right">
                    @php
                        $product_price = (App\Product::where('id', $product_id)->first())->price;
                        echo ($product_price.'€');
                    @endphp
                </td>
                <td class="quantite-article on-right">
                    @php
                        $product_amount = $value->amount;
                        echo $product_amount;
                        $totalArticle[$k] = $product_amount;
                    @endphp
                </td>
                <td class="prix-total-article on-right">
                    @php
                        $totalProduct = $product_amount*$product_price;
                        echo ($totalProduct);
                        $totalToPay[$k] = $totalProduct;
                    @endphp
                </td>
                <td>
                    <form method="POST" action="{{ 'deleteBasketItem' }}">
                        @csrf
                        <input type="text" name="id_to_delete" value = {{$product_id}} hidden>
                        <button type="submit" id="submitDel" style="color: #ffffff; border: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>

        </tbody>
    @endforeach
</table>

<table class="totaux" width="60%">
    <tbody>
        <tr class="infos-panier">
            <td class="padding-total" width="60%">
            </td>
            <td class="txt-totaux total on-right">
                <a class="text-articles-panier text-total">TOTAL :</a>
            </td>
            <td class="txt-totaux total-article on-right" width="9%">
                <a class="text-articles-panier nb-total-article">
                    @php
                        $addTotalProduct = 0;
                        for($i=0;$i< count($nbrFor);$i++){
                            $addTotalProduct = $addTotalProduct + $totalArticle[$i];
                        }
                        echo $addTotalProduct;

                    @endphp
                </a>
            </td>
            <td class="txt-totaux total-article on-right" width="16%">
                <a class="text-articles-panier prix-total-panier">
                    @php
                        $addPay = 0;
                        for($i=0;$i< count($nbrFor);$i++){
                            $addPay = $addPay + $totalToPay[$i];
                        }
                        echo $addPay.'€';

                    @endphp
                </a>
            </td>
        </tr>
    </tbody>
</table>

<form method="POST" action="{{ 'addOrder' }}">
    @csrf
    <div class="payer">
        <div class="payer-box">
            <input type="text" name="price" value = {{$addPay}} hidden>

            <button type="submit" id="submitBut" style="color: #5c88da; border: none;">
                <a class="payer-text" style="text-decoration: none; color: white;">
                    PAYER
                </a>
            </button>
        </div>
        <div class="paypal-paiment">
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: {{$addPay}}
                            }
                        }]
                    });
                    },
                    onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        alert('Transaction completed by ' + details.payer.name.given_name);
                    });
                    }
                }).render('#paypal-button-container');
                //This function displays Smart Payment Buttons on your web page.
            </script>

            <script src="https://www.paypal.com/sdk/js?client-id=AevGLXweHKzzybNQzKGfEJoTca0O3LBI0T7JdKqSEbX8nvzt3acVk-wRNKYTbm5xijHvW6whCIhBK7bl"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.</script>

            <div id="paypal-button-container"></div>

            <script>
                paypal.Buttons().render('#paypal-button-container');
                // This function displays Smart Payment Buttons on your web page.
            </script>
        </div>
    </div>
</form>
    {{-- <input type="text" name="product_id" value = {{$product_id}} hidden> --}}


              {{-- <input type="text" name="amount" placeholder="combien d'article"> --}}
              {{-- <button type="submit" id="submitBut" class="btn btn-primary btn-block">Ajouter au panier</button> --}}
              {{-- <input type="text" name="product_id" value = {{$product_id}} hidden> --}}



@endguest


@endsection('main')
