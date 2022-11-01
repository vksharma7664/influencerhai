<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostCategoryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\PlatformController;
use App\Http\Controllers\admin\InfluencerController;
use App\Http\Controllers\admin\CmsController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\PermissionsController;
use App\Http\Controllers\admin\CareerController;
use App\Http\Controllers\admin\MetaController;
use App\Http\Controllers\Brand\LoginController;
use App\Http\Controllers\Brand\CampaignController;
use App\Http\Controllers\Brand\BrandDashboardController;
use App\Http\Controllers\admin\CampaignAdminController;
use App\Http\Controllers\admin\BrandAdminController;

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


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/i-am-brand', [FrontController::class, 'ForBrand'])->name('brand');
Route::get('/thankyou', [FrontController::class, 'QuerySubmitThankyou'])->name('querysubmit.thankyou');
Route::post('/i-am-brand', [FrontController::class, 'ForBrandStore'])->name('brand.store');
Route::post('/i-am-an-influencer', [FrontController::class, 'ForInfluencerStore'])->name('influencer.form.store');
Route::get('/i-am-an-influencer', [FrontController::class, 'ForInfluencer'])->name('influencer');
Route::get('/about', [FrontController::class, 'About'])->name('about');
Route::get('/our-services', [FrontController::class, 'OurWorks'])->name('ourworks');
Route::get('/contact', [FrontController::class, 'Contact'])->name('contact');
Route::post('/contact', [FrontController::class, 'submitContact'])->name('contact.submit');
Route::get('/careers', [FrontController::class, 'Careers'])->name('careers');
Route::get('/careers/{title}/apply/{id}', [FrontController::class, 'CareersApply'])->name('careers.apply');
Route::post('/careers/apply/{id}', [FrontController::class, 'CareersApplyStore'])->name('careers.apply.store');
Route::get('/terms', [FrontController::class, 'Terms'])->name('terms');
Route::get('/privacy', [FrontController::class, 'Privacy'])->name('privacy');
Route::get('/blog', [FrontController::class, 'Blog'])->name('blog');
Route::get('/blog/{title}', [FrontController::class, 'BlogDetails'])->name('blog.details');
Route::get('/blog/category/{category}', [FrontController::class, 'BlogCategory'])->name('blog.category');
Route::get('/press-release', [FrontController::class, 'Blog'])->name('press');
Route::get('/start-campaign-here', [FrontController::class, 'startCampaign'])->name('campaign');
Route::post('/start-campaign-here', [FrontController::class, 'postCampaign'])->name('campaign.submit');
Route::get('/influencers/category/', [FrontController::class, 'InfluencerCategory'])->name('influencers.category');
Route::get('/influencers/category/{category_slug}', [FrontController::class, 'InfluencerList'])->name('influencers.list');

Route::get('/find-influencers/{slug}', [FrontController::class, 'customPage'])->name('custom.page');
Route::get('/influencer/login', [FrontController::class, 'InfluencersLogin'])->name('front.influencer.login');


Auth::routes();

