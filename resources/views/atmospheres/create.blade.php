<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Create Atmosphere — MORA</title>

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
                rgba(120, 95, 255, 0.16),
                transparent 38%
            );
    }

    .form-input {
        transition:
            border-color 0.3s ease,
            background 0.3s ease,
            box-shadow 0.3s ease;
    }

    .form-input:focus {
        border-color: rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.055);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.16);
        outline: none;
    }

    .mood-option {
        transition:
            background 0.25s ease,
            border-color 0.25s ease,
            color 0.25s ease,
            transform 0.25s ease;
    }

    .mood-option:hover {
        transform: translateY(-2px);
        border-color: rgba(255, 255, 255, 0.18);
        background: rgba(255, 255, 255, 0.06);
    }

    textarea {
        resize: vertical;
    }
</style>


</head>

<body class="min-h-screen bg-[#09090b] text-[#f5f5f5] antialiased">


<!-- Ambient Background -->
<div class="pointer-events-none fixed inset-0 overflow-hidden">
    <div class="mora-glow absolute inset-0"></div>

    <div
        class="absolute -left-40 top-32 h-96 w-96 rounded-full bg-purple-500/10 blur-[150px]"
    ></div>

    <div
        class="absolute -right-40 top-[35rem] h-96 w-96 rounded-full bg-blue-500/10 blur-[150px]"
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

        <a
            href="{{ route('home') }}"
            class="flex items-center gap-2 text-sm text-white/45 transition hover:text-white"
        >
            <svg
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.7"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19 12H5"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m12 19-7-7 7-7"
                />
            </svg>

            Back to explore
        </a>

    </div>
</header>

