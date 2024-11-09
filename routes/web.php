<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

Route::get('/', function () {
return view('posts', [
    'posts' => Post::latest()->get(),
    'categories' => Category::all(),
    'authors' => User::all()
]);
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all(),
        'authors' => User::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function(User $author){
    return view('posts', [
        'posts' => $author->posts,
        'currentAuthor' => $author,
        'categories' => Category::all(),
        'authors' => User::all()
    ]);
})->name('author');
