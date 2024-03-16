@extends('layouts.main-admin')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-nowrap text-dark font-weight-medium mb-1">  لوحة تحكم تكنو سكيتش 🧑🏻‍🎨💥</h3>

        </div>
        <div class="col-5 align-self-center">
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4 ">
            <h5 class="page-title text-nowrap text-dark font-weight-medium mb-3">⏳ العد التنازلي للمعرض</h5>
            <div class="card bg-success col-9 card-block card-stretch card-height ">
                <div class="card-body">
                    <div class="row align-items-center m-2">
                        <div class="col-3"></div>
                        <div class="col-9 d-flex flex-row-reverse ">
                            @if($firstEvent == null)
                            <span class=" " data-bs-toggle="tooltip" data-bs-placement="top" title="إضافة">
                                <a href="#" class="btn text-info shadow-none float-start ms-2" data-bs-toggle="modal" data-bs-target="#addModal" >
                                    <i data-feather="plus" class="svg-icon"></i>
                                </a>
                            </span>
                            <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="topModalLabel">اضافة حدث</h4></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="POST" action="{{ route('admin.events.new') }}" id="add-event" class="ps-3 pe-3">
                                                @csrf
                                                <div class="form-group mt-3 mb-3">
                                                    <label class="form-label" for="name">اسم الحدث</label>
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="start_date">تاريخ البدء</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="start_time">وقت البدء</label>
                                                    <input type="time" class="form-control" id="start_time" name="start_time" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="end_date">تاريخ الانتهاء</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="form-label" for="end_time">وقت الانتهاء</label>
                                                    <input type="time" class="form-control" id="end_time" name="end_time" required>
                                                </div>
                                                <div class="form-group mb-3 text-center">
                                                    <button class="btn btn-primary" type="submit">اضافة</button>
                                                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif


                            @if($firstEvent)
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل">
                                <a href="{{ route('admin.artworks.new') }}" class="btn text-info shadow-none float-start ms-2" data-bs-toggle="modal" data-bs-target="#editModal{{$firstEvent->id}}" >
                                    <i data-feather="edit-2" class="svg-icon"></i>
                                </a>
                            </span>
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                <a href="#" class="btn text-info shadow-none float-start ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{$firstEvent->id}}" >
                                    <i data-feather="trash" class="svg-icon"></i>
                                </a>
                            </span>
                            <div id="editModal{{$firstEvent->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="topModalLabel">تعديل حدث</h4></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="POST" action="{{ route('admin.events.edit', ['id' => $firstEvent->id]) }}" id="edit-event" class="ps-3 pe-3">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mt-3 mb-3">
                                                    <label class="form-label" for="name">اسم الحدث</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $firstEvent->name }}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="start_date">تاريخ البدء</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $firstEvent->start_date }}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="start_time">وقت البدء</label>
                                                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ date('H:i', strtotime($firstEvent->start_time)) }}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="end_date">تاريخ الانتهاء</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $firstEvent->end_date }}" required>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="form-label" for="end_time">وقت الانتهاء</label>
                                                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ date('H:i', strtotime($firstEvent->end_time)) }}" required>
                                                </div>
                                                <div class="form-group mb-3 text-center">
                                                    <button class="btn btn-primary" type="submit">تعديل</button>
                                                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <div id="deleteModal{{$firstEvent->id}}" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="fill-primary-modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content modal-filled bg-primary">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="fill-primary-modalLabel">حذف  حدث</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-hidden="true"></button>
                                </div>
                                <div class="modal-body">
                                    <p>هل انت متأكد بأنك تريد حذف هذا الحدث ؟</p>

                                </div>
                                <div class="modal-footer justify-content-center">
                                    <form action="{{ route('admin.events.delete', ['id' => $firstEvent->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="action" value="inactive" id="action{{$firstEvent->id}}">
                                        <button type="submit" class="btn  btn-light ">حذف</button>
                                    </form>
                                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">الغاء</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

                    @if(session('success'))
                    <div class="alert alert-light">
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
                    <div class="table-responsive">
                        <table class="table  ">
                            <tbody>

                                @if($firstEvent)
                                <tr>
                                    <td class="border-0 font-14 font-weight-medium text-dark">تاريخ البدء</td>
                                    <td class="border-0 font-14">{{ $firstEvent->start_date }}</td>
                                </tr>
                                <tr>
                                    <td class="border-0 font-14 text-dark">وقت البدء</td>
                                    <td class=" border-0 font-14">{{ $firstEvent->start_time }}</td>
                                </tr>
                                <tr>
                                    <td class=" border-0 font-14 text-dark">تاريخ الانتهاء</td>
                                    <td class="border-0 font-14">{{ $firstEvent->end_date }}</td>
                                </tr>
                                <tr>
                                    <td class="border-0  font-14 text-dark">وقت الانتهاء</td>
                                    <td class=" border-0 font-14">{{ $firstEvent->end_time }}</td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="2" class=" border-0 font-14">لايوجد حدث.</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <h5 class="page-title text-nowrap text-dark font-weight-medium mb-3">⬆️ الأعمال الأكثر إعجاباً</h5>

            <div class="card card-block card-stretch card-height ">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="border-0">
                                    <th class="border-0 font-14 font-weight-medium text-dark">#</th>
                                    <th class="border-0 font-14 font-weight-medium text-dark">العنوان</th>
                                    <th class="border-0 font-14 font-weight-medium text-dark ">الفنان</th>
                                    <th class="border-0 font-14 font-weight-medium text-dark ">عدد الإعجابات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($artworks as $artwork)
                                <tr>
                                    <td class="border-top-0 border-bottom-0 font-14 ">{{ $loop->iteration }}</td>
                                    <td class="border-top-0 border-bottom-0  font-14">{{ $artwork->title }}</td>
                                    <td class="border-top-0 border-bottom-0  font-14">{{ $artwork->artist }}</td>
                                    <td class="border-top-0 border-bottom-0  font-14"> {{ $artwork->like_count }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
