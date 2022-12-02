<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\YearlyExpense;

class YearlyExpenseController extends Controller
{
    public function index()
    {
        $data = YearlyExpense::where('remove_status', 1)->get();
        return view('general expense.expense3.index')->with(['expense' => $data]);
    }

    public function createExpense(Request $request)
    {
        $expense = $this->getYearlyExpense($request);
        YearlyExpense::create($expense);
        return redirect()->route('#expense3')->with(['createSuccess' => 'Created Successfully']);
    }

    public function editExpense($id)
    {
        $expense = YearlyExpense::where('expense_id', $id)->first();
        return view('general expense.expense3.edit_expense3')->with(['expense' => $expense]);
    }

    public function updateExpense(Request $request)
    {
        $expense = $this->getYearlyExpense($request);
        YearlyExpense::where('expense_id', $request->expenseId)->update($expense);
        return redirect()->route('#expense3')->with(['updateSuccess' => 'Updated Successfully']);
    }

    public function deleteExpense($id)
    {
        YearlyExpense::where('expense_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    protected function getYearlyExpense($request)
    {
        $data = [
            'from_date' => Carbon::parse($request->fDate),
            'to_date' => Carbon::parse($request->tDate),
            'expense' => $request->expense,
            'amount' => $request->amount,
            'description' => $request->description,
            'remove_status' => 1,
        ];
        return $data;
    }
}
