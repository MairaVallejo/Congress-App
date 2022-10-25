<div class="p-0 pl-4 py-1 flex flex-row gap-2">
    @isset($logo)
        <div class="w-10 rounded">
            <img src="https://placeimg.com/192/192/people" />
        </div>
    @endisset
    <div>
        <h1 class="normal-case text-sm font-medium">Congress-App</h1>
        <h2 class="normal-case text-md font-bold">{{ $name }}</h2>
    </div>
</div>
