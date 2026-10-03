<x-layouts.app :title="__('入力欄')">
    <div class="p-6">
        <h2 class="font-semibold text-xl mb-4">{{ __('入力欄') }}</h2>
        <form method="POST" action="{{ route('transactions.store') }}" >
            @csrf
            <div class="mb-4">
                <label for="type" class="block font-medium">支出・収入</label>
                <select name="type" id="type" class="border rounded p-2 w-full">
                    <option value="支出">支出</option>
                    <option value="収入">収入</option>
                </select>
                @error('type')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="amount" class="block font-medium">金額</label>
                <input type="number" name="amount" id="amount" value="{{ old('amount') }}" class="border rounded p-2 w-full">
                @error('amount')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category" class="block font-medium">カテゴリ</label>
                <input type="text" name="category" id="category" value="{{ old('category') }}" class="border rounded p-2 w-full">
                @error('category')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block font-medium">内容</label>
                <input type="text" name="content" id="content" value="{{ old('content') }}" class="border rounded p-2 w-full">
                @error('content')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="memo" class="block font-medium">メモ</label>
                <textarea name="memo" id="memo" class="border rounded p-2 w-full">{{ old('memo') }}</textarea>
                @error('memo')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="transaction_date" class="block font-medium">日付</label>
                <input type="date" name="transaction_date" id="transaction_date" value="{{ old('transaction_date') }}" class="border rounded p-2 w-full">
                @error('transaction_date')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">登録</button>
        </form>
    </div>
</x-layouts.app>