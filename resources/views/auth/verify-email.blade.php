<x-layout excludeNav="true" excludeFooter="true">
    <div class="h-screen flex justify-center items-center">
        <x-card style="padding: 5rem 0" class="flex flex-col items-center justify-center w-1/2 text-center">
            <h1 class="text-4xl font-bold uppercase">Please verify your email</h1>
            <p class="text-2xl mt-7">You're almost there! We sent an email to</p>
            <h2 class="text-2xl font-bold mt-2">{{auth()->user()->email}}</h2>
            <p class="text-2xl my-10 leading-9 w-4/5">Click on the link in the email to complete your registration. If you don't see it, you may need to <span class="font-bold">check your spam folder</span>.</p>
            <p class="text-2xl">Still can't find the email? No problem.</p>
            <form method="POST" action="/email/verification-notification">
                @csrf
                <div class="mb-6">
                    <button type="submit" class="bg-primary text-white text-xl rounded py-3 px-6 mt-10 hover:bg-font-color-primary dark:hover:bg-font-color-dark dark:hover:text-font-color-primary">
                        Resend Verification Email
                    </button>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>