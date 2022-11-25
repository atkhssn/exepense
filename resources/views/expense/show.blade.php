
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
                <a href="{{url()->previous()}}" class="btn btn-primary my-5">Go Back</a>
              </div>

                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Expense Name</th>
                        <th scope="col">Expense category</th>
                        <th scope="col">Expense Amount</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{$expense->id}}</th>
                        <td>{{$expense->expense_name}}</td>
                        <td>{{$expense->expense_category}}</td>
                        <td>{{$expense->expense_amount}}</td>
                        <td>
                          <a href="{{route('expense.edit', $expense->id)}}">Edit</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>