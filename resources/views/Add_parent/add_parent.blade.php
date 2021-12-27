@extends('layouts.master')
@section('css')

@section('title')
    empty
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

<!--start father----------------------------------------------------------------------------------->
<h3>Father</h3>

<div  class="row setup-content" id="step-1">

<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <div class="form-row">
            <div class="col">
                <form action="{{route('Myparent.store')}}" method="POST">

                {{ csrf_field() }}
                <label for="title">{{trans('Parent_trans.Email')}}</label>
                <input type="email" name="Email"  class="form-control">

            </div>
            <div class="col">
                <label for="title">{{trans('Parent_trans.Password')}}</label>
                <input type="password" name="Password" class="form-control" >

            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                <input type="text" name="Name_Father" class="form-control" >

            </div>
            <div class="col">
                <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                <input type="text" name="Name_Father_en" class="form-control" >

            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{trans('Parent_trans.Job_Father')}}</label>
                <input type="text" name="Job_Father" class="form-control">

            </div>
            <div class="col-md-3">
                <label for="title">{{trans('Parent_trans.Job_Father_en')}}</label>
                <input type="text" name="Job_Father_en" class="form-control">

            </div>

            <div class="col">
                <label for="title">{{trans('Parent_trans.National_ID_Father')}}</label>
                <input type="text" name="National_ID_Father" class="form-control">

            </div>
            <div class="col">
                <label for="title">{{trans('Parent_trans.Passport_ID_Father')}}</label>
                <input type="text" name="Passport_ID_Father" class="form-control">

            </div>

            <div class="col">
                <label for="title">{{trans('Parent_trans.Phone_Father')}}</label>
                <input type="text" name="Phone_Father" class="form-control">

            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Nationality_Father_id">
                    <option selected>{{trans('Parent_trans.Choose')}}...</option>

                </select>

            </div>
            <div class="form-group col">
                <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Father_id">
                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                   </select>

            </div>
            <div class="form-group col">
                <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Religion_Father_id">
                    <option selected>{{trans('Parent_trans.Choose')}}...</option>

                </select>

            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Father')}}</label>
            <textarea class="form-control" name="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>

        </div>




    </div>
</div>
</div>
<!--end father----------------------------------------------------------------------------------------->


<!--start maother------------------------------------------------------------------------------------->
<h3>Mother</h3>

<div  class="row setup-content" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Name_Mother')}}</label>
                    <input type="text" name="Name_Mother" class="form-control">

                </div>
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Name_Mother_en')}}</label>
                    <input type="text" name="Name_Mother_en" class="form-control">

                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="title">{{trans('Parent_trans.Job_Mother')}}</label>
                    <input type="text" name="Job_Mother" class="form-control">

                </div>
                <div class="col-md-3">
                    <label for="title">{{trans('Parent_trans.Job_Mother_en')}}</label>
                    <input type="text" name="Job_Mother_en" class="form-control">

                </div>

                <div class="col">
                    <label for="title">{{trans('Parent_trans.National_ID_Mother')}}</label>
                    <input type="text" name="National_ID_Mother" class="form-control">

                </div>
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Passport_ID_Mother')}}</label>
                    <input type="text" name="Passport_ID_Mother" class="form-control">

                </div>

                <div class="col">
                    <label for="title">{{trans('Parent_trans.Phone_Mother')}}</label>
                    <input type="text" name="Phone_Mother" class="form-control">

                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Nationality_Mother_id">
                        <option selected>{{trans('Parent_trans.Choose')}}...</option>

                    </select>

                </div>
                <div class="form-group col">
                    <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Mother_id">
                        <option selected>{{trans('Parent_trans.Choose')}}...</option>

                    </select>

                </div>
                <div class="form-group col">
                    <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Religion_Mother_id">
                        <option selected>{{trans('Parent_trans.Choose')}}...</option>

                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Mother')}}</label>
                <textarea class="form-control" name="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>

            </div>
                 <input type="submit">
            </form>


    </div>
</div>
<!--end maother----------------------------------------------------------------------------------------->



            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
