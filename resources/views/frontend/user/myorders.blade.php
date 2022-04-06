@extends('frontend.layouts.master')
@section('title','List Categories')
@section('content')
<hr>
<div class="row">
    <div class="col-sm-3">
        <div class="sm-up">
            <div class="menu-account-welcome text">
                ยินดีต้อนรับ, &nbsp; <strong>ronnasak_best@hotmail.com </strong>
            </div>
            <div class="menu-account-item profile">
                <div class="menu-card">
                    <img src="https://www.mercular.com/img/icons/menu/user-hover.svg" class="menu-icon-account">
                    <span>
                        บัญชีของฉัน</span>
                    <div id="moreProfile">
                        <img id="arrowCollapse" class="toogle-up open"
                            src="https://www.mercular.com/img/icons/menu/link-up.svg">
                    </div>
                </div>
            </div>
            <div class="sub-menu-account profile" id="profileDetail">
                <a href="{{route('myaccount.index')}}" class="sub-menu-item profile detail">
                    ข้อมูลส่วนตัว </a>
                <a href="{{route('myaccount.index')}}"
                     class="sub-menu-item profile detail"> ที่อยู่จัดส่งสินค้า 
                </a>
            </div>
            <a href="{{ route('orders.index') }}">
                <div class="menu-account-item orderlist-menu">
                    <img src="https://www.mercular.com/img/icons/page.svg" class="menu-icon-account">
                    <span>รายการคำสั่งซื้อ</span>
                </div>
            </a>

            <a>
                <div class="menu-account-item last-child" onclick="leftMenuLogout()">
                    <img src="https://www.mercular.com/img/icons/logout.svg" class="menu-icon-account"> <span>
                        ออกจากระบบ</span>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-9">
        @foreach($orders as $order)
        <div class="card p-2  mb-4">
            <div class="card-order-header">
                <div class="order-header">
                    <spam class="title-text">รายการเช่า <a
                            href="{{action('OrderController@show',$order['id'])}}">#{{$order['id']}}</a></spam>
                </div>
                <div>
                    <span class="btn-status status-waiting"> รอการชำระเงิน</span>
                </div>
            </div>
            <div class="card-order-header">
                <div>
                    <div class="text-858585">วันที่เช่า</div>
                    <did class="text-black font-weight-bold">{{$order['startDate']}}</did>
                    <div class="text-858585 mt-2">วันที่คืนชุด</div>
                    <div class="text-black font-weight-bold">{{$order['endDate']}}</div>
                </div>
                <div style="width: 300px;">
                    <div class="d-flex-between">
                        <div>
                            <div class="font-weight-bold">ยอดสุทธิ</div>
                            <div style="font-size: 12px;">(รวมภาษีมูลค่าเพิ่ม)</div>
                        </div>
                        <div>
                            <div class="font-weight-bold" style="color: #0066DD;font-size: 22px;">
                                ฿{{$order['billing_total']}}
                            </div>
                        </div>
                    </div>
                    <div class="button-attached"><button type="button"
                            class="btn btn-primary button primary btn-block mt-3">แนบหลักฐานการโอนเงิน</button>
                    </div>
                </div>
            </div>
            <div class="bg-white order-list">
                @foreach($order->ordersproduct as $ordersproduct)
                <div class="d-flex-between" style=" padding: 15px;">
                    <div class="d-flex-between">
                        <img src="{{url('/')}}/products/{{$ordersproduct->product['image']}}"
                            style="width: 100px; height:110px" class="rounded">
                        <div class="p-3  item-detail" style="width: 400px;">
                            <div class="font-weight-bold">{{$ordersproduct->product['p_name']}}</div>
                            <div style="font-size: 14px;" class="order-item-sub text-858585">SIZE :
                                {{$ordersproduct->size}}</div>
                        </div>
                    </div>
                    <div>
                        <div class="font-weight-bold">฿{{$ordersproduct->product->price}}</div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection