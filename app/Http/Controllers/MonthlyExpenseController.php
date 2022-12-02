<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MonthlyExpense;

class MonthlyExpenseController extends Controller
{
    public function index()
    {
        $data = MonthlyExpense::where('remove_status', 1)->get();
        return view('general expense.expense2.index')->with(['expense' => $data]);
    }

    public function createExpense(Request $request)
    {
        $expense = $this->getMonthlyExpense($request);
        MonthlyExpense::create($expense);
        return redirect()->route('#expense2')->with(['createSuccess' => 'Created Successfully']);
    }

    public function editExpense($id)
    {
        $expense = MonthlyExpense::where('expense_id', $id)->first();
        return view('general expense.expense2.edit_expense2')->with(['expense' => $expense]);
    }

    public function updateExpense(Request $request)
    {
        $expense = $this->getMonthlyExpense($request);
        MonthlyExpense::where('expense_id', $request->expenseId)->update($expense);
        return redirect()->route('#expense2')->with(['updateSuccess' => 'Updated Successfully']);
    }

    public function deleteExpense($id)
    {
        MonthlyExpense::where('expense_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    protected function getMonthlyExpense($request)
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
