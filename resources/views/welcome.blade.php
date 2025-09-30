<?php

declare(strict_types=1);

?>

<x-layouts.guest>
    <main class="pt-[64px] md:ml-[352px]">
        <div class="flex justify-between p-10">
            <x-feed>
                @if (isset($posts))
                    @foreach ($posts as $post)
                        @if (isset($post->latestPost))
                            <div class="py-8">
                                <x-ui.post-card
                                    :fonte="$post->display_name"
                                    :id="$post->latestPost->id"
                                    :titulo="$post->latestPost->title"
                                    :descricao="$post->latestPost->content"
                                />
                            </div>
                        @endif
                    @endforeach
                @else
                    <h1>hmmmmmmmmm nenhum post ate agr...</h1>
                @endif
            </x-feed>
        </div>
    </main>
</x-layouts.guest>

<?php
