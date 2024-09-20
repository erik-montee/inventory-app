<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function updateItem(Request $request, $id)
    {
        $input = $request->all();
        $item = Item::find($id);
        if(!($item == null)) {
            $item->quantity = $item->quantity - $input['quantity_taken'];
            $item->save();
            $item->changes()->create(['quantity' => $input['quantity_taken'], 'user_identifing_info_1' => $input['user_identifing_info_1'], 'user_identifing_info_2' => $input['user_identifing_info_2'] ]);
        }
        return redirect('/item/' . $id . '/update?submitted=true');
    }

    public function itemForm(Request $request, $id)
    {
        $item = Item::find($id);
        if($item ==null) {
            return "Item has been deleted.";
        }
        return view('form', ['item'=> $item, 'submitted' => $request['submitted']]);
    }
}
