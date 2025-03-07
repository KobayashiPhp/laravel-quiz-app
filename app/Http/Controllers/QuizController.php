<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // クイズ一覧を表示
    public function index()
    {
        $quizzes = Quiz::all(); // 後でページネーションにする
        return view('quizzes.index', ['quizzes' => $quizzes]); // 後で、compact()を使ってみる
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('quizzes.edit', ['quiz' => $quiz]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            // 'correct_option' => 'required|string|in:A, B, C, D',
            // 上手くいかなかった。
            'explanation' => 'nullable|string',
        ]);
        // dd($request);
        // dd($request->all());

        Quiz::create([
            'user_id' => Auth::id(),
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_option' => $request->correct_option,
            'explanation' => $request->explanation,
        ]);

        return redirect()->route('quizzes.index')->with('success', 'クイズを作成しました！');
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'explanation' => 'nullable|string',
        ]);

        $quiz->update([
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_option' => strtoupper($request->correct_option), // 念のため大文字に統一
            'explanation' => $request->explanation,
        ]);

        return redirect()->route('quizzes.index')->with('success', 'クイズを更新しました！');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'クイズを削除しました！');
    }
}
