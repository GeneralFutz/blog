<?php

namespace App\Controllers\Front;

use Varyona\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use ReturnTypeWillChange;

class FeedController extends BaseController
{
    public function index()
    {
        $data = [
            'posts' => model('PostModel')->orderBy('updated_at', 'DESC')->findAll(),
        ];

        return $this->render('posts/feed', $data);
    }

    public function single($slug = false)
    {
        if (!$slug) {
            return "No slug.";
        }
        $data = [
            'post' => model('PostModel')->where('slug', $slug)->first(),
        ];

        return $this->render('posts/single', $data);
    }

    // author, category, tag, date, search
}
