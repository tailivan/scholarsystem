<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\PatController;
use App\Http\Controllers\Backend\Setup\GoalController;
use App\Http\Controllers\Backend\Setup\TeamController;
use App\Http\Controllers\Backend\Setup\CarouController;
use App\Http\Controllers\Backend\Setup\PosteController;
use App\Http\Controllers\Backend\Setup\RecitController;
use App\Http\Controllers\Backend\Setup\TableController;
use App\Http\Controllers\Backend\Setup\CompetController;
use App\Http\Controllers\Backend\Setup\FilterController;
use App\Http\Controllers\Backend\Setup\PlayerController;
use App\Http\Controllers\Backend\Setup\WriterController;
use App\Http\Controllers\Backend\Shop\CategoryController;
use App\Http\Controllers\Backend\Shop\SubcategoryController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Shop\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\ShopController;

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
    return view('auth.login');
});

/*Route::get('/', [HomeController::class, 'index'], function () {
    return view('front.home');
});*/


/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//User Management All Routes

    Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

});

Route::prefix('profile')->group(function(){

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/store/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});

    Route::prefix('hockey')->group(function(){

    Route::get('/pat/view', [PatController::class, 'ViewPat'])->name('pat.view');
    Route::get('/pat/add', [PatController::class, 'AddPat'])->name('pat.add');
    Route::get('/pat/edit/{id}', [PatController::class, 'EditPat'])->name('pat.edit');
    Route::post('/pat/store', [PatController::class, 'StorePat'])->name('pat.store');
    Route::post('/pat/update/{id}', [PatController::class, 'UpdatePat'])->name('pat.update');
    Route::get('/pat/delete/{id}', [PatController::class, 'DeletePat'])->name('pat.delete');

});

    Route::prefix('hockey')->group(function(){

    Route::get('/team/view', [TeamController::class, 'ViewTeam'])->name('team.view');
    Route::get('/team/add', [TeamController::class, 'AddTeam'])->name('team.add');
    Route::get('/team/edit/{id}', [TeamController::class, 'EditTeam'])->name('team.edit');
    Route::post('/team/store', [TeamController::class, 'StoreTeam'])->name('team.store');
    Route::post('/team/update/{id}', [TeamController::class, 'UpdateTeam'])->name('team.update');
    Route::get('/team/delete/{id}', [TeamController::class, 'DeleteTeam'])->name('team.delete');

});
    Route::prefix('hockey')->group(function(){

    Route::get('/poste/view', [PosteController::class, 'ViewPoste'])->name('poste.view');
    Route::get('/poste/add', [PosteController::class, 'AddPoste'])->name('poste.add');
    Route::get('/poste/edit/{id}', [PosteController::class, 'EditPoste'])->name('poste.edit');
    Route::post('/poste/store', [PosteController::class, 'StorePoste'])->name('poste.store');
    Route::post('/poste/update/{id}', [PosteController::class, 'UpdatePoste'])->name('poste.update');
    Route::get('/poste/delete/{id}', [PosteController::class, 'DeletePoste'])->name('poste.delete');

});

    Route::prefix('hockey')->group(function(){

    Route::get('/player/view', [PlayerController::class, 'ViewPlayer'])->name('player.view');
    Route::get('/player/add', [PlayerController::class, 'AddPlayer'])->name('player.add');
    Route::get('/player/edit/{id}', [PlayerController::class, 'EditPlayer'])->name('player.edit');
    Route::post('/player/store', [PlayerController::class, 'StorePlayer'])->name('player.store');
    Route::post('/player/update/{id}', [PlayerController::class, 'UpdatePlayer'])->name('player.update');
    Route::get('/player/delete/{id}', [PlayerController::class, 'DeletePlayer'])->name('player.delete');

});

    Route::prefix('hockey')->group(function(){
       
    Route::get('/compet/view', [CompetController::class, 'ViewCompet'])->name('compet.view');
    Route::get('/compet/add', [CompetController::class, 'AddCompet'])->name('compet.add');
    Route::get('/compet/edit/{id}', [CompetController::class, 'EditCompet'])->name('compet.edit');
    Route::post('/compet/store', [CompetController::class, 'StoreCompet'])->name('compet.store');
    Route::post('/compet/update/{id}', [CompetController::class, 'UpdateCompet'])->name('compet.update');
    Route::get('/compet/delete/{id}', [CompetController::class, 'DeleteCompet'])->name('compet.delete');
    Route::get('/compet/table', [TableController::class, 'index'])->name('table.view');

});

    Route::prefix('hockey')->group(function(){

    Route::get('/goal/view', [GoalController::class, 'ViewGoal'])->name('goal.view');
    Route::get('/goal/add', [GoalController::class, 'AddGoal'])->name('goal.add');
    Route::get('/goal/edit/{id}', [GoalController::class, 'EditGoal'])->name('goal.edit');
    Route::post('/goal/store', [GoalController::class, 'StoreGoal'])->name('goal.store');
    Route::post('/goal/update/{id}', [GoalController::class, 'UpdateGoal'])->name('goal.update');
    Route::get('/goal/delete/{id}', [GoalController::class, 'DeleteGoal'])->name('goal.delete');
    Route::get('/goal/rang', [GoalController::class, 'RangGoal'])->name('goal.rang');
    
    

});

    Route::prefix('content')->group(function(){

    Route::get('/writer/view', [WriterController::class, 'ViewWriter'])->name('writer.view');
    Route::get('/writer/add', [WriterController::class, 'AddWriter'])->name('writer.add');
    Route::get('/writer/edit/{id}', [WriterController::class, 'EditWriter'])->name('writer.edit');
    Route::post('/writer/store', [WriterController::class, 'StoreWriter'])->name('writer.store');
    Route::post('/writer/update/{id}', [WriterController::class, 'UpdateWriter'])->name('writer.update');
    Route::get('/writer/delete/{id}', [WriterController::class, 'DeleteWriter'])->name('writer.delete');
    
    
    

});

    Route::prefix('content')->group(function(){

    Route::get('/filter/view', [FilterController::class, 'Viewfilter'])->name('filter.view');
    Route::get('/filter/add', [FilterController::class, 'Addfilter'])->name('filter.add');
    Route::get('/filter/edit/{id}', [FilterController::class, 'Editfilter'])->name('filter.edit');
    Route::post('/filter/store', [FilterController::class, 'Storefilter'])->name('filter.store');
    Route::post('/filter/update/{id}', [FilterController::class, 'Updatefilter'])->name('filter.update');
    Route::get('/filter/delete/{id}', [FilterController::class, 'Deletefilter'])->name('filter.delete');
    
    
    

});

    Route::prefix('content')->group(function(){

    Route::get('/recit/view', [RecitController::class, 'ViewRecit'])->name('recit.view');
    Route::get('/recit/add', [RecitController::class, 'AddRecit'])->name('recit.add');
    Route::get('/recit/edit/{id}', [RecitController::class, 'EditRecit'])->name('recit.edit');
    Route::post('/recit/store', [RecitController::class, 'StoreRecit'])->name('recit.store');
    Route::post('/recit/update/{id}', [RecitController::class, 'UpdateRecit'])->name('recit.update');
    Route::get('/recit/delete/{id}', [RecitController::class, 'DeleteRecit'])->name('recit.delete');
    
    
    

});

