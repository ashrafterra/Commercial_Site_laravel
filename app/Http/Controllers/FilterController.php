<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Brand;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filters()
    {
        $categories=Category::all();
        $brands=Brand::all();
        return ['categories'=>$categories, 'brands'=>$brands];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brands()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $brand_id=0;
        if(!$request->category){
            if($request->brand){
                $brand_id=Brand::where('brand',$request->brand)->first()->id;
                $items=Item::with('brand')->where('brand_id',$brand_id)->get();
            }
            else{$items=Item::with('brand')->get();}
        }
        else{
            if($request->brand){
                $brand_id=Brand::where('brand',$request->brand)->first()->id;
                $items=Item::with('brand')->where('brand_id',$brand_id)->where('category',$request->category)->get();
            }
            else{
                $items=Item::with('brand')->where('category',$request->category)->get();
            }
        }
          
        return $items;
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
    public function destroy($id)
    {
        //
    }
}
