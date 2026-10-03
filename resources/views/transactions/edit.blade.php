<x-layouts.app :title="__('家計簿編集')">
    <div class="p-6">
        <h2 class="font-semibold text-xl mb-4">{{ __('家計簿編集') }}</h2>
        <form action="{{ route('transactions.update', $transaction) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="type" class="block font-medium">支出・収入</label>
                <select name="type" id="type" class="border rounded p-2 w-full">
                    <option value="支出" {{ $transaction->type === '支出' ? 'selected' : '' }}>支出</option>
                    <option value="収入" {{ $transaction->type === '収入' ? 'selected' : '' }}>収入</option>
                </select>
                @error('type')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="amount" class="block font-medium">金額</label>
                <input type="number" name="amount" id="amount" value="{{ old('amount', $transaction->amount) }}" class="border rounded p-2 w-full">
                @error('amount')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category" class="block font-medium">カテゴリ</label>
                <input type="text" name="category" id="category" value="{{ old('category', $transaction->category) }}" class="border rounded p-2 w-full">
                @error('category')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block font-medium">内容</label>
                <input type="text" name="content" id="content" value="{{ old('content', $transaction->content) }}" class="border rounded p-2 w-full">
                @error('content')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="memo" class="block font-medium">メモ</label>
                <textarea name="memo" id="memo" class="border rounded p-2 w-full">{{ old('memo', $transaction->memo) }}</textarea>
                @error('memo')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="transaction_date" class="block font-medium">日付</label>
                <input type="date" name="transaction_date" id="transaction_date" value="{{ old('transaction_date', $transaction->transaction_date->format('Y-m-d')) }}" class="border rounded p-2 w-full">
                @error('transaction_date')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 my-2 rounded">削除</button>
                </form>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">更新</button>
        </form>
    </div>
</x-layouts.app>