Route::prefix('content')->group(function(){

    Route::get('/view', [CarouController::class, 'ViewCarou'])->name('carou.view');
    Route::get('/add', [CarouController::class, 'AddCarou'])->name('carou.add');
    Route::get('/edit/{id}', [CarouController::class, 'EditCarou'])->name('carou.edit');
    Route::post('/store', [CarouController::class, 'StoreCarou'])->name('carou.store');
    Route::post('/update/{id}', [CarouController::class, 'UpdateCarou'])->name('carou.update');
    Route::get('/dcarou/elete/{id}', [CarouController::class, 'DeleteCarou'])->name('carou.delete');
    
    
    

});

    Route::prefix('shop')->group(function(){

    Route::get('/view', [CategoryController::class, 'ViewCat'])->name('cat.view');
    Route::get('/add', [CategoryController::class, 'AddCat'])->name('cat.add');
    Route::get('/edit/{id}', [CategoryController::class, 'EditCat'])->name('cat.edit');
    Route::post('/store', [CategoryController::class, 'StoreCat'])->name('cat.store');
    Route::post('/update/{id}', [CategoryController::class, 'UpdateCat'])->name('cat.update');
    Route::get('/delete/{id}', [CategoryController::class, 'DeleteCat'])->name('cat.delete');
    
    
    

});

