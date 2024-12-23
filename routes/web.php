<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', function () {
   return view('main');
});



// Home page route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Contact route
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm']);


// Authentication Routes (Login & Register)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Protect dashboard routes with 'auth' middleware
Route::middleware('auth')->group(function () {
    // This is the general dashboard route, visible for both admin and normal users
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Admin product routes
    Route::resource('products', AdminProductController::class);

    // Admin category routes
    Route::resource('categories', AdminCategoryController::class);

    
});


// Admin Order Routes
Route::prefix('admin/orders')->name('admin.orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index'); // View all orders
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');


});
Route::prefix('admin/categories')->name('admin.categories.')->group(function () {
    Route::get('/', [AdminCategoryController::class, 'index'])->name('index');       // List all categories
    Route::get('/create', [AdminCategoryController::class, 'create'])->name('create'); // Show form to create a category
    Route::post('/', [AdminCategoryController::class, 'store'])->name('store');      // Store a new category
    Route::get('/{category}', [AdminCategoryController::class, 'show'])->name('show'); // View a single category
    Route::get('/{category}/edit', [AdminCategoryController::class, 'edit'])->name('edit'); // Edit a category
    Route::put('/{category}', [AdminCategoryController::class, 'update'])->name('update'); // Update a category
    Route::delete('/{category}', [AdminCategoryController::class, 'destroy'])->name('destroy'); // Delete a category
});

// Admin Routes for Products
Route::prefix('admin/products')->name('admin.products.')->group(function () {
    Route::get('/', [AdminProductController::class, 'index'])->name('index');       // List all products
    Route::get('/create', [AdminProductController::class, 'create'])->name('create'); // Show form to create a product
    Route::post('/', [AdminProductController::class, 'store'])->name('store');      // Store a new product
    Route::get('/{product}', [AdminProductController::class, 'show'])->name('show'); // View a single product
    Route::get('/{product}/edit', [AdminProductController::class, 'edit'])->name('edit'); // Edit a product
    Route::put('/{product}', [AdminProductController::class, 'update'])->name('update'); // Update a product
    Route::delete('/{product}', [AdminProductController::class, 'destroy'])->name('destroy'); // Delete a product
});
// Product Routes for all users
Route::get('products', [ProductController::class, 'index'])->name('products');
// Route for displaying products by category
Route::get('products/category/{categoryName}', [ProductController::class, 'category'])->name('products.category');

Route::get('products/{id}', [ProductController::class, 'show'])->name('product-detail');
Route::get('products/search', [ProductController::class, 'search'])->name('products.search');

// Cart Routes
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Show the checkout form
Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout');

// Submit the order
Route::post('/checkout', [CheckoutController::class, 'submitOrder'])->name('checkout.submit');

// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
