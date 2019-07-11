<?php

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

use App\Featured;
use App\SubCategory;

Route::get('/', 'FrontendController@index');

Route::get('/category-page/{id}', 'FrontendController@category_page');

Route::get('/featured-details/{id}', 'FrontendController@featured_page');

Route::get('/new/product/details/{id}', 'FrontendController@details_product');
Route::post('/new/customer/product/order', 'FrontendController@admin_product');


Route::post('/contact/info', 'FrontendController@contact_info');

Route::get('/customer/info', 'FrontendController@customer_info');

Route::post('/customer/dashboard', 'FrontendController@customer_reg');

Route::get('/customer/dashboard', 'FrontendController@customer_dashboard');

Route::post('/customer/login', 'FrontendController@customer_login');

Route::get('/customer/logout', 'FrontendController@customer_logout');

Route::post('/save/customer/product', 'FrontendController@customer_product');

Route::get('/delete/product/{id}', 'FrontendController@delete_product');

Route::get('/edit/product/{id}', 'FrontendController@customer_product_edit');

Route::post('/update/customer', 'FrontendController@customer_product_update');

Route::get('/more/product', 'FrontendController@more_product');

Route::get('/customer/product/details/{id}', 'FrontendController@customer_product_details');
Route::post('/customer/product/order', 'FrontendController@customer_statement');
Route::post('/customer/product/order', 'FrontendController@order_statement');

Route::get('/sale/statement', 'FrontendController@sale_statement');
Route::get('/sale/withdrawal/{id}', 'FrontendController@saleWithdrawal');
Route::post('/case/out', 'FrontendController@cash_out');

Route::get('/more/featured', 'FrontendController@more_featured');
Route::post('/featured/product/order', 'FrontendController@order_featured');


Route::get('/search',  'FrontendController@search')->name('search');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/delete/info/{id}', 'HomeController@contact_delete');

Route::get('/add/category', 'CategoryController@index');
Route::get('/get/category/data', 'CategoryController@category_data');
Route::post('/save-category', 'CategoryController@add_category');
Route::get('/published/category/data/{id}', 'CategoryController@published_category');
Route::get('/unpublished/category/data/{id}', 'CategoryController@unpublished_category');
Route::get('/edit/category/data/{id}', 'CategoryController@edit_category');
Route::post('/update-category', 'CategoryController@update_category');
Route::get('/delete/category/data/{id}', 'CategoryController@delete_category');


Route::get('/add/sub/category', 'CategoryController@sub_category');
Route::get('/create/sub/category', 'CategoryController@create_sub_category');
Route::post('/save/subcategory', 'CategoryController@save_sub_category');
Route::get('/active/category/{id}', 'CategoryController@active_sub_category');
Route::get('/pending/category/{id}', 'CategoryController@pending_sub_category');
Route::get('/edit/category/{id}', 'CategoryController@edit_sub_category');
Route::post('/update/subcategory', 'CategoryController@update_sub_category');
Route::get('/delete/category/{id}', 'CategoryController@delete_sub_category');





Route::get('/add/product', 'ProductController@index_product');
Route::get('/create/product', 'ProductController@create_product');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/active-product/{id}', 'ProductController@active_product');
Route::get('/pending-product/{id}', 'ProductController@pending_product');
Route::get('/edit-product/{id}', 'ProductController@edit_product');
Route::post('/update-product', 'ProductController@update_product');
Route::get('/delete-product/{id}', 'ProductController@delete_product');



Route::get('/customer/product', 'ProductController@customer_product');
Route::get('/customer/product/approved/{id}', 'ProductController@customer_product_approved');
Route::get('/customer/product/pending/{id}', 'ProductController@customer_product_pending');
Route::get('/customer/product/edit/{id}', 'ProductController@customer_product_edit');
Route::post('/update/customer/product', 'ProductController@customer_product_update');

Route::get('/customer/sale/statement', 'ProductController@customer_sale_statement');
Route::get('/statement/delete/{id}', 'ProductController@statement_delete');


Route::get('/admin/product', 'ProductController@admin_product');

Route::post('/search', 'ProductController@product_search')->name('search');



