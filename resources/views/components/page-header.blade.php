@props(['title', 'message'])

<div class="prose prose-sm md:prose-base w-full flex-grow pt-10">
    <h1>{{ $title }}</h1>
    <p>
        {{ $message ?? '' }}
    </p>
</div>
