<?php

namespace App\Queries;

use App\Models\Job;
use Carbon\Carbon;

class JobExpiredDataTable
{
    /**
     * @return Job
     */
    public function getJobs()
    {
        $query = Job::select('jobs.*')->where('job_expiry_date','<',Carbon::now());

        return $query;
    }
}
