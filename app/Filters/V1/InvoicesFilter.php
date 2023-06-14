<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter{

    protected $safePrams = [
        'customer_id' => ['eq'],
        'amount' => ['eq','gt','lt','lte','gte'],
        'status' => ['eq','ne'],
        'billedDate' => ['eq','gt','lt','lte','gte'],
        'paidDate' => ['eq','gt','lt','lte','gte'],

    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date',
    ];

    protected $opertaorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];


}
