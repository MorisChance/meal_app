<x-app-layout>

    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <x-flash-message :message="session('notice')" />
        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($meals as $meal)
                <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                    <a href="{{ route('meals.show', $meal) }}">
                        <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl">
                            {{ $meal->title }}</h2>
                        <p>ALEXANDER</p>
                        <p class="current_time">現在時刻：{{ date('Y-d H:i:s') }}</p>
                        <p>記事作成日:{{ date('Y-d H:i:s', strtotime('-1 day')) < $meal->created_at ?: '' }}{{ $meal->created_at }}
                        </p>
                        <img class="w-full mb-2" src="{{ $meal->image_url }}" alt="">
                        <p class="text-gray-700 text-base">{{ Str::limit($meal->body, 50) }}</p>
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                        <?php $favorite_count = \App\Models\Favorite::where('meal_id', $meal->id)->count(); ?>
                        <div>お気に入り数：{{ $favorite_count }}</div>
                        </p>
                    </a>
                </article>
            @endforeach
        </div>
        {{ $meals->links() }}
    </div>
</x-app-layout>
