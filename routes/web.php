<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
use App\http\Controllers\TopicPageController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CelebController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
//pages
Route::prefix('pages')->group(function(){
    Route::get('signup', [AccountController::class, "signup"]);
    Route::post('post', [AccountController::class,"createPost"]);
    Route::get('login', [AccountController::class, "login"]);
    Route::post('checklogin', [AccountController::class, "checklogin"]);
    Route::get('logout', [AccountController::class, "logout"]);
    Route::get('home', [PagesController::class, "home"]);
    Route::post('search', [PagesController::class,'searchByName']);
    //người dùng thay đổi mật khẩu
    Route::get('changePassword', function(){
        return view('pages.changePassword');
    });
    Route::post('changePassword/update', [ChangePasswordController::class, "store"])->name('updatePass');   
    //hiện ds film và topic mà mod tạo trên frontend(mod thấy)
    Route::get('film/filmModcreate/{id}',[PagesController::class,'filmMod']);
    Route::get('topicModcreate/{id}',[PagesController::class,'topicMod']);
    //mod tao film
    Route::get('film/create', [PagesController::class,'createfilm']);
    Route::post('film/createPost', [PagesController::class,'createPostMod']);
    //mod tao topic
    Route::post('film/mod_createTopic',[PagesController::class,'btCreateTopic']);
    Route::post('film/modCrTp',[PagesController::class,'modCreateTopic']);
    
    //pages/user
    Route::prefix('user')->name('user')->middleware('checklogin:admin,user')->group(function () {
        Route::get("mod/{user_id}", [AccountController::class, "details_mod"]);
        Route::get("member/{user_id}", [AccountController::class, "details_member"]);
    });
    //pages/film
    Route::prefix('film')->group(function(){
        //trang phim
        Route::get('/film',[PagesController::class,'film']);
        //phim chi tiet
        Route::get('/film_detail/{id}',[PagesController::class,'detailphim']);
        //sap xep
        Route::get('/{bole}',[PagesController::class,'phimbole']);
        Route::get('/the-loai/{cat}',[PagesController::class,'category']);
        Route::get('/quoc-gia/{qg}',[PagesController::class,'nation']);
        //tao rate
        Route::post('createRating', [PagesController::class,"createRating"]);
        //thông tin celeb frontend
        Route::get('/celeb/{cl}',[PagesController::class,'celeb']);

    });   
    //pages/topic
    Route::prefix('topic')->group(function(){
        //trang topic 
        Route::get('pagination', [TopicPageController::class,'index']);
        // Route::post('pagination/fetch', [TopicPageController::class,'fetch'])->name('pagination.fetch');
        //chi tiet topic
        Route::get('detail/{topic_id}', [TopicPageController::class,"chude"]);
        //tao comment tu frontend
        Route::post('createComment', [TopicPageController::class, "createComment"]);
    });
    //pages/news-event
    Route::prefix('news')->group(function(){
        Route::get('/',[PagesController::class,'news']);
        //chi tiet news
        Route::get('/detail/{id}',[PagesController::class,'detailnews']);
    });

});
//admin
Route::prefix('admin')->name('admin')->middleware('checklogin:admin')->group(function () {
    Route::get('/home',[PagesController::class, "admin"]);
    Route::get('users', [AccountController::class, "index"])->name('userlist');
    Route::post('post', [AccountController::class, "createPost"]);
    Route::get('delete/{user_id}', [AccountController::class, "delete"]);
    Route::get('changeaccounttype/{user_id}', [AccountController::class, "changeAccountType"]);
    
    //ds bình luận của từng user_id
    // Route::get('comment', [CommentController::class,"index"]);

    //admin/film
    Route::prefix('film')->group(function () {
        //quan ly phim
        Route::get('index',[FilmController::class,'get']);
        //duyet phim
        Route::get('approved',[FilmController::class,'getApproved']);
        Route::get('approved/{id}',[FilmController::class,'Approved']);
        //tao phim
        Route::get('create',[FilmController::class,'create']);
        Route::post('createPost',[FilmController::class,'createPost']);
        //cap nhat phim
        Route::get('edit/{id}',[FilmController::class,'edit']);
        Route::post('editPost/{id}',[FilmController::class,'editPost']);
        //xoa phim
        Route::get('index/{id}',[FilmController::class,'delete']);
        //chi tiet phim
        Route::get('detail/{id}',[FilmController::class,'detail']);
         //quan ly the loại
        Route::get('category',[FilmController::class,'getCat']);
        Route::post('category/createCat',[FilmController::class,'createCat']);
        Route::get('category/{id}',[FilmController::class,'deleteCat']);
        Route::post('category/editCat',[FilmController::class,'editCat']);
        //quan ly quoc gia
        Route::get('nation',[FilmController::class,'getNation']);
        Route::post('nation/createNation',[FilmController::class,'createNation']);
        Route::get('nation/{id}',[FilmController::class,'deleteNation']);
        Route::post('nation/editNation',[FilmController::class,'editNation']);
    });
    //admin/carousel
    Route::prefix('carousel')->group(function () {
        Route::get('index',[CarouselController::class,'get']);
        Route::get('edit/{id}',[CarouselController::class,'edit']);
        Route::post('editPost/{id}',[CarouselController::class,'editPost']);
    });
    //admin/topic
    Route::prefix('topic')->group(function () {
        //ds chủ đề 
        Route::get('/', [TopicController::class, 'getTopic']);
        //tạo chủ đề
        Route::get('create/{film_id}', [TopicController::class, 'createTopic']);
        Route::post('createTopicPost', [TopicController::class, 'createTopicPost']);
        //sửa chủ đề
        Route::get('edit/{topic_id}', [TopicController::class, 'editTopic']);
        Route::post('editTopicPost/{topic_id}', [TopicController::class, 'editTopicPost']);
        //xóa chủ đề
        Route::get('delete/{topic_id}', [TopicController::class, 'deleteTopic']);
        //xem chi tiết chủ đề
        Route::get('view/{topic_id}', [TopicController::class, 'infoTopic']);
        //duyệt chủ đề
        Route::get('approved', [TopicController::class, 'getTopicApproved']);
        Route::get('approved/{topic_id}', [TopicController::class, 'topicApproved']);
    });
    //admin/binhluan
    Route::prefix('binhluan')->group(function(){
        Route::get('delete/{comment_id}/{topic_id}', [CommentController::class, 'deleteComment']);
    });
    //admin/celeb
    Route::prefix('celeb')->group(function () {
        //quan ly celeb
        Route::get('index',[CelebController::class,'getCeleb']);
        //tao celeb
        Route::get('create',[CelebController::class,'create']);
        Route::post('createPost',[CelebController::class,'createPost']);
        //cap nhat thong tin celeb
        Route::get('edit/{celeb_id}',[CelebController::class,'edit']);
        Route::post('editPost/{celeb_id}',[CelebController::class,'editPost']);
        //xoa celeb
        Route::get('index/{celeb_id}',[CelebController::class,'delete']);
        //chi tiet celeb
        Route::get('detail/{celeb_id}',[CelebController::class,'detail']);
    });
    //admin/news
    Route::prefix('news')->group(function () {
        //quan ly news
        Route::get('index',[NewsController::class,'getNews']);
        //tao news
        Route::get('create',[NewsController::class,'createNews']);
        Route::post('createPost',[NewsController::class,'createPost']);
        //cap nhat thong tin news
        Route::get('edit/{news_id}',[NewsController::class,'edit']);
        Route::post('editPost/{news_id}',[NewsController::class,'editPost']);
        //xoa news
        Route::get('index/{news_id}',[NewsController::class,'delete']);
        //chi tiet news
        Route::get('detail/{news_id}',[NewsController::class,'detail']);
    });

});