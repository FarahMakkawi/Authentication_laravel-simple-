<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Lang</title>
</head>
<body>
    
    <h1>translate</h1>
    


    <p class="text-center">{{ trans('product.l') }}</p>
    <p class="text-center">{{ trans('product.subject') }}</p>

    
    <br><br><br>
    
   <a href="{{route('translate2')}}"  class="btn btn-info">translate </a>


</body>
</html>
{{-- // 1 dinamic --}}

 {{-- اذا بشكل ديناميكي بقلب ملف الميدل وير بكون في ملف لل لغات  --}}

{{-- setlocal بتغير قيمة اللغة بملف ال اي ان في  --}}