<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $atmosphere->title }} — MORA</title>

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

        .atmosphere-bg {
            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(139, 124, 255, 0.18),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 80% 60%,
                    rgba(78, 107, 255, 0.10),
                    transparent 35%
                );
        }

        .glass {
            background: rgba(255, 255, 255, 0.035);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
        }

        .media-card {
            transition:
                transform 0.4s ease,
                border-color 0.4s ease,
                background 0.4s ease;
        }

        .media-card:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.055);
            border-color: rgba(255, 255, 255, 0.15);
        }
    </style>
</head>

<body class="min-h-screen bg-[#09090b] text-[#f5f5f5] antialiased">

    <!-- Ambient background -->

    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="atmosphere-bg absolute inset-0"></div>

        <div class="absolute -left-40 top-20 h-[500px] w-[500px] rounded-full bg-purple-500/10 blur-[160px]"></div>

        <div class="absolute -right-40 top-[40%] h-[500px] w-[500px] rounded-full bg-blue-500/10 blur-[160px]"></div>
    </div>


    <!-- Navigation -->

    <header class="relative z-20 border-b border-white/[0.06]">

        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-10">

            <a
                href="{{ route('home') }}"
                class="text-xl font-medium tracking-[0.35em]"
            >
                MORA
            </a>

            <a
                href="{{ route('home') }}"
                class="rounded-full border border-white/10 px-5 py-2.5 text-sm text-white/60 transition hover:border-white/20 hover:text-white"
            >
                ← Explore
            </a>

        </div>

    </header>


    <main class="relative z-10">

        <!-- Hero -->

        <section class="mx-auto max-w-7xl px-6 pb-24 pt-10 lg:px-10 lg:pt-16">

            <div class="grid gap-10 lg:grid-cols-[1.25fr_0.75fr] lg:items-end">

                <!-- Visual -->

                <div
                    class="relative aspect-[16/10] overflow-hidden rounded-[36px] border border-white/[0.08] bg-gradient-to-br from-white/[0.08] via-white/[0.025] to-black"
                >

                    <div
                        class="absolute inset-0 bg-[radial-gradient(circle_at_25%_20%,rgba(139,124,255,0.30),transparent_35%),radial-gradient(circle_at_80%_80%,rgba(78,107,255,0.22),transparent_40%)]"
                    ></div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                    <div class="absolute bottom-7 left-7 right-7 flex items-end justify-between">

                        <div>

                            <span class="inline-flex rounded-full border border-white/10 bg-black/20 px-4 py-2 text-xs uppercase tracking-[0.2em] text-white/55 backdrop-blur-xl">
                                {{ $atmosphere->mood?->icon }}
                                <span class="ml-2">
                                    {{ $atmosphere->mood?->name }}
                                </span>
                            </span>

                        </div>

                        <div class="rounded-full border border-white/10 bg-black/20 px-4 py-2 text-xs text-white/40 backdrop-blur-xl">
                            {{ number_format($atmosphere->views_count) }} views
                        </div>

                    </div>

                </div>


                <!-- Information -->

                <div class="pb-2">

                    <p class="text-xs uppercase tracking-[0.3em] text-white/30">
                        Atmosphere
                    </p>

                    <h1 class="mt-4 font-display text-5xl font-normal leading-[1.05] tracking-tight sm:text-6xl">
                        {{ $atmosphere->title }}
                    </h1>

                    <p class="mt-6 text-base leading-8 text-white/45">
                        {{ $atmosphere->description }}
                    </p>


                    <!-- Creator -->

                    <div class="mt-8 flex items-center gap-4">

                        <div class="flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/[0.05] text-sm">
                            {{ strtoupper(substr($atmosphere->user->profile?->display_name ?? $atmosphere->user->name, 0, 1)) }}
                        </div>

                        <div>

                            <p class="text-sm text-white/70">
                                {{ $atmosphere->user->profile?->display_name ?? $atmosphere->user->name }}
                            </p>

                            @if ($atmosphere->user->profile?->username)
                                <p class="mt-1 text-xs text-white/30">
                                    @{{ $atmosphere->user->profile->username }}
                                </p>
                            @endif

                        </div>

                    </div>


                    <!-- Actions -->

                    <div class="mt-8 flex gap-3">

                        <button
                            class="flex-1 rounded-full bg-white px-6 py-3.5 text-sm font-medium text-black transition hover:bg-white/90"
                        >
                            ♡ Save
                        </button>

                        <button
                            class="rounded-full border border-white/10 px-6 py-3.5 text-sm text-white/60 transition hover:border-white/20 hover:text-white"
                        >
                            Share
                        </button>

                    </div>

                </div>

            </div>

        </section>


        <!-- Tags -->

        <section class="mx-auto max-w-7xl px-6 pb-20 lg:px-10">

            <div class="flex flex-wrap gap-2">

                @foreach ($atmosphere->tags as $tag)

                    <span class="rounded-full border border-white/[0.08] bg-white/[0.025] px-4 py-2 text-xs text-white/40">
                        #{{ $tag->name }}
                    </span>

                @endforeach

            </div>

        </section>


        <!-- Media -->

        <section class="mx-auto max-w-7xl px-6 pb-32 lg:px-10">

            <div class="mb-10">

                <p class="text-xs uppercase tracking-[0.3em] text-white/30">
                    Inside this atmosphere
                </p>

                <h2 class="mt-3 text-3xl font-medium tracking-tight">
                    Stay for a while.
                </h2>

            </div>


            <div class="grid gap-5 md:grid-cols-2">

                @foreach ($atmosphere->media as $media)

                    @if ($media->type === 'text')

                        <article class="media-card glass rounded-[28px] p-7">

                            <div class="flex items-center justify-between">

                                <span class="text-xs uppercase tracking-[0.2em] text-white/25">
                                    Writing
                                </span>

                                <span class="text-xs text-white/20">
                                    {{ str_pad($media->sort_order, 2, '0', STR_PAD_LEFT) }}
                                </span>

                            </div>

                            <h3 class="mt-8 font-display text-3xl font-normal">
                                {{ $media->title }}
                            </h3>

                            <p class="mt-5 text-sm leading-8 text-white/45">
                                {{ $media->content }}
                            </p>

                        </article>

                    @elseif ($media->type === 'audio')

                        <article class="media-card glass rounded-[28px] p-7">

                            <div class="flex items-center justify-between">

                                <span class="text-xs uppercase tracking-[0.2em] text-white/25">
                                    Sound
                                </span>

                                <span class="text-xs text-white/20">
                                    {{ str_pad($media->sort_order, 2, '0', STR_PAD_LEFT) }}
                                </span>

                            </div>

                            <div class="mt-8 flex items-center gap-5">

                                <button
                                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white text-black"
                                >
                                    ▶
                                </button>

                                <div>

                                    <h3 class="text-lg font-medium">
                                        {{ $media->title }}
                                    </h3>

                                    <p class="mt-1 text-sm text-white/35">
                                        {{ $media->content }}
                                    </p>

                                </div>

                            </div>

                        </article>

                    @elseif ($media->type === 'image')

                        <article class="media-card glass overflow-hidden rounded-[28px]">

                            <div class="flex aspect-video items-center justify-center bg-white/[0.03]">

                                <span class="text-sm text-white/25">
                                    Image
                                </span>

                            </div>

                            <div class="p-6">

                                <span class="text-xs uppercase tracking-[0.2em] text-white/25">
                                    Visual
                                </span>

                                <h3 class="mt-3 text-lg font-medium">
                                    {{ $media->title }}
                                </h3>

                            </div>

                        </article>

                    @elseif ($media->type === 'video')

                        <article class="media-card glass rounded-[28px] p-7">

                            <span class="text-xs uppercase tracking-[0.2em] text-white/25">
                                Video
                            </span>

                            <h3 class="mt-6 text-xl font-medium">
                                {{ $media->title }}
                            </h3>

                            <p class="mt-3 text-sm text-white/35">
                                {{ $media->description }}
                            </p>

                        </article>

                    @endif

                @endforeach

            </div>

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