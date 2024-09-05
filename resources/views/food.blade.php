<html>
<head>
    <title>Foods</title>
</head>
<body>
    @foreach ($foods as $food)
        <div>
            <img src="{{ $food['photo'] }}" alt="{{ str_replace('_', ' ', $food['name']) }}">
            <p>{{ str_replace('_', ' ', $food['name']) }}</p>
        </div>
    @endforeach
</body>
</html>