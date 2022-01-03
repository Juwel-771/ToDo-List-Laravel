<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>To-DO List</title>
</head>

<body class="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-6  w-25 mt-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center">To-do List</h3>
                        <form action="{{ route('store')}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <ul class="list-group">
                                    <li class="list-group-item"><input type="text" name="text" class="form-control"
                                            placeholder="Add Your Text"><br></li>
                                    <li class="list-group-item"><input type="text" name="body" class="form-control"
                                            placeholder="Add Details"><br></li>
                                    <li class="list-group-item"><input type="text" name="due" class="form-control"
                                            placeholder="Add Deadline"><br></li>
                                </ul>
                                <button type="submit" class="btn btn-dark btn-sm px-4 my-4">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 w-25 mt-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center">You List</h3>
                        @if (count($todolist))
                        <ul class="list-group list-group-flush mt-3">
                            @foreach ($todolist as $todo)
                            <li class="list-group-item">
                                <form action="{{ route('destroy',$todo->id) }}" method="POST">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span>Text: </span>
                                            <br>
                                            {{$todo->text}}
                                            <br><br>
                                            <span>Details: </span>
                                            <br>
                                            {{$todo->body}}
                                            <br><br>
                                            <span>Time: </span>
                                            <br>
                                            {{$todo->due}}
                                            <br><br>
                                        </li>
                                    </ul>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm float-end my">Delete</button>
                                </form>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>











    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
