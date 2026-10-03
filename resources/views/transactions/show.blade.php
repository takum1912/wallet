<x-layouts.app :title="__('家計簿詳細')">
    <div class="p-6">
        <h2 class="font-semibold text-xl mb-4">{{ __('家計簿詳細') }}</h2>
        <p>日付：{{ $transaction->transaction_date }}</p>
        <p>支出・収入：{{ $transaction->type }}</p>
        <p>金額：{{ number_format($transaction->amount) }} 円</p>
        <p>カテゴリ：{{ $transaction->category }}</p>
        <p>内容：{{ $transaction->content }}</p>
        <p>メモ：{{ $transaction->memo }}</p>
        <p>ユーザー：{{ $transaction->user->name }}</p>
        <div class="mt-4">
            <a href="{{ route('transactions.index') }}" class="text-blue-500 mr-4" wire:navigate>一覧に戻る</a>
            <a href="{{ route('transactions.edit', $transaction) }}" class="text-green-500" wire:navigate>編集</a>
        </div>
    </div>
</x-layouts.app>