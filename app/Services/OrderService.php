<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Jobs\SendSmsJob;
use App\Repository\OrderRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderService
{

    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getOrdersWithFilter(array $data): LengthAwarePaginator
    {
        try {
            return $this->orderRepository->getOrdersWithFilter(data: $data);

        } catch (Exception $exception) {
            $adminEmail = config('setting.alerts.filter_exception.email');
            $adminMobile = config('setting.alerts.filter_exception.sms_number');

            dispatch(new SendEmailJob($adminEmail, 'Filter Exception', $exception->getMessage()));
            dispatch(new SendSmsJob($adminMobile, 'Filter Exception has been occurred'));

            // throw new Exception('Server error');
            // instead of abort helper, Exception can be thrown
            // or any custom Exception, made in order to be used as Response
            abort(500, 'Server error');
        }

    }
}
