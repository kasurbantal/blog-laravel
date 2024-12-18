<x-layout>
  <!-- //membuat slot dengan variabel $title agar title yang ada di Route yang diperuntukkan untuk home.blade.php dapat digunakan oleh file lain -->
  <x-slot:title>{{$title}}</x-slot:title>
  <h3 class="text-xl">This is the Home Page</h3>
</x-layout>