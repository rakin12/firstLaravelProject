<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::all();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'phone'=>'required',
            'email'=>'email',
            'dateOfBirth'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('posts.create'))
                        ->withErrors($validator)
                        ->withInput();
        } else{
            $post = new Post;
            $post->name = $request->name;
            $post->phone = $request->phone;
            $post->email = $request->email;
            $post->dateOfBirth = $request->dateOfBirth;
            $post->address = $request->address;
            $post->save();
            return redirect(route('posts.index'))
                        ->with('success','Successfully Insert');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $post = Post::find($id);
        return view('update')->with('post',$post);
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

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'phone'=>'required',
            'email'=>'email',
            'dateOfBirth'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('posts.edit',$id))
                        ->withErrors($validator);
        } else{
            $post = Post::find($id);
            $post->name = $request->name;
            $post->phone = $request->phone;
            $post->email = $request->email;
            $post->dateOfBirth = $request->dateOfBirth;
            $post->address = $request->address;
            $post->save();
            return redirect(route('posts.index'))
                        ->with('success','Successfully Update');
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
        $post = Post::find($id);
        $post->delete();
        return redirect(route('posts.index'))->with('success','Successfully Deleted');
    }
}
