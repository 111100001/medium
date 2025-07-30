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
                    <div class="w-[320px] border-l px-8">
                        <x-user-avatar :user="$user" size="'w-32 h-32'" />
                        <h3 class=" pt-3  text-gray-700">{{ $user->name }}</h3>
                        <p class="text-gray-500">26k followers</p>
                        <p class="text-gray-500">
                            {{ $user->bio ?? 'No bio available.' }}
                        </p>

                        <div class="mt-4">
                            <button class="bg-emerald-600 text-white px-4 py-2 rounded-full">Follow</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>