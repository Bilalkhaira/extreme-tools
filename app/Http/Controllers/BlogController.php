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

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogsDataTable $dataTable)
    {
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        
        return $dataTable->render('pages.blogs.list', compact(['categories', 'tags']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = User::find(1);
        // return view('pages.blogs.add');
    }

    public function blogsEdit(Request $request)
    {
        $blog = Blog::find($request->blogId);

        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();

       return view('pages.blogs.edit', compact(['blog', 'categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // $imgpath = public_path('images/blog/');
            // if (!empty($request->avatar)) {
            //     $file = $request->avatar;
            //     $fileName = time() . '.' . $file->clientExtension();
            //     $file->move($imgpath, $fileName);
            // }

            // if (!empty($request->thumbnail)) {
            //     $thumbnailFile = $request->thumbnail;
            //     $thumbnailName = time() . '.' . $thumbnailFile->clientExtension();
            //     $thumbnailFile->move($imgpath, $thumbnailName);
            // }

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
                'short_description' => $request->short_description ?? '',
                'categories' => json_encode($request->categories),
                'tags' => json_encode($request->tags),
                // 'img' => $fileName ?? '',
                'img' =>  $request->media ?? '',
                'thumbnail' => $request->thumbnail ?? '',
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
            
            if($blog->tags != 'null') {
                foreach(json_decode($blog->tags) as $tagId)
                {
                    $tag = Tag::find($tagId);
                    $tags[] = $tag->name;
                }
            }
            
            $categories = [];
            if($blog->categories != 'null') {
                foreach(json_decode($blog->categories) as $categoryId)
                {
                    
                    $category = Category::find($categoryId);
                    $categories[] = $category->name;
                }
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
        try {
            $updatedRow = Blog::find($request->updateId);
            // $imgpath = public_path('images/blog/');
            // if (empty($request->avatar)) {
            //     $updateimage = $updatedRow->img;
            // } else {
            //     $imagePath =  $imgpath . $updatedRow->img;
                
            //     if (File::exists($imagePath)) {
            //         File::delete($imagePath);
            //     }
            //     $destinationPath = $imgpath;
            //     $file = $request->avatar;
            //     $fileName = time() . '.' . $file->clientExtension();
            //     $file->move($destinationPath, $fileName);
            //     $updateimage = $fileName;
    
                // $imageUrl = 'images/blog/' . $updateimage;
                // $updateimage = asset($imageUrl);
            // }
            // if (empty($request->thumbnail)) {
            //     $updateThumbnail = $updatedRow->thumbnail;
            // } else {
            //     $imagePath =  $imgpath . $updatedRow->thumbnail;
                
            //     if (File::exists($imagePath)) {
            //         File::delete($imagePath);
            //     }
            //     $destinationPath = $imgpath;
            //     $fileThumbnail = $request->thumbnail;
            //     $fileThumbnailName = time() . '.' . $fileThumbnail->clientExtension();
            //     $fileThumbnail->move($destinationPath, $fileThumbnailName);
            //     $updateThumbnail = $fileThumbnailName;
            // }

           
            $slug = $request->slug;
            if (strpos($slug, ' ') !== false) {
                $slugValue = str_replace(' ', '-', $slug);
            } else {
                $slugValue = $slug;
            }
            $updatedRow->update([
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                'short_description' => $request->short_description ?? '',
                'categories' => json_encode($request->categories),
                'tags' => json_encode($request->tags),
                // 'img' => $updateimage ?? '',
                'img' =>  $request->media,
                'slug' => $slugValue ?? '',
                // 'thumbnail' => $updateThumbnail ?? '',
                'thumbnail' => $request->thumbnail ?? '',
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
            // $imgpath = public_path('images/blog/');
            $imgRecord = Blog::find($id);
            // $path = $imgpath . $imgRecord->img;

            // if (File::exists($path)) {
            //     File::delete($path);
            // }

            $imgRecord->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('blogs.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

   
}
