<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="mx-auto max-w-md">
  <div class="py-10 w-full">
    <div>
      <a href="/games" class="hover:shadow-[1px_1px] px-4 py-2 border-[3px] border-black shadow-[3px_3px] rounded-md">All Games</a>
      <a href="/authors" class="hover:shadow-[1px_1px] px-4 py-2 border-[3px] border-black shadow-[3px_3px] rounded-md">All Authors</a>
      <a href="/tags" class="hover:shadow-[1px_1px] px-4 py-2 border-[3px] border-black shadow-[3px_3px] rounded-md">All Tags</a>
    </div>
    <form action="/games" method="POST" class="py-6 w-full grid gap-2">
      @csrf
      <div class="w-full">
        <label for="game_name">Game Name</label>
        <input name="name" id="game_name" class="w-full border-2  rounded-sm border-black py-2 px-2 px-2l" />
      </div>
      <div class="">
        <div>
          <label>Authors: </label>
          @foreach($authors as $author)
          <label>{{$author->name}}</label>
          <input name="author_id" class="border-2" value="{{$author->id}}" type="radio" />
          @endforeach
        </div>
        <div>
          <label>Tag: </label>
          @foreach($tags as $tag)
          <label>{{$tag->name}}</label>
          <input name="tag_id[]" class="border-2" value="{{$tag->id}}" type="checkbox" />
          @endforeach
        </div>
      </div>
      <div>
        <button class="hover:shadow-[1px_1px] px-2 py-1 border-[3px] border-black shadow-[3px_3px] rounded-md">Create</button>
      </div>
    </form>
  </div>
</body>

</html>