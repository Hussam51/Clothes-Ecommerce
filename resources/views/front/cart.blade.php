<x-front-layout>

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Subtotal</th>
                                    <th class="column-5"></th>
                                </tr>
                                @foreach ($cart->get() as $item)
                                    <tr class="table_row " id="{{ $item->id }}">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="{{ Storage::url($item->product->image) }}" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2">{{ $item->quantity }}</td>
                                        <td class="column-3">{{ $item->product->price }}</td>
                                        <td class="column-4">
                                            <input class="mtext-104 cl3 txt-center item-quantity" type="number"
                                                name="num-product1" data-id="{{ $item->id }}"
                                                value="{{ old('quantity', $item->quantity) }}">
                                            {{-- <div class="wrap-num-product flex-w m-l-auto m-r-0" >
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product item-quantity" type="number"
                                                    name="num-product1" data-id="{{$item->id}}" value="{{ old('quantity', $item->quantity) }}">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div> --}}
                                        </td>

                                        <td class="column-5">{{ $item->product->price * $item->quantity }}</td>
                                        <td class="column-6">
                                            <a class="item-remove" data-id="{{$item->id}}" href="#"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" placeholder="Coupon Code">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    {{ $cart->total() }}
                                </span>
                            </div>
                        </div>

                        {{-- <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    There are no shipping methods available. Please double check your address, or
                                    contact us if you need any help.
                                </p>

                                <div class="p-t-15">
                                    <span class="stext-112 cl8">
                                        Calculate Shipping
                                    </span>

                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="time">
                                            <option>Select a country...</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state"
                                            placeholder="State /  country">
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                            name="postcode" placeholder="Postcode / Zip">
                                    </div>

                                    <div class="flex-w">
                                        <div
                                            class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                            Update Totals
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    {{ $cart->total() }}
                                </span>
                            </div>
                        </div>

                        <a href="{{route('checkout')}}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('scripts')
        <script>
            const csrf_token = "{{ csrf_token() }}";
        </script>

        <script src="{{ asset('cart.js') }}"></script>
    @endpush

</x-front-layout>
