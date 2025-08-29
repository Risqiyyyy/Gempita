<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Categori;
use App\Http\Controllers\RssFeedController;
use App\Models\ImageMetadata;
use Illuminate\Http\Request;
use App\Http\Controllers\SocialMediaController;
use UniSharp\LaravelFilemanager\Controllers\ItemsController;
use App\Http\Controllers\ReporterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ~~~~~~~~~~~~~~~~~~~~~~~~~~  {{ !! END-USER ROUTING !! }} ~~~~~~~~~~~~~~~~~~~~~~~~~~ //

Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create(route('home'))->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
        ->add(Url::create(route('byIndex.dekstop'))->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
        ->add(Url::create(route('redaksi.desktop'))->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
        ->add(Url::create(route('kebijakan.desktop'))->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
        ->add(Url::create(route('kodeEtik.desktop'))->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
        ->add(Url::create(route('visiMisi.desktop'))->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
        ->add(Url::create(route('siteMap.desktop'))->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));

    $posts = Post::orderBy('updated_at', 'desc')->take(500)->get();
    foreach ($posts as $post) {
        $sitemap->add(Url::create(route('detail.desktop', $post->slug))
            ->setPriority(0.9)
            ->setLastModificationDate($post->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
    }

    Categori::chunk(100, function ($categories) use ($sitemap) {
        foreach ($categories as $category) {
            $sitemap->add(Url::create(route('kanal.desktop', $category->slug))
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        }
    });

    return $sitemap->toResponse(request());
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // === {{ !! Member Page !! }} === //
    // Member
    Route::get('/dashboard/member', [MemberController::class, 'memberIndex'])->name('member.index');
    Route::get('/dashboard/member/create', [MemberController::class, 'memberCreate'])->name('member.create');
    Route::post('/dashboard/member/create', [MemberController::class, 'memberPost'])->name('member.post');
    Route::get('/dashboard/member/edit/{id}', [MemberController::class, 'memberEdit'])->name('member.edit');
    Route::put('/dashboard/member/update/{id}', [MemberController::class, 'memberUpdate'])->name('member.update');
    Route::delete('/dashboard/member/delete/{id}', [MemberController::class, 'memberdelete'])->name('member.delete');
    Route::get('/chart-data', [MemberController::class, 'getChartData'])->name('getChartData');

    // === {{ !! Export Data Page !! }} === //
    // Export Data
    Route::get('/dashboard/export/export-post', [DashboardController::class, 'exportDataPost'])->name('dashboard.exportPost');
    Route::post('/dashboard/export/export-post', [DashboardController::class, 'exportPosts'])->name('posts.export');

    Route::get('/dashboard/export/export-report', [DashboardController::class, 'exportReport'])->name('dashboard.exportReport');
    Route::post('/dashboard/export/export-pdf', [DashboardController::class, 'exportPdf'])->name('dashboard.exportPdf');


    // === {{ !! Settings Page !! }} === //
    // Google Annalytics
    Route::get('/dashboard/settings/annalyics', [SettingsController::class, 'annalytic'])->name('settings.annalytic');
    Route::post('/dashboard/settings/annalyics', [SettingsController::class, 'addannalytic'])->name('settings.addannalytic');

    // Google Tag Manager
    Route::get('/dashboard/settings/google-tag', [SettingsController::class, 'googleTag'])->name('settings.googletag');
    Route::post('/dashboard/settings/google-tag', [SettingsController::class, 'addgoogleTag'])->name('settings.addgoogletag');

    // Member Dashboard
    Route::get('/dashboard/settings/member-dashboard', [SettingsController::class, 'memberDashboard'])->name('settings.memberDashboard');
    Route::get('/dashboard/settings/member-dashboard/edit/{id}', [SettingsController::class, 'editMemberDashboard'])->name('settings.editMemberDashboard');
    Route::get('/dashboard/settings/member-dashboard/create', [SettingsController::class, 'createMemberDashboard'])->name('settings.createMemberDashboard');
    Route::post('/dashboard/settings/member-dashboard/create', [SettingsController::class, 'addMemberDashboard'])->name('settings.addMemberDashboard');
    Route::delete('/dashboard/settings/member-dashboard/delete/{id}', [SettingsController::class, 'deleteMemberDashboard'])->name('settings.deleteMemberDashboard');

    // Category
    Route::get('/dashboard/blog/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::get('/dashboard/blog/category/create', [CategoryController::class, 'categoryCreate'])->name('category.create');
    Route::post('/dashboard/blog/category/add', [CategoryController::class, 'categoryAdd'])->name('category.add');
    Route::delete('/dashboard/blog/category/delete/{id}', [CategoryController::class, 'categoryDestroy'])->name('category.destroy');
    Route::post('/dashboard/blog/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');

    // Route::get('/laravel-filemanager/items', [ItemsController::class, 'getItems']);
    // subcateg
    Route::get('/dashboard/blog/subcateg/edit/{id}', [CategoryController::class, 'SubcategEdit'])->name('subcateg.edit');
    Route::put('/dashboard/blog/subcateg/update/{id}', [CategoryController::class, 'subCategoryUpdate'])->name('subcateg.update');
    Route::delete('/dashboard/blog/subcateg/delete/{id}', [CategoryController::class, 'subcategDestroy'])->name('subcateg.destroy');

    // === {{ !! reporter !! }} === //
    Route::get('/dashboard/reporter', [ReporterController::class, 'reporterIndex'])->name('reporter.index');
    Route::get('/dashboard/reporter/create', [ReporterController::class, 'reporterCreate'])->name('reporter.create');
    Route::post('/dashboard/reporter/create', [ReporterController::class, 'reporterPost'])->name('reporter.post');
    Route::get('/dashboard/reporter/edit/{id}', [ReporterController::class, 'reporterEdit'])->name('reporter.edit');
    Route::put('/dashboard/reporter/update/{id}', [ReporterController::class, 'reporterUpdate'])->name('reporter.update');
    Route::delete('/dashboard/reporter/delete/{id}', [ReporterController::class, 'reporterdelete'])->name('reporter.delete');

});

Route::middleware(['auth', 'role:author|admin'])->group(function () {

    // ~~~~~~~~~~~~~~~~~~~~~~~~~~  {{ !! DASHBOARD ROUTING !! }} ~~~~~~~~~~~~~~~~~~~~~~~~~~ //
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/top-pages', [DashboardController::class, 'getTopPages'])->name('topPages');
    Route::get('/top-browsers', [DashboardController::class, 'gettopBrowsers'])->name('gettopBrowsers');
    Route::get('/top-referer', [DashboardController::class, 'gettopReferrers'])->name('gettopReferrers');
    Route::get('/getSiteAnalytics', [DashboardController::class, 'getSiteAnalytics'])->name('getSiteAnalytics');


    // === {{ !! Blog Page !! }} === //
    // Post
    Route::get('/dashboard/blog/post', [BlogController::class, 'blogPost'])->name('blog.post');
    Route::get('/dashboard/blog/post/edit/{id}', [BlogController::class, 'editPost'])->name('blog.edit');
    Route::get('/dashboard/blog/post/create', [BlogController::class, 'createPost'])->name('blog.create');
    Route::post('/dashboard/blog/post/create', [BlogController::class, 'PostAdd'])->name('blog.add');
    Route::delete('/dashboard/blog/post/delete/{id}', [BlogController::class, 'deletePost'])->name('blog.delete');
    Route::post('/dashboard/blog/{id}/update', [BlogController::class, 'PostUpdate'])->name('post.update');


    // Schedule Post Page
    Route::get('/dashboard/blog/schedule-post', [BlogController::class, 'schedulePost'])->name('blog.schedulePost');
    // SEO Post Page
    Route::get('/dashboard/blog/seo-post', [BlogController::class, 'seoPost'])->name('blog.seoPost');


    // Tags
    Route::get('/dashboard/blog/tags', [TagsController::class, 'tagsIndex'])->name('tags.index');
    Route::get('/dashboard/blog/tags/edit/{id}', [TagsController::class, 'tagsEdit'])->name('tags.edit');
    Route::get('/dashboard/blog/tags/create', [TagsController::class, 'tagsCreate'])->name('tags.create');
    Route::post('/dashboard/blog/tags/create', [TagsController::class, 'tagAdd'])->name('tags.add');
    Route::delete('/dashboard/blog/tags/delete/{id}', [TagsController::class, 'tagDelete'])->name('tags.delete');

    // === {{ !! Media Page !! }} === //
    // Media Page
    Route::get('/dashboard/media', [PostController::class, 'mediaDashboard'])->name('media.index');

    // === {{ !! Profile !! }} === //
    Route::get('/system/users/profile/', [ProfileController::class, 'indexProfile'])->name('profile.indexProfile');
    Route::post('/system/users/profile/{id}', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('/system/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/laravel-filemanager', [SettingsController::class, 'getItems'])->name('getItems.file');

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });


    Route::get('/get-caption', function (Request $request) {
        $url = $request->query('url');
        $metadata = ImageMetadata::where('comp_url', $url)->first();
        return response()->json(['caption' => $metadata->caption ?? null]);
    });

    Route::post('/get-facebook-embed-url', [SocialMediaController::class, 'getFacebookEmbedUrl'])->name('getFacebookEmbedUrl');

    // Route::get('/laravel-filemanager/search', [DashboardController::class, 'searchLfm'])->name('unisharp.lfm.search');

});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/staticat', [HomeController::class, 'staticat'])->name('staticat.desktop');

// === {{ !! Auth !! }} === //
Route::get('/spring', [DashboardController::class, 'loginPage'])->name('login');
Route::post('/authlogin', [LoginController::class, 'authlogin'])->name('authlogin');

Route::get('/tag/{slug}', [HomeController::class, 'byTag'])->name('bytag');
Route::get('/makna-logo', [HomeController::class, 'redaksi'])->name('redaksi.desktop');
Route::get('/kebijakan-privasi', [HomeController::class, 'kebijakanPrivasi'])->name('kebijakan.desktop');
Route::get('/struktur', [HomeController::class, 'kodeEtik'])->name('kodeEtik.desktop');
Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visiMisi.desktop');
Route::get('/site-map', [HomeController::class, 'siteMap'])->name('siteMap.desktop');
Route::get('/gallery', [HomeController::class, 'jaringan'])->name('jaringan');
Route::get('/category/{slug}', [HomeController::class, 'kanal'])->name('kanal.desktop');
Route::get('/category/{categ}/{subcateg}', [HomeController::class, 'subcateg'])->name('subcateg.desktop');
Route::get('/indeks', [HomeController::class, 'byIndex'])->name('byIndex.dekstop');
Route::get('/search-result', [HomeController::class, 'searchResult'])->name('searchResult.dekstop');
Route::get('/feed', [RssFeedController::class, 'index']);
Route::get('/{slug}', [HomeController::class, 'detail'])->name('detail.desktop');

Route::get('/404/not-found', [HomeController::class, 'by404'])->name('by404');

