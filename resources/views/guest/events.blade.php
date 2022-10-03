@extends('layouts.main')

@php
$images = json_decode('@yield('imagedata', '{"results":[]}')');
@endphp

@section('content')
    <div class="bordered-wrapper first event">
        <div class="container short banner" data-pos="46% 50%">
            <div class="content title">
                @yield('page-title')
                <div class="sub-title">@yield('sub-title')</div>
            </div>
        </div>
    </div>

    <div class="grid-holder">
        <div class="grid">
            @php(dd($images))

            {{-- @foreach ($images->result as $image)
                <div class="grid-item {{ $image->height > $image->width ? 'vertical' : 'horizontal' }}"
                    style="--img-width:{{ 301 }}; --img-height:{{ 201 }};">
                    <img src="{{ sprintf('https://ik.imagekit.io/strakez/%s?ik-sdk-version=javascript-1.4.3&updatedAt=%s', $image->filePath, $image->updatedAt) }}&tr=w-300"
                        alt="img" />
                </div>
            @endforeach --}}
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
        ((delay) => {
            const grid = document.querySelector('.grid');
            const msnry = new Masonry(grid, {
                'item-selector': 'grid-item',
                'gutter': 2,
                fitWidth: true,
            });

            setTimeout(() => msnry.layout(), delay);
        })(3000);
    </script>
@endsection


@section('styles')
    <style type="text/css">
        .bordered-wrapper.event {
            border: 0 none;
        }

        .short.banner {
            width: 100%;
            height: 300px;
            position: relative;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            padding: 0;
            content: attr(data-image);
            background-color: #222;
        }

        .short.banner .title {
            transform: translateY(-20%);
        }

        .short.banner .sub-title {
            margin-top: 2em;
            font-size: 12%;
        }

        .grid-holder {
            display: flex;
            align-content: center;
            justify-content: center;
            width: 100%;
            margin: 1em 0;
        }

        .grid {
            width: 100%;
        }

        .grid-item {
            width: 20%;
        }

        .grid-item {
            margin-bottom: 2px;
            min-width: calc(var(--img-width, 300) * 1px);
            min-height: calc(var(--img-height, 200) * 1px);
        }

        .grid-item img {
            width: 100%;
        }
    </style>
@endsection
