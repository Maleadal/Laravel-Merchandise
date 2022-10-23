<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::orderBy('price', 'ASC')->get();
    }

    public function getByCollege($college_id){
        return Item::where('department_id', '=', $college_id)->get();
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
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->price = $request->item['price'];
        $newItem->department_id = $request->item['department_id'];
        $newItem->quantity = $request->item['quantity'];
        $newItem->save();

        return "Item created Successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);

        if($item){
            return $item;
        }
        return "Item not found";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);

        if($item){
            $item->item_sold = $item->item_sold + 1;
            $item->quantity = $item->quantity - 1;
            $item->save();
            return "Success";
        }
        else{
            return "Item not found";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingItem = Item::find($id);

        if(!$existingItem){
            return "Item not found";
        }

        if($request->type == "price"){
            $existingItem->price = $request->item['value'];
            $existingItem->save();

            return "Price Successfully changed";
        }
        else if($request->type == "quantity"){
            $existingItem->quantity = $request->item['value'];
            $existingItem->save();
            
            return "Quantity Successfully changed";
        }
        else if($request->type == "name"){
            $existingItem->name = $request->item['value'];
            $existingItem->save();

            return "Name successfully changed";
        }
        else{
            return "Please specify edit type";
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
        $existingItem = Item::find($id);

        if($existingItem){

            $existingItem->delete();
            return "Item deleted successfully";
        }

        return "Item not found";
    }
}
