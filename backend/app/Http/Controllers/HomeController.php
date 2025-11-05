<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest('podate')->get();
        $categories = Category::all();

        return view('custom.index', compact('articles', 'categories'));
        
    }
       public function latest()
    {
        // Fetch all articles, ordered by date descending
        $articles = Article::orderBy('podate', 'desc')->get();

        // Optional: fetch categories for navigation
        $categories = Category::all();

        // Pass data to Blade view
        return view('custom.latest', compact('articles', 'categories'));
    }
}
