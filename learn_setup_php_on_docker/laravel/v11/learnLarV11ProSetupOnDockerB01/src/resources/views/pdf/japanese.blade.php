<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: ipaexg;
            padding: 50px;
        }

        .content {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>{{ $data['title'] }}</h1>
        <p>{{ $data['date'] }}</p>
        <p>請求金額: {{ $data['amount'] }}</p>
    </div>
</body>

</html>