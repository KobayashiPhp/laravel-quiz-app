<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ編集</title>
</head>
<body>
    <header>
        <h1>みんなのクイズ</h1>
        <a href="{{ route('quizzes.index') }}">戻る</a>
    </header>
    <h2>クイズ作成</h2>
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="question" class="form-label">質問</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ old('question', $quiz->question) }}" required>
            </div>
            <div class="mb-3">
                <label for="option_a" class="form-label">選択肢 A</label>
                <input type="text" name="option_a" id="option_a" class="form-control" value="{{ old('option_a', $quiz->option_a) }}" required>
            </div>
            <div class="mb-3">
                <label for="option_b" class="form-label">選択肢 B</label>
                <input type="text" name="option_b" id="option_b" class="form-control" value="{{ old('option_b', $quiz->option_b) }}" required>
            </div>
            <div class="mb-3">
                <label for="option_c" class="form-label">選択肢 C</label>
                <input type="text" name="option_c" id="option_c" class="form-control" value="{{ old('option_c', $quiz->option_c) }}" required>
            </div>
            <div class="mb-3">
                <label for="option_d" class="form-label">選択肢 D</label>
                <input type="text" name="option_d" id="option_d" class="form-control" value="{{ old('option_d', $quiz->option_d) }}" required>
            </div>
            <div class="mb-3">
                <label for="correct_option" class="form-label">正解</label>
                <select name="correct_option" id="correct_option" class="form-control" required>
                    <option value="A" {{ old('correct_option', $quiz->correct_option) == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('correct_option', $quiz->correct_option) == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('correct_option', $quiz->correct_option) == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('correct_option', $quiz->correct_option) == 'D' ? 'selected' : '' }}>D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="explanation" class="form-label">解説 (任意)</label>
                <textarea name="explanation" id="explanation" class="form-control">{{ old('explanation', $quiz->explanation) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">クイズを編集</button>
        </form>
    </div>
</body>
</html>