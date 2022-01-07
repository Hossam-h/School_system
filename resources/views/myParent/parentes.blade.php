@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
tittle
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('main_side.Grades')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">dsfjsdfk</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <a href="{{route('Myparent.index')}}" class="btn btn-success btn-sm btn-lg pull-right">{{ trans('Parent_trans.add_parent') }}</a>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr class="table-success">
                                <th>#</th>
                                <th>{{ trans('Parent_trans.Email') }}</th>
                                <th>{{ trans('Parent_trans.Name_Father') }}</th>
                                <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
                                <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
                                <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                                <th>{{ trans('Parent_trans.Job_Father') }}</th>
                                <th>{{ trans('Parent_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($myparents as $my_parent)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $my_parent->Email }}</td>
                                <td>{{ $my_parent->Name_Father }}</td>
                                <td>{{ $my_parent->National_ID_Father }}</td>
                                <td>{{ $my_parent->Passport_ID_Father }}</td>
                                <td>{{ $my_parent->Phone_Father }}</td>
                                <td>{{ $my_parent->Job_Father }}</td>
                                <td>
                                    <a href="{{route('Myparent.edit',['Myparent'=>$my_parent->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger btn-sm" title="{{ trans('Grades_trans.Delete') }}">
                                        <i class="fa fa-trash" data-toggle="modal" data-target="#exampleModal"></i></button>
                                </td>
                            </tr>


                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{trans('Parent_trans.delete_parent')}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Myparent.destroy', 'test') }}" method="post">

                                                {{ method_field('Delete') }}
                                                @csrf
                                                <label > {{$my_parent->Name_Father}} </label> <br>
                                                <label class="btn btn-danger"> do you want to delete this parent </label>


                                                <input type="hidden" name="id" value="{{$my_parent->id}}">

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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->

<!-- row closed -->
@endsection
@section('js')

@toastr_js
@toastr_render

@endsection
