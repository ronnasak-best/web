@extends('frontend.layouts.master')
@section('title','List Categories')
@section('content')
<div class="row ">
    <div class="col-md-7 col-pad-0">
      <div class="card">
        <div class ="card-header">
          <div class ="row">
            ที่อยู่จัดส่ง
            <div class = "ml-auto">
              <a class ="pr-2" href="{{route('myaccount.index')}}"> เพิ่มที่อยู่ </a>
            </div>
          </div>
        </div>
        <div class="card-body">
             @foreach ($addr_default as $add_d)
              <div  class="address_box"style="border-bottom: 1px solid #ddd; display: flex; padding: 10px 10px 10px; background-color: rgb(233, 233, 233);">
                <div class="radio">
                    <input class="address" type="radio" name="address" value="{{$add_d['id']}} "checked>
                </div>
                <div class="AddressText" style="margin-left:20px;">
                  <h5>{{$add_d['name']}} {{$add_d['surname']}}</h5>
                  <p>{{$add_d['address']}} | {{$add_d['sub_district']}},{{$add_d['district']}},{{$add_d['province']}},{{$add_d['pincode']}}</p>
                  <p>Mobile : {{$add_d['mobile']}}</p>
                </div>
              </div>
              @endforeach
        </div>
      </div>
      <div class="card mt-5 ">
        <div class ="card-header">
          <div class ="row">
            ช่องทางการชำระเงิน
            <div class = "ml-auto">
            </div>
          </div>
        </div>
        <div class="card-body">
        <div class="row mb-2">
              <div class=" row col-6">   
                <div class="row_box">
                  <img style="border-radius: 30%;"src="{{ asset('/images/ktb.jpg') }}" width="140" height="140"alt=""><br>
                  <label style="padding-top:15px">Krung Thai Bank</label>
                </div>

              </div>
              <div class=" row col-6">          
                <div class="row_box">
                  <img style=" border-radius: 30%;" src="{{ asset('/images/scb.jpg') }}" width="140" height="140"alt=""><br>
                  <label style="padding-top:15px">Siam Commercial Bank</label>
                </div>
              </div>
            </div>
        </div>
      </div>

        <!-- <form class="forms-sample" method="post" action="{{url('payment')}}" >
          {{csrf_field()}}
          <div class="card">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <div class="row mb-2">
              <div class=" row col-6">
                <div class="row_box ">
                  <input type="radio" class="select_pick" name="delivery_op" value="pickup">
                </div>
                <div class="row_box">
                      <img src="{{ asset('/images/pickup.png') }}" width="100" height="110"alt=""><br>
                      <label style="padding-top:15px">Self-Pickup</label>
                </div>

              </div>
              <div class=" row col-6">
                <div class="row_box">
                    <input type="radio" class="select_pick" name="delivery_op" value="delivery">
                </div>
                <div class="row_box">
                  <img src="{{ asset('/images/delivery.png') }}" width="100" height="110"alt=""><br>
                  <label style="padding-top:15px">Delivery service</label>
                </div>

              </div>
            </div>

            <div class="pickup box" style="display: none";>
              <hr style="border-top: 2px solid #eee;">
                <p>กรุณาเข้ามารับที่ร้านก่อนถึงเวลาวันจองของวันแรก 2 หรือ 1 วัน ( แจ้งรหัสออเดอร์กับพนักงานได้เลย ) <br>
                  เมื่อลูกค้ารับที่ร้าน กรุณาส่งคืนชุดด้วยตนเองที่ร้าน
                  </p>
            </div>
            <div class="delivery box" style="display: none;">
              <hr style="border-top: 2px solid #eee;">
              <h3>Address</h3> <a class=" float-right" href="{{route('myaccount.index')}}"> add</a>
              <hr style="border-top: 1px solid #eee;">
                @foreach ($addr_default as $add_d)
              <div  class="address_box"style="border-bottom: 1px solid #ddd; display: flex; padding: 10px 10px 10px; background-color: rgb(233, 233, 233);">
                <div class="radio">
                    <input class="address" type="radio" name="address" value="{{$add_d['id']}} "checked>
                </div>
                <div class="AddressText" style="margin-left:20px;">
                  <h5>{{$add_d['name']}} {{$add_d['surname']}}</h5>
                  <p>{{$add_d['address']}} | {{$add_d['sub_district']}},{{$add_d['district']}},{{$add_d['province']}},{{$add_d['pincode']}}</p>
                  <p>Mobile : {{$add_d['mobile']}}</p>
                </div>
              </div>

              @endforeach
              @foreach ($addr as $add)
              <div class="address_box" style=" border-bottom: 1px solid #ddd; display: flex; padding: 10px 10px 10px; background-color: #f7f7f7;">
                <div class="radio">
                    <input class="address" type="radio" name="address" value="{{$add['id']}}">
                </div>
                <div class="AddressText" style="margin-left:20px;">
                  <h5>{{$add['name']}} {{$add['surname']}}</h5>
                  <p>{{$add['address']}} | {{$add['sub_district']}},{{$add['district']}},{{$add['province']}},{{$add['pincode']}}</p>
                  <p>Mobile : {{$add['mobile']}}</p>
                </div>
              </div>
              @endforeach
          </div>
          </div>
        </div>
        <br>
        <input class=" float-right"type="submit" name="" value="Payment">
        </form> -->
    </div>
    <div class="col-md-5">
        <div class="card sm-6">
        <div class="card-header">
          Ordering information
        </div>
        <div class="card-body ">
            <div>
              <table>
               	<thead>
                   	<tr>
                        <th></th>
                       	<th style="text-align: center; vertical-align: middle; "></th>
                   	</tr>
               	</thead>

               	<tbody >
               		@foreach(Cart::content() as $row)
                   		<tr >
                       		<td style="width:500px; padding-bottom:20px;">
                            <img src="{{url('/')}}/products/{{$row->options->image}}" style="width: 50px; height:75px" class="rounded">
                            <div class="product-detail">
                              <spam>{{$row->name}}</spam><br>
                              <a>SIZE : {{$row->options->size}}</a><br>
                              <a>FROM : {{$row->options->startDate}}</a><br>
                              <a>TO : {{$row->options->endDate}}</a>
                            </div>
                          </td>

                       		<td style="text-align: center; vertical-align: middle;">{{$row->subtotal}}</td>
                   		</tr>
            	   	@endforeach

               	</tbody>
              </table>
            </div>
            <hr style="border-top: 2px solid #eee;">
            <div class="" >
              <table>
               	<tbody >
                   		<tr >
                       		<td style="width:500px; padding-bottom:20px;">ราคาค่าเช่า</td>
                       		<td style="text-align: center; vertical-align: middle;">{{Cart::Subtotal()}}฿</td>
                   		</tr>

               	</tbody>
              </table>
            </div><hr style="border-top: 2px solid #eee;">
            <div class="" >
              <table>
               	<tbody >
                   		<tr >
                       		<td style="width:500px; padding-bottom:20px;">ค่ามัดจำ</td>
                       		<td style="text-align: center; vertical-align: middle;">{{Cart::Subtotal()}}฿</td>
                   		</tr>

               	</tbody>
              </table>
            </div>
            <hr style="border-top: 2px solid #eee;">
            <div class="" >
              <table>
               	<tbody >
                   		<tr >
                       		<td style="width:500px; padding-bottom:20px;">Total</td>
                       		<td style="text-align: center; vertical-align: middle;">{{Cart::Subtotal() *2.00}}฿</td>
                   		</tr>

               	</tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('.select_pick').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
    $(".address").click(function(){
      if ($(this).is(":checked")){
      $(".address_box").css({"background-color":"#f7f7f7"})
      && $(this).closest(".address_box").css({"background-color":"rgb(233, 233, 233)"});
      }
   });
});
</script>
@endsection
