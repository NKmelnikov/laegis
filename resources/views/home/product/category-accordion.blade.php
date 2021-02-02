<aside class="navigation-container">
    <div class="category-title">
	    {{ __('product.index.categories') }}
    </div>
    <div id="accordion">
        @foreach($categories as $category)
            <div class="card">
                <div class="card__header {{ $category['slug'] }}" id="{{ 'heading'. $category['slug'] }}">
                    <a href="{{ sprintf('/%s/products/%s', app()->getLocale(), $category['slug'] ) }}">
                        <button class="btn btn-link" data-toggle="collapse" data-target="{{ '#'. $category['slug'] }}" aria-expanded="false" aria-controls="{{ $category['slug'] }}">
                            <span class="text">{{ $category['name'] }}</span>
                        </button>
                    </a>
                </div>
                <div id="{{ $category['slug'] }}" class="collapse" aria-labelledby="{{ $category['slug'] }}" data-parent="#accordion">

                    @foreach($category['subcategories'] as $subcategory)
                        <div class="card__body">
                            <a class="{{$subcategory['slug']}}" href="{{ sprintf('/%s/products/%s/%s', app()->getLocale(), $category['slug'], $subcategory['slug'] ) }}">{{ $subcategory['name'] }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</aside>
