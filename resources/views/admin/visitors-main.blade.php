@extends('layouts.main-admin')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> المستخدمين</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a class="text-muted">إدارة المستخدمين</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">المستخدمين</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-start text-center">
                <form method="GET" action="{{ route('admin.visitors.index') }}" id="sort-form">
                    @csrf
                    <select name="sort_by" onchange="document.getElementById('sort-form').submit()" class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius text-center">
                        <option selected="">فرز</option>
                        <option value="active">مقبول</option>
                        <option value="inactive">مرفوض</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center mt-2">
                    <div class="col-6">
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

                                        <form method="GET" action="{{ route('admin.visitors.index') }}" id="search" class="ps-3 pe-3">
                                            @csrf
                                            <div class="form-group mt-3 mb-3">
                                                <label for="search" class="form-label">اسم المستخدم او الجوال</label>
                                                <input type="text" class="form-control" name="search">
                                            </div>
                                            <div class="form-group mb-3 text-center">
                                                <button class="btn btn-primary" type="submit">ابحث</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



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
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr class="border-0">
                                <th class="border-0 font-14 font-weight-medium text-dark">#</th>
                                <th class="border-0 font-14 font-weight-medium text-dark">الاسم</th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">الجوال</th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">البريد الإلكتروني</th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">العمر </th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">الجنس </th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">العنوان </th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">الحالة</th>
                                <th class="border-0 font-14 font-weight-medium text-dark">عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="border-top-0 border-bottom-0 font-14 ">{{ $loop->iteration }}</td>
                                <td class="border-top-0 border-bottom-0 font-14">{{$user->name}}</td>
                                <td class="border-top-0 border-bottom-0 font-14">{{$user->phone}}</td>
                                <td class="border-top-0 border-bottom-0 font-14">{{$user->email}}</td>
                                <td class="border-top-0 border-bottom-0  font-14">{{ $user->VisitorsData->age }}</td>
                                <td class="border-top-0 border-bottom-0  font-14">{{ $user->VisitorsData->gender }}</td>
                                <td class="border-top-0 border-bottom-0  font-14">{{ $user->VisitorsData->address }}</td>
                                <td class="border-top-0 border-bottom-0  font-14">{{ $user->VisitorsData->status }}</td>
                                <td class="font-weight-medium text-dark border-top-0 border-bottom-0  nowrap">
                                    @if($user->VisitorsData->status === 'قيد الانتظار')
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="قبول">
                                        <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#acceptModal{{$user->id}}">
                                            <i data-feather="check-circle" class="svg-icon" ></i>
                                        </a>
                                    </span>
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="رفض">
                                        <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#rejectModal{{$user->id}}" >
                                            <i data-feather="x-circle" class="svg-icon" ></i>
                                        </a>
                                    </span>
                                    @elseif($user->VisitorsData->status === 'مقبول')
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="رفض">
                                        <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#rejectModal{{$user->id}}" >
                                            <i data-feather="x-circle" class="svg-icon" ></i>
                                        </a>
                                    </span>

                                    @elseif($user->VisitorsData->status === 'مرفوض')
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="قبول">
                                        <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#acceptModal{{$user->id}}">
                                            <i data-feather="check-circle" class="svg-icon" ></i>
                                        </a>
                                    </span>
                                    @endif


                                    <div id="acceptModal{{$user->id}}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="fill-primary-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content modal-filled bg-primary">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="fill-primary-modalLabel">قبول مستخدم</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>هل انت متأكد بأنك تريد قبول هذا المستخدم؟</p>

                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <form action="{{ route('admin.visitor.edit', ['id' => $user->VisitorsData->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="action" value="active" id="action{{$user->id}}">
                                                        <button type="submit" class="btn  btn-light ">قبول</button>
                                                    </form>
                                                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">الغاء</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div id="rejectModal{{$user->id}}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="fill-primary-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content modal-filled bg-primary">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="fill-primary-modalLabel">رفض مستخدم</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>هل انت متأكد بأنك تريد رفض هذا المستخدم؟</p>

                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <form action="{{ route('admin.visitor.edit', ['id' => $user->VisitorsData->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="action" value="inactive" id="action{{$user->id}}">
                                                        <button type="submit" class="btn  btn-light ">رفض</button>
                                                    </form>
                                                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">الغاء</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="حذف">
                                        <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}">
                                            <i data-feather="trash" class="svg-icon" ></i>
                                        </a>
                                    </span>
                                    <div id="deleteModal{{$user->id}}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="fill-primary-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content modal-filled bg-primary">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="fill-primary-modalLabel">حذف مستخدم</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>هل انت متأكد بأنك تريد حذف هذا المستخدم؟</p>

                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <form action="{{ route('admin.visitor.delete', ['id' => $user->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="action" value="inactive" id="action{{$user->id}}">
                                                        <button type="submit" class="btn  btn-light ">حذف</button>
                                                    </form>
                                                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">الغاء</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="d-flex justify-content-center align-items-center">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                    <p class="text-start mb-0">
                        عرض {{ $users->firstItem() }} الى {{ $users->lastItem() }}
                        من إجمالي {{ $users->total() }} مستخدم
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
