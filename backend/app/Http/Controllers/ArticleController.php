<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:200',
            'podate' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'author' => 'required|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:4096',
        ]);

        // Handle featured image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $data['image'] = $file->storeAs('articles', $filename, 'public');
        }

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    public function edit($artid)
    {
        $article = Article::where('artid', $artid)->firstOrFail();
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $artid)
    {
        $article = Article::where('artid', $artid)->firstOrFail();

        $data = $request->validate([
            'title' => 'required|max:200',
            'podate' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'author' => 'required|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:4096',
        ]);

        // Replace featured image if uploaded
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $data['image'] = $file->storeAs('articles', $filename, 'public');
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy($artid)
    {
        $article = Article::where('artid', $artid)->firstOrFail();

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }

    // TinyMCE image upload handler
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:4096',
        ]);

        $file = $request->file('file');
        $filename = 'tinymce_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('articles/content', $filename, 'public');

        return response()->json(['location' => asset('storage/' . $path)]);
    }
}
