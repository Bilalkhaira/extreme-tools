<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Media::whereNull('deleted_at')->get();
        return view('pages.media.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $name = [];
            $baseUrl = url('/');
            $imgpath = public_path('images/media/');
            if (!empty($request->file('media'))) {
                foreach ($request->file('media') as $index => $img) {
                    $file = $img;
                    $fileName = time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $file->move($imgpath, $fileName);

                    $url = $baseUrl . '/images/media/' . $fileName;
    
                    Media::create([
                        'created_by' => auth()->user()->id ?? '',
                        'img' => $fileName ?? '',
                        'url' => $url ?? '',
                    ]);
                }
            }
            toastr()->success('Created Successfully');
            return redirect()->route('media.index');
        } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // try {
        //     $blog = Blog::where('slug', $slug)->first();
        //     $tags = [];
        //     foreach(json_decode($blog->tags) as $tagId)
        //     {
        //         $tag = Tag::find($tagId);
        //         $tags[] = $tag->name;
        //     }
            
        //     $categories = [];
        //     foreach(json_decode($blog->categories) as $categoryId)
        //     {
                
        //         $category = Category::find($categoryId);
        //         $categories[] = $category->name;
        //     }
            

        //     return view('pages.blogs.show', compact(['blog', 'tags', 'categories']));
        // } catch (Exception $e) {
        //     toastr()->error($e);

        //     return redirect()->back();
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $imgRecord = Media::find($id);
            $imgRecord->update([
                'deleted_at' => Carbon::now(),
            ]);
            toastr()->success('Delete Successfully');
            return redirect()->route('media.index');
       } catch (Exception $e) {
            toastr()->error($e);
            return redirect()->back();
        }
    }

   
}