Route::get('/admin', function(){
    return redirect()->route('login');      
})->name('admin.login.redirect');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth', 'admin'],'prefix' => 'admin'],function()
{
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['middleware' => ['permission']], function() {
    /**
     * User Routes
     */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UsersController::class, 'index'])->name('users.index');
            Route::get('/create', [UsersController::class, 'create'])->name('users.create');
            Route::post('/create', [UsersController::class, 'store'])->name('users.store');
            Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
            Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
            Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
        });

        Route::resource('/roles', RolesController::class);
        Route::resource('/permissions', PermissionsController::class);


        Route::get('/post/list',[PostController::class, 'listing'])->name('post.index');
        Route::get('/post/add',[PostController::class, 'add'])->name('post.create');
        Route::post('/post/submit',[PostController::class, 'submit'])->name('post.store');
        Route::get('/post/delete/{id}',[PostController::class, 'delete'])->name('post.delete');
        Route::get('/post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
        Route::post('/post/update/{id}',[PostController::class, 'update'])->name('post.update');

        Route::get('/post/add-new-category',[PostCategoryController::class, 'listing'])->name('post.cat.create');
        Route::post('/post/category-submit',[PostCategoryController::class, 'submit'])->name('post.cat.store');
        Route::get('/post/category-edit/{id}',[PostCategoryController::class, 'edit'])->name('post.cat.edit');
        Route::post('/post/category-update/{id}',[PostCategoryController::class, 'Update'])->name('post.cat.update');
        Route::get('/post/category-delete/{id}',[PostCategoryController::class, 'delete'])->name('post.cat.delete');

        // Influencers Platforms //
        Route::get('/influencers/add-new-platform',[PlatformController::class, 'listing'])->name('influencer.platform.create');
        Route::post('/influencers/platform-submit',[PlatformController::class, 'submit'])->name('influencer.platform.store');
        Route::get('/influencers/platform-edit/{id}',[PlatformController::class, 'edit'])->name('influencer.platform.edit');
        Route::post('/influencers/platform-update/{id}',[PlatformController::class, 'Update'])->name('influencer.platform.update');
        Route::get('/influencers/platform-delete/{id}',[PlatformController::class, 'delete'])->name('influencer.platform.delete');

        // Influencers Categories //
        Route::get('/influencers/add-new-category',[CategoryController::class, 'listing'])->name('influencer.cat.index');
        Route::post('/influencers/category-submit',[CategoryController::class, 'submit'])->name('influencer.cat.store');
        Route::get('/influencers/category-edit/{id}',[CategoryController::class, 'edit'])->name('influencer.cat.edit');
        Route::post('/influencers/category-update/{id}',[CategoryController::class, 'Update'])->name('influencer.cat.update');
        Route::get('/influencers/category-delete/{id}',[CategoryController::class, 'delete'])->name('influencer.cat.delete');


        // Influencers //
        Route::get('/influencers/list',[InfluencerController::class, 'listing'])->name('influencer.index');
        Route::get('/influencers/add',[InfluencerController::class, 'add'])->name('influencer.create');
        Route::post('/influencers/submit',[InfluencerController::class, 'submit'])->name('influencer.store');
        Route::get('/influencers/delete/{id}',[InfluencerController::class, 'delete'])->name('influencer.delete');
        Route::get('/influencers/edit/{id}',[InfluencerController::class, 'edit'])->name('influencer.edit');
        Route::post('/influencers/update/{id}',[InfluencerController::class, 'update'])->name('influencer.update');

        // Careers JOBS //
        Route::get('/jobs/list',[CareerController::class, 'listing'])->name('jobs.index');
        Route::get('/jobs/add',[CareerController::class, 'add'])->name('jobs.create');
        Route::post('/jobs/submit',[CareerController::class, 'submit'])->name('jobs.store');
        Route::get('/jobs/delete/{id}',[CareerController::class, 'delete'])->name('jobs.delete');
        Route::get('/jobs/edit/{id}',[CareerController::class, 'edit'])->name('jobs.edit');
        Route::post('/jobs/update/{id}',[CareerController::class, 'update'])->name('jobs.update');
        Route::get('/jobs/application/list',[CareerController::class, 'jobApplylisting'])->name('jobs.application.list');


        // Queries
        Route::get('/contactqueries/list',[CmsController::class, 'contactQuerieslisting'])->name('query.contact.show');
        Route::get('/brandsqueries/list',[CmsController::class, 'brandsQuerieslisting'])->name('query.brands.show');
        Route::get('/influencersqueries/list',[CmsController::class, 'influencersQuerieslisting'])->name('query.influencers.show');
        // Route::get('/contactqueries/list',[CmsController::class, 'contactQuerieslisting'])->name('query.jobs.show');

        // meta details for static pages
        Route::get('/meta/list',[MetaController::class, 'listing'])->name('meta.index');
        Route::get('/meta/add',[MetaController::class, 'add'])->name('meta.create');
        Route::post('/meta/submit',[MetaController::class, 'submit'])->name('meta.store');
        Route::get('/meta/edit/{id}',[MetaController::class, 'edit'])->name('meta.edit');
        Route::post('/meta/update/{id}',[MetaController::class, 'update'])->name('meta.update');

        // campaign routes
        Route::get('/campaign/list',[CampaignAdminController::class, 'listing'])->name('campaign.show');
        Route::get('/campaign/details/{unique_id}',[CampaignAdminController::class, 'campaignDetails'])->name('admin.campaign.details');
        
        // live brief
        Route::get('/campaign/{id}/live-brief',[CampaignAdminController::class, 'campaignLiveBriefShows'])->name('admin.campaign.live_brief');
        


        Route::get('/brands/list',[BrandAdminController::class, 'listing'])->name('admin.brand.show');

        // make influencers pages
        Route::get('admin/custom-pages/list',[CmsController::class, 'customInfluencersPages'])->name('admin.custom.influencers.pages.show');
        Route::get('admin/custom-pages/{id}/influencer',[CmsController::class, 'customInfluencersList'])->name('admin.custom.influencers.list.show');
        Route::get('admin/custom-pages/create',[CmsController::class, 'customInfluencersPagesCreate'])->name('admin.custom.influencers.pages.create');
        Route::post('admin/custom-pages/create',[CmsController::class, 'customInfluencersPagesStore'])->name('admin.custom.influencers.pages.store');
        Route::get('admin/custom-pages/edit/{id}',[CmsController::class, 'customInfluencersPagesEdit'])->name('admin.custom.influencers.pages.edit');
        Route::post('admin/custom-pages/update/{id}',[CmsController::class, 'customInfluencersPagesUpdate'])->name('admin.custom.influencers.pages.update');
        Route::get('admin/custom-pages/delete/{id}',[CmsController::class, 'customInfluencersPagesDelete'])->name('admin.custom.influencers.pages.delete');
    }); 


    // no permission
    Route::post('/campaign/status/change/{unique_id}',[CampaignAdminController::class, 'campaignStatusChange'])->name('admin.campaign.status.change');

    Route::post('/campaign/{unique_id}/sample/upload',[CampaignAdminController::class, 'campaignSampleUpload'])->name('admin.campaign.sample.upload');
    Route::post('/campaign/{unique_id}/sample/changes',[CampaignAdminController::class, 'campaignSampleChanges'])->name('admin.campaign.sample.changes');
    Route::get('/campaign/live-brief/links/add/{id}',[CampaignAdminController::class, 'campaignLiveBriefLinksAdd'])->name('admin.campaign.live_brief.links.add');
});

   


