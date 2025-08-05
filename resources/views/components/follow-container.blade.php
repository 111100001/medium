@props([
    'user'
])
<div {{ $attributes }} x-data="
{
    following: {{ auth()->check() && $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
    followersCount: {{ $user->followers->count() }},
    follow() {
        @auth
            this.following = !this.following;
            axios.post('/follow/{{ $user->id }}').then(res => {
                this.followersCount = res.data.followersCount;
                console.log(res.data);
            }).catch(err => {
                console.error(err);
                this.following = !this.following; // Revert the change on error
            });
        @else
            // Redirect to login or show login modal
            window.location.href = '{{ route('login') }}';
        @endauth
    }
}
    " class="w-[320px] border-l px-8">
    {{ $slot }}
</div>