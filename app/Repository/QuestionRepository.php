<?php
namespace App\Repository;

use App\Models\Question;
use App\Models\Quizze;

use App\Repository\QuestionRepositoryInterface;


class QuestionRepository implements QuestionRepositoryInterface
{
   public function view()
   {
      try{

        $questions = Question::get();  
         return view('dashboard.Questions.index',compact('questions'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }
   public function create()
   {
      try{
         $quizzes = Quizze::get();  
         if ($quizzes->count() <= 0)
         {
            toastr()->error(trans('messages.error_quizze'));
            $questions = Question::get();  
            return view('dashboard.Questions.index',compact('questions'));
         }
         return view('dashboard.Questions.create',compact('quizzes'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function store($request)
   {
      try{
       
         $question = new Question();
         $question->title = ['ar' => $request->title_ar , 'en' => $request->title_en];
         $question->quizze_id = $request->quizze_id;
         $question->answers = $request->answers;
         $question->right_answer = $request->right_answer;
         $question->score = $request->score;
         $question->save();

         toastr()->success(trans('messages.success'));
         return redirect()->route('questions.index');
         


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('questions.index');
         
      }
   }

   public function edit($id)
   {
      try{
         $quizzes = Quizze::get();  
         if ($quizzes->count() <= 0)
         {
            toastr()->error(trans('messages.error_quizze'));
            $questions = Question::get();  
            return view('dashboard.Questions.index',compact('questions'));
         }
         $question = Question::findOrFail($id);

         return view('dashboard.Questions.edit',compact('question','quizzes'));
        

      }catch(\Exception $ex)
      {
        
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function update($request)
   {
      try{
         $question = Question::findOrFail($request->id);
   
         $question->title = ['ar' => $request->title_ar , 'en' => $request->title_en];
         $question->quizze_id = $request->quizze_id;
         $question->answers = $request->answers;
         $question->right_answer = $request->right_answer;
         $question->score = $request->score;
         $question->save();
         toastr()->success(trans('messages.updated'));
         return redirect()->route('questions.index');


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('questions.index');
      }
   }

   public function delete($request)
   {
      try{
        
         Question::findOrFail($request->id)->delete();

         toastr()->success(trans('messages.deleted'));
         return redirect()->route('questions.index')();

      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }



}

?>