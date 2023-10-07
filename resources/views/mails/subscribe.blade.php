<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spring Shop</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{$product->name}}</h3>
            <p class="text-warning">ks{{$product->price}}</p>
            <p class="text-muted">{{$product->category->name}}</p>
            <p class="text-muted">{{$product->description}}</p>
        </div>
    </div>
</body>
</html>