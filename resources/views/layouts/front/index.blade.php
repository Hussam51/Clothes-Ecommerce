<!DOCTYPE html>
<html lang="en">
@include('layouts.front.head')

<body class="animsition">

    <!-- Header -->

    @include('layouts.front.header')

    <!-- Sidebar -->
    @include('layouts.front.sidebar')


    <!-- Cart -->
  <x-cart-menu/>




    <!-- Slider -->
   @include('layouts.front.slider')


    <!-- Banner -->
    <div class="sec-banner bg0 p-t-95 p-b-55">
        <div class="container">

                {{$slot}}

        </div>
    </div>





    <!-- Footer -->
    @include('layouts.front.footer')


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->




    @include('layouts.front.script')
    @stack('scripts')
    {{-- <script>
        $('#product_card').on('show.bs.modal',function(event){
          var button=$(event.relatedTarget)
          var id=button.data('id')
          var product=button.data('product_name')
          var image=button.data('image')
          var modal=$(this)
          modal.find('.modal-body #id').val(id)
          modal.find('.modal-body #product_name').val(product)
        //   modal.find('.modal-body #description').val(im)
        })
          </script> --}}
</body>

</html>
