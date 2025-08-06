<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold m-4">Edit Post: <strong>{{ $post->title }}</strong></h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($post->imageUrl())
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}'s Image"
                        class="w-full mb-4">
                    @endif



                    <!--IMAGE -->
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                            :value="old('image')" autofocus />

                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>


                    <!--CATEGORY -->
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select id="category_id" name="category_id"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category )
                            <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) ==
                                $category->id) > {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>



                    <!--TITLE -->
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title', $post->title)" autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!--content -->
                    {{-- <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-input-textarea id="content" class="block mt-1 w-full" name="content" 
                             >{{ old('content', $post->content) }}</x-input-textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div> --}}
            <div class="mt-4" x-data="{
        resize() {
            $refs.textarea.style.height = 'auto';
            $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px';
                }
        }">
                <x-input-label for="content" :value="__('Content')" />
                <textarea id="content" name="content"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm resize-none overflow-hidden"
                    x-ref="textarea" @input="resize()" x-init="resize()"
                    rows="5">{{ old('content', $post->content) }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">
                Submit
            </x-primary-button>

            </form>
        </div>


    </div>
    </div>
</x-app-layout>