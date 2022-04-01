@extends('frontend.layouts.master')
@section('title', 'List Categories')
@section('content')
<div class="row ">
    <div class="col-md-7 col-pad-0">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    ที่อยู่จัดส่ง
                    <div class="ml-auto">
                        <a class="pr-2" href="{{ route('myaccount.index') }}"> เพิ่มที่อยู่ </a>
                        <a class="" onclick="addr_select()">เปลื่ยนที่อยู่</a>
                    </div>
                </div>
            </div>
            <form class="forms-sample" method="post" action="{{ url('payment') }}">
                {{ csrf_field() }}
                <div class="card-body">
                   
                    <div id="addr_selects">
                        @foreach ($addr_default as $add_d)
                        <div class="address_box" style="display:block; ">
                            <div class="row">
                                <div class=" row col-sm-5 ml-2">
                                    <input class="address-item mr-3 mt-2" type="radio" name="address"
                                        value="{{ $add_d['id'] }} " checked>
                                    <div style=" font-weight: bold;">
                                        {{ $add_d['name'] }} {{ $add_d['surname'] }}<br>
                                        {{ $add_d['mobile'] }}
                                    </div>

                                </div>
                                <div class="AddressText" >
                                    <p>{{ $add_d['address'] }} |
                                        {{ $add_d['sub_district'] }},{{ $add_d['district'] }},{{ $add_d['province'] }},{{ $add_d['pincode'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach ($addr as $add)
                        <div class="address_box mt-4" style="display: none; ">
                            <div class="row">
                                <div class=" row col-sm-5 ml-2">
                                    <input class="address-item mr-3 mt-2" type="radio" name="address"
                                        value="{{ $add['id'] }} ">
                                    <div style=" font-weight: bold;">
                                        {{ $add['name'] }} {{ $add['surname'] }}<br>
                                        {{ $add['mobile'] }}
                                    </div>

                                </div>
                                <div class="AddressText" >
                                    <p>{{ $add['address'] }} |
                                        {{ $add['sub_district'] }},{{ $add['district'] }},{{ $add['province'] }},{{ $add['pincode'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="sub_change float-right"  style="display: none;">
                            <button type="button" onclick="addr_change()" name="" id=""
                                class="btn btn-primary">บันทึก</button>
                        </div><br>
                    </div>
                </div>
        </div>

        <div class="card mt-5 ">
            <div class="card-header">
                <div class="row">
                    ช่องทางการชำระเงิน
                    <div class="ml-auto">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class=" row col-6">
                        <div class="row_box">
                            <img style="border-radius: 30%;" src="{{ asset('/images/ktb.jpg') }}" width="140"
                                height="140" alt=""><br>
                            <label style="padding-top:15px">Krung Thai Bank</label>
                        </div>

                    </div>
                    <div class=" row col-6">
                        <div class="row_box">
                            <img style=" border-radius: 30%;" src="{{ asset('/images/scb.jpg') }}" width="140"
                                height="140" alt=""><br>
                            <label style="padding-top:15px">Siam Commercial Bank</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

                        <tbody>
                            @foreach (Cart::content() as $row)
                            <tr>
                                <td style="width:500px; padding-bottom:20px;">
                                    <img src="{{ url('/') }}/products/{{ $row->options->image }}"
                                        style="width: 50px; height:75px" class="rounded">
                                    <div class="product-detail">
                                        <spam>{{ $row->name }}</spam><br>
                                        <a>SIZE : {{ $row->options->size }}</a><br>
                                        <a>FROM : {{ $row->options->startDate }}</a><br>
                                        <a>TO : {{ $row->options->endDate }}</a>
                                    </div>
                                </td>

                                <td style="text-align: center; vertical-align: middle;">{{ $row->subtotal }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <hr style="border-top: 2px solid #eee;">
                <div class="">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width:500px; padding-bottom:20px;">ราคาค่าเช่า</td>
                                <td style="text-align: center; vertical-align: middle;">{{ Cart::Subtotal() }}฿</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <hr style="border-top: 2px solid #eee;">
                <div class="">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width:500px; padding-bottom:20px;">ค่ามัดจำ</td>
                                <td style="text-align: center; vertical-align: middle;">{{ Cart::Subtotal() }}฿</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <hr style="border-top: 2px solid #eee;">
                <div class="">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width:500px; padding-bottom:20px;">Total</td>
                                <td style="text-align: center; vertical-align: middle;">
                                    {{ Cart::Subtotal() * 2.0 }}฿
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <input class=" float-right" type="submit" name="" value="Payment">
        </form>
    </div>
</div>

<script>
function addr_select() {
    let addr = document.querySelector("#addr_selects");
    addr.getElementsByClassName("sub_change")[0].style.display = "block";
    for (let i = 0; i < addr.children.length; i++) {
        addr.getElementsByClassName("address_box")[i].style.display = "block";
    }
}

function addr_change() {
    $('.address-item').each(function(i) {
        if ($(this).is(":checked")) {
            $('.address_box').css('display', 'none') &&
                $(this).closest(".address_box").css('display', 'block')
                && $('.sub_change').css('display', 'none');
        }
       
        // if($(this).find('input:checked').length > 0){
        //   console.log("dsrfs");
        //   // 
        // }
    })
}

$(document).ready(function() {
    $('.select_pick').click(function() {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
    $(".address").click(function() {
        if ($(this).is(":checked")) {
            $(".address_box").css({
                    "background-color": "#f7f7f7"
                }) &&
                $(this).closest(".address_box").css({
                    "background-color": "rgb(233, 233, 233)"
                });
        }
    });
});
</script>
@endsection