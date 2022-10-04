<div class="grid-holder">
    <div class="grid">
        @foreach ($images as $image)
            <div class="grid-item {{ $image->height > $image->width ? 'vertical' : 'horizontal' }}"
                style="--img-width:{{ 301 }}; --img-height:{{ 201 }};">
                <img src="{{ sprintf('https://ik.imagekit.io/strakez/%s?ik-sdk-version=javascript-1.4.3&updatedAt=%s', $image->filePath, $image->updatedAt) }}&tr=w-300"
                    alt="img" />
            </div>
        @endforeach
    </div>
</div>
