<?php

namespace App\Http\Filters;


use Illuminate\Database\Query\Builder;

class CommentFilter extends AbstractFilter
{
    public const COMPANY_ID = 'company_id';

    protected function getCallbacks(): array
    {
        return [
            self::COMPANY_ID =>[$this, 'companyId']
        ];
    }

    public function companyId(Builder$builder, $value) {
        $builder->where('company_id', $value);
    }
}
