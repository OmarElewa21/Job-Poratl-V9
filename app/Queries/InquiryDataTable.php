<?php

namespace App\Queries;

use App\Models\Inquiry;

/**
 * Class InquiryDataTable
 */
class InquiryDataTable
{
    /**
     * @return Inquiry
     */
    public function get()
    {
        /** @var Inquiry $query */
        return Inquiry::query()->select('inquiries.*');
    }
}
