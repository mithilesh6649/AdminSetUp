<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use File;
use Str;
class BlogsController extends Controller
{
    //

    public function bloglist()
    {
        $bloglist = Blog::get();
        return view('pages.blogs.blog_list', compact('bloglist'));  
    }


    public function addblogs(Request $request)
    {
        return view('pages.blogs.add_blog');
    }


    /**
     * This function is used to Save Expertise and show listing
     */
    public function saveblogs(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->content;
        $date = str_replace("/", "-", $request->date);
        $blog->blog_date = date('Y-m-d', strtotime($date));
        $blog->blog_date_status = $request->date_status;
        $blog->status = $request->status;
        $blog->slug = Str::slug($request->title);

        if ($request->hasFile('Media_image')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $file = $request->file('Media_image');

            $fileName = $file->getClientOriginalName();
            $imageName = time() . '-' . str_replace(' ', '', $file->getClientOriginalName());

            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $uploadPath = public_path('blog_images');
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0777, true, true);
                }
                if ($file->move(public_path('/blog_images'), $imageName)) {
                    $blog->image = $imageName;
                }

                if ($blog->save()) {
                    return redirect()
                        ->route("blogs_list")
                        ->with(["success" => "Blog has been added successfully !"]);
                } else {
                    return redirect()
                        ->back()
                        ->with("warning", "Something went wrong!");
                }

            } else {
                Session::flash('status', "Somthing went wrong.");
            }
        } else {
            if ($blog->save()) {
                return redirect()
                    ->route("blogs_list")
                    ->with(["success" => "Blog has been added successfully !"]);
            } else {
                return redirect()
                    ->back()
                    ->with("warning", "Something went wrong!");
            }
        }
    }


    public function edit($id)
    {
        $id = base64_decode($id);
        $blog = Blog::where('id', $id)->first();
        return view('pages.blogs.edit_blog', compact('blog'));
      
    }

    public function updateblogs(Request $request)
    {
        if ($request->hasFile('Media_image')) {

            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $file = $request->file('Media_image');

            $fileName = $file->getClientOriginalName();
            $imageName = time() . '-' . str_replace(' ', '', $file->getClientOriginalName());

            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                if ($file->move(public_path('/blog_images'), $imageName)) {
                    $blog = Blog::where("id", $request->blog_id)->first();
                    $blog->title = $request->title;
                    $blog->description = $request->content;
                    $blog->status = $request->status;
                    $date = str_replace("/", "-", $request->date);
                    $blog->blog_date = date('Y-m-d', strtotime($date));
                    $blog->blog_date_status = $request->date_status;
                    $blog->image = $imageName;
                    $blog->slug = Str::slug($request->title);

                    if ($blog->update()) {
                        return redirect()
                            ->route("blogs_list")
                            ->with(["success" => "Blog has been updated successfully !"]);
                    } else {
                        return redirect()
                            ->back()
                            ->with("warning", "Something went wrong!");
                    }
                }

            } else {
                Session::flash('status', "Somthing went wrong.");
            }

        } else {
            $blog = Blog::where("id", $request->blog_id)->first();

            $blog->title = $request->title;
            $blog->description = $request->content;
            $blog->status = $request->status;
            $date = str_replace("/", "-", $request->date);
            $blog->blog_date = date('Y-m-d', strtotime($date));
            $blog->blog_date_status = $request->date_status;
            $blog->slug = Str::slug($request->title);

            if ($blog->update()) {
                return redirect()
                    ->route("blogs_list")
                    ->with(["success" => "Blog has been updated successfully !"]);
            } else {
                return redirect()
                    ->back()
                    ->with("warning", "Something went wrong!");
            }
        }
    }

    public function deleteblogs(Request $request)
    {
        $deleteBlog = Blog::where("id", $request->id)->delete();
        if ($deleteBlog) {
            $res["success"] = 1;
            return json_encode($res);
        } else {
            $res["success"] = 0;
            return json_encode($res);
        }
    }


    /*=============Recycle Bin===================================START*/
    public function deletedBlogList()
    {
        $blogs = Blog::onlyTrashed()->orderBy('updated_at', 'DESC')->get();
        return view('pages.blogs.deleted_blog_list', compact('blogs'));
    }

    public function blogDeletedrestore(Request $request)
    {
        $deleted_d = Blog::onlyTrashed()->where('id', $request->id)->first();

        if ($deleted_d) {
            $deleted_d->restore();
            return response()->json([
                'success' => 1,
            ]);
        } else {
            return response()->json([
                'success' => 0,
            ]);
        }
    }

    public function permanentDeleteBlog(Request $request)
    {
        $deleted_d = Blog::onlyTrashed()->where('id', $request->id)->first();
        if ($deleted_d) {
            $deleted_d->forceDelete();
            return response()->json([
                'success' => 1,
            ]);
        } else {
            return response()->json([
                'success' => 0,
            ]);
        }
    }

    public function deleteBlogImage(Request $request)
    {
        $blog_data = Blog::where('id', $request->blog_id)->update(['image' => null]);

        if ($blog_data) {
            $res['success'] = 1;
            return json_encode($res);
        } else {
            $res['success'] = 0;
            return json_encode($res);
        }
    }
}
