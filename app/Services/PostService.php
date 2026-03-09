<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService extends BaseService {
    public function __construct(PostRepository $repository) {
        parent::__construct($repository);
    }
}
