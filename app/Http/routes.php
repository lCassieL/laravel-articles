<?php
use Illuminate\Http\Request;
use App\Article;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    $article = new Article();
    return view('articles',[
        'articles'=>$article->all()
            ]);
    // return view('welcome');
});

Route::post('/admin/article', function(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'shortText' => 'required',
        'longText' => 'required',
    ]);

    if($validator->fails()){
        return redirect('/admin')
        ->withInput()
        ->withErrors($validator);
    }
    $new_article = new Article();
    $new_article->name=$request->name;
    $new_article->shortText=$request->shortText;
    $new_article->longText=$request->longText;
    date_default_timezone_set("UTC");
    $new_article->dateCreating=time()+2*3600;
    $new_article->save();
    return redirect('/admin');  
});

Route::delete('/admin/article/{article}', function(Article $article){
    $article->delete();
    return redirect('/admin');
});