<?php

namespace App\Http\Controllers;

use App\Models\DailyExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyExpenseController extends Controller
{
    public function index()
    {
        $data = DailyExpense::where('remove_status', 1)->get();
        return view('general expense.expense1.index')->with(['expense' => $data]);
    }

    public function createExpense(Request $request)
    {
        $expense = $this->getDailyExpense($request);
        DailyExpense::create($expense);
        return redirect()->route('#expense1')->with(['createSuccess' => 'Created Successfully']);
    }

    public function editExpense($id)
    {
        $expense = DailyExpense::where('expense_id', $id)->first();
        return view('general expense.expense1.edit_expense1')->with(['expense' => $expense]);
    }

    public function updateExpense(Request $request)
    {
        $expense = $this->getDailyExpense($request);
        DailyExpense::where('expense_id', $request->expenseId)->update($expense);
        return redirect()->route('#expense1')->with(['updateSuccess' => 'Updated Successfully']);
    }

    public function deleteExpense($id)
    {
        DailyExpense::where('expense_id', $id)->update(['remove_status' => 0]);
        return back()->with(['deleteSuccess' => 'Deleted Successfully']);
    }

    protected function getDailyExpense($request)
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
