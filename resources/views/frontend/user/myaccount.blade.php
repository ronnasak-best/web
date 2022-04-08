@extends('frontend.user.user_layout.master')
@section('title','List Categories')
@section('user-manage')
<div class="card">
    <div class="title-head">
        <div class="account-icon">
            <img class="sm-up" src="https://www.mercular.com/img/icons/location-icon-gray.svg">
        </div>
        <div class="title-text">
            <h2> ที่อยู่จัดส่งสินค้า </h2>
            <span> สามารถแก้ไขที่อยู่ของคุณได้ </span>
        </div>
        <div class="header-action" style="text-align: right;width: 100%;">
            <button onclick="resetFormValue()" class="btn btn-primary button primary " data-toggle="modal"
                data-target="#address-form">เพิ่มที่อยู่ </button>
        </div>

    </div>
    <div class="shipping-address">
        <div class="name-phone">
            {{ $address_default[0]->name }} {{$address_default[0]->surname}} <br>
            {{$address_default[0]->mobile}}
        </div>
        <div class="address-info">
            {{$address_default[0]->address}} {{$address_default[0]->district}} {{$address_default[0]->sub_district}}
            {{$address_default[0]->province}} {{$address_default[0]->pincode}}
            <span class="default-shipping"> [ค่าเริ่มต้น] </span>
        </div>
        <div class="edit">
            <button onclick="setFormValueForEdit(119819)" class="button">
                แก้ไข
            </button>
            <button onclick="handleClickDeletAddress(119819)" disabled="" class="button">
                ลบ
            </button>
        </div>
    </div>
    @foreach($address as $addr)
    <div class="shipping-address">
        <div class="name-phone">
            {{$addr['name']}} {{$addr['surname']}} <br>
            {{$addr['mobile']}}
        </div>
        <div class="address-info">
            {{$addr['address']}} {{$addr['district']}} {{$addr['sub_district']}} {{$addr['province']}}
            {{$addr['pincode']}}
        </div>
        <div class="edit">
            <button onclick="setFormValueForEdit(119819)" class="button">
                แก้ไข
            </button>
            <button onclick="handleClickDeletAddress(119819)"="" class="button">
                ลบ
            </button>
        </div>
    </div>
    @endforeach
</div>
<!-- Modal -->
<div class="modal fade" id="address-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px;">
        <div class="modal-content" style="padding: 0 20px;">
            <div class="modal-header">
                <div class="modal-title">
                    <img src="https://www.mercular.com/img/icons/home-icon.svg" alt="">
                    <div>
                        <h1 class="shippingTitle">เพิ่มที่อยู่ใหม่</h1>
                        <span>ที่อยู่จัดส่งสินค้า</span>
                    </div>
                </div>
                <button type="button" class="close sm-up" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body address-form-modal pt-0 pb-0" style="background-color: white; border-radius: 8px;">
                <form name="shipping-address" onsubmit="event.preventDefault();">
                    <div class="row">
                        <div class="col col-12 col-md-6">
                            <div class="input-item">
                                <label class="label" for="full-name">ชื่อ-นามสกุล</label>
                                <input onblur="validateRequired(this)" error-for="address_name" type="text"
                                    name="address_name" placeholder="กรอกชื่อ-นามสกุล" id="full-name" class="error">
                            </div>
                            <div error-text-for="address_name" class="error-message error">จำเป็นต้องกรอกข้อมูล</div>
                        </div>
                        <div class="col col-12 col-md-6">
                            <div class="input-item">
                                <label class="label" for="phone-number">หมายเลขโทรศัพท์</label>
                                <input onblur="falidatePhoneNumber(this)" error-for="phone_number" type="number"
                                    name="phone_number" placeholder="กรอกหมายเลขโทรศัพท์" id="phone-number" class="">
                            </div>
                            <div error-text-for="phone_number" class="error-message">จำเป็นต้องกรอกข้อมูล</div>
                        </div>
                        <div class="col col-12 col-md-12">
                            <div class="input-item">
                                <label class="label" for="address">ที่อยู่</label>
                                <textarea rows="4" error-for="address" type="text" name="address"
                                    placeholder="กรอกบ้านเลขที่, หมู่, ซอย, อาคาร, ถนน และจุดสังเกตุ (ถ้ามี)"
                                    id="address"></textarea>
                            </div>
                            <div error-text-for="address" class="error-message">จำเป็นต้องกรอกข้อมูล</div>
                        </div>
                        <div class="col col-12 col-md-6">
                            <div class="input-item">
                                <label class="label">จังหวัด</label>
                                <select class="input" name="province" id="input_province" onchange="showAmphoes()">
                                    <option value="">กรุณาเลือกจังหวัด</option>
                                </select>
                                <div error-text-for="province_id" class="error-message">จำเป็นต้องกรอกข้อมูล</div>
                            </div>
                        </div>
                        <div class="col col-12 col-md-6">
                            <div class="input-item">
                                <label class="label">อำเภอ/เขต</label>
                                <select class="input" name="district" id="input_amphoe" onchange="showDistricts()">
                                    <option value="">กรุณาเลือกอำเภอ</option>
                                </select>
                                <div error-text-for="province_id" class="error-message">จำเป็นต้องกรอกข้อมูล</div>
                            </div>
                        </div>
                        <div class="col col-12 col-md-6">
                            <div class="input-item">
                                <label class="label">ตำบล/แขวง</label>
                                <select class="input" name="sub_district" id="input_district" onchange="showZipcode()">
                                    <option value="">กรุณาเลือกตำบล</option>
                                </select>
                                <div error-text-for="tambon_id" class="error-message">จำเป็นต้องกรอกข้อมูล</div>
                            </div>
                        </div>
                        <div class="col col-12 col-md-6">
                            <div class="input-item">
                                <label class="label">รหัสไปรษณีย์</label>
                                <input id="input_zipcode" type="number" name="pincode" class="form-control" required="">
                                <div error-text-for="postcode" class="error-message">จำเป็นต้องกรอกข้อมูล</div>
                            </div>
                        </div>
                        <div class="col col-12 col-md-6">
                            <div class="form-check form-check-inline " style="margin: 20px 0">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">ตั้งค่าเริ่มต้น</label>
                            </div>
                        </div>
                    </div><!-- end row -->
                
            </div>
            <div class="modal-footer ">
                <button onclick="$('#button-delete-shipping-address').hide()" type="button"
                    class="btn btn-default button default" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" onclick="handleFormSubmit()"
                    class="btn btn-primary button primary">บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--End Modal -->




<script>
var msg = '{{Session::get('
message ')}}';
var exist = '{{Session::has('
message ')}}';
if (exist) {
    alert(msg);
}
</script>
@endsection