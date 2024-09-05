<html>
<head>
    <title>Menus</title>
</head>
<body>
    @foreach ($menus as $menu)
        <div>
            <h3>{{ $menu['name'] }}</h3>
            <img src="{{ $menu['photo'] }}" alt="{{ $menu['name'] }}">
        </div>
    @endforeach
</body>
</html>