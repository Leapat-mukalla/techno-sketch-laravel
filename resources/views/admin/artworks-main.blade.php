@extends('layouts.main-admin')

@section('content')
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center mb-4">
                    <div class="col-6">
                        <h4 class="card-title">الأعمال الفنية</h4>
                    </div>
                    <div class="col-6">
                        {{-- <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="بحث"> --}}
                            <button type="button" class="btn btn-info btn-circle float-start ms-2" data-bs-toggle="modal"
                            data-bs-target="#search-modal">
                                <i data-feather="search" class="svg-icon"></i>
                            </button>
                        {{-- </span> --}}

                        <div id="search-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="topModalLabel">بحث</h4></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">

                                        {{-- <form method="GET" action="{{ route('meetings') }}" id="search" class="ps-3 pe-3">
                                            @csrf

                                            <div class="form-group mt-3 mb-3">
                                                <input type="text" class="form-control" name="search">
                                            </div>

                                            <div class="form-group mb-3 text-center">
                                                <button class="btn btn-primary" type="submit">ابحث</button>
                                            </div>
                                        </form>
 --}}

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="تصفية النتائج"> --}}
                            <button type="button" class="btn btn-info btn-circle float-start ms-2 " data-bs-toggle="modal"
                            data-bs-target="#filter-modal">
                                <i data-feather="filter" class="svg-icon"></i>
                            </button>
                        {{-- </span> --}}
                        <div id="filter-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="topModalLabel">تصفية النتائج</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">

                                        {{-- <form method="POST" action="{{ route('meetings.filter') }}" id="filter" class="ps-3 pe-3">
                                            @csrf
                                            <div class="form-group mt-3">
                                                <label for="meetingLabels" class="form-label">علامة مميزة</label>
                                                <select multiple class="form-control" id="meetingLabels" name="labels[]">
                                                    @foreach($userLabels as $label)
                                                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group mt-3 mb-3">
                                                <label class="form-label" for="created_at">التاريخ</label>
                                                <input type="date" class="form-control" value="2024-1-25" id="created_at" name="created_at">
                                            </div>

                                            <div class="form-group mb-3 text-center">
                                                <button class="btn btn-primary" type="submit" >تصفية</button>
                                                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal"
                                                aria-hidden="true">الغاء</button>
                                            </div>
                                        </form> --}}


                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->


                    </div>
                </div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
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
                <table class="table  v-middle mb-0 ">
                    <thead>
                        <tr class="border-0">
                            <th class="border-0 font-14 font-weight-medium text-dark">#</th>
                            <th class="border-0 font-14 font-weight-medium text-dark">العنوان</th>
                            <th class="border-0 font-14 font-weight-medium text-dark px-2">صورة العمل</th>
                            <th class="border-0 font-14 font-weight-medium text-dark px-2">الفنان</th>
                            <th class="border-0 font-14 font-weight-medium text-dark px-2">صورة الفنان</th>
                            <th class="border-0 font-14 font-weight-medium text-dark px-2">الوصف</th>
                            <th class="border-0 font-14 font-weight-medium text-dark px-2">عدد الإعجابات</th>
                            <th class="border-0 font-14 font-weight-medium text-dark">عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artworks as $artwork)
                        <tr>
                            <td class="border-top-0 border-bottom-0 px-2 py-4 font-14 ">{{ $loop->iteration }}</td>
                            <td class="border-top-0 border-bottom-0  px-2 py-4 font-14">{{ $artwork->title }}</td>
                            {{-- <td class="border-top-0 border-bottom-0  px-2 py-4 font-14">{{ $artwork->artwork_photo }}</td> --}}
                            <td class="border-top-0 border-bottom-0  px-2 py-4 font-14"><img src="{{ asset('storage/artwork_photos/' . $artwork->artwork_photo) }}" width="45" height="40" alt="Artwork Photo">
                            </td>
                            <td class="border-top-0 border-bottom-0 px-2 py-4 font-14">{{ $artwork->artist }}</td>
                            {{-- <td class="border-top-0 border-bottom-0  px-2 py-4 font-14">{{ $artwork->artist_photo }}</td> --}}
                            <td class="border-top-0 border-bottom-0  px-2 py-4 font-14"><img src="{{ asset('storage/artist_photos/' . $artwork->artist_photo) }}" width="45" height="40" alt="Artwork Photo">
                            <td class="border-top-0 border-bottom-0  px-2 py-4 font-14" >{{ $artwork->description }}</td>
                            <td class="border-top-0 border-bottom-0  px-2 py-4 font-14"> {{ $artwork->like_count }}</td>
                            <td class="font-weight-medium text-dark border-top-0 border-bottom-0 px-2 py-4">
                                <a href="" class="ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="تعديل">
                                    <i data-feather="edit" class="svg-icon" ></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="d-flex justify-content-center align-items-center">
                        {{ $artworks->links('pagination::bootstrap-4') }}
                    </div>
                    <p class="text-start mb-0">
                        عرض {{ $artworks->firstItem() }} الى {{ $artworks->lastItem() }}
                        من إجمالي {{ $artworks->total() }} أعمال فنية
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
