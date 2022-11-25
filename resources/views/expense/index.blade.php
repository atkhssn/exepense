<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Total Expense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 my-5">
              <div>
                <a href="{{route('expense.create')}}" class="btn btn-primary my-5">Add Expense</a>
              </div>

             
                @if (Session::has('message'))
                    <p class="text-success">{{Session::get('message')}}</p>
                @endif

                <div class=" col-md-4 card mb-5">
                  <h2 class="text-info">
                    Total Expense: {{$totalExpenses}}
                  </h2>
                </div>


                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Expense Name</th>
                        <th scope="col">Expense Category</th>
                        <th scope="col">Expense Amount</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($expenses as $expense)
                      <tr>
                        <th scope="row">{{$expense->id}}</th>
                        <td>{{$expense->expense_name}}</td>
                        <td>{{$expense->expense_category}}</td>
                        <td>{{$expense->expense_amount}}</td>
                        <td>
                          <a href="{{route('expense.show', $expense->id)}}">View</a> <span> | </span>
                          <a href="{{route('expense.edit', $expense->id)}}">edit</a> <span> | </span>
                          <form action="{{route('expense.destroy', $expense->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Del</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>