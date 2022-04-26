@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
          
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.name_Mother')}}</label>
                        <input type="text" wire:model="name_Mother" class="form-control">
                        @error('name_Mother')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.name_Mother_en')}}</label>
                        <input type="text" wire:model="name_Mother_en" class="form-control">
                        @error('name_Mother_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{trans('parent_trans.job_Mother')}}</label>
                        <input type="text" wire:model="job_Mother" class="form-control">
                        @error('job_Mother')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{trans('parent_trans.job_Mother_en')}}</label>
                        <input type="text" wire:model="job_Mother_en" class="form-control">
                        @error('job_Mother_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.national_ID_Mother')}}</label>
                        <input type="text" wire:model="national_ID_Mother" class="form-control" maxlength=14>
                        @error('national_ID_Mother')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.passport_ID_Mother')}}</label>
                        <input type="text" wire:model="passport_ID_Mother" class="form-control" maxlength=14>
                        @error('passport_ID_Mother')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.phone_Mother')}}</label>
                        <input type="text" wire:model="phone_Mother" class="form-control" maxlength=11>
                        @error('phone_Mother')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('parent_trans.nationality_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="nationality_Mother_id">
                            <option selected>{{trans('parent_trans.choose')}}...</option>
                            @foreach($nationalities as $national)
                                <option value="{{$national->id}}">{{$national->name}}</option>
                            @endforeach
                        </select>
                        @error('nationality_Mother_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{trans('parent_trans.blood_Type_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="blood_Type_Mother_id">
                            <option selected>{{trans('parent_trans.choose')}}...</option>
                            @foreach($type_Bloods as $Type_Blood)
                                <option value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_Type_Mother_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{trans('parent_trans.religion_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="religion_Mother_id">
                            <option selected>{{trans('parent_trans.choose')}}...</option>
                            @foreach($religions as $Religion)
                                <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                            @endforeach
                        </select>
                        @error('religion_Mother_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('parent_trans.address_Mother')}}</label>
                    <textarea class="form-control" wire:model="address_Mother" id="exampleFormControlTextarea1"
                              rows="4"></textarea>
                    @error('address_Mother')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                    {{trans('parent_trans.back')}}
                </button>
                @if ($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                    wire:click="secondStepSubmit_edit">{{trans('parent_trans.next')}}</button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                    wire:click="secondStepSubmit">{{trans('parent_trans.next')}}</button>
                @endif
              

        </div>
        
    </div>