<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items= session('carts');
        $cost=0;
        if (isset($items))
        {
            foreach($items as $item)
            {
             $cost+= $item->price;
            }
        }
        return view('cart.show', compact('items', 'cost'));
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
        $item=Item::find($request->id);
        
        $carts = session('carts');
        
        if (empty($carts)) {
           $carts = array($item->id => $item );
        }
        else {
            $carts = $carts + array($item->id => $item );
        }

        session()->put('carts', $carts);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // get array from session
        $array = session('carts');

        // check item if exists in the session
        if (isset($array[$request->id])) {
            unset($array[$request->id]);    
        
            if(sizeof($array)>0)
            {
                session()->put('carts', $array);
            }
            else{session()->forget('carts');}
        }
        
        return redirect()->back();
    }
}
