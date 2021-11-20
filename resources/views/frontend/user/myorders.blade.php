@extends('frontend.layouts.master')
@section('title','List Categories')
@section('content')

        <table class="table table-bordered tablecart" >
         	<thead class="thead-primary">
             	<tr>
                  <th style="text-align: center; vertical-align: middle;">Order</th>
                  <th style="text-align: center; vertical-align: middle;">Date</th>
                 	<th style="text-align: center; vertical-align: middle;">TOTAL</th>
                  <th style="text-align: center; vertical-align: middle;">Uplode Slip</th>

             	</tr>
         	</thead>

         	<tbody >
         		@foreach($orders as $order)
             		<tr>
                 		<td> <a href="{{action('OrderController@show',$order['id'])}}">{{$order['id']}}</a> </td>
                    <td style="text-align: center; vertical-align: middle;"> {{$order['created_at']}}</td>
                    <td style="text-align: center; vertical-align: middle;"> {{$order['billing_total']}}</td>
                 		<td style="text-align: center; vertical-align: middle;">
                      @if($order['status']==0)
                        cancel
                      @else
                        @if($order['image'] == false)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UploadModal" data-whatever="{{$order['id']}}">
                            Upload
                        </button>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="UploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title" id="UploadModalLabel"></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form  method="post" action="{{ action('OrderController@update',$order['id'])}}" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                  <input type="hidden" name="_method" value="PATCH"/>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Add file:</label>
                                    <div class="">
                                      <input type="file" name="image" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary sm-8">upload</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        @else
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ShowModal" data-whatever="{{$order['id']}}" data-img="{{$order->image}}">
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
                                <img src="" style="width: 80%; height:80%" alt="" >
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                      @endif
                  </td>
             		</tr>

      	   	@endforeach
         	</tbody>
        </table>

@endsection
