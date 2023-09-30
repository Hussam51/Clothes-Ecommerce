<?php

namespace App\View\Components;

use App\Repositories\CartInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartMenu extends Component
{
    public $items;
    public $total;
    /**
     * Create a new component instance.
     */
    public function __construct(CartInterface $item)
    {
        $this->items=$item->get();
        $this->total=$item->total();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-menu');
    }
}
