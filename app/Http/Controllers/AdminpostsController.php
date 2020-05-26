<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use App\Category;

class AdminpostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   
    {
        $categories=Category::pluck('name','id')->all();  
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'category_id'=>'required',
            'photo_id'=>'required',
            'body'=>'required',  

        ]);
      
  
      
        $input=$request->all();
        $user=Auth::user();
        if($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;

          
          }


          $user->posts()->create($input);
          
       return redirect('/admin/posts')->with('status','post created');
    
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
        $post=Post::find($id);
        $categories=Category::pluck('name','id')->all();  
        return view('admin.posts.edit' ,compact('post','categories'));
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
        
        $this->validate($request,[
            'title'=>'required',
            'category_id'=>'required',
            'photo_id'=>'required',
            'body'=>'required',  

        ]);
      
  
      
        $input=$request->all();
        $user=Auth::user();
        if($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;

          
          }


          $user->posts()->whereId($id)->first()->update($input);
          
       
       return redirect('/admin/posts')->with('status','post updated');
    
   // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $post=Post::findOrFail($id);
            unlink(public_path()."/images/". $post->photo->file);
      
              $post->delete($id);
              return redirect('/admin/posts')->with('status','Post deleted');;
          }
    }
}
