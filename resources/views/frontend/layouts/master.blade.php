<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('backend/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('easyzoom/css/easyzoom.css')}}" />

    <!-- datepicker-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Styles -->
    <style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    a {
        color: #1B1B1B;
    }

    .title-text>a {
        color: #dc81b3;
    }

    a:hover {
        text-decoration: none;
    }

    .full-height {
        height: 40vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        display: inline-block;
    }

    .size>a2 {
        color: #636b6f;
        padding: 0 25px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: underline;
        text-transform: uppercase;


    }

    .labels>label,
    h6 {
        color: #636b6f;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        display: inline-block;
    }

    .links>#a1 {
        color: #636b6f;
        padding: 2px 0px 0px 20px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        display: block;

    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .control-label {
        padding-top: 7px;
        margin-bottom: 0;
        text-align: right;
    }

    @media (min-width: 992px) {
        .dropdown-menu .dropdown-toggle:after {
            border-top: .3em solid transparent;
            border-right: 0;
            border-bottom: .3em solid transparent;
            border-left: .3em solid;
        }
    }

    .dropdown-menu .dropdown-menu {
        margin-left: 0;
        margin-right: 0;
    }

    .dropdown-menu li {
        position: relative;
        color: #636b6f;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .nav-item .submenu {
        display: none;
        position: absolute;
        left: 100%;
        top: -7px;
    }

    .nav-item .submenu-left {
        right: 100%;
        left: auto;
    }

    .dropdown-menu>li:hover {
        background-color: #f1f1f1
    }

    .dropdown-menu>li:hover>.submenu {
        display: block;
    }

    .row_box {
        display: block;
        width: 100%;
        position: relative;
        text-align: center;
        color: #636b6f;
        padding: 0 25px;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;

    }

    .ordertitle {
        text-align: center;
        vertical-align: middle;
        color: #000000;
        font-size: 20px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .orderhead>h5 {
        color: #000000;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    input[name="delivery_op"],
    input[name="address"] {
        width: 1em;
        height: 1em;
        cursor: pointer;
        margin-bottom: 20px;

    }

    input[name="day_rant"] {
        width: 1em;
        height: 1em;
        cursor: pointer;
        margin-right: 10px;
    }

    input[name="bank"] {
        width: 2em;
        height: 2em;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .btn-s,
    input[type="submit"] {
        text-decoration: none;
        background-color: #f1cce0;
        font-family: Lora, serif;
        font-weight: 700;
        cursor: pointer;
        border: none;
        text-align: center;
        line-height: normal;
        padding: 15px 20px;
        border-radius: 2px;
        font-size: 14px;
        color: #636b6f;
        font-size: 15px;
        letter-spacing: .1rem;
        text-transform: uppercase;
        display: inline-block;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;

    }



    .card-header {
        background-color: #f1cce0;
    }

    .table .thead-primary {
        background-color: #f1cce0;
    }

    .table .thead-primary tr th {
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .1rem;
        padding: 20px 10px;
        color: #636b6f;
         !important;
        border: 1px solid transparent !important;
    }

    .table tbody tr td {
        text-align: center !important;
        vertical-align: middle;
        padding: 40px 10px;
        border: 1px solid transparent !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
    }

    .product {
        display: block;
        width: 100%;
        margin-bottom: 30px;
    }

    @media (max-width: 991.98px) {
        .product {
            margin-bottom: 30px;
        }
    }

    .product .img-prod {
        position: relative;
        display: block;
        overflow: hidden;
    }

    .product .img-prod span.status {
        position: absolute;
        top: 10px;
        left: -1px;
        padding: 2px 15px;
        color: #000000;
        font-weight: 300;
        background: #f1b8c4;
    }

    .product .img-prod img {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .product .img-prod:hover img,
    .product .img-prod:focus img {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }

    .product .img {
        display: block;
        height: 500px;
    }

    .product .icon {
        width: 60px;
        height: 60px;
        background: #fff;
        opacity: 0;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .product .icon span {
        color: #000000;
    }

    .product:hover .icon {
        opacity: 1;
    }

    .product .text {
        background: #fff;
        position: relative;
    }

    .product .text h3 {
        font-size: 16px;
        margin-bottom: 5px;
        font-weight: 300;
    }

    .product .text h3 a {
        color: #000000;
    }

    .product .text p.price {
        margin-bottom: 0;
        color: #000000;
        font-weight: 400;
    }

    .product .text p.price span.price-dc {
        text-decoration: line-through;
        color: #b3b3b3;
    }

    .product .text p.price span.price-sale {
        color: #000000;
    }

    .product .text .pricing,
    .product .text .rating {
        width: 50%;
    }

    .product .text .bottom-area {
        margin-bottom: 10px;
    }

    .product .text .bottom-area a {
        color: #000000;
    }

    .product .text .bottom-area a.add-to-cart {
        font-size: 13px;
        color: #000000;
        font-family: 'Nunito', sans-serif;
        text-transform: uppercase;
        font-weight: 300;
    }

    .product .text .bottom-area a.add-to-cart i {
        font-size: 16px;
    }

    .product-details h3 {
        text-transform: uppercase;
        font-size: 28px;
        font-weight: 300;
    }

    .product-details .price span {
        font-size: 30px;
        color: #000000;
    }

    .product-details button i {
        color: #000000;
    }

    .product-details .quantity-left-minus {
        background: transparent;
        padding: 16px 20px;
    }

    .product-details .quantity-right-plus {
        background: transparent;
        padding: 16px 20px;
    }



    .product-details .form-group {
        position: relative;
    }

    .product-details .form-group .form-control {
        padding-right: 40px;
        color: #000000;
        background: transparent !important;
    }

    .product-details .form-group .form-control::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #4d4d4d;
    }

    .product-details .form-group .form-control::-moz-placeholder {
        /* Firefox 19+ */
        color: #4d4d4d;
    }

    .product-details .form-group .form-control:-ms-input-placeholder {
        /* IE 10+ */
        color: #4d4d4d;
    }

    .product-details .form-group .form-control:-moz-placeholder {
        /* Firefox 18- */
        color: #4d4d4d;
    }

    .product-details .form-group .icon {
        position: absolute;
        top: 50%;
        right: 20px;
        font-size: 14px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        color: #000000;
    }

    .product-details .form-group .icon span {
        color: #000000;
    }

    @media (max-width: 767.98px) {
        .product-details .form-group .icon {
            right: 10px;
        }
    }

    .product-details .form-group .select-wrap {
        position: relative;
    }

    .product-details .form-group .select-wrap select {
        font-size: 13px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .product-detail {
        display: inline-block;
        vertical-align: middle;
        padding: 0 30px 0 20px;
    }

    .table-bordered td,
    .table-bordered th {
        border: 0px solid #dee2e6;
    }

    .btn-status {
        border-radius: 13px;
        padding: 3px 9px;
        margin-left: 12px;
        text-align: center;
    }

    .btn-status.status-waiting {
        background-color: #F5A559;
        color: white;
    }

    .btn-status.status-done {
        background-color: #32B657;
        color: white;
    }

    .card-order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-left: 35px;
        padding: 20px;
    }

    .title-text {
        color: #1b1b1b;
        font-size: 18px;
        font-weight: bold;
    }

    .text-858585 {
        color: #858585;
    }

    .text-black {
        color: #000000;
    }

    .d-flex-between {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .font-weight-bold {
        font-weight: 700 !important;
    }

    .order-list {
        padding: 0px 30px;
    }



    .item-detail {
        justify-content: space-between;
        flex-direction: column;
        display: flex;
    }

    .sm-up {
        display: none;
    }

    @media (min-width: 1025px) {
        .sm-up {
            display: block;
        }
    }

    .menu-account-item {
        width: 100%;
        height: auto;
        min-height: 59px;
        max-height: 140px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        border-top: 1px solid #dedede;
    }

    .menu-account-item span {
        /* color: #1B1B1B; */
        font-size: 16px;
        font-weight: bold;
        padding-left: 15px;
    }

    .sub-menu-item {
        font-weight: bold;
        padding-left: 25px;
        height: 38px;
        width: 260px;
        display: flex;
        align-items: center;
        font-size: 15px;

    }

    .active {
        color: #dc81b3;

    }

    .sub-menu-account.profile {
        border-left: unset;
    }

    .menu-account-item .menu-card {
        width: 274px;
        position: relative;
        display: flex;
    }

    .menu-account-item.orderlist-menu.active {
        color: #dc81b3;
    }

    #moreProfile {
        position: absolute;
        right: 10px;
    }

    .sub-menu-account {
        width: 160px;
        margin-left: 15px;
        border-left: 1px solid #ddd;
        margin-bottom: 20px;
    }

    #card_order {

        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    #card_order:hover {
        box-shadow: 0 8px 16px 0 #ffcee7;
    }

    .title-head {
        display: flex;
        align-items: start;
        justify-content: flex-start;
        padding: 16px;
        background-color: #FAFAFA;
        border-bottom: solid 1px #ddd;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .title-text {
        padding-left: 10px;
        min-width: max-content;
    }

    .title-text h2 {
        margin-bottom: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .title-text span {
        font-size: 12px;
        color: #858585;
    }

    .shipping-address {
        padding: 16px 30px 16px 50px;
        display: flex;
        align-items: center;
        border-bottom: solid 1px #ddd;
    }

    .edit button {
        font-size: 14px;
        font-weight: bold;
        color: #0066DD;
        outline: none;
        padding: 8px;
        border: unset;
        background-color: unset;
    }

    button:disabled {
        cursor: not-allowed;
        color: #ddd !important;
    }

    .shipping-address .edit {
        width: 15%;
        text-align: right;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .shipping-address .address-info {
        font-size: 14px;
        width: 60%;
    }

    .shipping-address .name-phone {
        font-size: 16px;
        font-weight: bold;
        text-align: left;
        width: 25%;
    }

    .default-shipping {
        font-weight: bold;
    }

    .input-item .label {
        margin: 12px 0 4px 0;
    }



    .input-item input:focus,
    .input-item textarea:focus,
    .input-item .input {
        border-color: #0066DD;
    }

    .input-item input,
    .input-item textarea,
    .input-item .input {
        border: solid 1px #ddd;
        width: 100%;
        outline: none;
        border-radius: 8px;
        height: 44px;
        padding-left: 12px;
    }

    .input-item textarea {
        height: unset;
    }

    .modal-header {
        justify-content: initial;
        border: unset;
    }

    .modal-title {
        display: flex;
        align-items: center;
    }

    .modal-title h1 {
        margin-bottom: 0;
        font-size: 18px;
        font-weight: 700;
        line-height: 21px;
        margin-left: 8px;
        color: #1B1B1B;
    }

    .modal-title span {
        margin-left: 8px;
        font-size: 12px;
        color: #858585;
        line-height: 18px;
    }

    .error-message {
        margin-top: 4px;
        display: none;
    }

    .error-message.error {
        display: block;
        color: #E31F26;
    }
    .input-item .error {
    border-color: #E31F26;
}
    </style>

</head>

<body>
    <div class="main-panel">
        @include('frontend.layouts.navbar')
        <div class="container ">
            @yield('content')
        </div>

    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('easyzoom/js/easyzoom.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);

        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });
    </script>
    <script>
    $(document).hover('click', '.dropdown-menu', function(e) {
        e.stopPropagation();
    });
    // make it as accordion for smaller screens
    if ($(window).width() < 992) {
        $('.dropdown-menu a').click(function(e) {
            e.preventDefault();
            if ($(this).next('.submenu').length) {
                $(this).next('.submenu').toggle();
            }
            $('.dropdown').on('hide.bs.dropdown', function() {
                $(this).find('.submenu').hide();
            })
        });
    }
    </script>
    <script>
    $('#UploadModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Notification : Slip payment file Order number : ' + recipient)
        //modal.find('.modal-body input').val(recipient)
    })
    $('#ShowModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var img = button.data('img')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Notification : Slip payment file Order number : ' + recipient)
        modal.find('.modal-body img').attr('src', '{{url('')}}/slip/' + img)
    })
    $('#returnModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var img_r = button.data('img_r')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Notification : Slip payment file Order number : ' + recipient)
        modal.find('.modal-body img').attr('src', '{{url(' / ')}}/slipShipping/' + img_r)
    })
    </script>
    <script>
    $(function() { //<-- wrapped here
        $('#name').on('input', function() {
            this.value = this.value.replace(/[^a-zA-Zก-๙]/g,
                ''); //<-- replace all other than given set of values
        });
        $('#surname').on('input', function() {
            this.value = this.value.replace(/[^a-zA-Zก-๙]/g,
                ''); //<-- replace all other than given set of values
        });
        $('#account_name').on('input', function() {
            this.value = this.value.replace(/[^a-zA-Zก-๙]/g,
                ''); //<-- replace all other than given set of values
        });
        $('#account_no').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g,
                ''); //<-- replace all other than given set of values
        });
        $('#mobile').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g,
                ''); //<-- replace all other than given set of values
        });

    });
    </script>
    <script>
    var msg = '{{Session::get('
    message ')}}';
    var exist = '{{Session::has('
    message ')}}';
    if (exist) {
        alert(msg);
    }
    </script>
    <script>
    if (window.location.pathname == '/orders') {
        // $('.sub-menu-item.profile').addClass('active');
        $('.menu-account-item.orderlist-menu').addClass('active');
    } else if (window.location.pathname == '/myaccount') {
        $('.sub-menu-item.profile').addClass('active');

    }
    </script>
</body>

</html>