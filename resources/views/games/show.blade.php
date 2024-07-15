<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="my-10 max-w-7xl mx-auto font-extrabold">
  @include('components/link')

  <div class="grid gap-10 my-10">
    <div class="gap-2 grid grid-cols-2">
      <div class="flex gap-2">
        <div class="bg-sky-500 px-2 border-[3px] border-black flex items-center rounded-md">
          <p>#</p>
        </div>
        <div class="w-full bg-green-500 px-2 py-1 rounded-md border-black border-[3px] flex gap-10">
          <p>Name</p>
          <p>Author</p>
          <p>Tags</p>
        </div>
      </div>
      <p class="bg-green-400 px-2 py-1 rounded-md border-black border-[3px]">Actions</p>
    </div>
    <div class="gap-2 grid grid-cols-2">
      <div class="flex gap-2">
        <div class="bg-sky-500 px-2 border-[3px] border-black flex items-center rounded-md">
          1
        </div>
        <div class="w-full bg-green-500 px-2 py-1 rounded-md border-black border-[3px] flex gap-10">
          <p>{{$game->name}}</p>
          <p>{{$game->author->name}}</p>
          @foreach($game->tags as $tag)
          <p>
            {{$tag->name}}
          </p>
          @endforeach
        </div>
      </div>
      <div class="grid gap-2 grid-cols-3 w-full">
        <a href="/games/{{$game->id}}" class="bg-green-400 px-2 py-1 rounded-md border-black border-[3px] shadow-[3px_3px] hover:shadow-[1px_1px]">Detail</a>
        <a href="/games/{{$game->id}}/edit" class="bg-sky-400 px-2 py-1 rounded-md border-black border-[3px] shadow-[3px_3px] hover:shadow-[1px_1px]">Edit</a>
        <form method="POST" action="/games/{{$game->id}}" class="bg-pink-400 px-2 py-1 rounded-md border-black border-[3px] shadow-[3px_3px] hover:shadow-[1px_1px]">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>