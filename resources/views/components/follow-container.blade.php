@props([
    'user'
])
<div {{ $attributes }} x-data="
{
    following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
    followersCount: {{ $user->followers->count() }},
    follow() {
        this.following = !this.following;
        axios.post('/follow/{{ $user->id }}').then(res => {
            this.followersCount = res.data.followersCount;
            console.log(res.data);
        }).catch(err => {
            console.error(err);
            this.following = !this.following; // Revert the change on error
        });

    }


}
    " class="w-[320px] border-l px-8">
    {{ $slot }}
</div>