<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CarRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\DataTables\BlogsDataTable;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogsDataTable $dataTable)
    {
        $categories = Category::get();
        $tags = Tag::get();
        
        return view('pages.media.index', compact(['categories', 'tags']));
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
        // dd($request->all());
        try {

            $imgpath = public_path('images/blog/');
            if (!empty($request->avatar)) {
                $file = $request->avatar;
                $fileName = time() . '.' . $file->clientExtension();
                $file->move($imgpath, $fileName);
            }

            // $imageUrl = 'images/blog/' . $fileName;
            // $imageAsset = asset($imageUrl);
            $slug = $request->slug;
            if (strpos($slug, ' ') !== false) {
                $slugValue = str_replace(' ', '-', $slug);
            } else {
                $slugValue = $slug;
            }
            Blog::create([
                'created_by' => auth()->user()->id ?? '',
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                'categories' => json_encode($request->categories),
                'tags' => json_encode($request->tags),
                'img' => $fileName ?? '',
                'slug' => $slugValue ?? '',
            ]);

            toastr()->success('Created Successfully');

            return redirect()->route('blogs.index');
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
        try {
            $blog = Blog::where('slug', $slug)->first();
            $tags = [];
            foreach(json_decode($blog->tags) as $tagId)
            {
                $tag = Tag::find($tagId);
                $tags[] = $tag->name;
            }
            
            $categories = [];
            foreach(json_decode($blog->categories) as $categoryId)
            {
                
                $category = Category::find($categoryId);
                $categories[] = $category->name;
            }
            

            return view('pages.blogs.show', compact(['blog', 'tags', 'categories']));
        } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    //     try {
    //         $blog = Blog::find($id);

    //         return response()->json($blog);

    //    } catch (Exception $e) {
    //         toastr()->error($e);

    //         return redirect()->back();
    //     }
    }

    /**
     * Update the specified resource in storage.
     */
    public function blogUpdate(Request $request)
    {
        // dd($request->all());
        try {
            $updatedRow = Blog::find($request->updateId);
            $imgpath = public_path('images/blog/');
            if (empty($request->avatar)) {
                $updateimage = $updatedRow->img;
            } else {
                $imagePath =  $imgpath . $updatedRow->img;
                
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $destinationPath = $imgpath;
                $file = $request->avatar;
                $fileName = time() . '.' . $file->clientExtension();
                $file->move($destinationPath, $fileName);
                $updateimage = $fileName;
    
                // $imageUrl = 'images/blog/' . $updateimage;
                // $updateimage = asset($imageUrl);
            }

           
            $slug = $request->slug;
            if (strpos($slug, ' ') !== false) {
                $slugValue = str_replace(' ', '-', $slug);
            } else {
                $slugValue = $slug;
            }
            $updatedRow->update([
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                'categories' => json_encode($request->categories),
                'tags' => json_encode($request->tags),
                'img' => $updateimage ?? '',
                'slug' => $slugValue ?? '',
            ]);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Update Successfully');

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $imgpath = public_path('images/blog/');
            $imgRecord = Blog::find($id);
            $path = $imgpath . $imgRecord->img;

            if (File::exists($path)) {
                File::delete($path);
            }

            $imgRecord->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('blogs.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

   
}
