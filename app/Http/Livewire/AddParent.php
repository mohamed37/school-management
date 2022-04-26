<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Nationality;
use App\Models\TypeBlood;
use App\Models\Religion;
use App\Models\MyParent;
use App\Models\ParentAttachment;

class AddParent extends Component
{
    use WithFileUploads;

    public  $successMessage = '',
            $errorMessage = '',
            $updateMode = false,
            $show_table = true;
    
    public $photos, $parent_id;

    public $currentStep = 1,
   
        // Father_INPUTS
        $email, 
        $password,
        $name_Father, 
        $name_Father_en,
        $national_ID_Father, 
        $passport_ID_Father,
        $phone_Father, 
        $job_Father, 
        $job_Father_en,
        $nationality_Father_id, 
        $blood_Type_Father_id,
        $address_Father, 
        $religion_Father_id,

        // Mother_INPUTS
        $name_Mother, 
        $name_Mother_en,
        $national_ID_Mother, 
        $passport_ID_Mother,
        $phone_Mother, 
        $job_Mother, 
        $job_Mother_en,
        $nationality_Mother_id, 
        $blood_Type_Mother_id,
        $address_Mother, 
        $religion_Mother_id;


        public function showformadd()
        {
            $this->show_table = false;
        }

        public function updated($propertyName)
        {
            $this->validateOnly($propertyName, [
                'email' => 'required|email',
                'national_ID_Father' => 'required|min:14|numeric',
                'passport_ID_Father' => 'min:14',
                'phone_Father' => 'numeric|min:11',

                'national_ID_Mother' => 'required|min:14|numeric',
                'passport_ID_Mother' => 'min:14',
                'phone_Mother' => 'numeric|min:11'
            ]);
        }
        
    public function render()
    {
       
        return view('livewire.add-parent',
        [
            'nationalities' => Nationality::all(),
            'type_Bloods' => TypeBlood::all(),
            'religions' => Religion::all(),
            'my_parents' => MyParent::all(),
        ]);
    }

    


    
    public function firstStepSubmit()
    { 
        $this->validate([
            'email' => 'required|unique:my_parents,email,'.$this->id,
            'password' => 'required',

            'name_Father' => 'required|string',
            'name_Father_en' => 'required|string',
            'job_Father' => 'required|string',
            'job_Father_en' => 'required|string',

            'national_ID_Father' => 'required|unique:my_parents,national_ID_Father,' . $this->id,
            'passport_ID_Father' => 'required|unique:my_parents,passport_ID_Father,' . $this->id,
            'phone_Father' => 'required|numeric|min:10',
            
            'nationality_Father_id' => 'required',
            'blood_Type_Father_id' => 'required',
            'religion_Father_id' => 'required',
            
            'address_Father' => 'required|string',
        ]);
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    { 
        $this->validate([
            'name_Mother' => 'required|string',
            'name_Mother_en' => 'required|string',
            'job_Mother' => 'required|string',
            'job_Mother_en' => 'required|string',

            'national_ID_Mother' => 'required|unique:my_parents,national_ID_Mother,' . $this->id,
            'passport_ID_Mother' => 'required|unique:my_parents,passport_ID_Mother,' . $this->id,
            'phone_Mother' => 'required',
            
            'nationality_Mother_id' => 'required',
            'blood_Type_Mother_id' => 'required',
            'religion_Mother_id' => 'required',

            'address_Mother' => 'required|string',
        ]);
        $this->currentStep = 3;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function submitForm()
    {
        try{

            $my_parent = new MyParent();
            // Father_INPUTS
            $my_parent->email = $this->email;
            $my_parent->password = $this->password;
            $my_parent->name_Father = ['en' => $this->name_Father_en, 'ar' => $this->name_Father];
            $my_parent->national_ID_Father = $this->national_ID_Father;
            $my_parent->passport_ID_Father = $this->passport_ID_Father;
            $my_parent->phone_Father = $this->phone_Father;
            $my_parent->job_Father = ['en' => $this->job_Father_en, 'ar' => $this->job_Father];
            $my_parent->passport_ID_Father = $this->passport_ID_Father;
            $my_parent->nationality_Father_id = $this->nationality_Father_id;
            $my_parent->blood_Type_Father_id = $this->blood_Type_Father_id;
            $my_parent->religion_Father_id = $this->religion_Father_id;
            $my_parent->address_Father = $this->address_Father;

            // Mother_INPUTS
            $my_parent->name_Mother = ['en' => $this->name_Mother_en, 'ar' => $this->name_Mother];
            $my_parent->national_ID_Mother = $this->national_ID_Mother;
            $my_parent->passport_ID_Mother = $this->passport_ID_Mother;
            $my_parent->phone_Mother = $this->phone_Mother;
            $my_parent->job_Mother = ['en' => $this->job_Mother_en, 'ar' => $this->job_Mother];
            $my_parent->passport_ID_Mother = $this->passport_ID_Mother;
            $my_parent->nationality_Mother_id = $this->nationality_Mother_id;
            $my_parent->blood_Type_Mother_id = $this->blood_Type_Mother_id;
            $my_parent->religion_Mother_id = $this->religion_Mother_id;
            $my_parent->address_Mother = $this->address_Mother;
            $my_parent->save();

            if (!empty($this->photos))
            {
                   //storage/folder=> national_ID_Father, namephoto =>getClientOriginalName , folder => parent_attachments
                  //The last ID of the parent table. Record and save it. The first one in the parent attachment table

                foreach ($this->photos as $photo) 
                {
                    
                    $photo->storeAs($this->national_ID_Father, 
                    $photo->getClientOriginalName(), 
                    $disk = 'parent_attachments');
                   
                   $saveattach = ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => MyParent::latest()->first()->id, 
                    ]);

                 
                }
                
            }
            return $saveattach;
            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;

        }catch(\Exception $ex)
        {
           //trans('messages.error') .
            $this->errorMessage =  $ex;
            return view('livewire.show_form');
        }
    }
    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->name_Father_en = ''; 
        $this->name_Father = '';
        $this->national_ID_Father = '';
        $this->passport_ID_Father = '';
        $this->phone_Father = '';
        $this->job_Father_en = '';
        $this->job_Father = '';
        $this->passport_ID_Father = '';
        $this->nationality_Father_id = '';
        $this->blood_Type_Father_id = '';
        $this->religion_Father_id = '';
        $this->address_Father = '';

