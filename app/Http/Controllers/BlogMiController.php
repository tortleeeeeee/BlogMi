<?php

namespace App\Http\Controllers;

use App\Models\BlogMi;
use Illuminate\Http\Request;
use DOMDocument;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class BlogMiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blogmi::all()->where('status', '==', "published");
        return view('blogmi.index', compact('blogs'));
    }
    public function blogs(Request $request)
    {/*
        $search_param = $request->query('searchTitle');
        $search_status = $request->query('searchStatus');

        if ($search_param){
            $blogs = BlogMi::search($search_param)->query(fn (Builder $query)=>$query->where('title', 'like', $search_param .'%'))->get();
        } elseif ($search_status == "draft" || $search_status == "published"){
            $blogs = BlogMi::search($search_status)->query(fn (Builder $query)=>$query->where('status', $search_status))->get();
        } else {
            $blogs = BlogMi::All();
        }
*/
        $blogs = BlogMi::All();
        return view('blogmi.blogs', compact('blogs'));
        //return view('blogmi.blogs', compact('blogs', 'search_param', 'search_status'));
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

        $status = $request->input('status');

        $blog = BlogMi::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'status' => $status,
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
