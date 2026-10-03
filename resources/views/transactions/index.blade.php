<x-layouts.app :title="__('家計簿')">
    <div class="p-6">
        <h2 class="font-semibold text-xl mb-4">{{ __('家計簿') }}</h2>
        @foreach ($transactions as $transaction)
        <div class="p-4 bg-gray-100 dark:bg-gray-700 my-4 rounded-lg">
            <p>日付：{{ $transaction->transaction_date }}</p>
            <p>支出・収入：{{ $transaction->type }}</p>
            <p>金額：{{ number_format($transaction->amount) }} 円</p>
            <p>カテゴリ：{{ $transaction->category }}</p>
            <p>内容：{{ $transaction->content }}</p>
            <p>メモ：{{ $transaction->memo }}</p>
            <p>ユーザー：{{ $transaction->user->name }}</p>
            <a href="{{ route('transactions.edit', $transaction) }}" class="text-green-500 mr-2" wire:navigate>編集</a>
            <a href="{{ route('transactions.show', $transaction) }}" class="text-blue-500 hover:text-blue-700 mr-2">詳細を見る</a>
        </div>
        @endforeach
    </div>
</x-layouts.app>