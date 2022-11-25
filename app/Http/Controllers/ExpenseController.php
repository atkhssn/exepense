<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::get();
        $total = 0;
        foreach ($expenses as $expense) {
            $total += $expense->expense_amount;
        }
        return view('expense.index', ['expenses' => $expenses, 'totalExpenses' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        if (!$request->expense_name && !$request->expense_amount) {
            return 'Please fill all the fields.';
        } else {
            Expense::create([
                'expense_category' => $request->expense_category,
                'expense_name' => $request->expense_name,
                'expense_amount' => intval($request->expense_amount)
            ]);

            Session::flash('message', "Expense saved.");
            return to_route('expense.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            abort(404);
        } else {
            return view('expense.show', ['expense' => $expense]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            abort(404);
        } else {
            return view('expense.edit', ['expense' => $expense]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, $id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            abort(404);
        } else {
            if (!$request->expense_name && !$request->expense_amount) {
                return 'Please fill all the fields.';
            } else {
                $expense->update([
                    'expense_category' => $request->expense_category,
                    'expense_name' => $request->expense_name,
                    'expense_amount' => intval($request->expense_amount)
                ]);

                Session::flash('message', "Expense updated.");
                return to_route('expense.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            abort(404);
        } else {
            Session::flash('message', "Expense deleted.");
            $expense->delete();
            return to_route('expense.index');
        }
    }
}
