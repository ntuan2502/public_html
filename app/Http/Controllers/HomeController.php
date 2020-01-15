<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\Pagination;
use App\Music;
use App\Post;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $limitPerPage = 5;
    public function index(Request $request)
    {
        $background = Setting::where('name', 'background')->first();
        $name_version = Setting::where('name', 'name_version')->first();
        $update_time = Setting::where('name', 'update_time')->first();
        $version = Setting::where('name', 'version')->first();
        $mod_32bit = Setting::where('name', 'mod_32bit')->first();
        $mod_64bit = Setting::where('name', 'mod_64bit')->first();
        $download = Setting::where('name', 'download')->first();
        $posts = Post::where('status', 1);
        $page = $request->query('page') ? $request->query('page') : 1;
        $number = $posts->count();
        $totalPage = (int) ($number / $this->limitPerPage) + (($number % $this->limitPerPage) !== 0);
        $previousPage = ($page == 1) ? 1 : ($page - 1);
        $nextPage = ($page == $totalPage) ? $totalPage : ($page + 1);
        $listPages = Pagination::initArray($page, $totalPage);
        $posts = $posts->skip($this->limitPerPage * ($page - 1))->take($this->limitPerPage)->orderBy('id', 'DESC')->get();

        foreach ($posts as $post) {
            $post->day_created = Carbon::parse($post->created_at)->format('d');
            $post->Month_created = Carbon::parse($post->created_at)->format('M');
        }

        $fullUrl = explode('?', $_SERVER['REQUEST_URI']);
        $currUrl = $fullUrl[0];

        return view('index')->with([
            'background' => $background,
            'name_version' => $name_version,
            'update_time' => $update_time,
            'version' => $version,
            'mod_32bit' => $mod_32bit,
            'mod_64bit' => $mod_64bit,
            'download' => $download,
            'posts' => $posts,
            'fullUrl' => $fullUrl,
            'currUrl' => $currUrl,
            'totalPage' => $totalPage,
            'previousPage' => $previousPage,
            'nextPage' => $nextPage,
            'listPages' => $listPages,
            'currPage' => $page,
            'limitPerPage' => $this->limitPerPage,
        ]);
    }

    public function login()
    {
        if (Auth::user()) {
            return redirect('/admin');
        }
        return view('auth.login');
    }

    public function loginP(Request $request)
    {
        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        if (Auth::attempt($userdata) === false) {
            return response()->json([
                'status' => 0,
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'redirect' => '/admin'
            ]);
        }
    }

    public function page_loginP(Request $request)
    {
        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        if (Auth::attempt($userdata) === false) {
            return response()->json([
                'status' => 0,
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'redirect' => $request->url
            ]);
        }
    }


    public function logoutP(Request $request)
    {
        Auth::logout();
        return response()->json([
            'redirect' => $request->url,
        ]);
    }

    public function page_logoutP(Request $request)
    {
        Auth::logout();
        return response()->json([
            'redirect' => $request->url,
        ]);
    }

    public function register()
    {
        if (Auth::user()) {
            return redirect('/admin');
        }
        return view('auth.register');
    }

    public function registerP(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return response()->json([
                'email' => 'false'
            ]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            return response()->json([
                'email' => $user->email,
                'redirect' => '/login',
            ]);
        }
    }

    public function forgotPassword()
    {
        if (Auth::user()) {
            return redirect('/admin');
        }
        return view('auth.forgotPassword');
    }
    public function forgotPasswordP()
    {
    }

    public function getCategory(Request $request, $category_slug)
    {
        $background = Setting::where('name', 'background')->first();
        $category = Category::where('slug', $category_slug)->first();;
        if ($category) {
            $posts = Post::where([
                'category_id' => $category->id,
                'status' => 1,
            ]);

            $page = $request->query('page') ? $request->query('page') : 1;
            $number = $posts->count();
            $totalPage = (int) ($number / $this->limitPerPage) + (($number % $this->limitPerPage) !== 0);
            $previousPage = ($page == 1) ? 1 : ($page - 1);
            $nextPage = ($page == $totalPage) ? $totalPage : ($page + 1);
            $listPages = Pagination::initArray($page, $totalPage);
            $posts = $posts->skip($this->limitPerPage * ($page - 1))->take($this->limitPerPage)->orderBy('id', 'DESC')->get();

            foreach ($posts as $post) {
                $post->day_created = Carbon::parse($post->created_at)->format('d');
                $post->Month_created = Carbon::parse($post->created_at)->format('M');
            }

            $fullUrl = explode('?', $_SERVER['REQUEST_URI']);
            $currUrl = $fullUrl[0];

            return view('category')->with([
                'background' => $background,
                'posts' => $posts,
                'category' => $category,
                'fullUrl' => $fullUrl,
                'currUrl' => $currUrl,
                'totalPage' => $totalPage,
                'previousPage' => $previousPage,
                'nextPage' => $nextPage,
                'listPages' => $listPages,
                'currPage' => $page,
                'limitPerPage' => $this->limitPerPage
            ]);
        }
    }

    public function getPost($post_slug)
    {
        $post = Post::where([
            'slug' => $post_slug,
        ])->first();
        if ($post) {
            return view('post')->with([
                'post' => $post
            ]);
        } else {
            return abort(404);
        }
    }
}
