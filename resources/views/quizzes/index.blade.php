<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ一覧</title>
</head>
<body>
    <header>
        <h1>みんなのクイズ</h1>
        <a href="{{ route('quiz.create') }}">クイズを作る</a>
    </header>
    <h2>投稿クイズ一覧</h2>
    <div>
        @foreach ($quizzes as $quiz)
            <h3>{{ $quiz->question }}</h3>
            <!-- 後でボタンにする -->
            <p>A: {{ $quiz->option_a }}</p>
            <p>B: {{ $quiz->option_b }}</p>
            <p>C: {{ $quiz->option_c }}</p>
            <p>D: {{ $quiz->option_d }}</p>
            <a href="{{ route('quiz.edit', $quiz->id) }}">編集する</a>
            <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');">
                    削除
                </button>
            </form>
        @endforeach
    </div>
</body>
</html>