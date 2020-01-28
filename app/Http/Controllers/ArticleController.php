<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\Report;
use App\GuestReport;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;

class ArticleController extends Controller
{
    public function index()
    {
        if(request('tag')){
            $articles = Tag::where('name',request('tag'))->firstOrFail()->articles; 
       
           
        }
        else{
            $articles = Article::latest()->get();

        }
  

        return view('allArticle', [
            'articles' => $articles,
        ]);

    }

    public function show(Article $article)
    {
// dd($id);
        // $article = Article::findOrfail($id);
        return view('article', [
            'article' => $article,
        ]);

    }

    public function showing()
    {
        $articles = Article::take(3)->get();

        return view('about', [
            'articles' => $articles 
        ]);

    }
    public function creat()
    {

        return view('creat',
    [
        'tags'=>Tag::all()
    ]
    
    );

    }

    public function store(StoreArticle  $request)
    {
  

        $article = new Article;
        $article->user_id = Auth::user()->id;
        $article->title = request('title');
        $article->expert = request('expert');
        $article->body = request('body');
        $article->save();

        $article->tags()->attach(request('tags'));
        return redirect('/article');


    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
       
       
       $article->delete();
       
        return redirect('/article');

    }

    public function edit(Article $article)
    {
       
        
        return view('edit',compact('article'));

    }

    public function update(Article $article)
    {

        $this->authorize('update', $article);
        
        // first way


        $article->update($this->validateArticle());
    
        return redirect('/article/'.$article->id);

    }

    public function storeReport(Request $request,$id)
    {
        if(Auth::check()){
            $user = Auth::user();
            $request->request->add(['name' => $user->name, 'email' => $user->email]);
        }


        $validatedData = $request->validate([
            'name' => 'required',
            'email'=>'required|email',
            'reason'=>'required',
        ]);


        $request->request->add(['article_id' => $id]);
        $data = $request->all();
        unset($data['_token']);
        GuestReport::forceCreate($data);
        return redirect('/article');
    }
   

    protected function validateArticle(){

        return request()->validate([
            'title'=>'required',
            'body'=>'required',
            'expert'=>'required',
            
        ]);
    }
}
