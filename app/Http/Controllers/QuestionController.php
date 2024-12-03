<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
    
        return redirect()->back()->with('success', 'Pregunta eliminada exitosamente.');
    }
    

}
