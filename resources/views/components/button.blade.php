<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg']) }}>
    {{ $slot }}
</button>
