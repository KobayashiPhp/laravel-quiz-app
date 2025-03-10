<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ一覧</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="p-3 bg-light">
        <h1>みんなのクイズ</h1>
        <a href="{{ route('quiz.create') }}" class="btn btn-success">クイズを作る</a>
    </header>

    <div class="container mt-4">
        <h2>投稿クイズ一覧</h2>
        @foreach ($quizzes as $quiz)
            <div class="card p-3 my-3">
                <h3>{{ $quiz->question }}</h3>

                <!-- 解答ボタン -->
                <form action="{{ route('quizzes.showResult', $quiz->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

                    <button type="submit" name="answer" value="option_a" class="btn btn-outline-primary">A: {{ $quiz->option_a }}</button>
                    <button type="submit" name="answer" value="option_b" class="btn btn-outline-primary">B: {{ $quiz->option_b }}</button>
                    <button type="submit" name="answer" value="option_c" class="btn btn-outline-primary">C: {{ $quiz->option_c }}</button>
                    <button type="submit" name="answer" value="option_d" class="btn btn-outline-primary">D: {{ $quiz->option_d }}</button>
                </form>

                <!-- 編集 & 削除 -->
                <div class="mt-3">
                    <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-warning">編集する</a>
                    <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">
                            削除
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
