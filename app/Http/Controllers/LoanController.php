<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function list()
    {
        $oLoanList = Loan::all();
        return response()->json([
            "success" => true,
            "message" => "loan List",
            "data" => $oLoanList
        ]);
    }

    public function store(Request $request)
    {
        if (!$request->user_id) {
            return response()->json([
                "success" => false,
                "message" => "User id is missed.",
                "data" => []
            ]);
        }
        if (!$request->amount) {
            return response()->json([
                "success" => false,
                "message" => "Amount is missed.",
                "data" => []
            ]);
        }
        if (!$request->week) {
            return response()->json([
                "success" => false,
                "message" => "week is missed.",
                "data" => []
            ]);
        }
        $oLoan = Loan::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'week' => $request->week
        ]);
        return response()->json([
            "success" => true,
            "message" => "Loan created successfully.",
            "data" => $oLoan
        ]);
    }

    public function update($id, Request $request)
    {
        $oLoan = Loan::find($id);
        if (!$oLoan) {
            return response()->json([
                "success" => false,
                "message" => "Loan is not found.",
                "data" => []
            ]);
        }

        if (!$request->approver_id) {
            return response()->json([
                "success" => false,
                "message" => "Approver id is missed.",
                "data" => []
            ]);
        }

        $updateData = [
            'approver_id' => $request->approver_id
        ];

        if ($request->amount) {
            $updateData['amount'] = $request->amount;
        }

        $oLoan = Loan::where("id", $id)->update($updateData);
        return response()->json([
            "success" => true,
            "message" => "Loan updated successfully.",
            "data" => $oLoan
        ]);
    }
}
