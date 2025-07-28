<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
             <h1 class="text-5xl font-bold mb-4">{{ $post->title }} </h1>
             <div class="flex gap-4 mb-6  items-center">
                 <div class="flex items-center">
                     <img src="{{ Storage::url($post->user->profile_image) }}" alt="{{ $post->user->name }}" class="w-10 h-10 rounded-full object-cover">
                     <span class="ml-2 text-gray-700">{{ $post->user->name }}</span>
                 </div>
                 <span class="text-gray-500 ">{{ $post->created_at->diffForHumans() }}</span>

             </div>
            </div>
        </div>
    </div>
</x-app-layout>