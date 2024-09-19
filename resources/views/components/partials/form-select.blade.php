@props(["name", "value", "labelName"])

<label for="{{ $name }}" class="block text-sm font-medium text-gray-800">
    {{ $labelName }}
</label>
<select
    name="{{ $name }}"
    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-co-dark-blue focus:border-co-dark-blue"
>
    {{ $slot }}
</select>