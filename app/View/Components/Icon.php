<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Inline Component for Icons
 */
class Icon extends Component
{   

    public $icon;
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->icon = $this->composeSvgIcon($this->name = $name);
    }

    private function composeSvgIcon($path) {
        $rootPath = "assets/media/icons/duotune/"; 

        $full_path = $rootPath . $path;

        if ( !file_exists($full_path) ) {
            return "<!--SVG file not found: $path-->\n";
        }

        return file_get_contents($full_path);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
{
        return <<<'blade'
            <!--begin::Svg Icon | path: {{ $name }}-->
            <span class="svg-icon {{ $attributes->get('class')}}">
                {!! $icon !!}
            </span>
            <!--end::Svg Icon-->
        blade;
    }
}
