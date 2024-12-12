<nav class="hidden 2xl:flex gap-8">
    @foreach($menu as $menuItem)
        <a href="{{$menuItem->link()}}" class="text-white hover:text-pink font-bold">{{$menuItem->label()}}</a>
    @endforeach
</nav>
