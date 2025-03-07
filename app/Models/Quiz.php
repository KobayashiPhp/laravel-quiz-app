<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'user_id', 
        'question', 
        'option_a', 
        'option_b', 
        'option_c', 
        'option_d', 
        'correct_option', 
        'explanation'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function edit($data)
    {
        $quiz = Quiz::find($data->id);
        $quiz->question = $data->question;
        $quiz->option_a = $data->option_a;
        $quiz->option_b = $data->option_b;
        $quiz->option_c = $data->option_c;
        $quiz->option_c = $data->option_c;
        $quiz->correct_option = $data->correct_option;
        $quiz->explanation = $data->explanation;
        $quiz->save();
        return $quiz;
    }
}
