<x-admin-layout>
    @section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Orders</a></li>
          <li class="breadcrumb-item active">Index</li>
        </ol>
      </div><!-- /.col -->
    @endsection
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Orders</h2>
            </div>

        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
            <th>change status</th>
            <th>options</th>

        </tr>
        @foreach ($orders as $order)
            <tr>

                <td>{{ $order->number }}</td>
                <td>{{ $order->address->first_name ?? '' }}{{ $order->address->lasst_name ?? '' }}</td>
                <td>{{ $order->address->phone_number ?? ' ' }}</td>
                <td>{{ $order->address->country ?? '' }}.''.{{ $order->address->city ?? '' }}
                    {{ $order->address->street_address ?? '' }}</td>
                <td id="{{ $order->id }}">{{ $order->status }} </td>
                <td><select name="status" data-id="{{ $order->id }}" class="status">
                        <option value=""><--status--></option>
                        <option value="pendding">pendding</option>
                        <option value="delivering">delivering</option>
                        <option value="processing">processing</option>
                        <option value="refunded">refunded</option>
                        <option value="canceled">canceled</option>

                    </select>
                </td>

                <td>



                    <a class="btn btn-primary sm" href="{{ route('admin.orders.show', $order->id) }}">Show</a>

                    <form style="display: inline-block" action="{{ route('admin.orders.destroy', $order->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>

                </td>

            </tr>
        @endforeach

    </table>
    <div class="col-4">
        {{ $orders->links() }}
    </div>

    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            const csrf_token = "{{ csrf_token() }}";
        </script>

        <script>
            $('.status').on('change', function(e) {

                let id = $(this).data('id');

                $.ajax({
                    url: "/orders/" + id,
                    method: "put",
                    data: {
                        status: $(this).val(),
                        _token: csrf_token
                    },
                    success: function(dataResult) {
                        dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode) {
                            window.location = "/orders";
                        } else {
                            alert("Internal Server Error");
                        }
                    }
                });
            });
        </script>
    @endpush

</x-admin-layout>
