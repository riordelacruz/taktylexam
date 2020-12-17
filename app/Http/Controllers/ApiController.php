<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;

class ApiController extends Controller
{
    public function generateScore(Request $request) {
    	$generatedScore = rand($request->score_from, $request->score_to);

    	$score = new Score;
    	$score->score_actual = $generatedScore;
    	$score->score_from = $request->score_from;
    	$score->score_to = $request->score_to;
    	$score->created_at = date('Y-m-d');
    	$score->save();

        $totalGeneratedScoreToDate = Score::where('created_at', date('Y-m-d'))->get();

    	return response()->json([
        	"score" 				=> $generatedScore,
        	"timestamp" 			=> date('Y-m-d H:i:s'),
        	"generated_score_today" => $totalGeneratedScoreToDate->count()
    	], 201);
    }
}
