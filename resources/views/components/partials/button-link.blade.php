<a {{ $attributes->merge([ 
    'class' => 'px-5 py-2 rounded-full hover:scale-[0.96] duration-300',
    'href' => '' 
    ]) 
    }} >
    {{ $slot }}
</a>
