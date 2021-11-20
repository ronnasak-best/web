@extends('frontend.layouts.master')
@section('title','List Categories')
@section('content')
    	<div class="container">

    		<div class="row">
          <div class="col-sm-4">
            <div class="card " style="width: 20rem; height:14.4rem">
              <div class="card-body">
                <a href="{{route('myaccount.create')}}">
                  <img src="{{ asset('/images/plus.png') }}" alt="" style="width: 100%; height:100%">
                </a>

              </div>
            </div>
          </div>
          @foreach($address as $addr)
          <div class="col-sm-4">
            <div class="card " style="width: 20rem;">
              <div class="card-body">
                <h5 class="card-title">{{$addr['name']}}  {{$addr['surname']}}</h5>
                <p class="card-text">{{$addr['address']}} <br>
                  {{$addr['district']}} {{$addr['sub_district']}}
                  <br> {{$addr['province']}} {{$addr['pincode']}}
                  <br> Mobile phone: {{$addr['mobile']}}</p>
                   <hr style="border-top: 1px solid #eee;">
                <a href="{{ action('AddressController@edit',$addr['id']) }}" class="card-link">EDIT</a>


              </div>
            </div>
          </div>
          @endforeach
    		</div>
    	</div>
      <script>
         var msg = '{{Session::get('message')}}';
         var exist = '{{Session::has('message')}}';
         if(exist){
           alert(msg);
         }
       </script>
@endsection
