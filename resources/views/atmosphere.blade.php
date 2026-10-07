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

        .icon-button svg {
            transition:
                transform 0.3s ease,
                opacity 0.3s ease;
        }

        .icon-button:hover svg {
            transform: translateX(-2px);
        }

        .save-button svg {
            transition:
                transform 0.3s ease,
                fill 0.3s ease;
        }

        .save-button:hover svg {
            transform: translateY(-1px) scale(1.04);
        }

        .share-button svg {
            transition:
                transform 0.3s ease,
                opacity 0.3s ease;
        }

        .share-button:hover svg {
            transform: translateY(-1px);
        }

        .play-button {
            transition:
                transform 0.3s ease,
                background 0.3s ease,
                box-shadow 0.3s ease;
        }

        .play-button:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(255, 255, 255, 0.12);
        }

        .tag-pill {
            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                background 0.3s ease,
                color 0.3s ease;
        }

        .tag-pill:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="min-h-screen bg-[#09090b] text-[#f5f5f5] antialiased">

    <!-- Ambient Background -->

    <div class="pointer-events-none fixed inset-0 overflow-hidden">

        <div class="atmosphere-bg absolute inset-0"></div>

        <div
            class="absolute -left-40 top-20 h-[500px] w-[500px] rounded-full bg-purple-500/10 blur-[160px]"
        ></div>

        <div
            class="absolute -right-40 top-[40%] h-[500px] w-[500px] rounded-full bg-blue-500/10 blur-[160px]"
        ></div>

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
                class="icon-button group flex items-center gap-2.5 rounded-full border border-white/10 px-5 py-2.5 text-sm text-white/60 transition hover:border-white/20 hover:text-white"
            >

                <svg
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.7"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M19 12H5"></path>
                    <path d="M12 19l-7-7 7-7"></path>
                </svg>

                <span>Explore</span>

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

                        <!-- Mood -->

                        <div>

                            <span
                                class="inline-flex items-center rounded-full border border-white/10 bg-black/20 px-4 py-2 text-xs uppercase tracking-[0.2em] text-white/55 backdrop-blur-xl"
                            >

                                @if ($atmosphere->mood?->icon)

                                    <span class="mr-2 text-sm">
                                        {{ $atmosphere->mood->icon }}
                                    </span>

                                @else

                                    <svg
                                        width="14"
                                        height="14"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.6"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="mr-2"
                                    >
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                        <path d="M9 9h.01"></path>
                                        <path d="M15 9h.01"></path>
                                    </svg>

                                @endif

                                <span>
                                    {{ $atmosphere->mood?->name }}
                                </span>

                            </span>

                        </div>


                        <!-- Views -->

                        <div
                            class="flex items-center gap-2 rounded-full border border-white/10 bg-black/20 px-4 py-2 text-xs text-white/40 backdrop-blur-xl"
                        >

                            <svg
                                width="14"
                                height="14"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"></path>
                                <circle cx="12" cy="12" r="2.5"></circle>
                            </svg>

                            <span>
                                {{ number_format($atmosphere->views_count) }} views
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Information -->

                <div class="pb-2">

                    <p class="text-xs uppercase tracking-[0.3em] text-white/30">
                        Atmosphere
                    </p>


                    <h1
                        class="mt-4 font-display text-5xl font-normal leading-[1.05] tracking-tight sm:text-6xl"
                    >
                        {{ $atmosphere->title }}
                    </h1>


                    <p class="mt-6 text-base leading-8 text-white/45">
                        {{ $atmosphere->description }}
                    </p>


                    <!-- TAGS -->

                    @php
                        $tags = $atmosphere->tags;
                    @endphp

                    @if ($tags->count() > 0)

                        <div class="mt-7">

                            <div class="mb-3 flex items-center gap-2">

                                <svg
                                    width="14"
                                    height="14"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="text-purple-300/70"
                                >
                                    <path d="m20.5 13.5-7 7a2 2 0 0 1-2.8 0l-7.2-7.2a2 2 0 0 1 0-2.8l7-7a2 2 0 0 1 2.8 0l7.2 7.2a2 2 0 0 1 0 2.8Z"></path>
                                    <circle cx="8.5" cy="8.5" r="1.3"></circle>
                                </svg>

                                <span class="text-[10px] font-medium uppercase tracking-[0.25em] text-white/35">
                                    Tags
                                </span>

                            </div>


                            <div class="flex flex-wrap gap-2">

                                @foreach ($tags as $tag)

                                    <span
                                        class="tag-pill inline-flex items-center rounded-full border border-purple-400/25 bg-purple-400/10 px-4 py-2 text-xs font-medium text-purple-200 hover:border-purple-300/50 hover:bg-purple-400/20 hover:text-white"
                                    >
                                        #{{ $tag->name }}
                                    </span>

                                @endforeach

                            </div>

                        </div>

                    @else

                        <div class="mt-7">

                            <span class="text-xs text-white/20">
                                No tags
                            </span>

                        </div>

                    @endif


                    <!-- Creator -->

                    <div class="mt-8 flex items-center gap-4">

                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/[0.05] text-sm"
                        >
                            {{ strtoupper(substr($atmosphere->user->profile?->display_name ?? $atmosphere->user->name, 0, 1)) }}
                        </div>

                        <div>

                            <p class="text-sm text-white/70">
                                {{ $atmosphere->user->profile?->display_name ?? $atmosphere->user->name }}
                            </p>

                            @if ($atmosphere->user->profile?->username)

                                <p class="mt-1 text-xs text-white/30">
                                    {{ '@' . $atmosphere->user->profile->username }}
                                </p>

                            @endif

                        </div>

                    </div>


                    <!-- Actions -->

                    <div class="mt-8 flex gap-3">


                        <!-- SAVE -->

                        <form
                            method="POST"
                            action="{{ route('atmosphere.save', $atmosphere->slug) }}"
                            class="flex-1"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="save-button flex w-full items-center justify-center gap-2.5 rounded-full bg-white px-6 py-3.5 text-sm font-medium text-black transition hover:bg-white/90"
                            >

                                <svg
                                    width="17"
                                    height="17"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M6 4.5A2.5 2.5 0 0 1 8.5 2h7A2.5 2.5 0 0 1 18 4.5V21l-6-3.5L6 21V4.5Z"></path>
                                </svg>

                                <span>Save</span>

                            </button>

                        </form>


                        <!-- SHARE -->

                        <button
                            type="button"
                            onclick="shareAtmosphere()"
                            class="share-button flex items-center gap-2.5 rounded-full border border-white/10 px-6 py-3.5 text-sm text-white/60 transition hover:border-white/20 hover:text-white"
                        >

                            <svg
                                width="17"
                                height="17"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle cx="18" cy="5" r="2.5"></circle>
                                <circle cx="6" cy="12" r="2.5"></circle>
                                <circle cx="18" cy="19" r="2.5"></circle>
                                <path d="m8.2 10.9 7.6-4.7"></path>
                                <path d="m8.2 13.1 7.6 4.7"></path>
                            </svg>

                            <span>Share</span>

                        </button>

                    </div>

                </div>

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

                @forelse ($atmosphere->media as $media)


                    <!-- TEXT -->

                    @if ($media->type === 'text')

                        <article class="media-card glass rounded-[28px] p-7">

                            <div class="flex items-center justify-between">

                                <div class="flex items-center gap-2.5">

                                    <span class="text-white/30">

                                        <svg
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3h11A2.5 2.5 0 0 1 20 5.5v13a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 18.5v-13Z"></path>
                                            <path d="M8 8h8"></path>
                                            <path d="M8 12h8"></path>
                                            <path d="M8 16h5"></path>
                                        </svg>

                                    </span>

                                    <span class="text-xs uppercase tracking-[0.2em] text-white/25">
                                        Writing
                                    </span>

                                </div>

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


                    <!-- AUDIO -->

                    @elseif ($media->type === 'audio')

                        <article class="media-card glass rounded-[28px] p-7">

                            <div class="flex items-center justify-between">

                                <div class="flex items-center gap-2.5">

                                    <span class="text-white/30">

                                        <svg
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <path d="M9 18V5l10-2v13"></path>
                                            <circle cx="6" cy="18" r="3"></circle>
                                            <circle cx="16" cy="16" r="3"></circle>
                                        </svg>

                                    </span>

                                    <span class="text-xs uppercase tracking-[0.2em] text-white/25">
                                        Sound
                                    </span>

                                </div>

                                <span class="text-xs text-white/20">
                                    {{ str_pad($media->sort_order, 2, '0', STR_PAD_LEFT) }}
                                </span>

                            </div>


                            <div class="mt-8 flex items-center gap-5">

                                <button
                                    type="button"
                                    class="play-button flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white text-black"
                                >

                                    <svg
                                        width="18"
                                        height="18"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path d="M8.5 5.2c0-1 1.1-1.6 2-1l8.2 6.8c.8.6.8 1.8 0 2.4l-8.2 6.8c-.9.6-2 .1-2-1V5.2Z"></path>
                                    </svg>

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


                    <!-- IMAGE -->

                    @elseif ($media->type === 'image')

                        <article class="media-card glass overflow-hidden rounded-[28px]">

                            <div class="flex aspect-video items-center justify-center bg-white/[0.03]">

                                <svg
                                    width="28"
                                    height="28"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.3"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="text-white/20"
                                >
                                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <path d="m21 15-5-5L5 21"></path>
                                </svg>

                            </div>


                            <div class="p-6">

                                <div class="flex items-center gap-2.5">

                                    <svg
                                        width="14"
                                        height="14"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="text-white/25"
                                    >
                                        <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <path d="m21 15-5-5L5 21"></path>
                                    </svg>

                                    <span class="text-xs uppercase tracking-[0.2em] text-white/25">
                                        Visual
                                    </span>

                                </div>


                                <h3 class="mt-3 text-lg font-medium">
                                    {{ $media->title }}
                                </h3>

                            </div>

                        </article>


                    <!-- VIDEO -->

                    @elseif ($media->type === 'video')

                        <article class="media-card glass rounded-[28px] p-7">

                            <div class="flex items-center gap-2.5">

                                <svg
                                    width="15"
                                    height="15"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="text-white/25"
                                >
                                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                    <path d="m10 9 5 3-5 3V9Z"></path>
                                </svg>

                                <span class="text-xs uppercase tracking-[0.2em] text-white/25">
                                    Video
                                </span>

                            </div>


                            <h3 class="mt-6 text-xl font-medium">
                                {{ $media->title }}
                            </h3>


                            <p class="mt-3 text-sm text-white/35">
                                {{ $media->description }}
                            </p>

                        </article>

                    @endif

                @empty

                    <div class="glass col-span-full rounded-[28px] p-10 text-center">

                        <p class="text-sm text-white/30">
                            This atmosphere doesn't have any media yet.
                        </p>

                    </div>

                @endforelse

            </div>

        </section>

    </main>


    <!-- Footer -->

    <footer class="relative z-10 border-t border-white/[0.06]">

        <div
            class="mx-auto flex max-w-7xl flex-col gap-4 px-6 py-10 sm:flex-row sm:items-center sm:justify-between lg:px-10"
        >

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


    <!-- Share Script -->

    <script>

        function shareAtmosphere() {

            const shareData = {
                title: @json($atmosphere->title . ' — MORA'),
                text: @json($atmosphere->description),
                url: window.location.href
            };

            if (navigator.share) {

                navigator.share(shareData).catch(() => {});

                return;
            }


            navigator.clipboard.writeText(window.location.href);


            const button = document.querySelector('.share-button');
            const label = button.querySelector('span');
            const originalText = label.textContent;

            label.textContent = 'Copied';


            setTimeout(() => {

                label.textContent = originalText;

            }, 1800);

        }

    </script>

</body>

</html>