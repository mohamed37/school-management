@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.email')}}</label>
                        <input type="email" wire:model="email"  class="form-control" autocomplete="false" >
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.password')}}</label>
                        <input type="password" wire:model="password" class="form-control" >
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('parent_trans.name_Father')}}</label>
                        <input type="text" wire:model="name_Father" class="form-control" >
                        @error('name_Father')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.name_Father_en')}}</label>
                        <input type="text" wire:model="name_Father_en" class="form-control" >
                        @error('name_Father_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{trans('parent_trans.job_Father')}}</label>
                        <input type="text" wire:model="job_Father" class="form-control">
                        @error('job_Father')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{trans('parent_trans.job_Father_en')}}</label>
                        <input type="text" wire:model="job_Father_en" class="form-control">
                        @error('job_Father_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.national_ID_Father')}}</label>
                        <input type="text" wire:model="national_ID_Father" class="form-control" maxlength=14>
                        @error('national_ID_Father')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('parent_trans.passport_ID_Father')}}</label>
                        <input type="text" wire:model="passport_ID_Father" class="form-control" maxlength=14>
                        @error('passport_ID_Father')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.phone_Father')}}</label>
                        <input type="text" wire:model="phone_Father" class="form-control" maxlength=11 >
                        @error('phone_Father')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('parent_trans.nationality_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="nationality_Father_id">
                            <option selected>{{trans('parent_trans.choose')}}...</option>
                            @foreach($nationalities as $National)
                                <option value="{{$National->id}}">{{$National->name}}</option>
                            @endforeach
                        </select>
                        @error('nationality_Father_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{trans('parent_trans.blood_Type_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="blood_Type_Father_id">
                            <option selected>{{trans('parent_trans.choose')}}...</option>
                            @foreach($type_Bloods as $Type_Blood)
                                <option value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_Type_Father_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{trans('parent_trans.religion_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="religion_Father_id">
                            <option selected>{{trans('parent_trans.choose')}}...</option>
                            @foreach($religions as $Religion)
                                <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                            @endforeach
                        </select>
                        @error('religion_Father_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('parent_trans.address_Father')}}</label>
                    <textarea class="form-control" wire:model="address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('address_Father')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if($updateMode)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                        type="button">{{trans('parent_trans.next')}}
                </button>
            @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                        type="button">{{trans('parent_trans.next')}}
                </button>
            @endif

        </div>
        
    </div>