<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\HomepageSettingController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolActivityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// ---------------------------------------------------------------------------------------------------------------------------------------
// FRONTEND
// ---------------------------------------------------------------------------------------------------------------------------------------
Route::get('/', [HomepageController::class, 'index'])->name('index');

Route::get('/profil-sekolah', [HomepageController::class, 'profil'])->name('profil');
Route::get('/sejarah-sekolah', [HomepageController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi', [HomepageController::class, 'visiMisi'])->name('visi-misi');
Route::get('/6-nilai-serviam', [HomepageController::class, 'serviam'])->name('serviam');
Route::get('/entrepreneurship', [HomepageController::class, 'entrepreneurship'])->name('entrepreneurship');

Route::get('/fasilitas', [HomepageController::class, 'facilities'])->name('fasilitas');

Route::get('/berita-artikel', [HomepageController::class, 'posts'])->name('posts');
Route::get('/berita-artikel/kategori/{post_category}', [HomepageController::class, 'postsByCategory'])->name('post.category');
Route::get('/berita-artikel/author/{slug}', [HomepageController::class, 'postsByAuthor'])->name('post.author');
Route::get('/berita-artikel/{post}', [HomepageController::class, 'postDetail'])->name('post.detail');

Route::get('/galeri-foto', [HomepageController::class, 'galleries'])->name('galleries');
Route::get('/galeri-foto/kategori/{gallery_category}', [HomepageController::class, 'galleriesByCategory'])->name('gallery.category');
Route::get('/galeri-foto/{gallery}', [HomepageController::class, 'galleryDetail'])->name('gallery.detail');

Route::get('/kegiatan-sekolah/{school_activity}', [HomepageController::class, 'schoolActivity'])->name('school-activity');

Route::get('/kontak', [HomepageController::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim-pesan', [HomepageController::class, 'kirimPesan'])->name('kontak.kirim-pesan');

// ---------------------------------------------------------------------------------------------------------------------------------------
// BACKEND
// ---------------------------------------------------------------------------------------------------------------------------------------
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/web-setting', [GeneralSettingController::class, 'webSetting'])->name('web-setting');
    Route::put('/web-setting', [GeneralSettingController::class, 'webSettingUpdate'])->name('web-setting.update');
    Route::get('/header-setting', [GeneralSettingController::class, 'headerSetting'])->name('header-setting');
    Route::put('/header-setting', [GeneralSettingController::class, 'headerSettingUpdate'])->name('header-setting.update');
    Route::get('/footer-setting', [GeneralSettingController::class, 'footerSetting'])->name('footer-setting');
    Route::put('/footer-setting', [GeneralSettingController::class, 'footerSettingUpdate'])->name('footer-setting.update');
    Route::resource('links', LinkController::class)->except('show');

    Route::prefix('homepage')->name('homepage.')->group(function () {
        Route::get('/sliders', [HomepageSettingController::class, 'sliders'])->name('sliders');
        Route::get('/sliders/{slider}/edit', [HomepageSettingController::class, 'sliderEdit'])->name('slider.edit');
        Route::put('/sliders/{slider}', [HomepageSettingController::class, 'sliderUpdate'])->name('slider.update');
        Route::get('/opening', [HomepageSettingController::class, 'openingEdit'])->name('opening');
        Route::put('/opening', [HomepageSettingController::class, 'openingUpdate'])->name('opening.update');
        Route::get('/headmaster', [HomepageSettingController::class, 'headmasterEdit'])->name('headmaster');
        Route::put('/headmaster', [HomepageSettingController::class, 'headmasterUpdate'])->name('headmaster.update');
        Route::get('/testimonials', [HomepageSettingController::class, 'testimonials'])->name('testimonials');
        Route::get('/testimonials/create', [HomepageSettingController::class, 'testimonialCreate'])->name('testimonial.create');
        Route::post('/testimonials', [HomepageSettingController::class, 'testimonialStore'])->name('testimonial.store');
        Route::get('/testimonials/{testimonial}/edit', [HomepageSettingController::class, 'testimonialEdit'])->name('testimonial.edit');
        Route::put('/testimonials/{testimonial}', [HomepageSettingController::class, 'testimonialUpdate'])->name('testimonial.update');
        Route::delete('/testimonials/{testimonial}', [HomepageSettingController::class, 'testimonialDelete'])->name('testimonial.delete');
    });

    Route::prefix('about')->name('about.')->group(function () {
        Route::get('/profile', [AboutController::class, 'profile'])->name('profile');
        Route::put('/profile', [AboutController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/history', [AboutController::class, 'history'])->name('history');
        Route::put('/history', [AboutController::class, 'historyUpdate'])->name('history.update');
        Route::prefix('vision-mission')->name('vision-mission.')->group(function () {
            Route::get('/', [AboutController::class, 'visionMission'])->name('index');
            Route::put('/vision', [AboutController::class, 'visionUpdate'])->name('vision.update');
            Route::get('/mission/create', [AboutController::class, 'missionCreate'])->name('mission.create');
            Route::post('/mission', [AboutController::class, 'missionStore'])->name('mission.store');
            Route::get('/mission/{mission}/edit', [AboutController::class, 'missionEdit'])->name('mission.edit');
            Route::put('/mission/{mission}', [AboutController::class, 'missionUpdate'])->name('mission.update');
            Route::delete('/mission/{mission}', [AboutController::class, 'missionDelete'])->name('mission.delete');
            Route::get('/value/create', [AboutController::class, 'valueCreate'])->name('value.create');
            Route::post('/value', [AboutController::class, 'valueStore'])->name('value.store');
            Route::get('/value/{value}/edit', [AboutController::class, 'valueEdit'])->name('value.edit');
            Route::put('/value/{value}', [AboutController::class, 'valueUpdate'])->name('value.update');
            Route::delete('/value/{value}', [AboutController::class, 'valueDelete'])->name('value.delete');
        });
        Route::prefix('serviam')->name('serviam.')->group(function () {
            Route::get('/', [AboutController::class, 'serviam'])->name('index');
            Route::put('/description', [AboutController::class, 'serviamDescriptionUpdate'])->name('description.update');
            Route::get('/value/create', [AboutController::class, 'serviamValueCreate'])->name('value.create');
            Route::post('/value', [AboutController::class, 'serviamValueStore'])->name('value.store');
            Route::get('/value/{value}/edit', [AboutController::class, 'serviamValueEdit'])->name('value.edit');
            Route::put('/value/{value}', [AboutController::class, 'serviamValueUpdate'])->name('value.update');
            Route::delete('/value/{value}', [AboutController::class, 'serviamValueDelete'])->name('value.delete');
        });
        Route::get('/entrepreneurship', [AboutController::class, 'entrepreneurship'])->name('entrepreneurship');
        Route::put('/entrepreneurship', [AboutController::class, 'entrepreneurshipUpdate'])->name('entrepreneurship.update');
    });

    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/category/checkSlug', [PostCategoryController::class, 'checkSlug'])->name('category.slug');
        Route::resource('/category', PostCategoryController::class);
        Route::get('/checkSlug', [PostController::class, 'checkSlug'])->name('slug');
        Route::get('/deleted', [PostController::class, 'deleted'])->name('deleted');
        Route::get('/restore/{slug}', [PostController::class, 'restore'])->name('restore');
        Route::get('/restoreAll', [PostController::class, 'restoreAll'])->name('restoreAll');
        Route::get('/deletePermanent/{slug}', [PostController::class, 'deletePermanent'])->name('deletePermanent');
        Route::get('/deletePermanentAll', [PostController::class, 'deletePermanentAll'])->name('deletePermanentAll');
        Route::get('/publish/{slug}/{user}', [PostController::class, 'publish'])->name('publish');
        Route::get('/notPublish/{slug}/{user}', [PostController::class, 'notPublish'])->name('notPublish');
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/{post}', [PostController::class, 'show'])->name('show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('/{post}', [PostController::class, 'update'])->name('update');
        Route::delete('/{post}', [PostController::class, 'delete'])->name('delete');
    });

    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/category/checkSlug', [GalleryCategoryController::class, 'checkSlug'])->name('category.slug');
        Route::resource('/category', GalleryCategoryController::class);
        Route::get('/checkSlug', [GalleryController::class, 'checkSlug'])->name('slug');
        Route::get('/deleted', [GalleryController::class, 'deleted'])->name('deleted');
        Route::get('/restore/{slug}', [GalleryController::class, 'restore'])->name('restore');
        Route::get('/restoreAll', [GalleryController::class, 'restoreAll'])->name('restoreAll');
        Route::get('/deletePermanent/{slug}', [GalleryController::class, 'deletePermanent'])->name('deletePermanent');
        Route::get('/deletePermanentAll', [GalleryController::class, 'deletePermanentAll'])->name('deletePermanentAll');
        Route::get('/publish/{slug}/{user}', [GalleryController::class, 'publish'])->name('publish');
        Route::get('/notPublish/{slug}/{user}', [GalleryController::class, 'notPublish'])->name('notPublish');
        Route::get('/images/{gallery}', [GalleryController::class, 'images'])->name('images');
        Route::post('/images/{gallery}', [GalleryController::class, 'imagesUpload'])->name('images.upload');
        Route::delete('/images/{gallery}/{gallery_image}', [GalleryController::class, 'imagesDelete'])->name('images.delete');
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('/create', [GalleryController::class, 'create'])->name('create');
        Route::post('/', [GalleryController::class, 'store'])->name('store');
        Route::get('/{gallery}', [GalleryController::class, 'show'])->name('show');
        Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('edit');
        Route::put('/{gallery}', [GalleryController::class, 'update'])->name('update');
        Route::delete('/{gallery}', [GalleryController::class, 'delete'])->name('delete');
    });

    Route::get('/facilities', [FacilityController::class, 'facilities'])->name('facilities');
    Route::get('/facilities/create', [FacilityController::class, 'facilityCreate'])->name('facility.create');
    Route::post('/facilities', [FacilityController::class, 'facilityStore'])->name('facility.store');
    Route::get('/facilities/{facility}/edit', [FacilityController::class, 'facilityEdit'])->name('facility.edit');
    Route::put('/facilities/{facility}', [FacilityController::class, 'facilityUpdate'])->name('facility.update');
    Route::delete('/facilities/{facility}', [FacilityController::class, 'facilityDelete'])->name('facility.delete');

    Route::get('/school-activity/checkSlug', [SchoolActivityController::class, 'checkSlug']);
    Route::get('/school-activity/publish/{slug}', [SchoolActivityController::class, 'publish'])->name('school-activity.publish');
    Route::get('/school-activity/notPublish/{slug}', [SchoolActivityController::class, 'notPublish'])->name('school-activity.notPublish');
    Route::resource('/school-activity', SchoolActivityController::class);

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::put('/contact', [ContactController::class, 'update'])->name('contact.update');

    Route::get('/users/profile-edit/{user}', [UserController::class, 'profileEdit'])->name('users.profile.edit');
    Route::put('/users/profile-edit/{user}', [UserController::class, 'profileUpdate'])->name('users.profile.update');
    Route::get('/users/checkSlug', [UserController::class, 'checkSlug'])->name('users.slug');
    Route::resource('/users', UserController::class)->except('show');
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.give');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.revoke');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class)->except('show');

    Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

// ---------------------------------------------------------------------------------------------------------------------------------------
// LOGIN
// ---------------------------------------------------------------------------------------------------------------------------------------
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/administrator/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/dashboard/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/storage-tbtk', function () {
    Artisan::call('storage:link');
});
