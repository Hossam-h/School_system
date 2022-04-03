<?php


namespace App\Repository;

use App\Models\Question;
use App\Models\Quizze;
use Exception;
use Illuminate\Support\Facades\Auth;

class QuestionRepository implements QuestionRepositoryInterface
{


    public function index(){
        $questions = Question::get();
        return view('Questions.index', compact('questions'));
    }

    public function create(){

        $quizzes = Quizze::get();
        return view('Questions.create',compact('quizzes'));
    }

    public function store($request){

        try{

            $validated = $request->validated();
        Question::create([

             'title'=>$request->title,
             'answers'=>$request->answers,
             'right_answer'=>$request->right_answer,
             'score'=>$request->score,
             'quizze_id'=>$request->quizze_id,

        ]);
        toastr()->success(trans('messages.sucess'));
        return redirect()->route('questions.create');

    }catch(Exception $e){
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
    }

    public function edit($id){
        $question = Question::findorfail($id);
        $quizzes = Quizze::get();
        return view('Questions.edit',compact('question','quizzes'));
    }

    public function update($request){

        try{
            $validated = $request->validated();
            $question = Question::findorfail($request->id);

            //dd($question->quizze->grade->Name);

dd(Auth::user()->id);
            $question->update([

                'title'=>$request->title,
                'answers'=>$request->answers,
                'right_answer'=>$request->right_answer,
                'score'=>$request->score,
                'quizze_id'=>$request->quizze_id,

            ]);


            toastr()->success(trans('messages.edit'));
            return redirect()->route('questions.index');

        }catch(Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


    }

    public function destroy($request){

        try {
            Question::destroy($request->id);
            toastr()->error(trans('messages.delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}

?>
