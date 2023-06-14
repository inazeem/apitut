<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    protected $safePrams = [];

    protected $columnMap = [];

    protected $opertaorMap = [];

    public function transform(Request $request){

        $eloQuery = [];
        foreach ($this->safePrams as $parm => $operators){
            $query = $request->query($parm);
            if(!isset($query)){
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm ;
            foreach ($operators as $operator) {

                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->opertaorMap[$operator],$query[$operator]];
                }

            }
        }

        return $eloQuery;
    }
}
