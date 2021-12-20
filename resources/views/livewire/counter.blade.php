<div>
<h1>Hello World!</h1>

<input  wire:model='search' type="text">

<ul>
    @foreach($users as $user)
    <li>
        {{$user->name}}
    </li>
    @endforeach


</ul>

<div style="text-align: center">
    <button wire:click="increment">+</button>
    <button wire:click="m">-</button>
    <h1>{{ $count }}</h1>
</div>


</div>
