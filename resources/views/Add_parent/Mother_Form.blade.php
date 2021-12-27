<!--start maother------------------------------------------------------------------------------------->
<div style="display: none" class="row setup-content" id="step-2">
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
                        @foreach($Nationalities as $National)
                        <option value="{{$National->id}}">{{$National->Name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col">
                    <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Mother_id">
                        <option selected>{{trans('Parent_trans.Choose')}}...</option>
                        @foreach($Type_Bloods as $Type_Blood)
                        <option value="{{$Type_Blood->id}}">{{$Type_Blood->type}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col">
                    <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Religion_Mother_id">
                        <option selected>{{trans('Parent_trans.Choose')}}...</option>
                        @foreach($Religions as $Religion)
                        <option value="{{$Religion->id}}">{{$Religion->relegion}}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Mother')}}</label>
                <textarea class="form-control" name="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>

            </div>

            

    </div>
</div>
<!--end maother----------------------------------------------------------------------------------------->
