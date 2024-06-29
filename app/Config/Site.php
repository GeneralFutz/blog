<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Site extends BaseConfig
{
    /**
     * Whether our front page is a static page or displays the main post feed.
     */
    public bool $homePageIsFeed = false;

    /** 
     * How many posts appear on the front page 
     */
    public int $postsPerPage = 10;
}
