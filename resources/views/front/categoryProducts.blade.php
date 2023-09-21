
<x-front-layout>
<div class="sec-banner bg0 p-t-95 p-b-55">
    <div class="container">
        <div class="row">
            <section class="bg0 p-t-23 p-b-130">
                <div class="container">
                    <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">

                            @foreach ($products as $index => $product)
                                <x-product-card :product="$product" />
                            @endforeach


                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

</x-front-layout>
