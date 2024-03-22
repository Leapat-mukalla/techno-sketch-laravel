@extends('layouts.main-visitors')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 align-self-center mb-4 ">
            <h4 style="color: #212529">قم بمسح رمز استجابة الأعمال الفنية</h4>
        </div>
        <div class="col-12">
            <div class=" d-flex flex-column align-items-center justify-content-center" style=" ">
                <video class="w-100  " id="camera" autoplay style="  height: 55vh; object-fit: cover;"></video>
                <button class=" btn btn-primary mt-2" id="captureButton">مسح</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/visitors_scan.js')}}"></script>

@endsection
