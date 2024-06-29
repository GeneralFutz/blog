<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;

class PostController extends BaseController
{
    protected $helpers = ['form'];

    public function list()
    {
        $model = model('PostModel');

        $data['posts'] = $model->orderBy('updated_at', 'DESC')->findAll();

        return view('admin/posts/list', $data);
    }

    public function create()
    {
        helper('form');

        // Handle a get request.
        // This is the best way since v4.3.0. In previous versions, 
        // you need to use if (strtolower($this->request->getMethod()) !== 'post').
        if (!$this->request->is('post')) {

            return view('admin/posts/create');
        }

        // Checks whether the submitted data passed the validation rules.
        if (!$this->validate([
            'title' => 'required|max_length[255]|min_length[3]',
            'content'  => 'required|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return redirect()->back()->withInput();
        }

        $title = $this->request->getPost('title') ?? '';
        $slug = url_title($title, '-', true);

        $post = [
            'title' => $this->request->getPost('title'),
            'slug'  => $slug,
            'content'  => $this->request->getPost('content')
        ];

        log_message('debug', 'Post data: ' . print_r($post, true));
        $model = model(PostModel::class);
        $model->insert($post);

        // Return to list view with a proper redirect
        return redirect()->to('/admin/posts'); // Use route redirection to avoid refresh issues
    }

    public function uploadImage()
    {
        $image = $this->request->getFile('file'); // 'file' corresponds to the name attribute in the input field

        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Generate a new random name for the image to prevent name conflicts
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'media', $newName);

            // Return JSON that includes the location of the uploaded image, which TinyMCE needs
            return $this->response->setJSON([
                'location' => base_url('media/' . $newName)
            ]);
        }

        return $this->response->setJSON(['error' => 'The uploaded file is not valid.']);
    }

    public function edit($id)
    {
        helper('form');
        $model = model(PostModel::class);
        $post = $model->find($id);

        if (!$post) {
            return redirect()->to('/admin/posts'); // redirect if post not found
        }

        return view('admin/posts/create', ['post' => $post]); // reusing the create view for edit
    }

    public function update($id)
    {
        helper('form');

        if (!$this->request->is('post')) {
            return redirect()->to("/admin/posts/edit/$id");
        }

        if (!$this->validate([
            'title' => 'required|max_length[255]|min_length[3]',
            'content' => 'required|min_length[10]',
        ])) {
            return redirect()->back()->withInput();
        }

        $title = $this->request->getPost('title') ?? '';
        $slug = url_title($title, '-', true);

        $updatedPost = [
            'title' => $title,
            'slug'  => $slug,
            'content' => $this->request->getPost('content'),
        ];

        $model = model(PostModel::class);
        $model->update($id, $updatedPost);

        return redirect()->to('/admin/posts'); // redirect back to the posts list
    }
}
