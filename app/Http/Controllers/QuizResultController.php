<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    // 解答を送信
    // public function sendAnswer(Request $request)
    // {
    //     // バリデーション
    //     $request->validate([
    //         // 'quiz_id' => 'required|exists:quizzes, id',
    //         'answer' => 'required|string|max:1',
    //     ]);

    //     // クイズを取得
    //     $quiz = Quiz::find($request->quiz_id);
    //     if (!$quiz) {
    //         return back()->with('error', 'クイズが見つかりませんでした。');
    //     }

    //     // 正誤判定
    //     $isCorrect = $quiz->correct_option === $request->answer;

    //     // 結果を保存
    //     QuizResult::create([
    //         'user_id' => auth()->id(),
    //         'quiz_id' => $quiz->id,
    //         'is_correct' => $isCorrect,
    //     ]);

    //     return redirect()->route('quizzes.showResult', ['quiz' => $quiz->id]);
    // }

    // 解答結果を表示
    public function showResult(Quiz $quiz, Request $request)
    {
        // バリデーション
        // $request->validate([
        //     // 'quiz_id' => 'required|exists:quizzes, id',
        //     'answer' => 'required|string|max:1',
        // ]);

        // クイズを取得
        $quiz = Quiz::find($request->quiz_id);
        if (!$quiz) {
            return back()->with('error', 'クイズが見つかりませんでした。');
        }

        // dd($request->answer);
        // dd($quiz->correct_option);

        $result = $quiz->correct_option === $request->answer ? '正解！' : '不正解...';
        $explanation = $quiz->explanation;
        // dd($result);

        return view('quizzes.result')->with([
            'result' => $result,
            'explanation' => $explanation
        ]);
     }
}