<!-- Main -->
<main class="relative z-10">

    <div class="mx-auto max-w-4xl px-6 py-16 lg:px-10 lg:py-24">

        <!-- Heading -->
        <div class="mb-14 max-w-2xl">

            <p class="text-xs uppercase tracking-[0.35em] text-white/30">
                Create something personal
            </p>

            <h1
                class="mt-5 font-display text-5xl font-normal leading-tight tracking-tight text-white sm:text-6xl"
            >
                Create an
                <span class="text-white/35">
                    atmosphere.
                </span>
            </h1>

            <p class="mt-6 text-base leading-8 text-white/40">
                Give a feeling a place to exist. Combine memories,
                moods, words, sounds, and visuals into your own world.
            </p>

        </div>

        <!-- Form -->
        <form
            action="{{ route('atmosphere.store') }}"
            method="POST"
            class="space-y-10"
        >

            @csrf

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="rounded-2xl border border-red-400/20 bg-red-400/5 p-5">
                    <p class="text-sm font-medium text-red-300">
                        Something needs your attention.
                    </p>

                    <ul class="mt-3 space-y-1 text-sm text-red-300/70">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Basic Information -->
            <section
                class="rounded-[32px] border border-white/[0.07] bg-white/[0.025] p-6 sm:p-8"
            >

                <div class="mb-8">

                    <p class="text-xs uppercase tracking-[0.3em] text-white/25">
                        01
                    </p>

                    <h2 class="mt-2 text-xl font-medium">
                        The feeling
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-white/35">
                        Start with the identity of your atmosphere.
                    </p>

                </div>

                <div class="space-y-7">

                    <!-- Title -->
                    <div>

                        <label
                            for="title"
                            class="mb-3 block text-sm text-white/65"
                        >
                            Atmosphere title
                        </label>

                        <input
                            id="title"
                            name="title"
                            type="text"
                            value="{{ old('title') }}"
                            placeholder="e.g. Midnight Rain"
                            class="form-input w-full rounded-2xl border border-white/10 bg-white/[0.025] px-5 py-4 text-base text-white placeholder:text-white/20"
                        >

                    </div>

                    <!-- Description -->
                    <div>

                        <label
                            for="description"
                            class="mb-3 block text-sm text-white/65"
                        >
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Describe the feeling, memory, or world behind this atmosphere..."
                            class="form-input w-full rounded-2xl border border-white/10 bg-white/[0.025] px-5 py-4 text-sm leading-7 text-white placeholder:text-white/20"
                        >{{ old('description') }}</textarea>

                    </div>

                </div>

            </section>

            <!-- Mood -->
            <section
                class="rounded-[32px] border border-white/[0.07] bg-white/[0.025] p-6 sm:p-8"
            >

                <div class="mb-8">

                    <p class="text-xs uppercase tracking-[0.3em] text-white/25">
                        02
                    </p>

                    <h2 class="mt-2 text-xl font-medium">
                        Choose a mood
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-white/35">
                        What should someone feel when they enter this world?
                    </p>

                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach ($moods as $mood)

                        <label class="cursor-pointer">

                            <input
                                type="radio"
                                name="mood_id"
                                value="{{ $mood->id }}"
                                class="peer sr-only"
                                {{ old('mood_id') == $mood->id ? 'checked' : '' }}
                            >

                            <div
                                class="mood-option rounded-2xl border border-white/10 bg-white/[0.02] px-5 py-4 text-sm text-white/50 peer-checked:border-white/25 peer-checked:bg-white peer-checked:text-black"
                            >

                                <div class="flex items-center gap-3">

                                    <span class="text-base">
                                        {{ $mood->icon ?: '•' }}
                                    </span>

                                    <span>
                                        {{ $mood->name }}
                                    </span>

                                </div>

                            </div>

                        </label>

                    @endforeach

                </div>

            </section>

            <!-- Tags -->
            <section
                class="rounded-[32px] border border-white/[0.07] bg-white/[0.025] p-6 sm:p-8"
            >

                <div class="mb-8">

                    <p class="text-xs uppercase tracking-[0.3em] text-white/25">
                        03
                    </p>

                    <h2 class="mt-2 text-xl font-medium">
                        Add some words
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-white/35">
                        Tags help people discover your atmosphere.
                    </p>

                </div>

                <div>

                    <label
                        for="tags"
                        class="mb-3 block text-sm text-white/65"
                    >
                        Tags
                    </label>

                    <input
                        id="tags"
                        name="tags"
                        type="text"
                        value="{{ old('tags') }}"
                        placeholder="rain, night, lonely, nostalgic"
                        class="form-input w-full rounded-2xl border border-white/10 bg-white/[0.025] px-5 py-4 text-sm text-white placeholder:text-white/20"
                    >

                    <p class="mt-3 text-xs text-white/25">
                        Separate each tag with a comma.
                    </p>

                </div>

            </section>

            <!-- Visibility -->
            <section
                class="rounded-[32px] border border-white/[0.07] bg-white/[0.025] p-6 sm:p-8"
            >

                <div class="mb-8">

                    <p class="text-xs uppercase tracking-[0.3em] text-white/25">
                        04
                    </p>

                    <h2 class="mt-2 text-xl font-medium">
                        Visibility
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-white/35">
                        Decide whether people can discover your atmosphere.
                    </p>

                </div>

                <label
                    class="flex cursor-pointer items-center justify-between gap-6 rounded-2xl border border-white/10 bg-white/[0.02] p-5"
                >

                    <div>

                        <p class="text-sm font-medium text-white/75">
                            Public atmosphere
                        </p>

                        <p class="mt-1 text-xs leading-5 text-white/30">
                            Your atmosphere can appear in Explore and search.
                        </p>

                    </div>

                    <div class="relative">

                        <input
                            type="checkbox"
                            name="is_public"
                            value="1"
                            class="peer sr-only"
                            {{ old('is_public', true) ? 'checked' : '' }}
                        >

                        <div
                            class="h-6 w-11 rounded-full bg-white/10 transition peer-checked:bg-white"
                        ></div>

                        <div
                            class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white/40 transition peer-checked:translate-x-5 peer-checked:bg-black"
                        ></div>

                    </div>

                </label>

            </section>

            <!-- Actions -->
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('home') }}"
                    class="rounded-full border border-white/10 px-7 py-3.5 text-center text-sm text-white/55 transition hover:border-white/20 hover:text-white"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-full bg-white px-7 py-3.5 text-sm font-medium text-black transition hover:bg-white/90"
                >
                    Continue
                </button>

            </div>

        </form>

    </div>

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


</body>

</html>
