<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddItemRequest;
use App\Item;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'items_list' );
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.items');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        $categories=Category::all();
        return view('items.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddItemRequest $request )
    {
        //save image to the public/storage/shoes directory
        $file=$request->file('image');
        $fileName= Storage::put('items', $file);

        //create entry in Table
        $attributes= [ 
            'name'=>$request->name,
            'category'=>$request->category,
            'user_id'=> auth()->user()->id,
            'brand_id'=> $request->brand_id,
            'description'=>$request->description,
            'price'=> $request->price ,
            'fileName'=>'storage/'.$fileName, 
            'contact_email'=>$request->contact_email,
            'contact_telephone'=>$request->contact_telephone,
        ];
        Item::create($attributes);

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::find($id);
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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

    public function items_list()
    {
        $items=Item::with('brand')->get();
        return $items;
    }
}
