@extends('backend.layouts.master')
@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-library-books"></i>
    </span> Orders </h3>
    <nav aria-label="breadcrumb">
        </nav>
</div>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table "id="dynamic-row">
        <thead>
          <tr>
            <th style="text-align: center; vertical-align: middle;">Order</th>
            <th style="text-align: center; vertical-align: middle;">Date</th>
            <th style="text-align: center; vertical-align: middle;">Uplode Slip</th>
            <th style="text-align: center; vertical-align: middle;">Subtotal</th>
            <th style="text-align: center; vertical-align: middle;">delivery op</th>
            <th style="text-align: center; vertical-align: middle;">status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
              <td style="text-align: center; vertical-align: middle;" > <a href="{{action('BackEndOrderController@show',$order['id'])}}">{{$order['id']}}</a> </td>
              <td style="text-align: center; vertical-align: middle;">{{$order['created_at']}}</td>
              <td style="text-align: center; vertical-align: middle;">

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ShowModal" data-whatever="{{$order['id']}}" data-img ="{{$order['image']}}">
                    View file
                </button>
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="ShowModal" tabindex="-1" role="dialog" aria-labelledby="ShowModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h6 class="modal-title" id="ShowModalLabel"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <img class="img" src="{{url('/')}}/slip/{{$order['image']}}" alt="">
                      </div>
                    </div>
                  </div>
                </div>

            </td>

              <td style="text-align: center; vertical-align: middle;"> {{$order['billing_total']}}</td>
              <td style="text-align: center; vertical-align: middle;">{{$order['delivery_op']}}</td>
              <td style="text-align: center; vertical-align: middle;">
                @if($order['image']== true )
                    @if($order['status'] == 1)
                      pending
                    @elseif($order['status'] == 2)
                      success
                    @endif
                @else
                    @if($order['status'] == 0)
                      Order canceled
                    @else
                      <a class=" btn btn-danger btn-sm cancel-confirm" href="orderss/cancel/{{$order['id']}}">Cancel</a>
                    @endif
                @endif
               </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<script >

    $('.cancel-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
          title: "Are you sure?",
          text: "Your will cancel order :: {{$order['id']}}",
          buttons: true,
          dangerMode: true,
        }).then(function(value) {
            if (value) {
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
                window.location.href = url;
            } else {
              swal("Your imaginary file is safe!");
            }
        });
      });
</script>
@endsection
