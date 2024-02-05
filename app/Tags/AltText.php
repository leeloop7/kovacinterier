<?php

namespace App\Tags;

use Statamic\Tags\Tags;

class AltText extends Tags
{
    /**
     * The {{ alt_text }} tag.
     *
     * @return string|array
     */
    public function index()
    {
        $image = $this->params->get('image');
        return $image->get('alt_'.$this->context->get('site'));
    }
}
