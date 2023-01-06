<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    /**
     * @var array<string, array<string>>
     * */
    protected $safeParams = [];

    /**
     * @var array<string, string>
     * */
    protected $columnMap = [];

    /**
     * @var array<string, string>
     * */
    protected $operatorMap = [];

    /**
     * Return a array for filter
     *
     * @return array<int, array<int, string>>
     */

    public function transform(Request $request): array
    {
        $eloQuery = [];

        foreach ($this->safeParams as $parms => $operators) {
            $query = ($request->query($parms));

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parms] ?? $parms;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
