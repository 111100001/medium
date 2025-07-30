@props(['user' ,'size' => 'w-10 h-10'])

<img src="{{ Storage::url($user->profile_image) }}" alt="{{ $user->name }}"
    class="{{ $size }} rounded-full object-cover border">

