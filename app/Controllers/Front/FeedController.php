<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use ReturnTypeWillChange;

class FeedController extends BaseController
{
    public function index()
    {
        $data = [
            'posts' => model('PostModel')->orderBy('updated_at', 'DESC')->findAll(),
        ];

        return view('front/posts/feed', $data);
    }

    public function single($slug = false)
    {
        if (!$slug) {
            return "No slug.";
        }
        $data = [
            'post' => model('PostModel')->where('slug', $slug)->first(),
        ];

        return view('front/posts/single', $data);
    }

    // author, category, tag, date, search
}
