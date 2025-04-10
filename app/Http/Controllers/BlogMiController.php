<?php

namespace App\Http\Controllers;

use App\Models\BlogMi;
use Illuminate\Http\Request;
use DOMDocument;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogMiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blogmi::all();
        return view('blogmi.index', compact('blogs'));
    }
    public function blogs()
    {
        $blogs = BlogMi::all();
        return view('blogmi.blogs', compact('blogs'));
    }
    public function profile()
    {
        return view('blogmi.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createBlog()
    {
        return view('blogmi.createBlog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeBlog(Request $request, BlogMi $blogs)
    {
        $content = $request->content;

        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time(). $key.'png';
            file_put_contents(public_path().$image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }

        $content = $dom->saveHTML();

        $blog = BlogMi::create([
            'title' => $request->title,
            'content' => $content
        ]);

        return view('blogmi.blog', ['blog'=>$blog]);
    }

    /**
     * Display the specified resource.
     */
    public function displayBlog($id, BlogMi $blogs)
    {
        $blogs = BlogMi::find($id);
        return view('blogmi.blog', ['blog'=>$blogs] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editBlog($id)
    {
        $blogs = BlogMi::find($id);
        return view('blogmi.editBlog', ['blog'=>$blogs] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBlog(Request $request, BlogMi $blogs, $id)
    {
        $blogs = BlogMi::find($id);

        $content = $request->content;

        Log::info('Blog content received:', ['content' => substr($content, 0, 1000)]);  // Logs first 500 characters to avoid large logs

        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);


        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'),'data:images/') ===0){
                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "/upload/" . time(). $key.'png';
                file_put_contents(public_path().$image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src',$image_name);
            }
        }


        $content = $dom->saveHTML();

        $blogs->update([
            'title' => $request->title,
            'content' => $content
        ]);

        return view('blogmi.blog', ['blog'=>$blogs]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteBlog($id)
    {

        $blog = BlogMi::find($id);

        $dom = new DOMDocument();
        $dom->loadHTML($blog->content, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img){
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');

            if (File::exists($path)){
                File::delete($path);
            }
        }

        $blog->delete();
        return redirect()->back();
    }
}
