<?php 
 
namespace App\Filters\V1;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter {
    protected $safeParms = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'paidDate' => ['eq', 'lt', 'gt', 'lte', 'gte']
    ];

    protected $columnMap = [
        'customerId' => 'customerI_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];

    // public function transform (Request $request){
    //     $eloQuery = [];
    //     foreach ($this->safeParms as $parm => $operators) {
    //         $query = $request->query($parm);

    //         if (!isset($query)) {
    //             # code...
    //             continue;
    //         }
    //         $column = $this->columnMap[$parm] ?? $parm;

    //         foreach($operators as $operator) {
    //             if (isset($query[$operator])) {
    //                 # code...
    //                 $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
    //             }
    //         }

    //     }

    //     return $eloQuery;
    // }

}