<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 justify-center">
    @auth
    <li class="me-2">
        <a href="/?following=true"
            class="{{ request()->get('following') === 'true' ? 'inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active' : 'inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
            Following
        </a>
    </li>
    @endauth
    
    <!-- All Posts Tab -->
    <li class="me-2">
        <a href="{{ route('dashboard') }}"
            class="{{ Route::currentRouteNamed('dashboard') && !request()->get('following') ? 'inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active' : 'inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
            All Posts
        </a>
    </li>

    @forelse ($categories as $category)
    <li class="me-2">
        <a href="{{ route('post.byCategory', $category) }}"
            class="{{ Route::currentRouteNamed('post.byCategory') && request()->route('category')->id == $category->id ? 'inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active' : 'inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white'}}">
            {{ $category->name }}
        </a>
    </li>
    @empty
    {{ $slot }}
    @endforelse
</ul>