<?php
use Illuminate\Http\Request;
use App\Article;
use App\Photo;
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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

Route::get('/gallery', function () {
    $images = new Photo();
//    var_dump($images->all());
//    exit();
    return view('gallery',[
        'images'=>$images->all()
            ]);
//    $images = Storage::files(base_path().'/public/images');
//    $images = scandir(base_path().'/public/images');
//    return view('gallery',['images'=>$images]);
});

Route::post('/gallery/do', function (Request $request) {
    $file = $request->file('image');
    if($file!=null){
        if($file->getClientOriginalExtension() == 'jpg'||$file->getClientOriginalExtension() == 'png'||$file->getClientOriginalExtension() == 'jpeg'){
            //$file->move(base_path().'/public/images',$file->getClientOriginalName());
            Storage::put('public/images/'.$file->getClientOriginalName(),file_get_contents($request->file('image')->getRealPath()));
            //save in db path
            $new_photo = new Photo();
    $new_photo->name=$file->getClientOriginalName();
    $new_photo->save();
        }
    }
    return redirect('/gallery');
});

Route::get('/', function () {
    $article = new Article();
    return view('main',[
        'articles'=>$article->all()
            ]);
});

Route::get('/item/back', function () {
    return redirect('/');
});

Route::get('/item/{id}', function(Request $request) {
    $id  = $request->id;
    $article_item = DB::table('articles')->where('id', $id)->first();
    return view('article_item',['article_item'=>$article_item]);
});

Route::post('/admin/update/{id}', function(Request $request) {
    $id  = $request->id;
    $article_item = DB::table('articles')->where('id', $id)->first();
    return view('artup',['article_item'=>$article_item]);
});

Route::post('/admin/update/do/{id}', function(Request $request){
    $id  = $request->id;
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'shortText' => 'required',
        'allText' => 'required',
    ]);

    if($validator->fails()){
        return redirect('/admin')
        ->withInput()
        ->withErrors($validator);
    }
    $new_article = new Article();
    $new_article->name=$request->name;
    $new_article->shortText=$request->shortText;
    $new_article->allText=$request->allText;
    date_default_timezone_set("UTC");
    $new_article->dateCreating=time()+2*3600;
    DB::update('update articles set name = ?, shortText = ?, allText = ?, dateCreating = ? where id = ?', [''.$new_article->name.'', ''.$new_article->shortText.'', ''.$new_article->allText.'', $new_article->dateCreating, $id]);
    return redirect('/admin');  
});

Route::get('/admin', function () {
    $article = new Article();
    return view('articles',[
        'articles'=>$article->all()
            ]);
});

Route::post('/admin/article', function(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'shortText' => 'required',
        'allText' => 'required',
    ]);

    if($validator->fails()){
        return redirect('/admin')
        ->withInput()
        ->withErrors($validator);
    }
    $new_article = new Article();
    $new_article->name=$request->name;
    $new_article->shortText=$request->shortText;
    $new_article->allText=$request->allText;
    date_default_timezone_set("UTC");
    $new_article->dateCreating=time()+2*3600;
    $new_article->save();
    return redirect('/admin');  
});

Route::delete('/admin/article/{article}', function(Article $article){
    $article->delete();
    return redirect('/admin');
});