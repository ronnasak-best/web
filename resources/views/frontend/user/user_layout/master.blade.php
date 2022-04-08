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
                <a href="{{route('myaccount.index')}}" class="sub-menu-item profile detail"> ที่อยู่จัดส่งสินค้า
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
    @yield('user-manage')
    </div>
</div
><script>
$('#input_province').ready(function() {
   //console.log("HELLO");
    showProvinces();
    //dataTable();
});

function showProvinces() {
    //PARAMETERS
    var url = "{{ url('/') }}/province";
    var callback = function(result) {
        $("#input_province").empty();
        for (var i = 0; i < result.length; i++) {
            $("#input_province").append(
                $('<option></option>')
                .attr("value", "" + result[i].province)
                .html("" + result[i].province)
            );
        }
        showAmphoes();
    };
    //CALL AJAX
    ajax(url, callback);
}


function showAmphoes() {
    //INPUT
    var province_code = $("#input_province").val();
    //PARAMETERS
    var url = "{{ url('/') }}/province/" + province_code + "/amphoe";
    var callback = function(result) {
        //console.log(result);
        $("#input_amphoe").empty();
        for (var i = 0; i < result.length; i++) {
            $("#input_amphoe").append(
                $('<option></option>')
                .attr("value", "" + result[i].amphoe)
                .html("" + result[i].amphoe)
            );
        }
        showDistricts();
    };
    //CALL AJAX
    ajax(url, callback);
}

function showDistricts() {
    //INPUT
    var province_code = $("#input_province").val();
    var amphoe_code = $("#input_amphoe").val();
    //PARAMETERS
    var url = "{{ url('/') }}/province/" + province_code + "/amphoe/" + amphoe_code + "/district";
    var callback = function(result) {
        //console.log(result);
        $("#input_district").empty();
        for (var i = 0; i < result.length; i++) {
            $("#input_district").append(
                $('<option></option>')
                .attr("value", "" + result[i].district)
                .html("" + result[i].district)
            );
        }
        showZipcode();
    };
    //CALL AJAX
    ajax(url, callback);
}

function showZipcode() {
    //INPUT
    var province_code = $("#input_province").val();
    var amphoe_code = $("#input_amphoe").val();
    var district_code = $("#input_district").val();
    //PARAMETERS
    var url = "{{ url('/') }}/province/" + province_code + "/amphoe/" + amphoe_code + "/district/" + district_code;
    var callback = function(result) {
        //console.log(result);
        for (var i = 0; i < result.length; i++) {
            $("#input_zipcode").val(result[i].zipcode);
        }
    };
    //CALL AJAX
    ajax(url, callback);
}

function ajax(url, callback) {
    $.ajax({
            "url": url,
            "type": "GET",
            "dataType": "json",
        })
        .done(callback); //END AJAX
}
</script>
@endsection
