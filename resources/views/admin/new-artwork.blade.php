@extends('layouts.main-admin')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">اضافة عمل</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a class="text-muted">الأعمال الفنية</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">اضافة عمل</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">


        </div>
    </div>
</div>
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent">
                {{-- <h4 class="card-title">اضافة عمل</h4> --}}

            </div>
            <div class="card-body">
                <!-- Display any error message -->
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Display validation errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" class="ps-3 pe-3 col-12 col-lg-6 col-md-6" action="{{ route('admin.artworks.new') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group mb-3">
                        <label class="form-label" for="name">عنوان العمل</label>
                        <input class="form-control" type="text" id="title" name="title"
                            required placeholder=" ">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">صورة العمل</label>
                        <input class="form-control" type="file" id="artwork_photo" name="artwork_photo" accept=".png,.jpeg,.jpg"  value="{{ old('artwork_photo') }}">

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">الفنان</label>
                        <input class="form-control" type="text" id="artist" name="artist"
                            required placeholder=" ">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">صورة الفنان</label>
                        <input class="form-control" type="file" id="artist_photo" name="artist_photo" accept=".png,.jpeg,.jpg"  value="{{ old('artist_photo') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">الوصف</label>
                        <textarea class="form-control"  id="description" name="description"
                            required placeholder=" "></textarea>
                    </div>
                    <div class="form-group mb-4  text-center d-grid gap-2">
                        <button class="btn btn-primary" type="submit">اضافة</button>
                        <button class="btn waves-effect waves-light btn-light " type="reset">الغاء</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
</div>

@endsection

