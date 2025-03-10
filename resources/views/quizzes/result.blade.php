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
        <a href="{{ route('quizzes.index') }}">戻る</a>
    </header>

    <div class="container mt-4">
        <h2>結果は...</h2>
            @if(isset($result) && isset($explanation))
                <div class="quiz-result">
                    <p><strong>結果:</strong> {{ $result }}</p>
                    <p><strong>解説:</strong> {{ $explanation }}</p>
                </div>
            @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
