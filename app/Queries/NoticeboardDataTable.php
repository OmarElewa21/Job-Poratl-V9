<?php

namespace App\Queries;

use App\Models\Noticeboard;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class NoticeboardDataTable
 */
class NoticeboardDataTable
{
    /**
     * @return Noticeboard
     */
    public function get($input = [])
    {
        /** @var Noticeboard $query */
        $query = Noticeboard::query()->select('noticeboards.*');
        $query->when(isset($input['is_active']),
            function (Builder $q) use ($input) {
                $q->where('is_active', '=', $input['is_active']);
            });
        return $query;
    }
}
