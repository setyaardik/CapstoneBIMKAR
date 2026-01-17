@props(['active' => false, 'label' => ''])

<button {{ $attributes->merge([
    'class' => 'px-5 py-2 rounded-full text-sm font-medium border transition-all ' .
        ($active
            ? 'bg-blue-600 text-white border-blue-600 shadow'
            : 'bg-white text-slate-600 border-slate-300 hover:bg-blue-50 hover:text-blue-700')
]) }}>
    {{ $label }}
</button>
