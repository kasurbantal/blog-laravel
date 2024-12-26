<x-layout>
<x-slot:title>{{$title}}</x-slot:title>

{{-- array posts berasal dari web.php, sedangkan $post adalah variabel baru yang dibuat sendiri di halaman ini --}}
@foreach ($posts as $post)
<article class="py-8 max-w-screen-md border-b border-gray-300">
    <a href="/posts/{{$post['slug']}}" class="hover:underline">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title']}}</h2>
    </a>
    <div>
        {{-- Mengubah akses author dari atribut biasa menjadi relasi dengan User untuk menampilkan nama penulis melalui relasi di model. --}}
        {{-- Menambahkan link ke halaman detail author menggunakan relasi User untuk menampilkan profil penulis. --}}
        By
        <a href="/authors/{{ $post->author->username}}" class="text-base text-gray-500 hover:underline">{{ $post->author->name}}</a>
        in
        <a href="#" class="text-base text-gray-500 hover:underline">{{ $post->category->name}}</a>
        | {{ $post-> created_at->diffForHumans()}}
    </div>
    <p class="my-4 font-light">
        {{ Str::limit ($post['body']), 100}}
    </p>
    <a href="/posts/{{$post['slug']}}" class="text-basefont-medium text-blue-500 hover:underline">Read more &raquo;</a>
</article>
@endforeach
</x-layout>
