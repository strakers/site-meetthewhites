<div class="grid-holder">
    <div class="grid start">
        @foreach ($images as $image)
            @if ($image->fileType === 'image')
                <div class="grid-item image {{ $image->height > $image->width ? 'vertical' : 'horizontal' }}"
                    data-name="{{ $image->name }}"
                    style="--img-width:{{ 301 }}; --img-height:{{ (301 * $image->height) / $image->width }};">
                    <img src="{{ sprintf('%s?ik-sdk-version=javascript-1.4.3&updatedAt=%s', $image->url, $image->updatedAt) }}&tr=w-300"
                        alt="{{ $image->name }}" data-image="{{ $image->url }}" />
                </div>
            @else
                <div class="grid-item vertical video" data-name="{{ $image->name }}"
                    style="--img-width:{{ 301 }}; --img-height:{{ 535 }};">
                    <a href="{{ $image->url }}" class="media-swap">
                        <img src="{{ sprintf('%s?ik-sdk-version=javascript-1.4.3&updatedAt=%s', $image->thumb ?? $image->url . '/ik-thumbnail.jpg', $image->updatedAt) }}&tr=w-300"
                            alt="{{ $image->name }}" />
                    </a>
                    <iframe src="{{ asset('images/gray.png') }}"
                        data-src="{{ $image->url . ($image->type === 'file' ? '?' : '&') . 'autoplay=true' }}"
                        width="301" height="535" frameborder="0" allow="autoplay; fullscreen" frameborder="0"
                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            @endif
        @endforeach
    </div>
</div>
