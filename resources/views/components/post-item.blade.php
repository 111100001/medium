 <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mb-8">

     <div class="p-5 flex-1">
         <a href="#">
             <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                 {{ $post->title }} </h5>
         </a>
         <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest
             {{ Str::words($post->content, 20) }}
         </div>
         <a href="#">
             <x-primary-button>
             Read more
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 14 10">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M1 5h12m0 0L9 1m4 4L9 9" />
             </svg>
            </x-primary-button>

         </a>
     </div>

     <a href="#" class= "">
         <img class="w-48 h-full rounded-r-lg object-cover max-h-64" src= {{ Storage::url($post->image) }}
             alt="" />
     </a>
 </div>
