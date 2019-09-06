<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(10);
        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::transaction.index',$viewData);
    }
    public function viewOrder(Request $request,$id)
    {
        if($request->ajax())
        {
            $orders = Order::with('product')
                ->where('or_transaction_id',$id)->get();

            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }
    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $transaction = Transaction::find($id);
            switch ($action) {
                case 'delete':
                    $transaction->delete();
                    break;
                case 'active':
                    $transaction->tr_status = $transaction->tr_status ? 0 : 1;
                    break;
            }
            $transaction->save();

        }
        return redirect()->back();
    }

}
