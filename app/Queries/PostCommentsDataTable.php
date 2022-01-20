<?php

namespace App\Queries;

use App\Models\Post;
use App\Models\PostComment;

/**
 * Class PostDataTable
 */
class PostCommentsDataTable
{
    /**
     * @return Post
     */
    public function getComments()
    {
        /** @var Post $query */
        $query = PostComment::query()->with('post')->select('post_comments.*')->orderBy('created_at', 'desc');

        return $query;
    }
}
