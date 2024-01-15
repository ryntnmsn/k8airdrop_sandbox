<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Promo;
use App\Models\Question;
use Excel;
use App\Exports\ExportParticipants;
use App\Models\Comment;
use Carbon\Carbon;

class ParticipantController extends Controller
{
    public function store(Request $request) {
        $participant = Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'k8_username' => $request->k8_username,
            'promo_id' => $request->id,
            'winner' => $request->winner,
        ]);
        $participant->promos()->attach($request->id);
        return redirect()->back()->with('message', 'New participant added successfully.');
    }

    public function update(Request $request, $id) {
        $participant = Participant::findOrfail($id);
        $participant->update([
            'winner' => $request->winner,
        ]);
        $participant->promos()->syncWithoutDetaching($request->promo_id);
        return redirect()->back()->with('message', 'Participant updated successfully');
    }

    public function view($id) {
        
        $participant = Participant::with('choices', 'promos')->where('id', $id)->first();
        $promos = Promo::where('id', $participant->promo_id);

        $questions = Question::where('promo_id', $participant->promo_id);

        return view('admin.promo.participant.edit', [
            'participant' => $participant,
            'questions' => $questions->get(),
        ]);
    }

    public function winner(Request $request) {
        $participant = Participant::findOrfail($request->id);
        $participant->update([
            'name' => $request->name,
            'winner' => "Yes",
        ]);
        $participant->promos()->syncWithoutDetaching($request->promo_id);
        return redirect()->back()->with('message', 'Participant updated successfully');
    }
    
    public function destroy($id) {
        $participant = Participant::findOrfail($id);
        $participant->promos()->detach();
        $participant->delete();
        return redirect()->back()->with('message', 'Participant deleted successfully!');
        
    }
    
    public function exportParticipantData($url_id) {
        return Excel::download(new ExportParticipants($url_id), 'Participants_' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }
}
