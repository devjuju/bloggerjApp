<?php

namespace App\Controllers;

class PostsController
{
    public function blog(): void
    {
        require('../templates/frontend/blog/index.php');
    }
}
