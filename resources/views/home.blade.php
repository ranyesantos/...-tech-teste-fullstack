<?php

declare(strict_types=1);

?>

<x-layouts.app>
    <x-feed title="Veja os últimos posts das comunidades que você segue">
        <x-slot name="header">
            <x-partials.welcome-user />
            <x-partials.status />
        </x-slot>

        <x-slot name="content">
            @if ($posts->isNotEmpty())
                @foreach ($posts as $post)
                    @if (isset($post->latestPost))
                        <x-ui.post-card
                            :source="$post->display_name"
                            :id="$post->latestPost->id"
                            :titulo="$post->latestPost->title"
                            :descricao="$post->latestPost->content"
                            :post="$post->latestPost"
                            :first="$loop->first"
                            class="{{ $loop->first ? 'bg-elevation-02dp' : 'bg-elevation-01dp' }}"
                        />
                    @endif
                @endforeach
            @else
                <h1 class="text-high">Nada por aqui</h1>
                <img src="https://http.cat/204" alt="http cat no-content" class="rounded-lg shadow-md" />
            @endif
        </x-slot>
    </x-feed>
</x-layouts.app>

<?php
