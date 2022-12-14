<h1>Your Tasks for 2day are :</h1>
<ul>
    @foreach($tasks as $task)
        <li>What you must to do:{{$task['name']}}</li>
        <li>date:{{$task['date']}}</li>
    @endforeach
</ul>
