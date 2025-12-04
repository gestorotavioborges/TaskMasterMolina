<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col8 my-5 mb-5">
                <div class="border-bottom d-flex justify-content-between align items-center">
                    <h2>Cadastro de trabalhos a fazer</h2>
                    <a href="{{ route('trabalho.index')}}" class="btn btn-primary">Retornar</a>
                </div>

                @if ($errors ->any())
                
                    <ul>
                        @foreach($errors ->all() as $error )
                            <li>{{ $error}}</li>
                        @endforeach
                    </ul>   

                @endif


                <form action="{{ route('trabalho.store') }}" method="POST">

                    @csrf
                
                <div class="form-group mt-3">
                    <label for="name">Nome da Tarefa</label>
                    <input type="text" id="name" name="name" class="form-control">
                
                </div>
                
                <div class="form-group mt-3">
                    <label for="descricao">Descrição da Tarefa</label>
                    <input type="text" id="descricao" name="description" class="form-control">
                
                </div>
                
                <div class="form-group mt-3">
                    <button class="btn btn-primary">Adicionar Tarefa</button>
            
                </div>


                </form>


                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>