// brand login page
Route::get('/brand/login', [LoginController::class, 'loginShow'])->name('brand.login');
Route::get('/brand', function(){
    return redirect()->route('brand.login');      
})->name('brand.login.redirect');
Route::get('/brand/register', [LoginController::class, 'registerShow'])->name('brand.register');
Route::get('/email/verify/{token?}', [LoginController::class, 'verifyEmail'])->name('brand.verify.email');
Route::get('/email/verifysuccess', [LoginController::class, 'verifyEmailSuccess'])->name('brand.verify.email.success');
Route::post('/brand/register', [LoginController::class, 'registerSubmit'])->name('brand.register.submit');
Route::get('/brand/register/successful', [LoginController::class, 'registerSuccess'])->name('brand.register.success');

//brand login routes
Route::group(['middleware'=>['auth','brand'],'prefix' => 'brand'],function(){

    Route::get('/dashboard',[BrandDashboardController::class, 'dashboard'])->name('brand.dashboard');
    Route::get('/campaign/create',[CampaignController::class, 'create'])->name('brand.campaign.create');
    Route::get('/campaign/{id}/campaign-details',[CampaignController::class, 'editCampaign'])->name('brand.campaign.edit');
    Route::post('/campaign/platform-details/{id?}',[CampaignController::class, 'create2'])->name('brand.campaign.create2');
    Route::post('/campaign/influencer-details/{id?}',[CampaignController::class, 'create3'])->name('brand.campaign.create3');
    Route::post('/campaign/finalcreate/{id?}',[CampaignController::class, 'finalCreate'])->name('brand.campaign.finalcreate');
    Route::get('/campaign/my-campaign',[CampaignController::class, 'list'])->name('brand.campaign.list');
    Route::get('/campaign/{id}/campaign-show',[CampaignController::class, 'showCampaign'])->name('brand.campaign.show');
    Route::get('/campaign/{id}/make-ongoing',[CampaignController::class, 'underReviewCampaign'])->name('brand.campaign.post');

    Route::get('/campaign/{id}/influencers-list',[CampaignController::class, 'sampleInfluencers'])->name('brand.campaign.sample.influencer');
    Route::post('/campaign/influencers-list/selected',[CampaignController::class, 'sampleInfluencersSelected'])->name('brand.campaign.sample.influencer.selected');

    // live brief 
    Route::get('/campaign/{id}/live-brief',[CampaignController::class, 'liveBrief'])->name('brand.campaign.live_brief');
    Route::get('/campaign/live-brief/{id}',[CampaignController::class, 'liveBriefDetails'])->name('brand.campaign.live_brief.details');
    Route::post('/campaign/live-brief/{id}/save',[CampaignController::class, 'liveBriefDetailsSave'])->name('brand.campaign.live_brief.details.save');

});

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

Route::get('/mail', [LoginController::class, 'testMail']);

// create sitemap.xml
Route::get('generate/sitemap', function(){
    $constant_routes = [
        env('APP_URL').'i-am-brand',
        env('APP_URL').'i-am-an-influencer',
        env('APP_URL').'about',
        env('APP_URL').'contact',
        env('APP_URL').'careers',
        env('APP_URL').'privacy',
        env('APP_URL').'blog',
        env('APP_URL').'influencers',
        env('APP_URL').'our-services',//our-works
    ];

    $blogs=DB::table('posts')->orderBy('id', 'desc')->get();
    $myfile = fopen("sitemap.xml", "w") or die("Unable to open file!");
    $content = view('sitemap', [
            'blogs' => $blogs,
            'constant_routes' => $constant_routes,
        ])->render();
     fwrite($myfile, $content);
    fclose($myfile);
    return response()->json("sitemap created successfully", 200);
});

