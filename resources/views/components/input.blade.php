<div class="{{ $class ?? '' }}">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label ?? '' }}</label>
    <input
    type="{{ $type ?? 'text' }}"
    @isset($id)id="{{ $id }}"@endisset
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 {{ $input_class ?? '' }}"
    @isset($value)value="{{ $value }}"@endisset
    @isset($name)name="{{ $name }}"@endisset
    @isset($placeholder)placeholder="{{ $placeholder }}"@endisset
    @isset($readonly) readonly @endisset
    @isset($required) required @endisset
    @isset($pattern)pattern="{{ $pattern }}"@endisset >
</div>
