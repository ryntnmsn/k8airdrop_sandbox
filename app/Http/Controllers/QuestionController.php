<?php

namespace App\Http\Controllers;
use App\Models\Language;
use App\Models\Platform;
use App\Models\Promo;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //MANAGE QUESTIONS
    public function index($id) {
        $promo = Promo::findOrfail($id);
        $language = Language::all();
        $question = Question::where('promo_id', $id);
        return view('admin/promo/questions/index', [
            'questions' => $question->get(),
            'promos' => $promo,
        ]);
    }

    public function store(Request $request) {

        if($request->type == "single_select" || $request->type == "multiple_select") {
            if($request->choices == null) {
                return redirect()->back()->with('error', 'Please add options to proceed.');
            } else {
                $question = $request->question;
        
                $question_create = Question::create([
                    'question' => $request->question,
                    'type' => $request->type,
                    'promo_id' => $request->promo_id,
                    'promo_url_id' => $request->promo_url_id,
                    'language_id' => $request->language_id,
                ]);
        
                $choices = $request->choices;
                
                foreach ($choices as $choice => $choice_value) {
                    $choicesS[] = Choice::create([
                        'question_id' => $question_create->id,
                        'choice' => $choice_value,
                        'language_id' => $request->language_id,
                    ]);
                }
        
                return redirect()->back()->with('message', 'New question added successfully.');
            }
        } else {
            Question::create([
                'question' => $request->question,
                'type' => $request->type,
                'promo_id' => $request->promo_id,
                'promo_url_id' => $request->promo_url_id,
                'language_id' => $request->language_id,
            ]);

            return redirect()->back()->with('message', 'New question added successfully.');
        }
    }

    public function edit($id) {
        $question = Question::with('choices')->findOrfail($id);
        return view('admin/promo/questions/edit', [
            'question' => $question,
        ]);
    }

    public function update(Request $request, $id) {
        $question = Question::findOrfail($id);
        if($request->type == "single_select" || $request->type == "multiple_select") {
            if($request->choices == null) {
                return redirect()->back()->with('error', 'Please add options to proceed.');
            } else {
                $question->update([
                    'question' => $request->question,
                    'type' => $request->type,
                ]);

                $choices = Choice::where('question_id', $id);
            
                $choices->delete();
                
                foreach ($request->choices as $choice => $choice_value) {
                    $choicesS[] = Choice::create([

                        'choice' => $choice_value,
                        'question_id' => $question->id
                    ]);
                }
                return redirect()->back()->with('message', 'Question updated successfully.');
            }
        } else {
            
            $question->update([
                'question' => $request->question,
                'type' => $request->type,
            ]);
            
            return redirect()->back()->with('message', 'New question added successfully.');
        }
    }

    public function destroy(Request $request) {
        $question_id = $request->question_id;
        $promo_id = $request->promo_id;
        $question = Question::where('id', $question_id);
        $choices = Choice::where('question_id', $question_id);
        $question->delete();
        $choices->delete();
        
        return redirect('/admin/airdrop/promo/manage_question/' .$promo_id)->with('message', 'Question deleted successfully.');
    }
}