Route::get('/add/logo', 'LogoController@index');
Route::get('/create/logo', 'LogoController@create');
Route::post('/save-logo', 'LogoController@save_logo');
Route::get('/active/logo/{id}', 'LogoController@active_logo');
Route::get('/pending/logo/{id}', 'LogoController@pending_logo');
Route::get('/edit/logo/{id}', 'LogoController@edit_logo');
Route::post('/update-logo', 'LogoController@update_logo');
Route::get('/delete/logo/{id}', 'LogoController@delete_logo');



Route::get('/add/slider', 'SliderController@index');
Route::get('/create/slider', 'SliderController@create');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/active-slider/{id}', 'SliderController@active_slider');
Route::get('/pending-slider/{id}', 'SliderController@pending_slider');
Route::get('/edit-slider/{id}', 'SliderController@edit_slider');
Route::post('/update-slider', 'SliderController@update_slider');
Route::get('/delete-slider/{id}', 'SliderController@delete_slider');



Route::get('/add/features', 'FeaturedController@show_featured');
Route::get('/create/featured', 'FeaturedController@create_featured');
Route::post('/save-featured', 'FeaturedController@save_featured');
Route::get('/active/featured/{id}', 'FeaturedController@active_featured');
Route::get('/pending/featured/{id}', 'FeaturedController@pending_featured');
Route::get('/edit/featured/{id}', 'FeaturedController@edit_featured');
Route::post('/update-featured', 'FeaturedController@update_featured');


Route::post('/customer/confirm/order', 'FeaturedController@customer_order');
Route::get('/featured/product', 'FeaturedController@featured_order');




Route::get('/add/work', 'WorkController@index');
Route::get('/create/work', 'WorkController@create');
Route::post('/save/work/product', 'WorkController@save_product');
Route::get('/active-work/{id}', 'WorkController@active_work');
Route::get('/pending-work/{id}', 'WorkController@pending_work');
Route::get('/edit-work/{id}', 'WorkController@edit_work');
Route::post('/update-work', 'WorkController@update_work');
Route::get('/delete-work/{id}', 'WorkController@delete_work');


Route::get('/add/client', 'ClientsController@index');
Route::get('/create/client', 'ClientsController@create');
Route::post('/save/client/product', 'ClientsController@save_client');
Route::get('/active-client/{id}', 'ClientsController@active_client');
Route::get('/pending-client/{id}', 'ClientsController@pending_client');
Route::get('/edit-client/{id}', 'ClientsController@edit_client');
Route::post('/update-client', 'ClientsController@update_client');
Route::get('/delete-client/{id}', 'ClientsController@delete_client');


Route::get('/add/footer', 'FooterController@index');
Route::get('/create/footer', 'FooterController@create');
Route::post('/save/footer', 'FooterController@save_footer');
Route::get('/active-footer/{id}', 'FooterController@active_footer');
Route::get('/pending-footer/{id}', 'FooterController@pending_footer');
Route::get('/edit-footer/{id}', 'FooterController@edit_footer');
Route::post('/update-footer', 'FooterController@update_footer');
Route::get('/delete-footer/{id}', 'FooterController@delete_footer');


Route::get('/customer/order/list', 'CustomerOrderController@customer_order_request');
Route::get('/delivered/pending/{id}', 'CustomerOrderController@customer_order_pending');
Route::get('/delivered/confirm/{id}', 'CustomerOrderController@customer_order_cofirm');
Route::get('/delivered/delete/{id}', 'CustomerOrderController@customer_order_delete');

// Dynamic Page

Route::get('/dynamic/page', 'DynamicController@dynamic_page');
Route::post('/save/page', 'DynamicController@save_page');
Route::get('/edit/page/{id}', 'DynamicController@edit_page');
Route::post('/update/page', 'DynamicController@update_page');
Route::get('/delete/page/{id}', 'DynamicController@delete_page');
Route::get('/support', 'DynamicController@support_page');
Route::post('/save/support', 'DynamicController@support_save');
Route::get('/edit/support/{id}', 'DynamicController@support_edit');
Route::post('/update/support', 'DynamicController@support_update');
Route::get('/delete/support/{id}', 'DynamicController@support_delete');


//API Route

Route::get('/sub-category/{id}', function ($id){
    return json_encode(App\SubCategory::where('main_category_id', $id)->get());

});

Route::get('/customer-category/{id}', function ($id){
    return json_encode(App\SubCategory::where('main_category_id', $id)->get());

});

Route::get('/featured-category/{id}', function ($id){
    $app = App\SubCategory::where('main_category_id', $id)->get();
    return response()->json($app);

});