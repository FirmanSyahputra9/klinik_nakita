<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
    <div
        class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <div
            class="bg-muted relative hidden h-full flex-col p-10 text-white  lg:flex dark:border-e dark:border-neutral-800">
            <div class="absolute inset-0 bg-neutral-900"></div>
            <a href="{{ route('home') }}" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
                <span class="flex h-10 w-10 items-center justify-center rounded-md">
                    <x-app-logo-icon class="me-2 h-7 fill-current text-white" />
                </span>
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="absolute inset-0 z-0 text-blue-500 dark:text-blue-300">
                <svg class="w-full h-full object-cover" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="grad" x1="0" x2="1">
                            <stop offset="0%" stop-color="currentColor" stop-opacity="0.7" />
                            <stop offset="100%" stop-color="currentColor" stop-opacity="0.3" />
                        </linearGradient>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grad)" />
                </svg>
            </div>



            @php
                [$message, $author] = str(\App\Support\Inspiring::quotes()->random())->explode('-');
            @endphp

            <div class="relative z-20 mt-auto">
                <blockquote class="space-y-2">
                    <flux:heading size="lg" class="text-white" id="quote-message">
                    </flux:heading>
                    <footer class="text-white">
                        <flux:heading class="text-white" id="quote-author">
                        </flux:heading>
                    </footer>
                </blockquote>
            </div>
        </div>
        <div class="w-full lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden"
                    wire:navigate>
                    <span class="flex h-9 w-9 items-center justify-center rounded-md">
                        <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                    </span>

                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                {{ $slot }}
            </div>
        </div>
    </div>
    @fluxScripts

    <script>
        const quotes = [
            @foreach (\App\Support\Inspiring::quotes() as $quote)
                @php [$message, $author] = str($quote)->explode('-'); @endphp {
                    message: "{{ trim($message) }}",
                    author: "{{ trim($author) }}"
                },
            @endforeach
        ];

        const messageElement = document.getElementById('quote-message');
        const authorElement = document.getElementById('quote-author');
        let currentIndex = -1;

        function updateQuote() {
            const randomIndex = Math.floor(Math.random() * quotes.length);
            const randomQuote = quotes[randomIndex];

            messageElement.innerHTML = `&ldquo;${randomQuote.message}&rdquo;`;
            authorElement.textContent = randomQuote.author;
        }

        updateQuote();

        setInterval(updateQuote, 5000);
    </script>
</body>

</html>
