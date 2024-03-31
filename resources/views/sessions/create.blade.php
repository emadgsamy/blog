<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-grey-300 border border-grey-400 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log in!</h1>
            <form method="POST" action="/login" class="mt-10">
                @csrf
                <x-form.input name="email" type="email" autocomplete="usernaem"/>
                <x-form.input name="password" type="password" autocomplete="new-password"/>
                
                <x-form.button name="login"/>
            </form>
        </main>
    </section>
</x-layout>