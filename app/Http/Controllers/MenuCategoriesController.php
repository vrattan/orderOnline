<?php

namespace App\Http\Controllers;

use App\MenuCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MenuCategoriesResource;

class MenuCategoriesController extends Controller
{
   //  public function __construct()
   // {
   //     $this->middleware('auth');
   // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //  $cat = MenuCategories::get();
       // return response()->json([
       //     'cat'    => $cat,
       // ], 200);
    	$mwnu = MenuCategories::with('parent')->get();
        return MenuCategoriesResource::collection($mwnu);
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
        $this->validate($request, [
            'name' => 'required',         
            // 'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $cat = new MenuCategories;

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/uploads/posts');
        //     $imagePath = $destinationPath . "/" . $name;
        //     $image->move($destinationPath, $name);
        //     $cat->image = $name;
        // }
        if ($request->hasFile('image')) {
        	$this->validate($request, [
            // 'name' => 'required',         
            	'image' => 'image|mimes:jpeg,png,jpg',
        	]);
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $cat->image = $name;
        }

        $cat->name = $request->name;
        $cat->description = $request->description;
        if($request->parent_id > 0)
        {
        	$cat->parent_id = $request->parent_id;
        }
        
        $cat->priority = $request->priority;
        $cat->status = $request->status;
        $cat->permalink_slug = $request->permalink_slug;
        $cat->save();

        return new MenuCategoriesResource($cat);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuCategories  $menuCategories
     * @return \Illuminate\Http\Response
     */
    public function show(MenuCategories $menuCategories,$id)
    {
       //  return response()->json([
       //     'message' => $menuCategories
       // ], 200);
        // dd($menuCategories);
        $menuCategories = MenuCategories::findOrFail($id);
        return new MenuCategoriesResource($menuCategories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuCategories  $menuCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuCategories $menuCategories)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuCategories  $menuCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MenuCategories $menuCategories,$id)
    {
    	// return $request;
        $this->validate($request, [
            'name' => 'required',     
            'permalink_slug' => 'regex:/^[\pL\s\-]+$/u|unique:menu_categories,permalink_slug,'.$id,
            // 'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $menuCategories = MenuCategories::findOrFail($id);
        if ($request->hasFile('image')) {
        	$this->validate($request, [        
            	'image' => 'image|mimes:jpeg,png,jpg',
        	]);
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $menuCategories->image = $name;
        }
        if($request->image == null || $request->image == 'null')
        {
        	$menuCategories->image = NULL;
        }
        $menuCategories->name = $request->get('name');
        $menuCategories->description = $request->description;
        if($request->parent_id > 0 )
        {
        	$menuCategories->parent_id = $request->parent_id;
        }
        else
        {
        	$menuCategories->parent_id = NULL;
        }
        
        $menuCategories->priority = $request->priority;
        $menuCategories->status = $request->status;
        $menuCategories->permalink_slug = $request->permalink_slug;
        $menuCategories->save();

        return new MenuCategoriesResource($menuCategories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuCategories  $menuCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuCategories $menuCategories,$id)
    {
        $menuCategories = MenuCategories::findOrFail($id);
        $menuCategories->delete();
        return new MenuCategoriesResource($menuCategories);
    }
}
