<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MORA — A place for every feeling.</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Georgia', 'serif'],
                    },
                },
            },
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: #09090b;
        }

        .mora-glow {
            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(120, 95, 255, 0.18),
                    transparent 38%
                );
        }

        .atmosphere-card {
            transition:
                transform 0.4s ease,
                border-color 0.4s ease,
                background 0.4s ease;
        }

        .atmosphere-card:hover {
            transform: translateY(-6px);
            border-color: rgba(255, 255, 255, 0.18);
            background: rgba(255, 255, 255, 0.055);
        }

        .mood-pill {
            transition:
                background 0.3s ease,
                border-color 0.3s ease,
                transform 0.3s ease;
        }

        .mood-pill:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

<body class="min-h-screen bg-[#09090b] text-[#f5f5f5] antialiased">

    <!-- Ambient Background -->

    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="mora-glow absolute inset-0"></div>

        <div
            class="absolute -left-32 top-40 h-96 w-96 rounded-full bg-purple-500/10 blur-[140px]"
        ></div>

        <div
            class="absolute -right-32 top-[30rem] h-96 w-96 rounded-full bg-blue-500/10 blur-[140px]"
        ></div>
    </div>


    <!-- Navigation -->

    <header class="relative z-10 border-b border-white/[0.06]">

        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-10">

            <a
                href="{{ route('home') }}"
                class="text-xl font-medium tracking-[0.35em]"
            >
                MORA
            </a>

            <nav class="hidden items-center gap-8 text-sm text-white/55 md:flex">
                <a
                    href="{{ route('home') }}"
                    class="text-white transition hover:text-white"
                >
                    Explore
                </a>

                <a
                    href="#moods"
                    class="transition hover:text-white"
                >
                    Moods
                </a>

                <a
                    href="#atmospheres"
                    class="transition hover:text-white"
                >
                    Atmospheres
                </a>
            </nav>

            <div class="flex items-center gap-3">

                <button
                    class="hidden rounded-full border border-white/10 px-5 py-2.5 text-sm text-white/70 transition hover:border-white/20 hover:text-white sm:block"
                >
                    Sign in
                </button>

                <button
                    class="rounded-full bg-white px-5 py-2.5 text-sm font-medium text-black transition hover:bg-white/90"
                >
                    Create
                </button>

            </div>

        </div>

    </header>


    <!-- Hero -->

    <main class="relative z-10">

        <section class="mx-auto max-w-7xl px-6 pb-24 pt-24 lg:px-10 lg:pt-32">

            <div class="max-w-4xl">

                <p class="mb-6 text-xs uppercase tracking-[0.35em] text-white/35">
                    Discover your atmosphere
                </p>

                <h1
                    class="font-display text-5xl font-normal leading-[1.05] tracking-tight text-white sm:text-6xl lg:text-8xl"
                >
                    A place for
                    <span class="text-white/35">
                        every feeling.
                    </span>
                </h1>

                <p class="mt-8 max-w-2xl text-base leading-8 text-white/45 sm:text-lg">
                    Discover places made from music, visuals, words, and memories.
                    Enter an atmosphere that feels like you.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a
                        href="#atmospheres"
                        class="rounded-full bg-white px-7 py-3.5 text-sm font-medium text-black transition hover:bg-white/90"
                    >
                        Explore atmospheres
                    </a>

                    <a
                        href="#moods"
                        class="rounded-full border border-white/10 px-7 py-3.5 text-sm text-white/65 transition hover:border-white/20 hover:text-white"
                    >
                        Find a feeling
                    </a>

                </div>

            </div>

        </section>


        <!-- Mood Selector -->

        <section
            id="moods"
            class="mx-auto max-w-7xl px-6 pb-24 lg:px-10"
        >

            <div class="mb-8 flex items-end justify-between">

                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-white/30">
                        How are you feeling?
                    </p>

                    <h2 class="mt-3 text-2xl font-medium">
                        Choose your mood.
                    </h2>
                </div>

            </div>

            <div class="flex flex-wrap gap-3">

                @foreach ($moods as $mood)

                    <button
                        class="mood-pill rounded-full border border-white/10 bg-white/[0.025] px-5 py-3 text-sm text-white/65"
                    >
                        <span class="mr-2 text-white/40">
                            {{ $mood->icon }}
                        </span>

                        {{ $mood->name }}
                    </button>

                @endforeach

            </div>

        </section>


        <!-- Atmospheres -->

        <section
            id="atmospheres"
            class="mx-auto max-w-7xl px-6 pb-32 lg:px-10"
        >

            <div class="mb-10 flex items-end justify-between">

                <div>

                    <p class="text-xs uppercase tracking-[0.3em] text-white/30">
                        Curated for you
                    </p>

                    <h2 class="mt-3 text-3xl font-medium tracking-tight">
                        Explore atmospheres.
                    </h2>

                </div>

                <span class="hidden text-sm text-white/30 sm:block">
                    {{ $featuredAtmospheres->count() }} worlds
                </span>

            </div>


            @if ($featuredAtmospheres->count())

                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach ($featuredAtmospheres as $atmosphere)

                        <article
                            class="atmosphere-card group rounded-[28px] border border-white/[0.07] bg-white/[0.025] p-4"
                        >

                            <!-- Visual -->

                            <div
                                class="relative flex aspect-[4/3] items-end overflow-hidden rounded-[22px] bg-gradient-to-br from-white/[0.08] via-white/[0.025] to-black"
                            >

                                <div
                                    class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(139,124,255,0.25),transparent_40%),radial-gradient(circle_at_80%_80%,rgba(78,107,255,0.18),transparent_40%)]"
                                ></div>

                                <div class="relative p-6">

                                    <span class="rounded-full border border-white/10 bg-black/20 px-3 py-1.5 text-[11px] uppercase tracking-wider text-white/50 backdrop-blur-md">
                                        {{ $atmosphere->mood?->name }}
                                    </span>

                                </div>

                            </div>


                            <!-- Content -->

                            <div class="px-1 pb-2 pt-5">

                                <div class="flex items-start justify-between gap-4">

                                    <div>

                                        <h3 class="text-xl font-medium tracking-tight">
                                            {{ $atmosphere->title }}
                                        </h3>

                                        <p class="mt-2 line-clamp-2 text-sm leading-6 text-white/40">
                                            {{ $atmosphere->description }}
                                        </p>

                                    </div>

                                    <button
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/10 text-white/40 transition hover:border-white/20 hover:text-white"
                                        aria-label="Save atmosphere"
                                    >
                                        ♡
                                    </button>

                                </div>


                                <!-- Tags -->

                                @if ($atmosphere->tags->count())

                                    <div class="mt-5 flex flex-wrap gap-2">

                                        @foreach ($atmosphere->tags->take(3) as $tag)

                                            <span class="text-xs text-white/25">
                                                #{{ $tag->name }}
                                            </span>

                                        @endforeach

                                    </div>

                                @endif

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                <div class="rounded-[28px] border border-white/10 bg-white/[0.025] p-12 text-center">

                    <p class="text-white/40">
                        No atmospheres found yet.
                    </p>

                </div>

            @endif

        </section>

    </main>


    <!-- Footer -->

    <footer class="relative z-10 border-t border-white/[0.06]">

        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-6 py-10 sm:flex-row sm:items-center sm:justify-between lg:px-10">

            <div>

                <p class="text-sm tracking-[0.25em] text-white/70">
                    MORA
                </p>

                <p class="mt-2 text-xs text-white/25">
                    A place for every feeling.
                </p>

            </div>

            <p class="text-xs text-white/20">
                © {{ date('Y') }} MORA
            </p>

        </div>

    </footer>

</body>
</html>