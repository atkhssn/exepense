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
            <div class="col-md-8 offset-2 mt-5">
                <h3 class="text-primary my-3">Edit Expense</h3>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                <form class="row gx-3 gy-2 align-items-center" method="POST" action="{{route('expense.update', $expense->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="col-md-6">

                        <div class="input-group mt-3">
                            <select class="form-select" name="expense_category">
                              <option selected disabled>--Select Expense Category --</option>
                              <option @selected($expense->expense_category == 'home') value="home">Home Expense</option>
                              <option @selected($expense->expense_category == 'utility') value="utility">Utility Bills </option>
                              <option @selected($expense->expense_category == 'others') value="others">Others Expense</option>
                            </select>
                        </div>
                        
                        <div class="input-group mt-3">
                            <div class="input-group-text">Expense Name</div>
                            <input type="text" class="form-control" name="expense_name" value={{$expense->expense_name}}>
                        </div>

                        <div class="input-group mt-3">
                            <div class="input-group-text">Expense Amount</div>
                            <input type="text" class="form-control" name="expense_amount" value={{$expense->expense_amount}}>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                      <button type="submit" class="btn btn-primary">Update Expense</button>
                    </div>

                  </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>