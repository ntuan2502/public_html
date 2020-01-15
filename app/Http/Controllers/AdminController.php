<?php

namespace App\Http\Controllers;

use App\Category;
use App\Classes;
use App\Helpers\Local;
use App\Post;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function admin()
    {
        return view('admin.admin');
    }

    public function class()
    {
        $classes = Classes::where([])->orderBy('id', 'DESC')->get();
        return view('admin.class.index')->with([
            'classes' => $classes,
        ]);
    }

    public function add_class()
    {
        return view('admin.class.add');
    }

    public function add_classP(Request $request)
    {
        $class = new Classes();
        $class->name = $request->name;
        if ($request->icon) {
            Local::delete($class->icon);
            $class->icon = Local::upload($request->icon);
        }
        $class->description = $request->description;
        $class->save();
        return redirect('/admin/class')->with([
            'success' => 'Thêm hệ phái thành công!',
        ]);
    }

    public function edit_class($id)
    {
        $class = Classes::find($id);
        return view('admin.class.edit')->with([
            'class' => $class,
        ]);
    }

    public function edit_classP(Request $request, $id)
    {
        $class = Classes::find($id);
        $class->name = $request->name;
        if ($request->icon) {
            Local::delete($class->icon);
            $class->icon = Local::upload($request->icon);
        }
        $class->description = $request->description;
        $class->save();
        return redirect('/admin/class')->with([
            'success' => 'Sửa hệ phái thành công!',
        ]);
    }

    public function delete_classP(Request $request)
    {
        $class = Classes::find($request->id);
        Local::delete($class->icon);
        $class->delete();
        return response()->json([
            'redirect' => '/admin/class',
        ]);
    }

    public function category()
    {
        $categories = Category::where([])->orderBy('id', 'DESC')->get();
        return view('admin.category.index')->with([
            'categories' => $categories,
        ]);
    }

    public function add_category()
    {
        return view('admin.category.add');
    }

    public function add_categoryP(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return redirect('/admin/category')->with([
            'success' => 'Thêm chuyên mục thành công!',
        ]);
    }

    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit')->with([
            'category' => $category,
        ]);
    }

    public function edit_categoryP(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return redirect('/admin/category')->with([
            'success' => 'Sửa chuyên mục thành công!',
        ]);
    }

    public function delete_categoryP(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return response()->json([
            'redirect' => '/admin/category',
        ]);
    }

    public function post()
    {
        $posts = Post::where([])->orderBy('id', 'DESC')->get();
        foreach ($posts as $post) {
            $post->category_name = Category::find($post->category_id) ? Category::find($post->category_id)->name : 'null';
            $post->user_name = User::find($post->user_id) ? User::find($post->user_id)->name : 'null';
        }
        return view('admin.post.index')->with([
            'posts' => $posts,
        ]);
    }

    public function add_post()
    {
        $categories = Category::all();
        return view('admin.post.add')->with([
            'categories' => $categories,
        ]);
    }

    public function add_postP(Request $request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->cover = Local::uploadRandom($request->cover);
        $post->save();

        return redirect('/admin/post')->with([
            'success' => 'Thêm bài viết thành công!',
        ]);
    }

    public function edit_post($id)
    {
        $categories = Category::all();
        $post = Post::find($id);

        return view('admin.post.edit')->with([
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function edit_postP($id, Request $request)
    {
        $post = Post::find($id);
        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        if ($request->cover) {
            Local::delete($post->cover);
            $post->cover = Local::uploadRandom($request->cover);
        }
        $post->save();

        return redirect('/admin/post')->with([
            'success' => 'Sửa bài viết thành công!',
        ]);
    }

    public function delete_postP(Request $request)
    {
        $post = Post::find($request->id);
        Local::delete($post->cover);
        $post->delete();
        return response()->json([
            'redirect' => '/admin/post',
        ]);
    }

    public function change_status(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->status = $request->status;
            $post->save();
            return 1;
        }
    }

    public function setting()
    {
        $download = Setting::where('name', 'download')->first();
        if(!$download){
            $download = new Setting;
            $download->name = 'download';
            $download->save();
        }
        $version = Setting::where('name', 'version')->first();
        if(!$version){
            $version = new Setting;
            $version->name = 'version';
            $version->save();
        }
        $name_version = Setting::where('name', 'name_version')->first();
        if(!$name_version){
            $name_version = new Setting;
            $name_version->name = 'name_version';
            $name_version->save();
        }
        $update_time = Setting::where('name', 'update_time')->first();
        if(!$update_time){
            $update_time = new Setting;
            $update_time->name = 'update_time';
            $update_time->save();
        }
        $mod_32bit = Setting::where('name', 'mod_32bit')->first();
        if(!$mod_32bit){
            $mod_32bit = new Setting;
            $mod_32bit->name = 'mod_32bit';
            $mod_32bit->save();
        }
        $mod_64bit = Setting::where('name', 'mod_64bit')->first();
        if(!$mod_64bit){
            $mod_64bit = new Setting;
            $mod_64bit->name = 'mod_64bit';
            $mod_64bit->save();
        }
        $background = Setting::where('name', 'background')->first();
        if(!$background){
            $background = new Setting;
            $background->name = 'background';
            $background->save();
        }
        $maintenance = Setting::where('name', 'maintenance')->first();
        if(!$maintenance){
            $maintenance = new Setting;
            $maintenance->name = 'maintenance';
            $maintenance->save();
        }
        $facebook = Setting::where('name', 'facebook')->first();
        if(!$facebook){
            $facebook = new Setting;
            $facebook->name = 'facebook';
            $facebook->save();
        }
        $youtube = Setting::where('name', 'youtube')->first();
        if(!$youtube){
            $youtube = new Setting;
            $youtube->name = 'youtube';
            $youtube->save();
        }
        $discord = Setting::where('name', 'discord')->first();
        if(!$discord){
            $discord = new Setting;
            $discord->name = 'discord';
            $discord->save();
        }
        $messenger = Setting::where('name', 'messenger')->first();
        if(!$messenger){
            $messenger = new Setting;
            $messenger->name = 'messenger';
            $messenger->save();
        }
        return view('admin.setting')->with([
            'download' => $download,
            'version' => $version,
            'name_version' => $name_version,
            'update_time' => $update_time,
            'mod_32bit' => $mod_32bit,
            'mod_64bit' => $mod_64bit,
            'background' => $background,
            'maintenance' => $maintenance,
            'facebook' => $facebook,
            'youtube' => $youtube,
            'discord' => $discord,
            'messenger' => $messenger,
        ]);
    }

    public function settingPOST(Request $request)
    {
        $download = Setting::where('name', 'download')->first();
        if (isset($request->download)) {
            $download->value = 'on';
            $download->save();
        } else {
            $download->value = null;
            $download->save();
        }
        $maintenance = Setting::where('name', 'maintenance')->first();
        if (isset($request->maintenance)) {
            $maintenance->value = 'on';
            $maintenance->save();
        } else {
            $maintenance->value = null;
            $maintenance->save();
        }
        $version = Setting::where('name', 'version')->first();
        $version->value = $request->version;
        $version->save();
        $name_version = Setting::where('name', 'name_version')->first();
        $name_version->value = $request->name_version;
        $name_version->save();
        $update_time = Setting::where('name', 'update_time')->first();
        $update_time->value = $request->update_time;
        $update_time->save();
        $discord = Setting::where('name', 'discord')->first();
        $discord->value = $request->discord;
        $discord->save();
        $facebook = Setting::where('name', 'facebook')->first();
        $facebook->value = $request->facebook;
        $facebook->save();
        $youtube = Setting::where('name', 'youtube')->first();
        $youtube->value = $request->youtube;
        $youtube->save();
        $background = Setting::where('name', 'background')->first();
        if ($request->file_background) {
            Local::delete($background->value);
            $background->value = Local::uploadRandom($request->file_background);
            $background->save();
        } else {
            $background->value = $request->background;
            $background->save();
        }
        $mod_32bit = Setting::where('name', 'mod_32bit')->first();
        if ($request->file_mod_32bit) {
            Local::delete($mod_32bit->value);
            $mod_32bit->value = Local::upload($request->file_mod_32bit);
            $mod_32bit->save();
        } else {
            $mod_32bit->value = $request->mod_32bit;
            $mod_32bit->save();
        }
        $mod_64bit = Setting::where('name', 'mod_64bit')->first();
        if ($request->file_mod_64bit) {
            Local::delete($mod_64bit->value);
            $mod_64bit->value = Local::upload($request->file_mod_64bit);
            $mod_64bit->save();
        } else {
            $mod_64bit->value = $request->mod_64bit;
            $mod_64bit->save();
        }
        return redirect()->back()->with([
            'success' => 'Cập nhật setting thành công!',
        ]);
    }

    public function user()
    {
        $users = User::all();
        return view('admin.user.index')->with([
            'users' => $users
        ]);
    }
}
