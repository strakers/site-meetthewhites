<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Storage;
use ErrorException;

class ImageKit extends Component
{
    public $images = [];
    public $json = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($src)
    {
        if(preg_match("/[^a-zA-Z0-9\.\-_]+/", $src))
            throw new ErrorException('Invalid file name');

        $json = Storage::disk('imagekit')->get($src);
        $json = trim($json);

        if(! $json)
            throw new ErrorException('JSON file is empty');

        $this->json = $json;
        $data = json_decode($json);
        if(! $data)
            throw new ErrorException('Invalid JSON found in file');

        if(! isset($data->result) || ! is_array($data->result))
            throw new ErrorException('JSON file is missing valid result');

        $this->images = $data->result;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.image-kit');
    }
}
