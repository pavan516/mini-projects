<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //$posts = DB::select('SELECT * FROM posts ORDER by 1 DESC LIMIT 0,50');
        return view('index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
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
            'title' => 'required',
            'Description' => '',
            'image' => '',
            'youtubeurl' => '',
            'status' => 'required'
        ]);

        //create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->Description = $request->input('Description');
        
        if($request->hasFile('image')) 
        {
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
            
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
                
            //Upload File
            $request->file('image')->storeAs('public/images', $filenametostore);

            $post->image = $filenametostore;
            
            //We will write TinyPNG Compress Image Code Here
            /*
            //TinyPNG Compress Image
            $filepath = public_path('storage/images/'.$filenametostore);
            try 
            {
                \Tinify\setKey("TINIFY_DEVELOPER_KEY");
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            } 
            catch(\Tinify\AccountException $e) 
            {
               // Verify your API key and account limit.
               return redirect('images/create')->with('error', $e->getMessage());
            } 
            catch(\Tinify\ClientException $e) 
            {
                // Check your source image and request options.
                return redirect('images/create')->with('error', $e->getMessage());
            } 
            catch(\Tinify\ServerException $e) 
            {
                return redirect('images/create')->with('error', $e->getMessage());
            } 
            catch(\Tinify\ConnectionException $e) 
            {
                // A network connection error occurred.
                return redirect('images/create')->with('error', $e->getMessage());
            } 
            catch(Exception $e) 
            {
                // Something else went wrong, unrelated to the Tinify API.
                return redirect('/home')->with('error', $e->getMessage());
            }
            */

        }        
        $post->youtubeurl = $request->input('youtubeurl');
        $post->status = $request->input('status');
        $post->save();

        return redirect('/home')->with('success','Successfully created Post!');
        
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
        $post = Post::find($id);
        return view('edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'Description' => '',
            'image' => '',
            'youtubeurl' => '',
            'status' => 'required'
        ]);

        //create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->Description = $request->input('Description');
        
        if($request->hasFile('image')) 
        {
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
            
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
                
            //Upload File
            $request->file('image')->storeAs('public/images', $filenametostore);

            $post->image = $filenametostore;
            
            //We will write TinyPNG Compress Image Code Here
            /*
            //TinyPNG Compress Image
            $filepath = public_path('storage/images/'.$filenametostore);
            try 
            {
                \Tinify\setKey("TINIFY_DEVELOPER_KEY");
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            } 
            catch(\Tinify\AccountException $e) 
            {
               // Verify your API key and account limit.
               return redirect('images/create')->with('error', $e->getMessage());
            } 
            catch(\Tinify\ClientException $e) 
            {
                // Check your source image and request options.
                return redirect('images/create')->with('error', $e->getMessage());
            } 
            catch(\Tinify\ServerException $e) 
            {
                return redirect('images/create')->with('error', $e->getMessage());
            } 
            catch(\Tinify\ConnectionException $e) 
            {
                // A network connection error occurred.
                return redirect('images/create')->with('error', $e->getMessage());
            } 
            catch(Exception $e) 
            {
                // Something else went wrong, unrelated to the Tinify API.
                return redirect('/home')->with('error', $e->getMessage());
            }
            */

        }        
        $post->youtubeurl = $request->input('youtubeurl');
        $post->status = $request->input('status');
        $post->save();

        return redirect('/allposts')->with('success','Successfully Edited Post!');
        
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
        return redirect('/allposts')->with('success','Successfully Deleted Post!');
        
    }

    public function mail(Request $request)
    {
        //
    }
}
