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
            background 0.4s ease,
            box-shadow 0.4s ease;
    }

    .atmosphere-card:hover {
        transform: translateY(-6px);
        border-color: rgba(255, 255, 255, 0.18);
        background: rgba(255, 255, 255, 0.055);
        box-shadow: 0 24px 70px rgba(0, 0, 0, 0.28);
    }

    .atmosphere-link {
        display: block;
    }

    .atmosphere-visual {
        transition:
            transform 0.5s ease,
            border-color 0.4s ease;
    }

    .atmosphere-card:hover .atmosphere-visual {
        transform: scale(1.015);
    }

    .mood-pill {
        transition:
            background 0.3s ease,
            border-color 0.3s ease,
            transform 0.3s ease,
            color 0.3s ease;
    }

    .mood-pill:hover {
        transform: translateY(-2px);
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.18);
        color: white;
    }

    .arrow-icon {
        transition:
            transform 0.3s ease,
            color 0.3s ease,
            background 0.3s ease,
            border-color 0.3s ease;
    }

    .atmosphere-card:hover .arrow-icon {
        transform: translate(2px, -2px);
        color: white;
        border-color: rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.06);
    }

    .search-wrapper {
        transition:
            border-color 0.3s ease,
            background 0.3s ease,
            box-shadow 0.3s ease,
            transform 0.3s ease;
    }

    .search-wrapper:focus-within {
        border-color: rgba(255, 255, 255, 0.18);
        background: rgba(255, 255, 255, 0.055);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .search-icon {
        transition: color 0.3s ease;
    }

    .search-wrapper:focus-within .search-icon {
        color: rgba(255, 255, 255, 0.7);
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


            <!-- Search -->

            <form
                method="GET"
                action="{{ route('home') }}"
                class="mt-8 max-w-2xl"
            >

                @if ($selectedMood)
                    <input
                        type="hidden"
                        name="mood"
                        value="{{ $selectedMood }}"
                    >
                @endif

                <div
                    class="search-wrapper group flex items-center gap-4 rounded-full border border-white/10 bg-white/[0.025] px-5 py-3.5 backdrop-blur-xl"
                >

                    <svg
                        class="search-icon h-5 w-5 shrink-0 text-white/30"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-4.35-4.35m1.35-5.15a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z"
                        />
                    </svg>

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search an atmosphere..."
                        autocomplete="off"
                        class="min-w-0 flex-1 bg-transparent text-sm text-white outline-none placeholder:text-white/25"
                    >

                    @if ($search)

                        <a
                            href="{{ $selectedMood
                                ? route('home', ['mood' => $selectedMood]) . '#atmospheres'
                                : route('home') . '#atmospheres' }}"
                            class="shrink-0 text-white/30 transition hover:text-white/70"
                            aria-label="Clear search"
                        >

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 6l12 12M18 6 6 18"
                                />
                            </svg>

                        </a>

                    @endif

                    <button
                        type="submit"
                        class="shrink-0 rounded-full bg-white px-5 py-2 text-xs font-medium text-black transition hover:bg-white/90"
                    >
                        Search
                    </button>

                </div>

            </form>

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

            <!-- All moods -->

            <a
                href="{{ route('home', $search ? ['search' => $search] : []) }}#moods"
                class="mood-pill inline-flex items-center rounded-full border px-5 py-3 text-sm transition
                    {{ empty($selectedMood)
                        ? 'border-white/25 bg-white text-black'
                        : 'border-white/10 bg-white/[0.025] text-white/65' }}"
            >

                <span class="mr-2 text-current">
                    ✦
                </span>

                All

            </a>


            @foreach ($moods as $mood)

                <a
                    href="{{ route('home', array_filter([
                        'mood' => $mood->slug,
                        'search' => $search,
                    ])) }}#atmospheres"
                    class="mood-pill inline-flex items-center rounded-full border px-5 py-3 text-sm transition
                        {{ $selectedMood === $mood->slug
                            ? 'border-white/25 bg-white text-black'
                            : 'border-white/10 bg-white/[0.025] text-white/65' }}"
                >

                    @if ($mood->icon)

                        <span class="mr-2 text-current">
                            {{ $mood->icon }}
                        </span>

                    @else

                        <span class="mr-2 text-current">
                            •
                        </span>

                    @endif

                    {{ $mood->name }}

                </a>

            @endforeach

        </div>


        @if ($selectedMood || $search)

            <div class="mt-6 flex flex-wrap items-center gap-3 text-sm text-white/35">

                <span class="h-1.5 w-1.5 rounded-full bg-white/50"></span>

                @if ($search)
                    Searching for
                    <span class="text-white/65">
                        "{{ $search }}"
                    </span>
                @endif

                @if ($selectedMood && $search)
                    <span class="text-white/20">
                        in
                    </span>
                @endif

                @if ($selectedMood)
                    <span class="text-white/65">
                        {{ $moods->firstWhere('slug', $selectedMood)?->name ?? $selectedMood }}
                    </span>
                @endif

            </div>

        @endif

    </section>


    <!-- Atmospheres -->

    <section
        id="atmospheres"
        class="mx-auto max-w-7xl px-6 pb-32 lg:px-10"
    >

        <div class="mb-10 flex items-end justify-between">

            <div>

                <p class="text-xs uppercase tracking-[0.3em] text-white/30">

                    @if ($search)
                        Search results
                    @else
                        Curated for you
                    @endif

                </p>

                <h2 class="mt-3 text-3xl font-medium tracking-tight">

                    @if ($search)

                        Results for "{{ $search }}".

                    @elseif ($selectedMood)

                        {{ $moods->firstWhere('slug', $selectedMood)?->name ?? 'Selected' }} atmospheres.

                    @else

                        Explore atmospheres.

                    @endif

                </h2>

            </div>

            <span class="hidden text-sm text-white/30 sm:block">

                {{ $featuredAtmospheres->count() }}

                {{ $featuredAtmospheres->count() === 1 ? 'world' : 'worlds' }}

            </span>

        </div>


        @if ($featuredAtmospheres->count())

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                @foreach ($featuredAtmospheres as $atmosphere)

                    <article
                        class="atmosphere-card group rounded-[28px] border border-white/[0.07] bg-white/[0.025] p-4"
                    >

                        <!-- Atmosphere Link -->

                        <a
                            href="{{ route('atmosphere.show', $atmosphere->slug) }}"
                            class="atmosphere-link"
                            aria-label="Open {{ $atmosphere->title }}"
                        >

                            <!-- Visual -->

                            <div
                                class="atmosphere-visual relative flex aspect-[4/3] items-end overflow-hidden rounded-[22px] bg-gradient-to-br from-white/[0.08] via-white/[0.025] to-black"
                            >

                                <div
                                    class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(139,124,255,0.25),transparent_40%),radial-gradient(circle_at_80%_80%,rgba(78,107,255,0.18),transparent_40%)]"
                                ></div>

                                <div
                                    class="absolute inset-0 opacity-0 transition-opacity duration-500 group-hover:opacity-100"
                                    style="background: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.06), transparent 55%);"
                                ></div>

                                <div class="relative flex w-full items-end justify-between gap-4 p-6">

                                    <span class="rounded-full border border-white/10 bg-black/20 px-3 py-1.5 text-[11px] uppercase tracking-wider text-white/50 backdrop-blur-md">
                                        {{ $atmosphere->mood?->name }}
                                    </span>

                                    <div
                                        class="arrow-icon flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/10 bg-black/20 text-white/35 backdrop-blur-md"
                                    >

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                            class="h-4 w-4"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M7 17 17 7"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 7h8v8"
                                            />

                                        </svg>

                                    </div>

                                </div>

                            </div>


                            <!-- Content -->

                            <div class="px-1 pb-2 pt-5">

                                <div class="flex items-start justify-between gap-4">

                                    <div class="min-w-0">

                                        <h3 class="text-xl font-medium tracking-tight text-white">
                                            {{ $atmosphere->title }}
                                        </h3>

                                        <p class="mt-2 line-clamp-2 text-sm leading-6 text-white/40">
                                            {{ $atmosphere->description }}
                                        </p>

                                    </div>

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

                        </a>

                    </article>

                @endforeach

            </div>

        @else

            <div class="rounded-[28px] border border-white/10 bg-white/[0.025] p-12 text-center">

                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full border border-white/10 bg-white/[0.025] text-white/30">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        class="h-6 w-6"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3v18"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 12h18"
                        />

                    </svg>

                </div>

                @if ($search)

                    <p class="mt-5 text-white/40">
                        No atmospheres found for "{{ $search }}".
                    </p>

                    <a
                        href="{{ route('home') }}#atmospheres"
                        class="mt-5 inline-flex rounded-full border border-white/10 px-5 py-2.5 text-sm text-white/55 transition hover:border-white/20 hover:text-white"
                    >
                        Explore everything
                    </a>

                @else

                    <p class="mt-5 text-white/40">
                        No atmospheres found for this mood yet.
                    </p>

                    <a
                        href="{{ route('home') }}#moods"
                        class="mt-5 inline-flex rounded-full border border-white/10 px-5 py-2.5 text-sm text-white/55 transition hover:border-white/20 hover:text-white"
                    >
                        Explore another mood
                    </a>

                @endif

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
