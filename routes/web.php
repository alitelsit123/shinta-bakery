<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/admin', \App\Livewire\Admin\Dashboard::class);
Route::get('/login', \App\Livewire\Login::class);
Route::get('/register', \App\Livewire\Register::class);
Route::get('/', \App\Livewire\Home::class);
Route::get('/product', \App\Livewire\Product::class);
Route::get('/transaction', \App\Livewire\Transaction::class);
Route::get('/outlet', \App\Livewire\Outlet::class);
Route::get('/cart', \App\Livewire\Cart::class);
Route::get('/profile', \App\Livewire\Profile::class);
Route::get('/message', \App\Livewire\Message::class);
Route::get('/user', \App\Livewire\User::class);
Route::get('/checkout', \App\Livewire\Checkout::class);
Route::get('/invoice-detail/{transaction_id}', \App\Livewire\InvoiceDetail::class);
Route::get('/riwayat-pengiriman', \App\Livewire\RiwayatPengiriman::class);
Route::get('/laporan', \App\Livewire\Laporan::class);
Route::get('/export-transactions', function() {
  $startDate = request('start_date');
  $endDate = request('end_date');
  $fileName = 'transactions.csv';
  $transactions = \App\Models\Transaction::with(['user', 'detailProducts.product', 'courier'])->get();

  $headers = array(
      "Content-type"        => "text/csv",
      "Content-Disposition" => "attachment; filename=$fileName",
      "Pragma"              => "no-cache",
      "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
      "Expires"             => "0"
  );

  $columns = array('#ID', 'Nama Pemesan', 'Produk', 'Tanggal', 'Total Pembayaran');

  $callback = function() use($transactions, $columns) {
      $file = fopen('php://output', 'w');
      fputcsv($file, $columns);

      $productsIds = [];
      $totalQuantity = 0;
      $totalTransactions = 0;

      foreach ($transactions as $transaction) {
          $totalTransactions += $transaction->total;
          foreach ($transaction->detailProducts as $detailProduct) {
              if (isset($productsIds[$detailProduct->product_id])) {
                  $productsIds[$detailProduct->product_id] += $detailProduct->quantity;
              } else {
                  $productsIds[$detailProduct->product_id] = $detailProduct->quantity;
              }
              $totalQuantity += $detailProduct->quantity;
          }

          $productNames = $transaction->detailProducts->pluck('product.name')->toArray();
          $productNamesString = implode(", ", $productNames);

          $row = [
              '#'.$transaction->id,
              $transaction->user->name,
              $productNamesString . (count($productNames) > 1 ? " +".(count($productNames) - 1)." Produk" : ""),
              \Carbon\Carbon::parse($transaction->date_order)->format('d, F Y H:i:s'),
              'Rp. '.number_format($transaction->total)
          ];

          fputcsv($file, $row);
      }

      $totalStock = \App\Models\Product::sum('stock');
      $totalItems = $totalQuantity + $totalStock;

      // Write the additional summary info as new rows
      fputcsv($file, []);
      fputcsv($file, ['Total Transaksi', 'Rp. ' . number_format($totalTransactions)]);
      fputcsv($file, ['Total Terjual', number_format($totalQuantity) . ' Item']);
      fputcsv($file, ['Total Stock', number_format($totalItems) . ' Item']);
      fputcsv($file, ['Stock Tersisa', number_format($totalStock) . ' Item']);

      fclose($file);
  };

  return \Illuminate\Support\Facades\Response::stream($callback, 200, $headers);
});


Route::post('/login', [\App\Http\Controllers\AuthController::class,'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class,'register']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class,'logout']);
