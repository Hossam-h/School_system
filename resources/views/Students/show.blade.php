@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('Students_trans.Student_details')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('Students_trans.Student_details')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02" role="tab" aria-controls="home-02" aria-selected="true">{{trans('Students_trans.Student_details')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02" role="tab" aria-controls="profile-02" aria-selected="false">{{trans('Students_trans.Attachments')}}</a>

                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="fee-invoice-02-tab" data-toggle="tab" href="#fee-invoice-02" role="tab" aria-controls="fee-invoice-02" aria-selected="false">رسوم</a>

                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel" aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.name')}}</th>
                                            <td>{{ $Student->name }}</td>
                                            <th scope="row">{{trans('Students_trans.email')}}</th>
                                            <td>{{$Student->email}}</td>
                                            <th scope="row">{{trans('Students_trans.gender')}}</th>
                                            <td>{{$Student->gender->Name}}</td>
                                            <th scope="row">{{trans('Students_trans.Nationality')}}</th>
                                            <td>{{$Student->Nationality->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('Students_trans.Grade')}}</th>
                                            <td>{{ $Student->grade->Name }}</td>
                                            <th scope="row">{{trans('Students_trans.classrooms')}}</th>
                                            <td>{{$Student->classroom->name}}</td>
                                            <th scope="row">{{trans('Students_trans.section')}}</th>
                                            <td>{{$Student->section->Name_section}}</td>
                                            <th scope="row">{{trans('Students_trans.Date_of_Birth')}}</th>
                                            <td>{{ $Student->Date_Birth}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('Students_trans.parent')}}</th>
                                            <td>{{ $Student->myparent->Name_Father}}</td>
                                            <th scope="row">{{trans('Students_trans.academic_year')}}</th>
                                            <td>{{ $Student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form method="post" action="{{url('upload_attachment')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="academic_year">{{trans('Students_trans.Attachments')}}
                                                        : <span class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="photos[]" multiple required>
                                                    <input type="hidden" name="student_name" value="{{$Student->name}}">
                                                    <input type="hidden" name="student_id" value="{{$Student->id}}">
                                                </div>
                                            </div>
                                            <br><br>
                                            <button type="submit" class="button button-border x-small">
                                                {{trans('Students_trans.submit')}}
                                            </button>
                                        </form>
                                    </div>
                                    <br>
                                    <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('Students_trans.filename')}}</th>
                                                <th scope="col">{{trans('Students_trans.created_at')}}</th>
                                                <th scope="col">{{trans('Students_trans.Processes')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Student->images as $attachment)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$attachment->filename}}</td>
                                                <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-info btn-sm" href="{{url('/download_attchment')}}/{{ $attachment->imageable_id}}/{{$attachment->filename}}" role="button"><i class="fas fa-download"></i>&nbsp; {{trans('Students_trans.Download')}}</a>

                                                    <a class="btn btn-outline-info btn-sm" href="{{url('/show_Attach')}}/{{ $attachment->imageable_id}}/{{$attachment->filename}}">
                                                        <i style="color: #ffc107" class="far fa-eye "></i></a>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#Delete_img{{ $attachment->id }}" title="{{ trans('Grades_trans.Delete') }}">{{trans('Students_trans.delete')}}
                                                    </button>

                                                </td>
                                            </tr>



                                            <div class="modal fade" id="Delete_img{{ $attachment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{trans('Parent_trans.delete_parent')}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{url('/del_attchment')}}/{{ $attachment->imageable_id}}/{{$attachment->filename}}" method="post">

                                                                {{ method_field('Delete') }}
                                                                @csrf

                                                                <label class="btn btn-danger">{{trans('Students_trans.Deleted_Student_tilte')}} </label>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Grades.Close')}}</button>
                                                            <input type="submit" class="btn btn-primary" value="{{trans('Grades.Delete')}}">

                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----------------------------------------------------------------------------------------------->

                            <div class="tab-pane fade" id="fee-invoice-02" role="tabpanel" aria-labelledby="fee-invoice-02-tab">
                                <div class="card card-statistics">
                                    <div class="card-body">

                                    <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>نوع الرسوم</th>
                                            <th>المبلغ</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>الصف الدراسي</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Fee_invoices as $Fee_invoice)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$Fee_invoice->student->name}}</td>
                                            <td>{{$Fee_invoice->fees->tittle}}</td>
                                            <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                            <td>{{$Fee_invoice->grade->Name}}</td>
                                            <td>{{$Fee_invoice->classroom->name}}</td>
                                            <td>{{$Fee_invoice->description}}</td>
                                                <td>
                                                    <a href="{{route('Feeinvo.edit',$Fee_invoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee_invoice{{$Fee_invoice->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('Fees_Invoices.Delete')
                                        @endforeach
                                    </table>
                                </div>
                                    </div>
                                </div>
                            </div>
                            <!----------------------------------------------------------------------------------------->


                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- row closed -->
        @endsection
        @section('js')
        @toastr_js
        @toastr_render
        @endsection
