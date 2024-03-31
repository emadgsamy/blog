@auth
<x-panel>
    <form method="POST" action="/posts/{{ $post->slug }}/comment">
        @csrf

        <header class="flex items-center">
            <img src="http://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" height="40"
                width="40" class="rounded-full">
            <h2 class="ml-4">Want to participate?</h2>
        </header>

        <x-form.field>
            <textarea name="body" rows="5" class="w-full text-sm focus:outline-none focus:ring"
                placeholder="Quick, think of something to say!" required></textarea>
            <x-form.error name="body"/>
        </x-form.field>

        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-form.button name="Post"/>
        </div>
    </form>
</x-panel>
@else
<h1>You can <a href="/login" class="hover:underline">Login</a> or <a href="/register" class="hover:underline">Register</a> to leave a comment!</h1>
@endauth