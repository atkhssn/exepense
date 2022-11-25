<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        $total = 0;
        foreach ($expenses as $expense) {
            $total += $expense->expense_amount;
        }
        return response()->json([
            'status' => true,
            'totalExpense' => $total,
            'expenses' => $expenses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        if (!$request) {
            return 'Please fill all the fields.';
        } else {
            $expenses = Expense::create([
                'expense_category' => $request->expense_category,
                'expense_name' => $request->expense_name,
                'expense_amount' => intval($request->expense_amount)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Expense Saved.',
                'expenses' => $expenses
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        $data = $expense->find($expense);

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        if (!$request) {
            return 'Please fill all the fields.';
        } else {
            $expense->update([
                'expense_category' => $request->expense_category,
                'expense_name' => $request->expense_name,
                'expense_amount' => intval($request->expense_amount)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Expense updated.',
                'expenses' => $expense
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return response()->json([
            'status' => true,
            'message' => 'Expense deleted.'
        ], 200);
    }
}
