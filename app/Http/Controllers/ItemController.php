<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::orderBy('created_at', 'desc')->get();
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

        $newItem->name = $request->name;
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $distanceCovered = 0;

        $steps = 0;

        while ($distanceCovered < 20) {
            ++$steps;
            $distanceCovered += 3;
            echo "Distance Covered $distanceCovered metres on step $steps<br/>";
            if ($distanceCovered >= 20) break;
            $distanceCovered -= 1;
            ++$steps;
            echo "Distance Covered $distanceCovered metres on step $steps <br/>";
        }
        return "Total Steps he took $steps";

        return Item::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $thisItem = Item::find($id);

        if ($thisItem) {
            $thisItem->completed = $request->completed ? true : false;
            $thisItem->completed_at = $request->completed ? Carbon::now() : null;
            $thisItem->save();
            return $thisItem;
        }
        return "Item Not Found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thisItem = Item::find($id);
        if ($thisItem) {
            $thisItem->delete();
            return "Item Deleted Successfully";
        }
        return "Item Not Found";
    }
}