        // Mother_INPUTS
        $this->name_Mother_en = ''; 
        $this->name_Mother = '';
        $this->national_ID_Mother = '';
        $this->passport_ID_Mother = '';
        $this->phone_Mother = '';
        $this->job_Mother_en = '';
        $this->job_Mother = '';
        $this->passport_ID_Mother = '';
        $this->nationality_Mother_id = '';
        $this->blood_Type_Mother_id = '';
        $this->religion_Mother_id = '';
        $this->address_Mother = '';
    }

    public function edit($id)
    {
        try{
            $this->show_table = false;
            $this->updateMode = true;

            $my_parent = MyParent::findOrFail($id);
          
            // Father_INPUTS
            $this->parent_id = $id;
            $this->email = $my_parent->email;
            $this->password = $my_parent->password;
            $this->name_Father = $my_parent->getTranslation('name_Father', 'ar');
            $this->name_Father_en = $my_parent->getTranslation('name_Father', 'en');
            $this->job_Father = $my_parent->getTranslation('job_Father', 'ar');;
            $this->job_Father_en = $my_parent->getTranslation('job_Father', 'en');
            $this->national_ID_Father =$my_parent->national_ID_Father;
            $this->passport_ID_Father = $my_parent->passport_ID_Father;
            $this->phone_Father = $my_parent->phone_Father;
            $this->nationality_Father_id = $my_parent->nationality_Father_id;
            $this->blood_Type_Father_id = $my_parent->blood_Type_Father_id;
            $this->address_Father =$my_parent->address_Father;
            $this->religion_Father_id =$my_parent->religion_Father_id;
          
            // Mother_INPUTS
            $this->name_Mother = $my_parent->getTranslation('name_Mother', 'ar');
            $this->name_Mother_en = $my_parent->getTranslation('name_Mother', 'en');
            $this->job_Mother = $my_parent->getTranslation('job_Mother', 'ar');;
            $this->job_Mother_en = $my_parent->getTranslation('job_Mother', 'en');
            $this->national_ID_Mother =$my_parent->national_ID_Mother;
            $this->passport_ID_Mother = $my_parent->passport_ID_Mother;
            $this->phone_Mother = $my_parent->phone_Mother;
            $this->nationality_Mother_id = $my_parent->nationality_Mother_id;
            $this->blood_Type_Mother_id = $my_parent->blood_Type_Mother_id;
            $this->address_Mother =$my_parent->address_Mother;
            $this->religion_Mother_id =$my_parent->religion_Mother_id;

            //Photos_INPUTS
            /* $photos = ParentAttachment::where('parent_id', $id)->first();
           
             foreach ($photos as $photo) 
            {
                 
                $photo->storeAs($my_parent->national_ID_Father, 
                $photo->getClientOriginalName(), 
                $disk = 'parent_attachments');
               
                ParentAttachment::updated(['file_name' => $photo->getClientOriginalName()]);

             
            }
 */
            
        }catch(\Exception $ex)
        {
            //$this->successMessage = trans('messages.error');
            $this->errorMessage = $ex;
            return view('livewire.show_form');
        }
    }

    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep =2;
    }

    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    public function submitForm_edit()
    {
        try{
            if ($this->parent_id){

                $parent = MyParent::find($this->parent_id);

                $parent->update([
                    'passport_ID_Father' => $this->passport_ID_Father,
                    'national_ID_Father' => $this->national_ID_Father,
                ]);
    
            }
    
            return redirect()->to('/admin/add_parent');
        }catch(\Exception $ex)
        {
            
            $this->errorMessage = trans('messages.error');
            
            return view('livewire.show_form');
        }

        
    }

    public function delete($id){
        try{
            $parent_attach = ParentAttachment::where('parent_id', $id)->pluck('parent_id'); 

            if($parent_attach)
            {
                $this->successMessage = trans('parent_trans.error_attach');
                return view('livewire.show_form');     
            }

             MyParent::findOrFail($id)->delete();
           
             
            return redirect()->to('/add_parent');
        }catch(\Exception $ex)
        {
            return $ex;
            $this->successMessage = trans('messages.error');
            return view('livewire.show_form');
        }
      
    }

}
