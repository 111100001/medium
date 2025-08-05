@props(['user' ,'size' => 'w-10 h-10'])

@if ($user->imageUrl())
           <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}'s Profile Image"
               class="{{ $size }} rounded-full object-cover">
@else
           <div class="{{ $size }} rounded-full bg-blue-500 flex items-center justify-center text-white text-2xl font-bold">
               {{ strtoupper(substr($user->name, 0, 1)) }}
           </div>
    
@endif

