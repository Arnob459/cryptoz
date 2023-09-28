<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Blog;

use Illuminate\Support\Facades\Storage;
use Image;

class BlogController extends Controller
{
        //Blog
        public function Blog()
        {
            $data['page_title'] = 'Blog';
            $data['blog'] = Page::first();
            $data['blogs'] = Blog::all();
            return view('admin.pages.blog.blog_list',$data);
        }

        public function blogSectionUpdate(Request $request)
        {
            $this->validate($request, [
                'blog_title' => 'required|string|max:255',
                'blog_subtitle' => 'required|string|max:255',
            ]);

            $data = Page::first();
            $data->blog_title = $request->blog_title;
            $data->blog_subtitle = $request->blog_subtitle;
            $data->save();
            return back()->with('success','Updated Successfully');
        }

        public function blogCreate(){
            $data['page_title'] = ' Blog Create';
            return view('admin.pages.blog.blog_create',$data);
        }

        public function blogStore(Request $request){

            $this->validate($request, [
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:5000',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $file =  $img->getClientOriginalName();
                Image::make($img)->resize(1280,960)->save(public_path('assets/admin/images/blog/'.$file));
            }

            $blog = new Blog();
            $blog->title =  $request->title;
            $blog->description =  $request->description;
            $blog->image =  $file;
            $blog->save();
            return redirect()->route('admin.blog')->with('success','Blog Create Successfully');

        }

        public function blogEdit($id) {
            $data['page_title'] = 'Blog Edit';

            $data['blog'] = Blog::find($id);
            return view('admin.pages.blog.blog_edit',$data);
        }
        public function blogUpdate(Request $request, $id){

            $this->validate($request, [
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:5000',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $blog = Blog::find($id);
            $blog->title =  $request->title;
            $blog->description =  $request->description;

            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $file =  $img->getClientOriginalName();
                Image::make($img)->resize(1280,960)->save(public_path('assets/admin/images/blog/'.$file));
                $blog->image =  $file;
            }

            $blog->save();
            return back()->with('success','Blog Updated Successfully');
        }
        public function destroy($id)
        {
            $data = Blog::find($id);
            if (!$data) {
                return redirect()->back()->with('success', ' Deleted successfully');
            }
            $data->delete();
            return redirect()->back()->with('success', ' Deleted successfully');
        }
}
