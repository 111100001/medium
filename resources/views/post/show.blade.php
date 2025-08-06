<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-5xl font-bold mb-4">{{ $post->title }} </h1>
                {{-- ARTICLE METADATA --}}
                <div class="flex gap-4 mb-4 items-center border-t border-b mt-6 pt-4 pb-4">

                    {{-- USER PROFILE SECTION --}}

                    <x-follow-container :user="$post->user" class="flex items-center gap-2">
                        <x-user-avatar :user="$post->user" />
                        <a href="{{ route('public.profile.show', $post->user) }}"
                            class="hover:underline ml-2 text-gray-700">{{ $post->user->name }}</a>
                        &middot;

                        @auth
                        @if ( auth()->user()->id !== $post->user->id)


                        <button @click="follow()" class="" x-text="following ? 'Unfollow' : 'Follow'"
                            :class="following ? 'text-red-600' : 'text-emerald-600'"></button>


                        @endif
                        @endauth

                        <span class="text-gray-500 ml-2 ">
                            @if ($post->created_at->diffInDays() < 1) {{$post->created_at->diffForHumans() }} @else
                                {{$post->created_at->format('M d, Y')}} @endif </span>
                                <span class="text-2xl text-gray-500 self-start -mt-0.5">.</span>
                                <div class=" flex gap-2 text-gray-500 "> {{ $post->readtime() }} </div>
                    </x-follow-container>



                    <x-clap-button :post="$post" />

                    {{-- ACTIONS SECTION --}}
                    @if (auth()->check() && auth()->user()->id === $post->user->id)
                    {{-- <div class="border-b pb-4 gap-4 flex items-center">
                        <x-primary-button>Edit Post</x-primary-button>
                        <x-danger-button>Delete Post</x-danger-button>
                    </div> --}}

                    <div class="flex justify-end">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 active:bg-gray-100 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150">
                                    Actions
                                </button>
                            </x-slot>
                            

                            <x-slot name="content">
                                <x-dropdown-link :href="route('post.edit', $post->slug)">
                                    Edit Post
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('post.destroy', $post) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-dropdown-link :href="route('post.destroy', $post)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Delete Post
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    @endif

                </div>


                {{-- CONTENT SECTION --}}
                <div class="mt-6">
                    <img src="{{ $post->imageUrl('large') }}" alt="{{ $post->title }}" class="w-full">

                    <div class="mt-4">{{ $post->content }}</div>

                </div>

                
                <div class=" flex gap-4 mt-3 p-3 border-t border-b ">
                    <x-clap-button  :post="$post" />
                    <span class=" px-4 py-2 bg-gray-200 rounded-xl ">{{ $post->category->name }}</span>
                </div>

                





            </div>
        </div>
    </div>

</x-app-layout>