Route::prefix('shop')->group(function(){

    Route::get('/sub/view', [SubcategoryController::class, 'ViewSubcat'])->name('subcat.view');
    Route::get('/sub/add', [SubcategoryController::class, 'AddSubcat'])->name('subcat.add');
    Route::get('/sub/edit/{id}', [SubcategoryController::class, 'EditSubcat'])->name('subcat.edit');
    Route::post('/sub/store', [SubcategoryController::class, 'StoreSubcat'])->name('subcat.store');
    Route::post('/sub/update/{id}', [SubcategoryController::class, 'UpdateSubcat'])->name('subcat.update');
    Route::get('/sub/delete/{id}', [SubcategoryController::class, 'DeleteSubcat'])->name('subcat.delete');
    
    
    

});

    Route::prefix('shop')->group(function(){

    Route::get('/product/view', [ProductController::class, 'ViewProduct'])->name('product.view');
    
    Route::get('/product/add', [ProductController::class, 'AddProduct'])->name('product.add');
    Route::get('/product/edit{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/product/store', [ProductController::class, 'StoreProduct'])->name('product.store');
    Route::post('/product/update/{id}', [ProductController::class, 'UpdateProduct'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('product.delete');
    Route::get('/subcategories/{id}', [ProductController::class, 'loadCategories']);
    Route::get('/usersorders', [ProductController::class, 'userOrder'])->name('userorder');
    Route::get('/usersorders/{user_id},{order_id} ', [ProductController::class, 'viewUserOrder'])->name('userorders');
    
    
    
    

});


    Route::prefix('front')->group(function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/blog', [HomeController::class, 'recit'])->name('blog');
        Route::get('/rw/{id}', [HomeController::class, 'recitWriter'])->name('rw');
        Route::get('/blog/{id}', [HomeController::class, 'recitSingle'])->name('blog.single');
        Route::get('/classement', [HomeController::class, 'classement'])->name('classement');
        Route::get('/equipes', [HomeController::class, 'equipes'])->name('equipes');
        Route::get('/stat', [HomeController::class, 'stat'])->name('stat');
        Route::get('/compet', [HomeController::class, 'compet'])->name('compet');
        Route::get('/team/{id}', [HomeController::class, 'teamSingle'])->name('team.single');
        Route::get('/customer/{id}', [HomeController::class, 'CustomProfile'])->name('custom.profile');
        Route::post('/customer/store', [HomeController::class, 'CustomStore'])->name('customer.store');
        Route::get('/customer/show/{id}', [HomeController::class, 'CustomShow'])->name('customer.show');
        Route::get('/customer/edit/{id}', [HomeController::class, 'CustomEdit'])->name('customer.edit');
        Route::post('/customer/update/{id}', [HomeController::class, 'CustomUpdate'])->name('customer.update');
        Route::get('/player/{id}', [HomeController::class, 'playerSingle'])->name('player.single');
        Route::get('/shop', [ShopController::class, 'ProductList'])->name('shop.product');
        Route::get('/more/product', [ShopController::class, 'MoreProduct'])->name('product.more');
        Route::get('/product/{id}', [ShopController::class, 'ProductShow'])->name('show.product');
        Route::get('/category/{name}', [ShopController::class, 'CategoryListe'])->name('show.category');
        Route::get('/addToCart/{product}', [CartController::class, 'addToCart'])->name('add.cart');
        Route::get('/cart', [CartController::class, 'ShowCart'])->name('show.cart');
        Route::post('/product/{product}', [CartController::class, 'UpdateCart'])->name('update.cart');
        Route::post('/remove/{product}', [CartController::class, 'RemoveCart'])->name('remove.cart');
        Route::get('/cart/checkout/{amount}', [CartController::class, 'Checkout'])->name('checkout.cart')->middleware('auth');
        Route::post('/cart/charge/', [CartController::class, 'Charge'])->name('charge.cart');
        Route::get('/cart/order', [CartController::class, 'Order'])->name('order')->middleware('auth');


});
        

    /*Route::prefix('setups')->group(function(){

    Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'StudantClassAdd'])->name('student.class.add');
    Route::post('student/class/store', [StudentClassController::class, 'StudantClassStore'])->name('store.student.class');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudantClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'StudantClassUpdate'])->name('update.student.class');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudantClassDelete'])->name('student.class.delete');


    //Années
    Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearController::class, 'YearAdd'])->name('year.add');
    Route::post('student/year/store', [StudentYearController::class, 'YearStore'])->name('store.year');
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'YearEdit'])->name('year.edit');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'YearUpdate'])->name('update.year');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'YearDelete'])->name('year.delete');

    //Groups
    Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
    Route::get('student/group/add', [StudentGroupController::class, 'GroupAdd'])->name('group.add');
    Route::post('student/group/store', [StudentGroupController::class, 'GroupStore'])->name('group.store');
    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'GroupEdit'])->name('group.edit');
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'GroupUpdate'])->name('update.group');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'GroupDelete'])->name('group.delete');

     //Groups
     Route::get('student/shift/view', [StudentShiftController::class, 'ViewSchift'])->name('student.shift.view');
     Route::get('student/shift/add', [StudentShiftController::class, 'ShiftAdd'])->name('shift.add');
     Route::post('student/shift/store', [StudentShiftController::class, 'ShiftStore'])->name('shift.store');
     Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'ShiftEdit'])->name('shift.edit');
     Route::post('student/shift/update/{id}', [StudentShiftController::class, 'ShiftUpdate'])->name('update.shift');
     Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'ShiftDelete'])->name('shift.delete');

});*/





