<?php

namespace AvoRed\Framework\Database\Contracts;

use AvoRed\Framework\Database\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderModelInterface extends BaseInterface
{
    /**
     * Find Orders of a given user Id.
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection $userOrders
     */
    public function findByUserId(int $id) : Collection;

    /**
     * Get current month total orders
     * @return int $totalOrders
     */
    public function getCurrentMonthTotalOrder() : int;

    /**
     * Get current month total revenue
     * @return int $totalOrders
     */
    public function getCurrentMonthTotalRevenue() : float;
}
