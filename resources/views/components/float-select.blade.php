<div class="{{ $class }}">
    <div class="relative">
        <select id="{{ $id }}" name="{{ $name }}"
            class="min-w-[13rem] w-full block px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 @error($name) bg-red-50 @enderror border-0 border-b-2 border-gray-300 @error($name) border-red-300 @enderror appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 @error($name) focus:border-red-600 @enderror peer">
            @foreach ($values as $key => $value)
                <option value="{{ $key }}" @selected($selected == $key)>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        <label for="{{ $id }}"
            class="absolute text-sm text-gray-500 @error($name) text-red-600 @enderror duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 @error($name) peer-focus:text-red-600 @enderror peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">{{ $label }}</label>
    </div>
    @error($name)
        <p id="{{ $id }}_error_help" class="mt-1 text-xs text-red-600 dark:text-red-400"><span
                class="font-medium">{{ $message }}</p>
    @enderror
</div>
