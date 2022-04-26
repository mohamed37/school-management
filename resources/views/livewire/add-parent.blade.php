<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

  
 @if ($show_table)
   @include('livewire.parent_table')
 @else
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                   class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('parent_trans.step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                   class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('parent_trans.step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                   class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                   disabled="disabled">3</a>
                <p>{{ trans('parent_trans.step3') }}</p>
            </div>
        </div>
    </div>
    

    @include('livewire.father_form')
    @include('livewire.mother_form')


    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
        @endif
                
                <div class="col-md-12">
                    <h3 style="font-family: 'Cairo', sans-serif;">{{ trans('parent_trans.attention_save') }} ؟</h3>
                    <br>

                    <label style="color: red">{{trans('parent_trans.attachments')}}</label>
                    <div class="form-group">
                        <input type="file" wire:model="photos"  accept="image/*" multiple>
                    </div>
                    <br>

                    <input type="hidden" wire:model="parent_id" >

                    <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="back(2)">{{ trans('parent_trans.back') }}</button>

                    @if ($updateMode)
                    
                        <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm_edit"
                        type="button">{{ trans('main_trans.update') }}</button>
                       

                    @else
                        <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                        type="button">{{ trans('parent_trans.finish') }}</button>

                    @endif
     
                </div>
            
            </div>
    </div>
 @endif

</div>
