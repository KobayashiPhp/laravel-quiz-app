<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規クイズ投稿</title>
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
        <form action="{{ route('quizzes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="question" class="form-label">質問</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ old('question') }}" required>
            </div>
            <div class="mb-3">
                <label for="option_a" class="form-label">選択肢 A</label>
                <input type="text" name="option_a" id="option_a" class="form-control" value="{{ old('option_a') }}" required>
            </div>
            <div class="mb-3">
                <label for="option_b" class="form-label">選択肢 B</label>
                <input type="text" name="option_b" id="option_b" class="form-control" value="{{ old('option_b') }}" required>
            </div>
            <div class="mb-3">
                <label for="option_c" class="form-label">選択肢 C</label>
                <input type="text" name="option_c" id="option_c" class="form-control" value="{{ old('option_c') }}" required>
            </div>
            <div class="mb-3">
                <label for="option_d" class="form-label">選択肢 D</label>
                <input type="text" name="option_d" id="option_d" class="form-control" value="{{ old('option_d') }}" required>
            </div>
            <div class="mb-3">
                <label for="correct_option" class="form-label">正解</label>
                <select name="correct_option" id="correct_option" class="form-control" required>
                    <option value="option_a">A</option>
                    <option value="option_b">B</option>
                    <option value="option_c">C</option>
                    <option value="option_d">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="explanation" class="form-label">解説 (任意)</label>
                <textarea name="explanation" id="explanation" class="form-control">{{ old('explanation') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">クイズを投稿</button>
        </form>
    </div>
</body>
</html>