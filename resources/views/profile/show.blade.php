<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="flex">
                    <div class="flex-1">
                        <h1 class="text-5xl font-bold">{{ $user->name }}</h1>

                        <div class="mt-8 pr-8 border-t-2 pt-5 text-gray-600">
                            @forelse ($posts as $p)
                            <x-post-item :post="$p" />
                            @empty
                            <div>

                                <p class="text-center text-gray-400 py-16"> No posts found. </p>

                            </div>
                            @endforelse
                        </div>


                    </div>
                    <x-follow-container :user="$user">
                        <x-user-avatar :user="$user" :size="'w-32 h-32'" />
                        <h3 class=" pt-3  text-gray-700">{{ $user->name }}</h3>
                        <p class="text-gray-500"><span x-text="followersCount"></span> followers</p>
                        <p class="text-gray-500">
                            {{ $user->bio ?? 'No bio available.' }}
                        </p>
                        @auth
                        @if (auth()->user()->id !== $user->id)

                        <div class="mt-4">
                            <button @click="follow()" class=" text-white px-4 py-2 rounded-full"
                                x-text="following ? 'Unfollow' : 'Follow'"
                                :class="following ? 'bg-red-600' : 'bg-emerald-600'"></button>
                        </div>

                        @endif
                        @endauth
                    </x-follow-container>

                </div>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>