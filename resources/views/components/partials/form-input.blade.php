@props([ 'type' => 'text', 'name', 'placeholder', 'label' ])


<label for="{{ $name }}" class="block text-sm font-medium text-gray-800">
    {{ $label }}
</label>
<input
    type="{{ $type }}"
    id="{{ $name }}"
    name="{{ $name }}"
    required
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([ 'class'=>"mt-1 block w-full px-3 py-2 border border-gray-300
    rounded-md shadow-sm focus:outline-none focus:ring-co-dark-blue
    focus:border-co-dark-blue" 
    ]) }} 
/>
