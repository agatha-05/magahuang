<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\BannerAdvertisment;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $categories = Category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured','not_featured')
        ->latest()
        ->take(3)
        ->get();

        $featured_articles = ArticleNews::with(['category'])
        ->where('is_featured','featured')
        ->inRandomOrder()
        ->take(3)
        ->get();

        $authors = Author::all();

        $bannerads = BannerAdvertisment::where('is_active','active')
        ->where('type','banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        $donghua_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Donghua');
        })
        ->where('is_featured','not_featured')
        ->latest()
        ->take(6)
        ->get();

        $donghua_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Donghua');
        })
        ->where('is_featured','featured')
        ->inRandomOrder()
        ->first();

        $anime_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Anime');
        })
        ->where('is_featured','not_featured')
        ->latest()
        ->take(6)
        ->get();

        $anime_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Anime');
        })
        ->where('is_featured','featured')
        ->inRandomOrder()
        ->first();

        $film_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Film');
        })
        ->where('is_featured','not_featured')
        ->latest()
        ->take(6)
        ->get();

        $film_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Film');
        })
        ->where('is_featured','featured')
        ->inRandomOrder()
        ->first();

        

        return view('front.index', compact('donghua_featured_articles','donghua_articles','anime_featured_articles','anime_articles', 'film_featured_articles','film_articles', 'categories',  'articles', 'authors', 'featured_articles', 'bannerads'));
      
        
    }

    public function category(Category $category){
        $categories = Category::all();
        $bannerads = BannerAdvertisment::where('is_active','active')
        ->where('type','banner')
        ->inRandomOrder()
        ->first();

        return view('front.category', compact('category', 'categories', 'bannerads'));
    }

    public function author(Author $author){
        $categories = Category::all();
        $bannerads = BannerAdvertisment::where('is_active','active')
        ->where('type','banner')
        ->inRandomOrder()
        ->first();

        return view('front.author', compact('categories', 'author', 'bannerads'));
    }

    public function search(Request $request){

        $request->validate([
            'keyword' => ['required', 'string', 'max:255'],
        ]);

        $categories = Category::all();

        $keyword = $request->keyword;

        $articles = ArticleNews::with(['category', 'author'])
        ->where('name', 'like', '%' . $keyword . '%')->paginate(6);

        $trendingArticles = ArticleNews::with(['category', 'author'])
            ->inRandomOrder() // Mengganti latest() dengan inRandomOrder()
            ->take(6)
            ->get();

        return view('front.search', compact('articles', 'keyword', 'categories', 'trendingArticles'));

    }

    public function details(ArticleNews $articleNews){
        $categories = Category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured','not_featured')
        ->where('id', '!=', $articleNews->id)
        ->latest()
        ->take(3)
        ->get();

        $bannerads = BannerAdvertisment::where('is_active','active')
        ->where('type','banner')
        ->inRandomOrder()
        ->first();

        $square_ads = BannerAdvertisment::where('type','square')
        ->where('is_active', 'active')
        ->inRandomOrder()
        ->take(2)
        ->get();

        if($square_ads->count() < 2) {
            $square_ads_1 = $square_ads->first();
            $square_ads_2 = $square_ads->first();
            // $square_ads_2 = null;
        } else {
            $square_ads_1 = $square_ads->get(0);
            $square_ads_2 = $square_ads->get(1);
        }

        $author_news = ArticleNews::where('author_id', $articleNews->author_id)
        ->where('id', '!=', $articleNews->id)
        ->inRandomOrder()
        ->get();




        return view('front.details', compact('author_news','square_ads_1','square_ads_2' ,'articleNews', 'categories', 'articles', 'bannerads'));
    }

    /**
     * Menampilkan halaman Premium (tanpa data kategori untuk navbar yang lebih sederhana).
     */
    public function premium(){
        // Menghapus pengambilan $categories sesuai permintaan.
        
        $bannerads = BannerAdvertisment::where('is_active','active')
        ->where('type','banner')
        ->inRandomOrder()
        ->first(); // Ambil satu iklan banner

        // Hanya meneruskan $bannerads ke view.
        return view('front.premium', compact('bannerads'));
    }
}