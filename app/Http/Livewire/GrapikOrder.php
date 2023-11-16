<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GrapikOrder extends Component
{

    public $orderData;
    public $totalOrderDate;
    public $bulan;

    public function mount()
    {
        $currentYear = Carbon::now()->year;
        $orders = Order::whereYear('order_date', $currentYear)
            ->groupBy(DB::raw('MONTH(order_date)'))
            ->selectRaw('MONTH(order_date) AS month, COUNT(*) AS order_count')
            ->pluck('order_count', 'month')
            ->toArray();

        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $data['labels'][] = date("F", mktime(0, 0, 0, $i, 1));
            $data['data'][] = $orders[$i] ?? 0;
        }

        $this->orderData = json_encode($data);
        $this->totalOrderDate = Order::count();
        // dd($this->orderData);
    }

    public function render()
{
    $orders = Order::orderBy('order_id', 'desc')
    ->limit(5)
    ->get();

    $users = [];
    foreach ($orders as $order) {
        $user = User::find($order->user_id);
        if ($user) {
            $totalOrders = Order::where('user_id', $order->user_id)->count();
            $totalPrice = Order::where('user_id', $order->user_id)->sum('total_price');

            $users[] = (object) [
                'order_id' => $order->order_id,
                'nama_pelanggan' => $user->name,
                'total_price' => $order->total_price,
                'jumlah_pesanan' => $totalOrders,
                'jumlah_total' => $totalPrice,
            ];
        }
    }

    return view('livewire.grapik-order', compact('users'));
}

}
